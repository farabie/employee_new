<?php

namespace App\Http\Controllers\hrd\masterSetup;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\HirarkiUserGeneralRequest;
use App\Models\shared\Pegawai;
use Illuminate\Http\Request;

class HirarkiUserController extends Controller
{
    public function index() {
        $hirarkiUsers = Pegawai::join('tb_user', 'tb_pegawai.id_peg', '=', 'tb_user.id_peg')
            ->where('tb_pegawai.status_karyawan', 'Active')
            ->where('tb_user.hak_akses', 'Pegawai')
            ->select([
                'tb_pegawai.id_peg',
                'tb_pegawai.nik',
                'tb_pegawai.nama', 
                'tb_pegawai.unit_kerja',
                'tb_pegawai.unit_approval',
                'tb_pegawai.subsi_approval',
                'tb_pegawai.kasie_approval',
                'tb_pegawai.kadept_approval',
                'tb_pegawai.kadiv_approval',
                'tb_pegawai.direktorat_approval',
            ])
            ->latest('tb_pegawai.created_at')
            ->get()
            ->map(function ($hirarki) {
                // Ambil semua NIK yang diperlukan dalam satu kali query
                $niks = array_filter([
                    $hirarki->unit_approval,
                    $hirarki->subsi_approval,
                    $hirarki->kasie_approval,
                    $hirarki->kadept_approval,
                    $hirarki->kadiv_approval,
                    $hirarki->direktorat_approval,
                ]);
    
                // Query hanya untuk NIK yang ada
                $approvals = Pegawai::whereIn('nik', $niks)->pluck('nama', 'nik');
    
                // Assign nama approval berdasarkan NIK
                $hirarki->unit_approval_name = $approvals[$hirarki->unit_approval] ?? '-';
                $hirarki->subsi_approval_name = $approvals[$hirarki->subsi_approval] ?? '-';
                $hirarki->kasie_approval_name = $approvals[$hirarki->kasie_approval] ?? '-';
                $hirarki->kadept_approval_name = $approvals[$hirarki->kadept_approval] ?? '-';
                $hirarki->kadiv_approval_name = $approvals[$hirarki->kadiv_approval] ?? '-';
                $hirarki->direktorat_approval_name = $approvals[$hirarki->direktorat_approval] ?? '-';
    
                return $hirarki;
            });
    
        return view('hrd.masterSetup.hirarkiUser.general.index', compact('hirarkiUsers'));
    }

    public function edit($nik) {
        // Ambil data pegawai berdasarkan NIK
        $hirarkiUser = Pegawai::where('nik', $nik)->first();
    
        // Cek apakah pegawai ditemukan
        if (!$hirarkiUser) {
            return redirect()->route('general.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Ambil data terkait hirarki user
        $dataHirarki = Pegawai::where('unit_kerja', $hirarkiUser->unit_kerja)
            ->where('nik', '!=', '')
            ->where('status_karyawan', 'Active')
            ->where('nik', 'NOT LIKE', '%FKT%')
            ->distinct('nik')
            ->get();
    
        // Menyesuaikan dengan unit kerja
        $dataUnit = $dataHirarki;
        $dataSubsi = $dataHirarki;
        $dataKasie = $dataHirarki;
        $dataKadept = $dataHirarki;
        $dataKadiv = $dataHirarki;
    
        // Ambil data direksi
        $dataDirektorat = Pegawai::join('tb_jabatan', 'tb_pegawai.id_peg', '=', 'tb_jabatan.id_peg')
            ->where('tb_jabatan.jabatan', '6')
            ->select('tb_pegawai.nama', 'tb_pegawai.nik')
            ->get();
    
        // Cek jabatan
        $cekJabatan = Pegawai::join('tb_jabatan', 'tb_pegawai.id_peg', '=', 'tb_jabatan.id_peg')
            ->where('tb_pegawai.nik', $hirarkiUser->nik)
            ->select('tb_jabatan.jabatan', 'tb_pegawai.nama', 'tb_pegawai.nik')
            ->first();
    
        return view('hrd.masterSetup.hirarkiUser.general.form', [
            'hirarkiUser' => $hirarkiUser,
            'dataUnit' => $dataUnit,
            'dataSubsi' => $dataSubsi,
            'dataKasie' => $dataKasie,
            'dataKadept' => $dataKadept,
            'dataKadiv' => $dataKadiv,
            'dataDirektorat' => $dataDirektorat,
            'cekJabatan' => $cekJabatan,
            'page_meta' => [
                'title' => 'Update Struktur Orchart '. '(' . $hirarkiUser->nama . ')',
                'method' => 'put',
                'url' => route('general.update', ['nik' => $hirarkiUser->nik]),
                'submit_text' => 'Update'
            ]
        ]);
    }    

    function update(HirarkiUserGeneralRequest $request, $nik) {
        // dd($request->validated()); 
        $pegawai = Pegawai::where('nik', $nik)->first();
        if (!$pegawai) {
            return redirect()->route('general.index')->with('error', 'Data tidak ditemukan');
        }
        $pegawai->update($request->validated());
        // return to_route('general.index');
        return to_route('general.index')->with('success', 'Data berhasil diperbarui');
        
    }

}
