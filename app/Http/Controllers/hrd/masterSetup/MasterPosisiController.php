<?php

namespace App\Http\Controllers\hrd\masterSetup;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\MasterPosisiRequest;
use App\Models\hrd\MasterPosisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterPosisiController extends Controller
{
     public function index() {
        $masterPosisi = MasterPosisi::get();
        return view('hrd.masterSetup.masterPosisi.index', ['masterPosisi' => $masterPosisi]);
    }

    public function create() {
      return view('hrd.masterSetup.masterPosisi.form', 
         [
            'masterPosisi' => new MasterPosisi(),
            'page_meta' => [
               'title' => 'Tambah Data Posisi',
               'method' => 'post',
               'url' => route('master-posisi.store'),
               'submit_text' => 'Submit'
            ]
         ],
      );
    }

    public function store(MasterPosisiRequest $request) {
      $validatedData = $request->validated();
      $validatedData['execute_by'] = Auth::user()->nama_user;

      MasterPosisi::create($validatedData);
      return to_route('master-posisi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(MasterPosisi $masterPosisi) {
      return view('hrd.masterSetup.masterPosisi.form', 
         [
            'masterPosisi' => $masterPosisi,
            'page_meta' => [
               'title'=> 'Update Data Posisi (' . $masterPosisi->nama_posisi .')',
               'method' => 'put',
               'url' => route('master-posisi.update', $masterPosisi),
               'submit_text' => 'Update'
            ]
         ]);
    }

    function update(MasterPosisiRequest $request, MasterPosisi $masterPosisi) {
      $masterPosisi->update($request->validated());
      return to_route('master-posisi.index')->with('success', 'Data berhasil diperbarui');;
    }

    public function destroy(MasterPosisi $masterPosisi) {
      $masterPosisi->delete();
      return to_route('master-posisi.index')->with('success', 'Data Berhasil dihapus');
    }
}
