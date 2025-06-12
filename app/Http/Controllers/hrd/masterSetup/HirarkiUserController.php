<?php

namespace App\Http\Controllers\hrd\masterSetup;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\HirarkiUserGeneralRequest;
use App\Models\shared\Pegawai;
use App\Models\shared\StrukturOrganisasi;
use Illuminate\Http\Request;

class HirarkiUserController extends Controller
{
    // public function index() {
    //     $hirarkiUsers = Pegawai::join('tb_user', 'tb_pegawai.id', '=', 'tb_user.id_peg')
    //         ->where('tb_user.status_karyawan', 'Active')
    //         ->where('tb_user.hak_akses', 'Pegawai')
    //         ->select([
    //             'tb_pegawai.id',
    //             'tb_pegawai.nik',
    //             'tb_pegawai.nama', 
    //             'tb_pegawai.unit_kerja',
    //             'tb_pegawai.unit_approval',
    //             'tb_pegawai.subsi_approval',
    //             'tb_pegawai.kasie_approval',
    //             'tb_pegawai.kadept_approval',
    //             'tb_pegawai.kadiv_approval',
    //             'tb_pegawai.direktorat_approval',
    //         ])
    //         ->latest('tb_pegawai.created_at')
    //         ->get()
    //         ->map(function ($hirarki) {
    //             // Ambil semua NIK yang diperlukan dalam satu kali query
    //             $niks = array_filter([
    //                 $hirarki->unit_approval,
    //                 $hirarki->subsi_approval,
    //                 $hirarki->kasie_approval,
    //                 $hirarki->kadept_approval,
    //                 $hirarki->kadiv_approval,
    //                 $hirarki->direktorat_approval,
    //             ]);
    
    //             // Query hanya untuk NIK yang ada
    //             $approvals = Pegawai::whereIn('nik', $niks)->pluck('nama', 'nik');
    
    //             // Assign nama approval berdasarkan NIK
    //             $hirarki->unit_approval_name = $approvals[$hirarki->unit_approval] ?? '-';
    //             $hirarki->subsi_approval_name = $approvals[$hirarki->subsi_approval] ?? '-';
    //             $hirarki->kasie_approval_name = $approvals[$hirarki->kasie_approval] ?? '-';
    //             $hirarki->kadept_approval_name = $approvals[$hirarki->kadept_approval] ?? '-';
    //             $hirarki->kadiv_approval_name = $approvals[$hirarki->kadiv_approval] ?? '-';
    //             $hirarki->direktorat_approval_name = $approvals[$hirarki->direktorat_approval] ?? '-';
    
    //             return $hirarki;
    //         });
    
    //     return view('hrd.masterSetup.hirarkiUser.general.index', compact('hirarkiUsers'));
    // }

    // public function edit($nik) {
    //     // Ambil data pegawai berdasarkan NIK
    //     $hirarkiUser = Pegawai::where('nik', $nik)->first();
    
    //     // Cek apakah pegawai ditemukan
    //     if (!$hirarkiUser) {
    //         return redirect()->route('general.index')->with('error', 'Data tidak ditemukan');
    //     }
    
    //     // Ambil data terkait hirarki user
    //     $dataHirarki = Pegawai::where('unit_kerja', $hirarkiUser->unit_kerja)
    //         ->where('nik', '!=', '')
    //         ->where('status_karyawan', 'Active')
    //         ->where('nik', 'NOT LIKE', '%FKT%')
    //         ->distinct('nik')
    //         ->get();
    
    //     // Menyesuaikan dengan unit kerja
    //     $dataUnit = $dataHirarki;
    //     $dataSubsi = $dataHirarki;
    //     $dataKasie = $dataHirarki;
    //     $dataKadept = $dataHirarki;
    //     $dataKadiv = $dataHirarki;
    
    //     // Ambil data direksi
    //     $dataDirektorat = Pegawai::join('tb_jabatan', 'tb_pegawai.id', '=', 'tb_jabatan.id_peg')
    //         ->where('tb_jabatan.jabatan', '6')
    //         ->select('tb_pegawai.nama', 'tb_pegawai.nik')
    //         ->get();
    
    //     // Cek jabatan
    //     $cekJabatan = Pegawai::join('tb_jabatan', 'tb_pegawai.id', '=', 'tb_jabatan.id_peg')
    //         ->where('tb_pegawai.nik', $hirarkiUser->nik)
    //         ->select('tb_jabatan.jabatan', 'tb_pegawai.nama', 'tb_pegawai.nik')
    //         ->first();
    
