<?php

namespace App\Console\Commands;

use App\Models\shared\Pegawai;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateHakCutiBulanan extends Command
{
    protected $signature = 'cuti:update-bulanan';
    protected $description = 'Update kuota cuti bulanan untuk pegawai berdasarkan jenis pegawai dan cuti bersama';

    public function handle()
    {
        $this->info('Proses update kuota cuti bulanan dimulai...');

        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        // Ambil cuti bersama dengan lama_cuti maksimal per code
        $cutiBersamaList = DB::table('tb_cuti_bersama')
            ->select('code', DB::raw('MAX(lama_cuti) as max_lama_cuti'))
            ->whereMonth('tanggal_cuti_bersama', $bulanIni)
            ->whereYear('tanggal_cuti_bersama', $tahunIni)
            ->groupBy('code')
            ->get();

        $totalCutiBersama = 0;
        foreach ($cutiBersamaList as $cuti) {
            $totalCutiBersama += $cuti->max_lama_cuti;
        }

        // === FUNGSI UNTUK MENGHITUNG HISTORY EDIT CUTI DINAMIS ===
        $this->processJenisPegawai('HO', $bulanIni, $tahunIni, $totalCutiBersama);
        $this->processJenisPegawai('Shift', $bulanIni, $tahunIni, 0); // Tidak dikurangi cuti bersama
        $this->processJenisPegawai('Lapangan', $bulanIni, $tahunIni, 0); // Tidak dikurangi cuti bersama

        // === PROSES KARYAWAN KHUSUS ===
        $this->processKaryawanKhusus($bulanIni, $tahunIni);

        $this->info('Proses update kuota cuti bulanan selesai.');
    }

    /**
     * Process kuota cuti untuk jenis pegawai tertentu
     */
    private function processJenisPegawai($jenisPeg, $bulanIni, $tahunIni, $totalCutiBersama)
    {
        $this->info("Memproses pegawai {$jenisPeg}...");

        $pegawaiList = Pegawai::where('jenis_peg', $jenisPeg)->get();

        foreach ($pegawaiList as $pegawai) {
            // Hitung adjustment dari history edit cuti
            $adjustment = $this->calculateHistoryAdjustment($pegawai, $jenisPeg, $bulanIni, $tahunIni);
            
            // Base tambahan cuti bulanan
            $cutiTambahan = 1;
            
            // Tambahkan adjustment dari history
            $cutiTambahan += $adjustment;
            
            // Kurangi cuti bersama (hanya untuk HO)
            if ($jenisPeg === 'HO') {
                $cutiTambahan -= $totalCutiBersama;
            }

            // Pastikan hak_cuti_tahun_berjalan tidak null
            if ($pegawai->hak_cuti_tahun_berjalan === null) {
                $pegawai->hak_cuti_tahun_berjalan = 0;
            }

            // Update kuota cuti
            $oldQuota = $pegawai->hak_cuti_tahun_berjalan;
            $pegawai->hak_cuti_tahun_berjalan += $cutiTambahan;
            $pegawai->save();

            $this->info("Pegawai {$pegawai->nama} ({$pegawai->nik}): {$oldQuota} -> {$pegawai->hak_cuti_tahun_berjalan} (adjustment: {$cutiTambahan})");
        }
    }

    /**
     * Process kuota cuti untuk karyawan khusus berdasarkan NIK yang terdaftar di history_edit_cuti
     */
     private function processKaryawanKhusus($bulanIni, $tahunIni)
    {
        $this->info("Memproses karyawan khusus...");

        // Debug: Cek semua data history edit cuti bulan ini
        $allHistory = DB::table('tb_history_edit_cuti')
            ->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->where('jenis_tahun_cuti', 'hak_cuti_tahun_berjalan')
            ->get();
            
        $this->info("=== DEBUG: Total history edit cuti bulan ini: " . $allHistory->count() . " ===");
        
        foreach ($allHistory as $history) {
            $this->info("ID: {$history->id} | Jenis Peg: {$history->jenis_peg} | Jenis Edit: {$history->jenis_edit_cuti} | Peg Cuti: {$history->peg_cuti}");
        }

        // Ambil semua history edit cuti untuk karyawan_khusus bulan ini
        $historyKaryawanKhusus = DB::table('tb_history_edit_cuti')
            ->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->where('jenis_peg', 'karyawan_khusus')
            ->where('jenis_tahun_cuti', 'hak_cuti_tahun_berjalan')
            ->get();

        $this->info("=== DEBUG: History karyawan khusus: " . $historyKaryawanKhusus->count() . " ===");

        // Kumpulkan semua NIK unik dari karyawan khusus
        $nikKaryawanKhususSet = collect();
        
        foreach ($historyKaryawanKhusus as $history) {
            $this->info("Processing history ID: {$history->id}");
            $this->info("Raw peg_cuti: " . $history->peg_cuti);
            $this->info("Type peg_cuti: " . gettype($history->peg_cuti));
            
            $pegCuti = null;
            
            // Handle berbagai format peg_cuti
            if (is_string($history->peg_cuti)) {
                // Coba decode JSON
                $decoded = json_decode($history->peg_cuti, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $pegCuti = $decoded;
                    $this->info("Decoded as JSON: " . print_r($pegCuti, true));
                } else {
                    // Mungkin string biasa dipisah koma
                    $pegCuti = array_map('trim', explode(',', $history->peg_cuti));
                    $this->info("Split by comma: " . print_r($pegCuti, true));
                }
            } else {
                $pegCuti = $history->peg_cuti;
                $this->info("Direct assignment: " . print_r($pegCuti, true));
            }
            
            if (is_array($pegCuti)) {
                foreach ($pegCuti as $nik) {
                    if (!empty(trim($nik))) {
                        $nikKaryawanKhususSet->push(trim($nik));
                        $this->info("Added NIK: " . trim($nik));
                    }
                }
            } else {
                $this->warn("peg_cuti is not an array for history ID: {$history->id}");
            }
        }

        // Ambil NIK unik
        $nikKaryawanKhususUnique = $nikKaryawanKhususSet->unique()->values();

        $this->info("=== DEBUG: NIK yang ditemukan: " . $nikKaryawanKhususUnique->implode(', ') . " ===");
        $this->info("Ditemukan " . $nikKaryawanKhususUnique->count() . " karyawan khusus untuk diproses.");

        // Process setiap karyawan khusus
        foreach ($nikKaryawanKhususUnique as $nik) {
            $pegawai = Pegawai::where('nik', $nik)->first();
            
            if (!$pegawai) {
                $this->warn("Pegawai dengan NIK {$nik} tidak ditemukan di database!");
                continue;
            }

            // Hitung adjustment dari history edit cuti khusus untuk karyawan ini
            $adjustment = $this->calculateHistoryAdjustmentKhusus($pegawai, $bulanIni, $tahunIni);
            
            // Base tambahan cuti bulanan
            $cutiTambahan = 1;
            
            // Tambahkan adjustment dari history
            $cutiTambahan += $adjustment;

            // Pastikan hak_cuti_tahun_berjalan tidak null
            if ($pegawai->hak_cuti_tahun_berjalan === null) {
                $pegawai->hak_cuti_tahun_berjalan = 0;
            }

            // Update kuota cuti
            $oldQuota = $pegawai->hak_cuti_tahun_berjalan;
            $pegawai->hak_cuti_tahun_berjalan += $cutiTambahan;
            $pegawai->save();

            $this->info("Karyawan Khusus {$pegawai->nama} ({$pegawai->nik}): {$oldQuota} -> {$pegawai->hak_cuti_tahun_berjalan} (adjustment: {$cutiTambahan})");
        }
    }

    /**
     * Menghitung adjustment dari history edit cuti (penambahan - pengurangan)
     */
    private function calculateHistoryAdjustment($pegawai, $jenisPeg, $bulanIni, $tahunIni)
    {
        // Hitung penambahan kuota cuti
        $penambahan = $this->getHistoryEditCuti(
            'penambahan_kuota_cuti',
            $pegawai,
            $jenisPeg,
            $bulanIni,
            $tahunIni
        );

        // Hitung pengurangan kuota cuti
        $pengurangan = $this->getHistoryEditCuti(
            'pengurangan_kuota_cuti',
            $pegawai,
            $jenisPeg,
            $bulanIni,
            $tahunIni
        );

        $totalAdjustment = $penambahan - $pengurangan;
        
        $this->info("History adjustment untuk {$pegawai->nama}: +{$penambahan} -{$pengurangan} = {$totalAdjustment}");
        
        return $totalAdjustment;
    }
      /**
     * Menghitung adjustment dari history edit cuti khusus untuk karyawan tertentu
     */
    private function calculateHistoryAdjustmentKhusus($pegawai, $bulanIni, $tahunIni)
    {
        // Hitung penambahan kuota cuti
        $penambahan = $this->getHistoryEditCutiKhusus(
            'penambahan_kuota_cuti',
            $pegawai,
            $bulanIni,
            $tahunIni
        );

        // Hitung pengurangan kuota cuti
        $pengurangan = $this->getHistoryEditCutiKhusus(
            'pengurangan_kuota_cuti',
            $pegawai,
            $bulanIni,
            $tahunIni
        );

        $totalAdjustment = $penambahan - $pengurangan;
        
        $this->info("History adjustment khusus untuk {$pegawai->nama}: +{$penambahan} -{$pengurangan} = {$totalAdjustment}");
        
        return $totalAdjustment;
    }
    /**
     * Ambil data history edit cuti berdasarkan jenis edit
     */
    private function getHistoryEditCuti($jenisEditCuti, $pegawai, $jenisPeg, $bulanIni, $tahunIni)
    {
        return DB::table('tb_history_edit_cuti')
            ->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->where('jenis_edit_cuti', $jenisEditCuti)
            ->where('jenis_tahun_cuti', 'hak_cuti_tahun_berjalan')
            ->where(function ($query) use ($pegawai, $jenisPeg) {
                $query->where(function ($subQuery) use ($jenisPeg) {
                    // Cek berdasarkan jenis pegawai
                    $subQuery->where('jenis_peg', $jenisPeg)
                        ->orWhere('jenis_peg', 'Semua Karyawan');
                });
                // Tidak termasuk karyawan_khusus di sini karena diproses terpisah
            })
            ->sum('jumlah_cuti');
    }
    /**
     * Ambil data history edit cuti khusus berdasarkan NIK pegawai
     */
    private function getHistoryEditCutiKhusus($jenisEditCuti, $pegawai, $bulanIni, $tahunIni)
    {
        return DB::table('tb_history_edit_cuti')
            ->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->where('jenis_edit_cuti', $jenisEditCuti)
            ->where('jenis_tahun_cuti', 'hak_cuti_tahun_berjalan')
            ->where('jenis_peg', 'karyawan_khusus')
            ->whereJsonContains('peg_cuti', $pegawai->nik)
            ->sum('jumlah_cuti');
    }
}
