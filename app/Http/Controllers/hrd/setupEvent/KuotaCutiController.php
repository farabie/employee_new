<?php

namespace App\Http\Controllers\hrd\setupEvent;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\KuotaCutiRequest;
use App\Models\hrd\HistoryEditCuti;
use App\Models\shared\Pegawai;
use Carbon\Carbon;

class KuotaCutiController extends Controller
{
    // public function index() {
    //     $kuotaCuti = Pegawai::join('tb_user', 'tb_pegawai.id_peg', '=', 'tb_user.id_peg')
    //     ->where('tb_pegawai.status_karyawan', 'Active')
    //     ->where('tb_user.hak_akses', 'Pegawai')
    //     ->select([
    //         'tb_pegawai.id_peg',
    //         'tb_pegawai.nik',
    //         'tb_pegawai.nama',
    //         'tb_pegawai.jenis_peg', 
    //         'tb_pegawai.foto', 
    //         'tb_pegawai.jk',
    //         'tb_pegawai.already_cuti_besar', 
    //         'tb_pegawai.hak_cuti_tahun_1',
    //         'tb_pegawai.hak_cuti_tahun_2',
    //         'tb_pegawai.hak_cuti_tahun_berjalan',
    //         'tb_pegawai.hak_cuti_besar',
    //         'tb_pegawai.hak_cuti',
    //     ])
    //     ->orderBy('tb_pegawai.created_at', 'desc')
    //     ->get()
    //     ->map(function ($item) {
    //         if ($item->jenis_peg === 'HO') {
    //             $item->jenis_peg = 'Reguler';
    //         } elseif ($item->jenis_peg === 'Lapangan') {
    //             $item->jenis_peg = 'Area';
    //         }
    //         return $item;
    //     });

           
    //     return view('hrd.setupEvent.kuotaCuti.index', compact('kuotaCuti'));
    // }

    public function index() {
        $tahunSekarang = date('Y');
        $tahunSebelumnya = [$tahunSekarang - 1, $tahunSekarang - 2];

        $kuotaCuti = Pegawai::with(['saldoCuti' => function ($query) use ($tahunSekarang, $tahunSebelumnya) {
            $query->whereIn('tahun', array_merge([$tahunSekarang], $tahunSebelumnya));
        }])
        ->join('tb_user', 'tb_pegawai.id', '=', 'tb_user.id_peg')
        ->where('tb_pegawai.status_karyawan', 'Active')
        ->where('tb_user.hak_akses', 'Pegawai')
        ->select([
            'tb_pegawai.id',
            'tb_pegawai.nik',
            'tb_pegawai.nama',
            'tb_pegawai.jenis_peg',
            'tb_pegawai.foto',
            'tb_pegawai.jk',
        ])
        ->orderBy('tb_pegawai.created_at', 'desc')
        ->get()
        ->map(function ($pegawai) use ($tahunSekarang, $tahunSebelumnya) {
            $saldo = $pegawai->saldoCuti;

            $pegawai->hak_cuti_tahun_berjalan = $saldo->where('tahun', $tahunSekarang)
                ->where('jenis_cuti', 'tahunan')
                ->sum('hak_cuti_awal');

            $pegawai->hak_cuti_tahun_1 = $saldo->where('tahun', $tahunSebelumnya[0])
                ->where('jenis_cuti', 'tahunan')
                ->sum('hak_cuti_awal');

            $pegawai->hak_cuti_tahun_2 = $saldo->where('tahun', $tahunSebelumnya[1])
                ->where('jenis_cuti', 'tahunan')
                ->sum('hak_cuti_awal');

            $pegawai->hak_cuti_besar = $saldo->whereIn('tahun', $tahunSebelumnya)
                ->where('jenis_cuti', 'besar')
                ->sum('hak_cuti_awal');

            $pegawai->hak_cuti = $pegawai->hak_cuti_tahun_1 + $pegawai->hak_cuti_tahun_2 + $pegawai->hak_cuti_besar;

            // Format jenis_peg
            if ($pegawai->jenis_peg === 'HO') {
                $pegawai->jenis_peg = 'Reguler';
            } elseif ($pegawai->jenis_peg === 'Lapangan') {
                $pegawai->jenis_peg = 'Area';
            }

            return $pegawai;
        });

        return view('hrd.setupEvent.kuotaCuti.index', compact('kuotaCuti'));
    }

    public function create() {
        $dataPegawai = Pegawai::join('tb_user', 'tb_pegawai.id', '=', 'tb_user.id_peg')
        ->where('tb_pegawai.status_karyawan', 'Active')
        ->where('tb_user.hak_akses', 'Pegawai')
        ->select([
            'tb_pegawai.id',
            'tb_pegawai.nik',
            'tb_pegawai.nama', 
        ])
        ->orderby('tb_pegawai.created_at', 'desc')
        ->get();
        return view('hrd.setupEvent.kuotaCuti.form', 
           [
              'kuotaCuti' => new Pegawai(),
              'page_meta' => [
                 'title' => 'Edit Data Kuota Cuti',
                 'method' => 'post',
                 'url' => route('kuota-cuti.store'),
                 'submit_text' => 'Submit'
              ],
              'dataPegawai' => $dataPegawai,
           ],
        );
     }

