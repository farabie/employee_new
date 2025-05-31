<?php

namespace App\Http\Controllers\hrd\setupEvent;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\CutiBersamaRequest;
use App\Models\hrd\CutiBersama;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CutiBersamaController extends Controller
{
    public function index() {
        Carbon::setLocale('id'); 
        $cutiBersama = DB::table('tb_cuti_bersama')
            ->select(
                DB::raw("MIN(id) as id"),
                'code',
                DB::raw("MAX(lama_cuti) as lama_cuti"),
                'nama_cuti_bersama',
                DB::raw("GROUP_CONCAT(tanggal_cuti_bersama ORDER BY tanggal_cuti_bersama ASC SEPARATOR ',') as tanggal_cuti_bersama")
            )
            ->groupBy('code', 'nama_cuti_bersama')
            ->orderByRaw("STR_TO_DATE(SUBSTRING_INDEX(tanggal_cuti_bersama, ',', 1), '%Y-%m-%d') DESC")
            ->get();

        // Format tanggal
        foreach ($cutiBersama as $cuti) {
            $tanggalList = explode(',', $cuti->tanggal_cuti_bersama);
            $formattedTanggal = array_map(function ($tgl) {
                return Carbon::parse($tgl)->translatedFormat('d F Y'); // Contoh: 27 Desember 2025
            }, $tanggalList);
            $cuti->tanggal_cuti_bersama_formatted = implode(', ', $formattedTanggal);
        }
    
        return view('hrd.setupEvent.cutiBersama.index', ['cutiBersama' => $cutiBersama]);
    }

    public function create() {
        return view('hrd.setupEvent.cutiBersama.form', 
           [
              'cutiBersama' => new CutiBersama(),
              'page_meta' => [
                 'title' => 'Tambah Data Cuti Bersama',
                 'method' => 'post',
                 'url' => route('cuti-bersama.store'),
                 'submit_text' => 'Submit'
              ],
              'tanggalLiburList' => '',
           ],
        );
    }



    public function store(CutiBersamaRequest $request)
    {
        $data = $request->validated();
        $namaLibur = $data['nama_cuti_bersama'];
        $code = $data['code'];
        $lamaCuti = $data['lama_cuti'];
        $tanggalLiburList = explode(',', $data['tanggal_cuti_bersama']); // Pecah string menjadi array

        foreach ($tanggalLiburList as $tanggal) {
            $tanggal = trim($tanggal);  
            $tanggalFormatted = Carbon::createFromFormat('d-m-Y', $tanggal)->format('Y-m-d'); // Ubah format ke date

            CutiBersama::create([
                'nama_cuti_bersama' => $namaLibur,
                'lama_cuti' => $lamaCuti,
                'tanggal_cuti_bersama' => $tanggalFormatted,
                'code' => $code,
            ]);
        }

        return to_route('cuti-bersama.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($code) {
        $cutiBersama = CutiBersama::where('code', $code)->first();
    
        if (!$cutiBersama) {
            return redirect()->route('cuti-bersama.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Ambil semua tanggal yang memiliki code yang sama
        $tanggalLiburList = CutiBersama::where('code', $code)
            ->pluck('tanggal_cuti_bersama') // Ambil hanya tanggal_libur
            ->map(fn($tanggal) => Carbon::parse($tanggal)->format('d-m-Y')) // Format ulang ke d-m-Y
            ->toArray();
    
        return view('hrd.setupEvent.cutiBersama.form', [
            'cutiBersama' => $cutiBersama,
            'page_meta' => [
                'title' => 'Update Data Cuti Bersama ' . $cutiBersama->nama_libur,
                'method' => 'put',
                'url' => route('cuti-bersama.update', $cutiBersama->code),
                'submit_text' => 'Update'
            ],
            'tanggalLiburList' => implode(', ', $tanggalLiburList), // Gabungkan array ke string untuk input Flatpickr
        ]);
    }
    
    public function update(CutiBersamaRequest $request, $code) {
        CutiBersama::where('code', $code)->delete();

        $data = $request->validated();
        $namaLibur = $data['nama_cuti_bersama'];
        $tanggalLiburList = explode(',', $data['tanggal_cuti_bersama']); // Pecah string menjadi array

        // Simpan data baru
        foreach ($tanggalLiburList as $tanggal) {
            $tanggal = trim($tanggal);
            $tanggalFormatted = Carbon::createFromFormat('d-m-Y', $tanggal)->format('Y-m-d'); // Konversi format

            CutiBersama::create([
                'nama_cuti_bersama' => $namaLibur,
                'tanggal_cuti_bersama' => $tanggalFormatted,
                'code' => $code,
            ]);
        }

        return to_route('cuti-bersama.index')->with('success', 'Data berhasil diperbarui');
    }
    public function destroy($code) {
        DB::table('tb_cuti_bersama')->where('code', $code)->delete();
        return to_route('cuti-bersama.index')->with('success', 'Data Berhasil dihapus');
    }
}
