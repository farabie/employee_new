<?php

namespace App\Http\Controllers\hrd\masterSetup;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\MasterJabatanRequest;
use App\Models\hrd\MasterJabatan;
use Illuminate\Http\Request;

class MasterJabatanController extends Controller
{
    public function index() {
        $masterJabatan = MasterJabatan::get();
        return view('hrd.masterSetup.masterJabatan.index', ['masterJabatan' => $masterJabatan]);
    }

    public function create() {
      return view('hrd.masterSetup.masterJabatan.form', 
         [
            'masterJabatan' => new MasterJabatan(),
            'page_meta' => [
               'title' => 'Tambah Data Jabatan',
               'method' => 'post',
               'url' => route('master-jabatan.store'),
               'submit_text' => 'Submit'
            ]
         ],
      );
    }

    public function store(MasterJabatanRequest $request)
    {
        $validated = $request->validated();

        // Generate kode_jabatan dari nama_masterjab
        $validated['kode_jabatan'] = $this->generateKodeJabatan($validated['nama_masterjab']);

        // Simpan data ke database
        MasterJabatan::create($validated);

        return to_route('master-jabatan.index')->with('success', 'Data berhasil ditambahkan');
    }

    private function generateKodeJabatan($nama)
    {
        $words = explode(' ', $nama);

        if (count($words) === 1) {
            $kodeDasar = strtoupper(substr($words[0], 0, 3));
        } else {
            // Ambil huruf pertama dari kata pertama, dan 2 huruf pertama dari kata kedua
            $kodeDasar = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 2));
        }

        // Jika kurang dari 3 huruf, pad dengan X
        $kodeDasar = str_pad($kodeDasar, 3, 'X');

        $kode = $kodeDasar;
        $counter = 1;

        while (MasterJabatan::where('kode_jabatan', $kode)->exists()) {
            $kode = $kodeDasar . $counter;
            $counter++;
        }

        return $kode;
    }

    public function edit(MasterJabatan $masterJabatan) {
      return view('hrd.masterSetup.masterJabatan.form', 
         [
            'masterJabatan' => $masterJabatan,
            'page_meta' => [
               'title'=> 'Update Data Jabatan (' . $masterJabatan->nama_masterjab .')',
               'method' => 'put',
               'url' => route('master-jabatan.update', $masterJabatan),
               'submit_text' => 'Update'
            ]
         ]);
    }

    function update(MasterJabatanRequest $request, MasterJabatan $masterJabatan) {
      $masterJabatan->update($request->validated());
      return to_route('master-jabatan.index')->with('success', 'Data berhasil diperbarui');;
   }

    public function destroy(MasterJabatan $masterJabatan) {
      $masterJabatan->delete();
      return to_route('master-jabatan.index')->with('success', 'Data Berhasil dihapus');
    }
}