     public function store(KuotaCutiRequest $request)
    {
        $time = Carbon::now();
        $satu_tahun_lalu = $time->clone()->subYear()->format('Y');
        $dua_tahun_lalu = $time->clone()->subYears(2)->format('Y'); 

        $jenisCuti = $request->jenis_tahun_cuti;
        $jenisPeg = $request->jenis_peg;
        $jumlahCuti = $request->jumlah_cuti;
        $pegCuti = $request->peg_cuti;
        $jenisEdit = $request->jenis_edit_cuti;

        // Simpan ke History
        HistoryEditCuti::create([
            'jenis_edit_cuti' => $jenisEdit,
            'jenis_tahun_cuti' => $jenisCuti,
            'jenis_peg' => $jenisPeg,
            'jumlah_cuti' => $jumlahCuti,
            'keterangan' => $request->keterangan,
            'peg_cuti' => is_array($pegCuti) ? implode(',', $pegCuti) : null,
        ]);

        $pegawais = Pegawai::query()
            ->when($jenisPeg === 'karyawan_khusus' && !empty($pegCuti), fn($q) => $q->whereIn('nik', $pegCuti))
            ->when($jenisPeg !== 'Semua Karyawan' && $jenisPeg !== 'karyawan_khusus', fn($q) => $q->where('jenis_peg', $jenisPeg))
            ->where('status_karyawan', 'Active')
            ->get();

        foreach ($pegawais as $pegawai) {
            $saldo = $pegawai->saldoCuti()->firstOrNew([
                'tahun' => $jenisCuti,
                'jenis_cuti' => 'tahunan'
            ]);

            if ($jenisEdit === 'penambahan_kuota_cuti') {
                $saldo->jumlah = ($saldo->jumlah ?? 0) + $jumlahCuti;
            } elseif ($jenisEdit === 'pengurangan_kuota_cuti') {
                $saldo->jumlah = max(0, ($saldo->jumlah ?? 0) - $jumlahCuti);
            }

            $saldo->save();
        }

        return to_route('kuota-cuti.index')->with('success', 'Data berhasil ditambahkan');
    }

    
    // public function store(KuotaCutiRequest $request)
    // {
    //     $time = Carbon::now();
    //     $satu_tahun_lalu = $time->clone()->subYear()->format('Y');
    //     $dua_tahun_lalu = $time->clone()->subYears(2)->format('Y'); 
    //     // Ambil input
    //     $jenisCuti = $request->jenis_tahun_cuti;
    //     $jenisPeg = $request->jenis_peg;
    //     $jumlahCuti = $request->jumlah_cuti;
    //     $pegCuti = $request->peg_cuti;
    //     $jenisEdit = $request->jenis_edit_cuti;

    //     // // Simpan ke HistoryEditCuti terlebih dahulu
    //     HistoryEditCuti::create([
    //         'jenis_edit_cuti' => $jenisEdit,
    //         'jenis_tahun_cuti' => $jenisCuti,
    //         'jenis_peg' => $jenisPeg,
    //         'jumlah_cuti' => $jumlahCuti,
    //         'keterangan' => $request->keterangan,
    //         'peg_cuti' => is_array($pegCuti) ? implode(',', $pegCuti) : null,
    //     ]);
    //     // Jika bukan hak cuti tahun berjalan, lakukan update pada Pegawai
    //     if ($jenisCuti === $satu_tahun_lalu || $jenisCuti ===  $dua_tahun_lalu) {
    //         if (!empty($jenisCuti) && !empty($jenisPeg) && !empty($jumlahCuti)) {
    //             $query = Pegawai::query()->where('status_karyawan', 'Active');

    //             if ($jenisPeg === 'karyawan_khusus' && !empty($pegCuti)) {
    //                 $query->whereIn('nik', $pegCuti);
    //             } elseif ($jenisPeg !== 'Semua Karyawan') {
    //                 $query->where('jenis_peg', $jenisPeg);
    //             }

    //             $query->clone()->whereNull($jenisCuti)->update([$jenisCuti => 0]);

    //             if ($jenisEdit === 'penambahan_kuota_cuti') {
    //                 $query->increment($jenisCuti, $jumlahCuti);
    //             } elseif ($jenisEdit === 'pengurangan_kuota_cuti') {
    //                 $query->decrement($jenisCuti, $jumlahCuti);
    //             }
    //         }
    //     }       

    //     return to_route('kuota-cuti.index')->with('success', 'Data berhasil ditambahkan');
    // }
}
