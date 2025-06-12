<?php

namespace App\Http\Controllers\hrd\trackingDocument;

use App\Http\Controllers\Controller;
use App\Models\shared\Cuti;
use App\Models\shared\IzinPersonal;
use App\Models\shared\Medical;
use App\Models\shared\Pegawai;
use App\Models\shared\Spd;
use Carbon\Carbon;

class TrackingDocumentController extends Controller
{
    public function indexCuti() {
        $trackingCutiTahunan = Cuti::query()
                ->with(['pegawai', 'pengganti', 'atasan1', 'atasan2']) 
                ->where('id_mastercuti', '1')
                ->orderBy('id', 'desc')
                ->get();

        $trackingCutiUmum = Cuti::query()
        ->with(['pegawai', 'pengganti', 'atasan1', 'atasan2']) 
        ->whereNotIn('id_mastercuti', [1, 2])
        ->orderBy('id', 'desc')
        ->get();

        $trackingCutiBesar = Cuti::query()
        ->with(['pegawai', 'pengganti', 'atasan1', 'atasan2']) 
        ->where('id_mastercuti', '2')
        ->orderBy('id', 'desc')
        ->get();

        return view('hrd.trackingDocument.cuti.index-cuti', 
        [
            'trackingCutiTahunan' => $trackingCutiTahunan,
            'trackingCutiUmum' => $trackingCutiUmum,
            'trackingCutiBesar' => $trackingCutiBesar,
        ]);
    }

    public function indexIzinPersonal() {
        $trackingIzinPersonal = IzinPersonal::query()
        ->orderBy('created_at', 'desc')
        ->get();
        return view('hrd.trackingDocument.izinPersonal.index-izin-personal', [ 'trackingIzinPersonal' => $trackingIzinPersonal,]);
    }

    public function indexSpd() {
        $trackingSpd = Spd::query()
        ->orderBy('created_at', 'desc')
        ->get();
        return view('hrd.trackingDocument.spd.index-spd', [ 'trackingSpd' => $trackingSpd,]);
    }

    public function printSpd($id_spd) {;
        $spd = Spd::where('id_spd', $id_spd)->first();
        return view('hrd.trackingDocument.spd.print-spd', 
            [
            'spd' => $spd,
        ]);
    }

    public function detailSpd($id_spd) {;
        $spd = Spd::where('id_spd', $id_spd)
        ->with('atasan1Nama', 'atasan2Nama')
        ->first();
        $spd->nama_atasan1 = $spd->atasan1Nama->nama ?? '-';
        $spd->nama_atasan2 = $spd->atasan2Nama->nama ?? '-';
        
        $spd->tgl_berangkat_format = Carbon::parse($spd->tgl_berangkat)->locale('id')->translatedFormat('d F Y');
        $spd->tgl_kembali_format = Carbon::parse($spd->tgl_kembali)->locale('id')->translatedFormat('d F Y');
        // Fungsi pengecekan dan format tanggal Indonesia
        function formatTanggalIndo($tanggal) {
            return ($tanggal && $tanggal != '0000-00-00 00:00:00')
                ? Carbon::parse($tanggal)->locale('id')->translatedFormat('d F Y')
                : '-';
        }
        $spd->created_at_format = formatTanggalIndo($spd->created_at);
        $spd->date_approve_atasan1_format = formatTanggalIndo($spd->date_approve_atasan1);
        $spd->date_approve_atasan2_format = formatTanggalIndo($spd->date_approve_atasan2);
        $spd->date_approve_hrd_format = formatTanggalIndo($spd->date_approve_hrd);
        $spd->date_approve_gm_hrd_format = formatTanggalIndo($spd->date_approve_gm_hrd);
        $spd->date_approve_finance_verifikasi_format = formatTanggalIndo($spd->date_approve_finance_verifikasi);
        $spd->date_approve_finance_treasury_format = formatTanggalIndo($spd->date_approve_finance_treasury);

        return view('hrd.trackingDocument.spd.detail-spd', 
            [
            'spd' => $spd,
        ]);
    }

