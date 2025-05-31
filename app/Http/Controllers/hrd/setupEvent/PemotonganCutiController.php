<?php

namespace App\Http\Controllers\hrd\setupEvent;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\PemotonganCutiRequest;
use App\Models\hrd\PemotonganCuti;
use App\Models\shared\Pegawai;
use Illuminate\Support\Facades\DB;


class PemotonganCutiController extends Controller
{
    public function index() {
        $pemotonganCuti = PemotonganCuti::query()->latest()->get();
        return view('hrd.setupEvent.pemotonganCuti.index', ['pemotonganCuti' => $pemotonganCuti]);
   }

   public function create() {
      $dataPegawai = Pegawai::join('tb_user', 'tb_pegawai.id_peg', '=', 'tb_user.id_peg')
      ->where('tb_pegawai.status_karyawan', 'Active')
      ->where('tb_user.hak_akses', 'Pegawai')
      ->select([
          'tb_pegawai.id_peg',
          'tb_pegawai.nik',
          'tb_pegawai.nama', 
      ])
      ->latest()
      ->get();
        return view('hrd.setupEvent.pemotonganCuti.form', 
        [
            'pemotonganCuti' => new PemotonganCuti(),
            'page_meta' => [
               'title' => 'Tambah Data Pemotongan Cuti',
               'method' => 'post',
               'url' => route('pemotongan-cuti.store'),
               'submit_text' => 'Submit'
            ],
            'dataPegawai' => $dataPegawai,

        ],
      );
   }

   public function store(PemotonganCutiRequest $request) {
      $data = $request->validated();
      $jenisCuti = $data['jenis_cuti'] ?? null;
      $lamaCuti = $data['lama_cuti'] ?? 0;
  
      if ($jenisCuti) {
          DB::table('tb_pegawai')
              ->where('status_karyawan', 'Active')
              ->where('jenis_peg', 'HO') 
              ->update([$jenisCuti => DB::raw("$jenisCuti - $lamaCuti")]);
      }
  
      // Hapus data yang tidak perlu disimpan ke database
      unset($data['jenis_cuti'], $data['peg_cuti']);

      $data['created_by'] = 'HR1';
  
      PemotonganCuti::create($data);
      return to_route('pemotongan-cuti.index')->with('success', 'Data berhasil ditambahkan');
  }

   public function edit(PemotonganCuti $pemotonganCuti) {;
     return view('hrd.setupEvent.pemotonganCuti.form', 
      [
         'pemotonganCuti' => $pemotonganCuti,
         'page_meta' => [
            'title'=> 'Update Data Pemotongan Cuti' . $pemotonganCuti->jenis_setup_cuti,
            'method' => 'put',
            'url' => route('pemotongan-cuti.update', $pemotonganCuti),
            'submit_text' => 'Update'
         ]
      ]);
   }

   function update(PemotonganCutiRequest $request, PemotonganCuti $pemotonganCuti) {
      $pemotonganCuti->update($request->validated());
      return to_route('pemotongan-cuti.index');
   }

   public function destroy(PemotonganCuti $pemotonganCuti) {
      $pemotonganCuti->delete();
      return to_route('pemotongan-cuti.index');
   }
}
