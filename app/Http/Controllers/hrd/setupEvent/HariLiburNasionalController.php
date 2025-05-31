<?php

namespace App\Http\Controllers\hrd\setupEvent;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\LiburNasionalRequest;
use App\Models\hrd\LiburNasional;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class HariLiburNasionalController extends Controller
{
    public function index() {
        $hariLiburNasional = DB::table('tb_libur')
            ->select(
                DB::raw("MIN(id) as id"), // Ambil ID terkecil dalam grup
                'code',
                'nama_libur',
                DB::raw("GROUP_CONCAT(tanggal_libur ORDER BY tanggal_libur ASC SEPARATOR ', ') as tanggal_libur")
            )
            ->groupBy('code', 'nama_libur')
            ->orderByRaw("STR_TO_DATE(SUBSTRING_INDEX(tanggal_libur, ',', 1), '%Y-%m-%d') DESC") // Agar bisa di-sort berdasarkan tanggal pertama
            ->get();
    
        return view('hrd.setupEvent.hariLiburNasional.index', ['hariLiburNasional' => $hariLiburNasional]);
    }

    public function create() {
        return view('hrd.setupEvent.hariLiburNasional.form', 
           [
              'hariLiburNasional' => new LiburNasional(),
              'page_meta' => [
                 'title' => 'Tambah Data Hari Libur Nasional',
                 'method' => 'post',
                 'url' => route('hari-libur-nasional.store'),
                 'submit_text' => 'Submit'
              ],
              'tanggalLiburList' => '',
           ],
        );
    }



    public function store(LiburNasionalRequest $request)
    {
        $data = $request->validated();
        $namaLibur = $data['nama_libur'];
        $code = $data['code'];
        $tanggalLiburList = explode(',', $data['tanggal_libur']); // Pecah string menjadi array

        foreach ($tanggalLiburList as $tanggal) {
            $tanggal = trim($tanggal);  
            $tanggalFormatted = Carbon::createFromFormat('d-m-Y', $tanggal)->format('Y-m-d'); // Ubah format ke date

            LiburNasional::create([
                'nama_libur' => $namaLibur,
                'tanggal_libur' => $tanggalFormatted,
                'code' => $code,
            ]);
        }

        return to_route('hari-libur-nasional.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($code) {
        $liburNasional = LiburNasional::where('code', $code)->first();
    
        if (!$liburNasional) {
            return redirect()->route('hari-libur-nasional.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Ambil semua tanggal yang memiliki code yang sama
        $tanggalLiburList = LiburNasional::where('code', $code)
            ->pluck('tanggal_libur') // Ambil hanya tanggal_libur
            ->map(fn($tanggal) => Carbon::parse($tanggal)->format('d-m-Y')) // Format ulang ke d-m-Y
            ->toArray();
    
        return view('hrd.setupEvent.hariLiburNasional.form', [
            'hariLiburNasional' => $liburNasional,
            'page_meta' => [
                'title' => 'Update Data Libur Nasional ' . $liburNasional->nama_libur,
                'method' => 'put',
                'url' => route('hari-libur-nasional.update', $liburNasional->code),
                'submit_text' => 'Update'
            ],
            'tanggalLiburList' => implode(', ', $tanggalLiburList), // Gabungkan array ke string untuk input Flatpickr
        ]);
    }
    
    public function update(LiburNasionalRequest $request, $code) {
        LiburNasional::where('code', $code)->delete();

        $data = $request->validated();
        $namaLibur = $data['nama_libur'];
        $tanggalLiburList = explode(',', $data['tanggal_libur']); // Pecah string menjadi array

        // Simpan data baru
        foreach ($tanggalLiburList as $tanggal) {
            $tanggal = trim($tanggal);
            $tanggalFormatted = Carbon::createFromFormat('d-m-Y', $tanggal)->format('Y-m-d'); // Konversi format

            LiburNasional::create([
                'nama_libur' => $namaLibur,
                'tanggal_libur' => $tanggalFormatted,
                'code' => $code,
            ]);
        }

        return to_route('hari-libur-nasional.index')->with('success', 'Data berhasil diperbarui');
    }
    public function destroy($code) {
        DB::table('tb_libur')->where('code', $code)->delete();
        return to_route('hari-libur-nasional.index')->with('success', 'Data Berhasil dihapus');
    }
    
}