    // public function indexMedical()
    // {
    //     $trackingMedical = Medical::query()
    //         ->join('tb_pegawai', 'tb_pegawai.nik', '=', 'tb_pengajuan_medical.nik')
    //         ->where(function ($query) {
    //             $query->where('tb_pengajuan_medical.hard_copy', 'received')
    //                   ->orWhere('tb_pengajuan_medical.approve_hrd', 'verified');
    //         })
    //         ->select(
    //             'tb_pengajuan_medical.*',
    //             'tb_pegawai.nama'
    //         )
    //         ->groupBy('tb_pengajuan_medical.nomor_medical_claim')
    //         ->orderByDesc('tb_pengajuan_medical.tgl_pengajuan')
    //         ->get();

    //     foreach ($trackingMedical as $data) {
    //         $data->kwitansiYear = \Carbon\Carbon::parse($data->tgl_bukti_kwitansi)->year ?? null;
    //     }
        
    //     $currentYear = date('Y');
    //     $lastYear = date('Y') - 1;
        

    //     return view('hrd.trackingDocument.medical.index-medical', compact('trackingMedical', 'currentYear', 'lastYear'));
    // }

    public function indexMedical()
    {
        $trackingMedical = Medical::query()
            ->join('tb_pegawai', 'tb_pegawai.nik', '=', 'tb_pengajuan_medical.nik')
            ->where(function ($query) {
                $query->where('tb_pengajuan_medical.hard_copy', 'received')
                    ->orWhere('tb_pengajuan_medical.approve_hrd', 'verified');
            })
            ->select(
                'tb_pengajuan_medical.*',
                'tb_pegawai.nama'
            )
            ->distinct()
            ->orderByDesc('tb_pengajuan_medical.tgl_pengajuan')
            ->get();

        foreach ($trackingMedical as $data) {
            $data->kwitansiYear = \Carbon\Carbon::parse($data->tgl_bukti_kwitansi)->year ?? null;
        }
        
        $currentYear = date('Y');
        $lastYear = date('Y') - 1;
        
        return view('hrd.trackingDocument.medical.index-medical', compact('trackingMedical', 'currentYear', 'lastYear'));
    }

    public function printMedical($nomor_medical_claim) {
        $medicalClaims = Medical::where('nomor_medical_claim', $nomor_medical_claim)
        ->where('revision_id', function ($query) use ($nomor_medical_claim) {
            $query->selectRaw('MAX(revision_id)')
                ->from('tb_pengajuan_medical')
                ->where('nomor_medical_claim', $nomor_medical_claim);
        })
        ->get();

        // Ambil Data Kepala Divisi HRD
        $kadivHrd = Pegawai::where('nik', 'KT-11030020')->first();
        $namaKadivHrd = $kadivHrd->nama ?? 'Tidak Diketahui';

        // Ambil Data Pegawai berdasarkan NIK dari medicalClaims pertama
        $medicalClaim = $medicalClaims->first();
        $nik = $medicalClaim->nik ?? null;
        $pegawai = Pegawai::where('nik', $nik)->first();
        $nama = $pegawai->nama ?? 'Tidak Diketahui';

         // Konversi tanggal
        $createdAt = Carbon::parse($medicalClaim->tgl_pengajuan)->translatedFormat('d F Y') ?? '-';
        $dateApprovalHrd = $medicalClaim->date_approval_hrd ?? '-';
        $dateApprovalGmHrd = $medicalClaim->date_approval_gm_hrd ?? '-';

         // Ambil Detail Medical
        $medicalDetails = Medical::where('nomor_medical_claim', $nomor_medical_claim)
        ->where('revision_id', function ($query) use ($nomor_medical_claim) {
            $query->selectRaw('MAX(revision_id)')
                ->from('tb_pengajuan_medical')
                ->where('nomor_medical_claim', $nomor_medical_claim);
        })
        ->get();

        // Hitung Total Jumlah
        $totalJumlah = $medicalDetails->sum('jumlah');

        //Mengambil Status Finance + Date Approval
        $financeVerified = $medicalClaim->status_finance_verified ?? '-';
        $treasury = $medicalClaim->paid ?? '-';
        $dateApprovalFinanceVerified = $medicalClaim->date_approval_finance_verified ?? '-';
        $dateApprovalTreasury = $medicalClaim->date_approval_treasury ?? '-';

        return view('hrd.trackingDocument.medical.print-medical', 
        compact(
            'medicalClaims',
            'medicalDetails',
            'nomor_medical_claim',
            'namaKadivHrd',
            'nama',
            'nik',
            'createdAt',
            'dateApprovalHrd',
            'dateApprovalGmHrd',
            'totalJumlah',
            'financeVerified',
            'treasury',
            'dateApprovalFinanceVerified',
            'dateApprovalTreasury'
        ));
    }

