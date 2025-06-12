<?php

namespace App\Http\Controllers\hrd\masterSetup;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\DivisiRequest;
use App\Models\hrd\Divisi;
use Illuminate\Support\Facades\Auth;

class DivisiController extends Controller
{
   public function index() {
        $divisi = Divisi::latest()->get()->unique('nama');
        return view('hrd.masterSetup.divisi.index', ['divisi' => $divisi]);
   }

   public function create() {
      return view('hrd.masterSetup.divisi.form', 
         [
            'divisi' => new Divisi(),
            'page_meta' => [
               'title' => 'Tambah Data Divisi',
               'method' => 'post',
               'url' => route('divisi.store'),
               'submit_text' => 'Submit'
            ]
         ],
      );
   }
   
   public function store(DivisiRequest $request) {
      $validatedData = $request->validated();
      $validatedData['execute_by'] = Auth::user()->nama_user;
      
      Divisi::create($validatedData);
      return to_route('divisi.index');
   }

   public function edit(Divisi $divisi) {
      return view('hrd.masterSetup.divisi.form', 
         [
            'divisi' => $divisi,
            'page_meta' => [
               'title'=> 'Update Data Divisi (' . $divisi->nama .')',
               'method' => 'put',
               'url' => route('divisi.update', $divisi),
               'submit_text' => 'Update'
            ]
         ]);
   }

   function update(DivisiRequest $request, Divisi $divisi) {
      $divisi->update($request->validated());
      return to_route('divisi.index');
   }
   
   public function destroy(Divisi $divisi) {
      $divisi->delete();
      return to_route('divisi.index');
   }
}