    //     return view('hrd.masterSetup.hirarkiUser.general.form', [
    //         'hirarkiUser' => $hirarkiUser,
    //         'dataUnit' => $dataUnit,
    //         'dataSubsi' => $dataSubsi,
    //         'dataKasie' => $dataKasie,
    //         'dataKadept' => $dataKadept,
    //         'dataKadiv' => $dataKadiv,
    //         'dataDirektorat' => $dataDirektorat,
    //         'cekJabatan' => $cekJabatan,
    //         'page_meta' => [
    //             'title' => 'Update Struktur Orchart '. '(' . $hirarkiUser->nama . ')',
    //             'method' => 'put',
    //             'url' => route('general.update', ['nik' => $hirarkiUser->nik]),
    //             'submit_text' => 'Update'
    //         ]
    //     ]);
    // }
    
    public function index() {
        $hirarkiUsers = Pegawai::with([
                'user' => function($query) {
                    $query->where('status_karyawan', 'Active')
                        ->where('hak_akses', 'Pegawai');
                },
                'strukturOrganisasi'
            ])
            ->whereHas('user', function($query) {
                $query->where('status_karyawan', 'Active')
                    ->where('hak_akses', 'Pegawai');
            })
            ->select([
                'tb_pegawai.id',
                'tb_pegawai.nik',
                'tb_pegawai.nama', 
                'tb_pegawai.unit_kerja'
            ])
            ->latest('tb_pegawai.created_at')
            ->get()
            ->map(function ($pegawai) {
                // Ambil data struktur organisasi
                $struktur = $pegawai->strukturOrganisasi;
                
                if (!$struktur) {
                    // Jika tidak ada struktur organisasi, set default values
                    $pegawai->unit_approval = null;
                    $pegawai->subsi_approval = null;
                    $pegawai->kasie_approval = null;
                    $pegawai->kadept_approval = null;
                    $pegawai->kadiv_approval = null;
                    $pegawai->direktorat_approval = null;
                    
                    $pegawai->unit_approval_name = '-';
                    $pegawai->subsi_approval_name = '-';
                    $pegawai->kasie_approval_name = '-';
                    $pegawai->kadept_approval_name = '-';
                    $pegawai->kadiv_approval_name = '-';
                    $pegawai->direktorat_approval_name = '-';
                    
                    return $pegawai;
                }
                
                // Set approval values dari struktur organisasi
                $pegawai->unit_approval = $struktur->unit_approval;
                $pegawai->subsi_approval = $struktur->subsi_approval;
                $pegawai->kasie_approval = $struktur->kasie_approval;
                $pegawai->kadept_approval = $struktur->kadept_approval;
                $pegawai->kadiv_approval = $struktur->kadiv_approval;
                $pegawai->direktorat_approval = $struktur->direktorat_approval;
                
                // Ambil semua NIK yang diperlukan dalam satu kali query
                $niks = array_filter([
                    $struktur->unit_approval,
                    $struktur->subsi_approval,
                    $struktur->kasie_approval,
                    $struktur->kadept_approval,
                    $struktur->kadiv_approval,
                    $struktur->direktorat_approval,
                ]);

                // Query hanya untuk NIK yang ada (jika ada)
                $approvals = [];
                if (!empty($niks)) {
                    $approvals = Pegawai::whereIn('nik', $niks)->pluck('nama', 'nik');
                }

                // Assign nama approval berdasarkan NIK
                $pegawai->unit_approval_name = $approvals[$struktur->unit_approval] ?? '-';
                $pegawai->subsi_approval_name = $approvals[$struktur->subsi_approval] ?? '-';
                $pegawai->kasie_approval_name = $approvals[$struktur->kasie_approval] ?? '-';
                $pegawai->kadept_approval_name = $approvals[$struktur->kadept_approval] ?? '-';
                $pegawai->kadiv_approval_name = $approvals[$struktur->kadiv_approval] ?? '-';
                $pegawai->direktorat_approval_name = $approvals[$struktur->direktorat_approval] ?? '-';

                return $pegawai;
            });

        return view('hrd.masterSetup.hirarkiUser.general.index', compact('hirarkiUsers'));
    }

    function update(HirarkiUserGeneralRequest $request, $nik) {
        // dd($request->validated()); 
        $strukturOrganisasi = StrukturOrganisasi::where('nik', $nik)->first();
        if (!$strukturOrganisasi) {
            return redirect()->route('general.index')->with('error', 'Data tidak ditemukan');
        }
        $strukturOrganisasi->update($request->validated());
        // return to_route('general.index');
        return to_route('general.index')->with('success', 'Data berhasil diperbarui');
        
    }

}