    public function detailMedical($nomor_medical_claim) {
        // $medical = Medical::where('nomor_medical_claim', $nomor_medical_claim)->first();
        $medical = Medical::where('nomor_medical_claim', $nomor_medical_claim)
        ->where('revision_id', function ($query) use ($nomor_medical_claim) {
            $query->selectRaw('MAX(revision_id)')
                ->from('tb_pengajuan_medical')
                ->where('nomor_medical_claim', $nomor_medical_claim);
        })
        ->first();

        $nik = $medical->nik;
        $hard_copy = $medical->hard_copy;
        $approve_hrd = $medical->approve_hrd;
        $keterangan_reject_hrd = $medical->keterangan_reject_hrd;
        $approve_gm_hrd = $medical->approve_gm_hrd;
        $hard_copy_finance = $medical->hard_copy_finance;
        $status_finance_verified = $medical->status_finance_verified;
        $paid = $medical->paid;
        $number_revision = $medical->revision_id;
        
        $pegawai = Pegawai::where('nik', $nik)->first();
        $nama = $pegawai->nama;

        $medical_original = Medical::where('nomor_medical_claim', $nomor_medical_claim)
        ->where('revision_id', 0)
        ->get();

        $medical_query = Medical::where('nomor_medical_claim', $nomor_medical_claim)
        ->where('revision_id', function ($query) use ($nomor_medical_claim) {
            $query->selectRaw('MAX(revision_id)')
                ->from('tb_pengajuan_medical')
                ->where('nomor_medical_claim', $nomor_medical_claim);
        })
        ->get();

        function formatTanggalIndoMedical($tanggal) {
            return ($tanggal && $tanggal != '0000-00-00 00:00:00')
                ? Carbon::parse($tanggal)->locale('id')->translatedFormat('d F Y')
                : '-';
        }

        $medical->tgl_pengajuan_format = formatTanggalIndoMedical($medical->tgl_pengajuan);
        $medical->date_approval_hrd_format = formatTanggalIndoMedical($medical->date_approval_hrd);
        $medical->date_approval_gm_hrd_format = formatTanggalIndoMedical($medical->date_approval_gm_hrd);
        $medical->date_approval_finance_verified_format = formatTanggalIndoMedical($medical->date_approval_finance_verified);
        $medical->date_approval_treasury_format = formatTanggalIndoMedical($medical->date_approval_treasury);

        return view('hrd.trackingDocument.medical.detail-medical', 
            compact('nomor_medical_claim','nik', 'nama', 'hard_copy', 'approve_hrd', 'keterangan_reject_hrd', 'approve_gm_hrd', 'hard_copy_finance', 'status_finance_verified', 'paid', 'number_revision', 'medical_original', 'medical_query', 'medical'));
    }

    public function detailCutiTahunan($id) {;
        $cutiTahunan = Cuti::where('id', $id)
        ->with(['pegawai', 'pengganti', 'atasan1', 'atasan2']) 
        ->where('id_mastercuti', '1')
        ->first();

        // Format tanggal pengajuan
        $cutiTahunan->tgl_pengajuan = Carbon::parse($cutiTahunan->tgl_pengajuan)->translatedFormat('d F Y');
        $cutiTahunan->tgl_mulai = Carbon::parse($cutiTahunan->tgl_mulai)->translatedFormat('d F Y');
        $cutiTahunan->tgl_selesai = Carbon::parse($cutiTahunan->tgl_selesai)->translatedFormat('d F Y');

        // Jika data relasi tidak ada, beri default '-'
        $cutiTahunan->nama_pegawai = $cutiTahunan->pegawai->nama ?? '-';
        $cutiTahunan->nama_pengganti = $cutiTahunan->pengganti->nama ?? '-';
        $cutiTahunan->nama_atasan1 = $cutiTahunan->atasan1->nama ?? '-';
        if ($cutiTahunan->atasan_2 == 0 || is_null($cutiTahunan->atasan2)) {
            $cutiTahunan->nama_atasan2 = $cutiTahunan->nama_atasan1;
        } else {
            $cutiTahunan->nama_atasan2 = $cutiTahunan->atasan2->nama ?? '-';
        }

        return view('hrd.trackingDocument.cuti.detail-cuti-tahunan', 
            [
            'cutiTahunan' => $cutiTahunan,
        ]);
    }

