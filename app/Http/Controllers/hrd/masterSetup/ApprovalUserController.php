<?php

namespace App\Http\Controllers\hrd\masterSetup;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\ApprovalRequest;
use App\Models\hrd\Approval;
use App\Models\shared\Pegawai;

class ApprovalUserController extends Controller
{
    public function index() {
        $approvalSummary = Approval::query()
            ->first()
            ->get()
            ->map(function ($approval) {
                // Ambil semua atasan_1 dan atasan_2
                $nikPegAtasan = array_filter([
                    $approval->atasan1_general,
                    $approval->atasan2_general,
                    $approval->atasan1_spd,
                    $approval->atasan2_spd,
                    $approval->atasan1_ko,
                ]);
    
                // Query hanya untuk NIK yang ada
                $approvals = Pegawai::whereIn('nik', $nikPegAtasan)->pluck('nama', 'nik');
    
                // Assign nama approval berdasarkan NIK
                $approval->atasan_1_general_name = $approvals[$approval->atasan1_general] ?? '-';
                $approval->atasan_2_general_name = $approvals[$approval->atasan2_general] ?? '-';
                $approval->atasan_1_spd_name = $approvals[$approval->atasan1_spd] ?? '-';
                $approval->atasan_2_spd_name = $approvals[$approval->atasan2_spd] ?? '-';
                $approval->atasan_1_ko_name = $approvals[$approval->atasan1_ko] ?? '-';
                return $approval;
            });
    
        return view('hrd.masterSetup.hirarkiUser.approval.index', compact('approvalSummary'));
    }

    public function edit($nik) {
        // Ambil data pegawai berdasarkan NIK
        $hirarkiApproval = Approval::where('nik', $nik)->first();
        $dataPegawai = Pegawai::where('nik', $nik)->first();

        // Cek apakah pegawai ditemukan
        if (!$hirarkiApproval) {
            return redirect()->route('approval.index')->with('error', 'Data tidak ditemukan');
        }

        // Ambil data terkait hirarki user
        $dataApproval = Pegawai::where('unit_kerja', $dataPegawai->unit_kerja)
            ->where('nik', '!=', '')
            ->where('status_karyawan', 'Active')
            ->where('nik', 'NOT LIKE', '%FKT%')
            ->distinct('nik')
            ->get();

        $dataAtasanGeneral1 = $dataApproval;
        $dataAtasanGeneral2 = $dataApproval;
        $dataAtasanSpd1 = $dataApproval;
        $dataAtasanSpd2 = $dataApproval;
        $dataAtasanKo1 = $dataApproval;

        return view('hrd.masterSetup.hirarkiUser.approval.form', [
            'hirarkiApproval' => $hirarkiApproval,
            'dataAtasanGeneral1' => $dataAtasanGeneral1,
            'dataAtasanGeneral2' => $dataAtasanGeneral2,
            'dataAtasanSpd1' => $dataAtasanSpd1,
            'dataAtasanSpd2' => $dataAtasanSpd2,
            'dataAtasanKo1' => $dataAtasanKo1,
            'page_meta' => [
                'title' => 'Update Approval Karyawan' . '(' . $hirarkiApproval->nama . ')',
                'method' => 'put',
                'url' => route('approval.update', $hirarkiApproval->nik),
                'submit_text' => 'Update'
            ]
        ]);
    }

    public function update(ApprovalRequest $request, $nik)
    {
        $approval = Approval::where('nik', $nik)->first();
        if (!$approval) {
            return redirect()->route('approval.index')->with('error', 'Data tidak ditemukan');
        }
        $approval->update($request->validated());
        return to_route('approval.index')->with('success', 'Data berhasil diperbarui');
    }
}
