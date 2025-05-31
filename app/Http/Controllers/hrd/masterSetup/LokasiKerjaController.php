<?php

namespace App\Http\Controllers\hrd\masterSetup;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\LokasiKerjaRequest;
use App\Models\hrd\LokasiKerja;

class LokasiKerjaController extends Controller
{
     public function index() {
        $lokasiKerja = LokasiKerja::get();
        return view('hrd.masterSetup.masterLokasiKerja.index', ['lokasiKerja' => $lokasiKerja]);
    }

    public function create() {
      return view('hrd.masterSetup.masterLokasiKerja.form', 
         [
            'lokasiKerja' => new LokasiKerja(),
            'page_meta' => [
               'title' => 'Tambah Data Lokasi Kerja',
               'method' => 'post',
               'url' => route('lokasi-kerja.store'),
               'submit_text' => 'Submit'
            ]
         ],
      );
    }

    public function store(LokasiKerjaRequest $request) {
      LokasiKerja::create($request->validated());
      return to_route('lokasi-kerja.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(LokasiKerja $lokasiKerja) {
      return view('hrd.masterSetup.masterLokasiKerja.form', 
         [
            'lokasiKerja' => $lokasiKerja,
            'page_meta' => [
               'title'=> 'Update Data Lokasi Kerja (' . $lokasiKerja->nama_lok_kerja .')',
               'method' => 'put',
               'url' => route('lokasi-kerja.update', $lokasiKerja),
               'submit_text' => 'Update'
            ]
         ]);
    }

    function update(LokasiKerjaRequest $request, LokasiKerja $lokasiKerja) {
      $lokasiKerja->update($request->validated());
      return to_route('lokasi-kerja.index')->with('success', 'Data berhasil diperbarui');;
    }

    public function destroy(LokasiKerja $lokasiKerja) {
      $lokasiKerja->delete();
      return to_route('lokasi-kerja.index')->with('success', 'Data Berhasil dihapus');
    }
}