    public function detailCutiUmum($id) {
        $cutiUmum = Cuti::where('id', $id)
        ->with(['pegawai', 'pengganti', 'atasan1', 'atasan2']) 
        ->whereNotIn('id_mastercuti', [1, 2])
        ->first();

        // Format tanggal pengajuan
        $cutiUmum->tgl_pengajuan = Carbon::parse($cutiUmum->tgl_pengajuan)->translatedFormat('d F Y');
        $cutiUmum->tgl_mulai = Carbon::parse($cutiUmum->tgl_mulai)->translatedFormat('d F Y');
        $cutiUmum->tgl_selesai = Carbon::parse($cutiUmum->tgl_selesai)->translatedFormat('d F Y');

        // Jika data relasi tidak ada, beri default '-'
        $cutiUmum->nama_pegawai = $cutiUmum->pegawai->nama ?? '-';
        $cutiUmum->nama_pengganti = $cutiUmum->pengganti->nama ?? '-';
        $cutiUmum->nama_atasan1 = $cutiUmum->atasan1->nama ?? '-';
        if ($cutiUmum->atasan_2 == 0 || is_null($cutiUmum->atasan2)) {
            $cutiUmum->nama_atasan2 = $cutiUmum->nama_atasan1;
        } else {
            $cutiUmum->nama_atasan2 = $cutiUmum->atasan2->nama ?? '-';
        }

        return view('hrd.trackingDocument.cuti.detail-cuti-umum', 
            [
            'cutiUmum' => $cutiUmum,
        ]);
    }

    public function detailCutiBesar($id) {
        $cutiBesar = Cuti::where('id', $id)
        ->with(['pegawai', 'pengganti', 'atasan1', 'atasan2']) 
        ->where('id_mastercuti', '2')
        ->first();

        // Format tanggal pengajuan
        $cutiBesar->tgl_pengajuan = Carbon::parse($cutiBesar->tgl_pengajuan)->translatedFormat('d F Y');
        $cutiBesar->tgl_mulai = Carbon::parse($cutiBesar->tgl_mulai)->translatedFormat('d F Y');
        $cutiBesar->tgl_selesai = Carbon::parse($cutiBesar->tgl_selesai)->translatedFormat('d F Y');

        // Jika data relasi tidak ada, beri default '-'
        $cutiBesar->nama_pegawai = $cutiBesar->pegawai->nama ?? '-';
        $cutiBesar->nama_pengganti = $cutiBesar->pengganti->nama ?? '-';
        $cutiBesar->nama_atasan1 = $cutiBesar->atasan1->nama ?? '-';
        if ($cutiBesar->atasan_2 == 0 || is_null($cutiBesar->atasan2)) {
            $cutiBesar->nama_atasan2 = $cutiBesar->nama_atasan1;
        } else {
            $cutiBesar->nama_atasan2 = $cutiBesar->atasan2->nama ?? '-';
        }

        return view('hrd.trackingDocument.cuti.detail-cuti-besar', 
            [
            'cutiBesar' => $cutiBesar,
        ]);
    }

    public function detailIzinPersonal($id) {
        $izinPersonal = IzinPersonal::where('id', $id)
        ->with(['atasan1Nama'])
        ->first();
        $izinPersonal->nama_atasan1 = $izinPersonal->atasan1Nama->nama ?? '-';

        //Mapping Untuk Jenis Izin
        $jenisIzinMap = [
            '1' => 'Sakit',
            '2' => 'Terlambat Masuk Kerja',
            '3' => 'Pulang Lebih Awal',
            '4' => 'Tugas Luar Kantor',
        ];
        $izinPersonal->jenis_izin = $jenisIzinMap[$izinPersonal->jenis_izin] ?? '-';
        $izinPersonal->date = Carbon::parse($izinPersonal->date)->translatedFormat('d F Y');
        $izinPersonal->jam_keluar = $izinPersonal->jam_keluar ?? '-';
        $izinPersonal->jam_kembali = $izinPersonal->jam_kembali ?? '-';
        return view('hrd.trackingDocument.izinPersonal.detail-izin-personal', 
            [
            'izinPersonal' => $izinPersonal,
        ]);
    }
}
