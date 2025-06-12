<?php

namespace App\Http\Controllers\hrd\masterSetup;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\MasterEselonRequest;
use App\Models\hrd\MasterEselon;
use Illuminate\Support\Facades\Auth;

class MasterEselonController extends Controller
{
    public function index() {
        $masterEselon = MasterEselon::get();
        return view('hrd.masterSetup.masterEselon.index', ['masterEselon' => $masterEselon]);
    }

    public function create() {
      return view('hrd.masterSetup.masterEselon.form', 
         [
            'masterEselon' => new MasterEselon(),
            'page_meta' => [
               'title' => 'Tambah Data Eselon',
               'method' => 'post',
               'url' => route('master-eselon.store'),
               'submit_text' => 'Submit'
            ]
         ],
      );
    }

    public function store(MasterEselonRequest $request) {
      $validatedData = $request->validated();
      $validatedData['execute_by'] = Auth::user()->nama_user;

      MasterEselon::create($validatedData);
      return to_route('master-eselon.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(MasterEselon $masterEselon) {
      return view('hrd.masterSetup.masterEselon.form', 
         [
            'masterEselon' => $masterEselon,
            'page_meta' => [
               'title'=> 'Update Data Grade (' . $masterEselon->nama_masteresl .')',
               'method' => 'put',
               'url' => route('master-eselon.update', $masterEselon),
               'submit_text' => 'Update'
            ]
         ]);
    }

    function update(MasterEselonRequest $request, MasterEselon $masterEselon) {
      $masterEselon->update($request->validated());
      return to_route('master-eselon.index')->with('success', 'Data berhasil diperbarui');;
    }

    public function destroy(MasterEselon $masterEselon) {
      $masterEselon->delete();
      return to_route('master-eselon.index')->with('success', 'Data Berhasil dihapus');
    }
}
