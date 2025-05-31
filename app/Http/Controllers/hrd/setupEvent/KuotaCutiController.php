<?php

namespace App\Http\Controllers\hrd\setupEvent;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\KuotaCutiRequest;
use App\Models\hrd\HistoryEditCuti;
use App\Models\shared\Pegawai;

class KuotaCutiController extends Controller
{
    public function index() {
        // $kuotaCuti = KuotaCuti::join('tb_user', 'tb_pegawai.id_peg', '=', 'tb_user.id_peg')
        //     ->where('tb_pegawai.status_karyawan', 'Active')
        //     ->where('tb_user.hak_akses', 'Pegawai')
        //     ->select([
        //         'tb_pegawai.id_peg',
        //         'tb_pegawai.nik',
        //         'tb_pegawai.nama',
        //         'tb_pegawai.jenis_peg', 
        //         'tb_pegawai.foto', 
        //         'tb_pegawai.jk',
        //         'tb_pegawai.already_cuti_besar', 
        //         'tb_pegawai.hak_cuti_tahun_1',
        //         'tb_pegawai.hak_cuti_tahun_2',
        //         'tb_pegawai.hak_cuti_tahun_berjalan',
        //         'tb_pegawai.hak_cuti_besar',
        //         'tb_pegawai.hak_cuti',
        //     ])
        //     ->orderby('tb_pegawai.created_at', 'desc')
        //     ->get();
        $kuotaCuti = Pegawai::join('tb_user', 'tb_pegawai.id_peg', '=', 'tb_user.id_peg')
        ->where('tb_pegawai.status_karyawan', 'Active')
        ->where('tb_user.hak_akses', 'Pegawai')
        ->select([
            'tb_pegawai.id_peg',
            'tb_pegawai.nik',
            'tb_pegawai.nama',
            'tb_pegawai.jenis_peg', 
            'tb_pegawai.foto', 
            'tb_pegawai.jk',
            'tb_pegawai.already_cuti_besar', 
            'tb_pegawai.hak_cuti_tahun_1',
            'tb_pegawai.hak_cuti_tahun_2',
            'tb_pegawai.hak_cuti_tahun_berjalan',
            'tb_pegawai.hak_cuti_besar',
            'tb_pegawai.hak_cuti',
        ])
        ->orderBy('tb_pegawai.created_at', 'desc')
        ->get()
        ->map(function ($item) {
            if ($item->jenis_peg === 'HO') {
                $item->jenis_peg = 'Reguler';
            } elseif ($item->jenis_peg === 'Lapangan') {
                $item->jenis_peg = 'Area';
            }
            return $item;
        });

           
        return view('hrd.setupEvent.kuotaCuti.index', compact('kuotaCuti'));
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
        ->orderby('tb_pegawai.created_at', 'desc')
        ->get();
        return view('hrd.setupEvent.kuotaCuti.form', 
           [
              'kuotaCuti' => new Pegawai(),
              'page_meta' => [
                 'title' => 'Edit Data Kuota Cuti',
                 'method' => 'post',
                 'url' => route('kuota-cuti.store'),
                 'submit_text' => 'Submit'
              ],
              'dataPegawai' => $dataPegawai,
           ],
        );
     }

    // public function store(KuotaCutiRequest $request) 
    // {
    //     $jenisCuti = $request->jenis_tahun_cuti;
    //     $jenisPeg = $request->jenis_peg;
    //     $jumlahCuti = $request->jumlah_cuti;
    //     $pegCuti = $request->peg_cuti;
    //     $jenisEdit = $request->jenis_edit_cuti;

    //     if($jenisCuti == 'hak_cuti_tahun_2') {
    //        Pegawai::whereNull($jenisCuti)->update([$jenisCuti => 0]);
    //        $query = Pegawai::query()->where('status_karyawan', 'Active');
    //        $query->increment($jenisCuti, $jumlahCuti); 
    //     }

    //     // dd('Jenis Cuti: '. $jenisCuti .' Jenis Peg: ' . $jenisPeg . ' Jumlah Cuti:' . $jumlahCuti);

    //     return to_route('kuota-cuti.index')->with('success', 'Data berhasil ditambahkan');
    // }
     
    public function store(KuotaCutiRequest $request)
    {
        // Ambil input
        $jenisCuti = $request->jenis_tahun_cuti;
        $jenisPeg = $request->jenis_peg;
        $jumlahCuti = $request->jumlah_cuti;
        $pegCuti = $request->peg_cuti;
        $jenisEdit = $request->jenis_edit_cuti;

        // // Simpan ke HistoryEditCuti terlebih dahulu
        HistoryEditCuti::create([
            'jenis_edit_cuti' => $jenisEdit,
            'jenis_tahun_cuti' => $jenisCuti,
            'jenis_peg' => $jenisPeg,
            'jumlah_cuti' => $jumlahCuti,
            'keterangan' => $request->keterangan,
            'peg_cuti' => is_array($pegCuti) ? implode(',', $pegCuti) : null,
        ]);
        // Jika bukan hak cuti tahun berjalan, lakukan update pada Pegawai
        if ($jenisCuti === 'hak_cuti_tahun_2' || $jenisCuti === 'hak_cuti_tahun_1') {
            if (!empty($jenisCuti) && !empty($jenisPeg) && !empty($jumlahCuti)) {
                $query = Pegawai::query()->where('status_karyawan', 'Active');

                if ($jenisPeg === 'karyawan_khusus' && !empty($pegCuti)) {
                    $query->whereIn('nik', $pegCuti);
                } elseif ($jenisPeg !== 'Semua Karyawan') {
                    $query->where('jenis_peg', $jenisPeg);
                }

                $query->clone()->whereNull($jenisCuti)->update([$jenisCuti => 0]);

                if ($jenisEdit === 'penambahan_kuota_cuti') {
                    $query->increment($jenisCuti, $jumlahCuti);
                } elseif ($jenisEdit === 'pengurangan_kuota_cuti') {
                    $query->decrement($jenisCuti, $jumlahCuti);
                }
            }
        }       

        return to_route('kuota-cuti.index')->with('success', 'Data berhasil ditambahkan');
    }
}
