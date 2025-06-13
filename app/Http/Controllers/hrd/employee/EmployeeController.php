<?php

namespace App\Http\Controllers\hrd\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\hrd\employee\BahasaRequest;
use App\Http\Requests\hrd\employee\BankRequest;
use App\Http\Requests\hrd\employee\DataPribadiRequest;
use App\Http\Requests\hrd\employee\InformasiKaryawanRequest;
use App\Http\Requests\hrd\employee\KeluargaRequest;
use App\Http\Requests\hrd\employee\KontakDaruratRequest;
use App\Http\Requests\hrd\employee\KontakRequest;
use App\Http\Requests\hrd\employee\KontrakKaryawanRequest;
use App\Http\Requests\hrd\employee\NpwpRequest;
use App\Http\Requests\hrd\employee\PelatihanRequest;
use App\Http\Requests\hrd\employee\PendidikanRequest;
use App\Http\Requests\hrd\employee\PengalamanKerjaRequest;
use App\Http\Requests\hrd\employee\PenghargaanRequest;
use App\Http\Requests\hrd\employee\PenilaianAkhirRequest;
use App\Http\Requests\hrd\employee\RekamMedisRequest;
use App\Http\Requests\hrd\employee\SuratPeringatanRequest;
use App\Http\Requests\hrd\employee\UserAccountRequest;
use App\Models\hrd\Approval;
use App\Models\hrd\Department;
use App\Models\hrd\Divisi;
use App\Models\hrd\Jabatan;
use App\Models\hrd\Karir;
use App\Models\hrd\KontrakKaryawan;
use App\Models\hrd\LokasiKerja;
use App\Models\hrd\MasterEselon;
use App\Models\hrd\MasterJabatan;
use App\Models\hrd\MasterPosisi;
use App\Models\hrd\PenilaianAkhir;
use App\Models\hrd\SuratPeringatan;
use App\Models\shared\Anak;
use App\Models\shared\Bahasa;
use App\Models\shared\Bank;
use App\Models\shared\Cuti;
use App\Models\shared\HakAksesPegawai;
use App\Models\shared\IzinPersonal;
use App\Models\shared\KendaraanOperasional;
use App\Models\shared\KopensasiCutiBesar;
use App\Models\shared\LimitReimbursement;
use App\Models\shared\LimitReimbursementTahunLalu;
use App\Models\shared\Medical;
use App\Models\shared\MeetingRoom;
use App\Models\shared\Npwp;
use App\Models\shared\Ortu;
use App\Models\shared\Pegawai;
use App\Models\shared\Pelatihan;
use App\Models\shared\Pendidikan;
use App\Models\shared\PengalamanKerja;
use App\Models\shared\Penghargaan;
use App\Models\shared\SaldoCuti;
use App\Models\shared\Sertifikasi;
use App\Models\shared\Spd;
use App\Models\shared\StrukturOrganisasi;
use App\Models\shared\SuamiIstri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function index(Request $request) {
        $status = $request->query('status', 'Active'); // Default Active jika tidak ada parameter
        $search = $request->query('search', ''); // Ambil keyword pencarian
        $dateRange = $request->query('date'); // Optional: untuk filter tanggal
        $divisiFilter = $request->query('divisi', '');

        $query = Pegawai::with(['jabatan', 'user']);

        $divisi = Divisi::latest()->get()->unique('nama');
        
        if ($status === 'All') {
            $query->where('nik', 'like', 'KT%');
        } elseif ($status === 'Active') {
            $query->whereHas('user', function($q) {
                $q->where('hak_akses', 'Pegawai');
            })->where('status_karyawan', 'Active');
        } else { // Inactive
            $query->where('status_karyawan', 'Inactive')
              ->where('nik', 'like', 'KT%');
        }
    
        // Tambahkan filter pencarian
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('nik', 'like', "%$search%")
                ->orWhereHas('jabatan', function($subQ) use ($search) {
                    $subQ->where('posisi', 'like', "%$search%");
                });
            });
        }
        // Filter berdasarkan divisi jika dipilih
        if (!empty($divisiFilter)) {
            $query->where('unit_kerja', $divisiFilter);
        }

        // Optional: Tambahkan filter berdasarkan tanggal jika diperlukan
        if (!empty($dateRange)) {
            $dates = explode(" to ", $dateRange);
            if (count($dates) == 2) {
                $startDate = \Carbon\Carbon::createFromFormat('d-m-Y', trim($dates[0]))->format('Y-m-d');
                $endDate = \Carbon\Carbon::createFromFormat('d-m-Y', trim($dates[1]))->format('Y-m-d');
                $query->whereBetween('tanggal_masuk', [$startDate, $endDate]);
            }
        }
    
        $pegawai = $query->orderBy('id', 'ASC')->get();
    
        // Jika request AJAX, kembalikan JSON dengan partial view
        if ($request->ajax()) {
            return response()->json([
                'pegawai' => view('hrd.employee.pegawai_list', compact('pegawai'))->render()
            ]);
        }
    
        return view('hrd.employee.index', compact('pegawai', 'divisi'));
    }


    public function detail($nik) {
        // $query = Pegawai::leftJoin('tb_jabatan', 'tb_pegawai.id', '=', 'tb_jabatan.id_peg')
        //         ->leftJoin('tb_masterjab', 'tb_jabatan.jabatan', '=', 'tb_masterjab.id')
        //         // Self Join untuk mengambil nama atasan_1
        //         ->leftJoin('tb_pegawai as atasan1', 'tb_pegawai.atasan_1', '=', 'atasan1.id_peg')
        //         // Self Join untuk mengambil nama atasan_2
        //         ->leftJoin('tb_pegawai as atasan2', 'tb_pegawai.atasan_2', '=', 'atasan2.id_peg')
        //         // Join ke tb_unit untuk ambil nama unit kerja
        //         ->leftJoin('tb_unit', 'tb_pegawai.unit_kerja', '=', 'tb_unit.id_unit')
        //         // Join ke tb_department untuk ambil nama departemen
        //         ->leftJoin('tb_department', 'tb_pegawai.id_departement', '=', 'tb_department.id')
        //         ->where('tb_pegawai.nik', $nik)
        //         ->select(
        //             'tb_pegawai.*',
        //             'tb_jabatan.*',
        //             'tb_masterjab.nama_masterjab',
        //             'atasan1.nama as nama_atasan_1',
        //             'atasan2.nama as nama_atasan_2',
        //             'tb_unit.nama as nama_unit_kerja',
        //             'tb_department.nama_department'
        //         );

        // $pegawai = $query->first();
        $pegawai = Pegawai::with([
            'jabatan',
            'divisi', 
            'department',
            'approval',
            'approval.atasan1',  // Load approval beserta atasan1
            'approval.atasan2'   // Load approval beserta atasan2
        ])->where('nik', $nik)->first();

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Pegawai tidak ditemukan');
        }

        $kontakDarurat = Pegawai::where('nik', $nik)
                        ->select('kontak_darurat1', 'nama_kontak_darurat1', 'hub_kontak_darurat1', 'kontak_darurat2', 'nama_kontak_darurat2', 'hub_kontak_darurat2')
                        ->get();

        $suamiIstri = SuamiIstri::where('nik', $nik)
                    ->get();
        $ortu = Ortu::where('nik', $nik)
               ->orderBy('tgl_lhr', 'desc')
               ->get();
        $anak = Anak::where('nik', $nik)
        ->get();
        $pendidikan = Pendidikan::where('nik', $nik)
        ->get();

        $dokumentPribadi = Pegawai::where('nik', $nik)
        ->select('nip', 'file_ktp', 'nomor_kk', 'nomor_paspor', 'file_paspor', 'sim', 'file_sim')
        ->get();

        $sertifikasi = Sertifikasi::where('nik', $nik)
        ->select('nama_sertifikat', 'tahun', 'file')
        ->get();

        $jabatan = Jabatan::query()
        ->leftJoin('tb_masterjab', 'tb_masterjab.id', '=', 'tb_jabatan.jabatan')
        ->leftJoin('tb_masteresl', 'tb_masteresl.id', '=', 'tb_jabatan.eselon')
        ->select('tb_jabatan.*', 
                 'tb_masterjab.nama_masterjab as nama_jabatan', 
                 'tb_masteresl.nama_masteresl as grade')
        ->where('nik', $nik)
        ->get();

        $approval = Approval::query()
        ->where('tb_approval.nik', $nik)
        ->leftJoin('tb_pegawai as p1', 'tb_approval.atasan1_general', '=', 'p1.nik')
        ->leftJoin('tb_pegawai as p2', 'tb_approval.atasan2_general', '=', 'p2.nik')
        ->leftJoin('tb_pegawai as p3', 'tb_approval.atasan1_spd', '=', 'p3.nik')
        ->leftJoin('tb_pegawai as p4', 'tb_approval.atasan2_spd', '=', 'p4.nik')
        ->leftJoin('tb_pegawai as p5', 'tb_approval.atasan1_ko', '=', 'p5.nik')
        ->select([
            'tb_approval.nama',
            'tb_approval.nik',
            'tb_approval.atasan1_general',
            'p1.nama as atasan1_general_nama',
            'tb_approval.atasan2_general',
            'p2.nama as atasan2_general_nama',
            'tb_approval.atasan1_spd',
            'p3.nama as atasan1_spd_nama',
            'tb_approval.atasan2_spd',
            'p4.nama as atasan2_spd_nama',
            'tb_approval.atasan1_ko',
            'p5.nama as atasan1_ko_nama',
        ])
        ->get();

        $kontrakKaryawan = KontrakKaryawan::query()
        ->join('tb_pegawai', 'tb_status_kontrak_karyawan.nik', '=', 'tb_pegawai.nik')
        ->where('tb_status_kontrak_karyawan.nik', $nik)
        ->select('tb_status_kontrak_karyawan.*', 'tb_pegawai.nama') // Ambil semua data + nama
        ->get();

        $penilaianAkhir = PenilaianAkhir::query()
        ->join('tb_pegawai', 'tb_penilaian_akhir.nik', '=', 'tb_pegawai.nik')
        ->where('tb_penilaian_akhir.nik', $nik)
        ->select('tb_penilaian_akhir.*', 'tb_pegawai.nama') // Ambil semua data + nama
        ->get();

        $pelatihan = Pelatihan::query()->where('nik', $nik)->get();

        $suratPeringatan = SuratPeringatan::query()->where('nik', $nik)->get();

        $transisiKarir = Karir::query()
        ->where('nik', $nik)
        ->join('tb_masterjab', 'tb_karir.jabatan_baru', '=', 'tb_masterjab.id')
        ->select('tb_karir.*', 'tb_masterjab.nama_masterjab as jabatan_baru_nama')
        ->get();

        $unit_kerja = Divisi::latest()->get()->unique('nama');
        $departments = Department::query()->latest()->get();
        $masterJabatan = MasterJabatan::query()->get();
        $masterGrade = MasterEselon::query()->get();
        $bahasa = Bahasa::query()
        ->where('nik', $nik)
        ->get();
        $bank = Bank::query()
        ->where('nik', $nik)
        ->get();
        $npwp = Npwp::query()
        ->where('nik', $nik)
        ->get();
        $pengalamanKerja = PengalamanKerja::query()
        ->where('nik', $nik)
        ->get();
        $penghargaan = Penghargaan::query()
        ->where('nik', $nik)
        ->get();
        
        return view('hrd.employee.detail', compact('pegawai', 'kontakDarurat', 'suamiIstri', 'ortu', 'anak', 
        'pendidikan', 'dokumentPribadi', 'sertifikasi', 'jabatan', 'approval', 'kontrakKaryawan', 'penilaianAkhir', 'pelatihan', 'suratPeringatan', 
        'transisiKarir', 'unit_kerja', 'departments', 'masterJabatan', 'masterGrade', 'bahasa', 'bank', 'npwp', 'pengalamanKerja', 'penghargaan'));
    }

    public function updateDataPribadi(DataPribadiRequest $request, $nik) 
    {
        try {
            $pegawai = Pegawai::where('nik', $nik)->firstOrFail();
            $pegawai->update($request->validated());
    
            // Pastikan respons JSON dikembalikan untuk AJAX request
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil diperbarui!',
                ]);
            }
    
            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            // Tangani kesalahan dan kembalikan respons error yang sesuai
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
    
    public function updateDataKontak(KontakRequest $request, $nik) 
    {
        try {
            $pegawai = Pegawai::where('nik', $nik)->firstOrFail();
            $pegawai->update($request->validated());
    
            // Pastikan respons JSON dikembalikan untuk AJAX request
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil diperbarui!',
                ]);
            }
    
            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            // Tangani kesalahan dan kembalikan respons error yang sesuai
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
    
    public function updateDataKontakDarurat(KontakDaruratRequest $request, $nik) 
    {
        try {
            $pegawai = Pegawai::where('nik', $nik)->firstOrFail();
            $pegawai->update($request->validated());
    
            // Pastikan respons JSON dikembalikan untuk AJAX request
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil diperbarui!',
                ]);
            }
    
            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            // Tangani kesalahan dan kembalikan respons error yang sesuai
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function tambahDataKeluarga(KeluargaRequest $request)
    {
        try {
            $data = $request->validated();
            $statusHub = $data['status_hub'];
            $id_user = $data['id_user'] ?? null;

            if (!$id_user) {
                return response()->json([
                    'success' => false,
                    'message' => 'NIK tidak ditemukan.',
                ], 400);
            }

            if (in_array($statusHub, ['Ayah Kandung', 'Ibu Kandung'])) {
                Ortu::create($data);
            } elseif (in_array($statusHub, ['Suami', 'Istri'])) {
                SuamiIstri::create($data);
            } elseif (preg_match('/Anak Ke [1-7]/', $statusHub)) {
                Anak::create($data);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data keluarga berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataKeluarga(KeluargaRequest $request)
    {
        try {
            $data = $request->validated();
            $id = $data['id'];
    
            // Hapus kolom 'id' dari data agar tidak disertakan dalam query update
            unset($data['id']);
    
            if (!$id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan.',
                ], 400);
            }
    
            // Update data berdasarkan status_hub
            if (in_array($data['status_hub'], ['Ayah Kandung', 'Ibu Kandung'])) {
                // Pastikan hanya kolom yang relevan yang diupdate
                Ortu::where('id_ortu', $id)->update($data);
            } elseif (in_array($data['status_hub'], ['Suami', 'Istri'])) {
                SuamiIstri::where('id_si', $id)->update($data);
            } elseif (preg_match('/Anak Ke [1-7]/', $data['status_hub'])) {
                Anak::where('id', $id)->update($data);
            }
    
            return response()->json([
                'success' => true,
                'message' => 'Data keluarga berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
    

    public function destroyDataKeluarga(Request $request)
    {
        $id = $request->id;
        $type = $request->type;

        try {
            $deleted = false;

            switch ($type) {
                case 'Ayah Kandung':
                case 'Ibu Kandung':
                    $deleted = Ortu::where('id_ortu', $id)->delete();
                break;
                case 'Suami':
                case 'Istri':
                    $deleted = SuamiIstri::where('id_si', $id)->delete();
                break;
                case 'Anak Ke 1':
                case 'Anak Ke 2':
                case 'Anak Ke 3':
                case 'Anak Ke 4':
                case 'Anak Ke 5':
                case 'Anak Ke 6':
                case 'Anak Ke 7':
                    $deleted = Anak::where('id', $id)->delete();
                break;
                default:
                    return response()->json(['message' => 'Invalid type'], 400);
            }

            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Data deleted successfully'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data'], 500);
        }
    }

    public function tambahDataPendidikan(PendidikanRequest $request)
    {
        try {
            $data = $request->validated();
            
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName(); // Generate nama unik
                $file->storeAs('assets/file/ijazah', $filename, 'public'); // Simpan file

                $data['file'] = $filename; // Simpan hanya nama file di database
            }

            Pendidikan::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Data pendidikan berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataPendidikan(PendidikanRequest $request)
    {
        try {
            $data = $request->validated();
            $id_sekolah = $data['id_sekolah'];

            unset($data['id_sekolah']);

            if (!$id_sekolah) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan.',
                ], 400);
            }

            // Tangani upload file jika ada
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('assets/file/ijazah', $filename, 'public');
                $data['file'] = $filename;
            }

            // Update data ke DB
            Pendidikan::where('id_sekolah', $id_sekolah)->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Pendidikan berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroyDataPendidikan(Request $request)
    {
        $id_sekolah = $request->id_sekolah;

        try {
            // Ambil data pendidikan
            $pendidikan = Pendidikan::where('id_sekolah', $id_sekolah)->first();

            if (!$pendidikan) {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }

            // Hapus file jika ada
            if ($pendidikan->file && Storage::disk('public')->exists('assets/file/ijazah/' . $pendidikan->file)) {
                Storage::disk('public')->delete('assets/file/ijazah/' . $pendidikan->file);
            }

            // Hapus data dari database
            $pendidikan->delete();

            return response()->json(['success' => true, 'message' => 'Data and file deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }

    public function updateDataInformasiKaryawan(InformasiKaryawanRequest $request, $nik)
    {
        try {
            $validated = $request->validated();

            // Ambil model Pegawai
            $pegawai = Pegawai::where('nik', $nik)->firstOrFail();

            // Flag untuk melacak apakah ada perubahan pada data Pegawai
            $pegawaiUpdated = false;
            $jabatanUpdated = false;

            // Data yang hanya untuk tabel Pegawai
            $pegawaiFields = ['unit_kerja', 'id_departement', 'tanggal_masuk', 'lok_kerja', 'jenis_peg', 'company', 'status_kepeg'];

            // Ambil dan update hanya field yang berkaitan dengan Pegawai
            $pegawaiData = collect($validated)->only($pegawaiFields)->toArray();
            if (!empty($pegawaiData)) {
                $pegawai->update($pegawaiData);
                $pegawaiUpdated = true;
            }

            // Data yang hanya untuk tabel Jabatan
            $jabatanFields = ['jabatan', 'eselon', 'posisi'];
            $jabatanData = collect($validated)->only($jabatanFields)->toArray();

            if (!empty($jabatanData)) {
                // Asumsikan Jabatan menyimpan field `id_user` atau `nik`
                $jabatan = Jabatan::where('id_user', $nik)->first();

                // Jika belum ada record, bisa juga dibuat (opsional)
                if (!$jabatan) {
                    $jabatan = new Jabatan(['id_user' => $nik]);
                }

                $jabatan->fill($jabatanData)->save();
                $jabatanUpdated = true;
            }

            // Respon untuk AJAX atau redirect biasa
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil diperbarui!',
                    'updated' => [
                        'pegawai' => $pegawaiUpdated,
                        'jabatan' => $jabatanUpdated,
                    ]
                ]);
            }

            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function tambahDataKontrakKaryawan(KontrakKaryawanRequest $request)
    {
        try {
            $data = $request->validated();

            // Cek apakah sudah ada kontrak sebelumnya untuk NIK tersebut
            $nik = $data['nik'] ?? null;

            if ($nik) {
                $kontrakTerakhir = KontrakKaryawan::where('nik', $nik)
                    ->orderByDesc('kontrak_ke')
                    ->first();

                if ($kontrakTerakhir) {
                    // Increment dari kontrak terakhir
                    $data['kontrak_ke'] = (int) $kontrakTerakhir->kontrak_ke + 1;
                } else {
                    // Belum ada kontrak sebelumnya
                    $data['kontrak_ke'] = 1;
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'NIK wajib diisi untuk menyimpan kontrak.',
                ], 400);
            }

            KontrakKaryawan::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Data kontrak karyawan berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataKontrakKaryawan(KontrakKaryawanRequest $request)
    {
        try {
            $data = $request->validated();
            $id_kontrak = $data['id_kontrak'];

            unset($data['id_kontrak']);

            if (!$id_kontrak) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan.',
                ], 400);
            }

            // Update data ke DB
            KontrakKaryawan::where('id_kontrak', $id_kontrak)->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Kontrak Karyawan berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function destroyDataKontrakKaryawan(Request $request)
    {
        $id_kontrak = $request->id_kontrak;

        try {
            $deleted = KontrakKaryawan::where('id_kontrak', $id_kontrak)->delete(); 

            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Data deleted successfully'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }

    public function tambahDataPenilaianAkhir(PenilaianAkhirRequest $request)
    {
        try {
            $data = $request->validated();

            PenilaianAkhir::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Data penilaian akhir berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataPenilaianAkhir(PenilaianAkhirRequest $request)
    {
        try {
            $data = $request->validated();
            $id_pa = $data['id_pa'];

            unset($data['id_pa']);

            if (!$id_pa) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan.',
                ], 400);
            }

            // Update data ke DB
            PenilaianAkhir::where('id_pa', $id_pa)->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Penilaiain Akhir berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function destroyDataPenilaianAkhir(Request $request)
    {
        $id_pa = $request->id_pa;

        try {
            $deleted = PenilaianAkhir::where('id_pa', $id_pa)->delete();

            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Data deleted successfully'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }

    public function tambahDataPelatihan(PelatihanRequest $request)
    {
        try {
            $data = $request->validated();
            
            if ($request->hasFile('file_sertifikat')) {
                $file = $request->file('file_sertifikat');
                $filename = time() . '_' . $file->getClientOriginalName(); // Generate nama unik
                $file->storeAs('assets/file/sertifikat_pelatihan', $filename, 'public'); // Simpan file

                $data['file_sertifikat'] = $filename; // Simpan hanya nama file di database
            }

            Pelatihan::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Pelatihan berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataPelatihan(PelatihanRequest $request)
    {
        try {
            $data = $request->validated();
            $id_pelatihan = $data['id_pelatihan'];

            unset($data['id_pelatihan']);

            if (!$id_pelatihan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan.',
                ], 400);
            }

            // Tangani upload file jika ada
            if ($request->hasFile('file_sertifikat')) {
                $file = $request->file('file_sertifikat');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('assets/file/sertifikat_pelatihan', $filename, 'public');
                $data['file_sertifikat'] = $filename;
            }

            // Update data ke DB
            Pelatihan::where('id_pelatihan', $id_pelatihan)->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Pelatihan berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroyDataPelatihan(Request $request)
    {
        $id_pelatihan = $request->id_pelatihan;

        try {
            // Ambil data pelatihan
            $pelatihan = Pelatihan::where('id_pelatihan', $id_pelatihan)->first();

            if (!$pelatihan) {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }

            // Hapus file_sertifikat jika ada
            if ($pelatihan->file_sertifikat && Storage::disk('public')->exists('assets/file/sertifikat_pelatihan/' . $pelatihan->file_sertifikat)) {
                Storage::disk('public')->delete('assets/file/sertifikat_pelatihan/' . $pelatihan->file_sertifikat);
            }

            // Hapus data dari database
            $pelatihan->delete();

            return response()->json(['success' => true, 'message' => 'Data and file deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }

    public function tambahDataPenghargaan(PenghargaanRequest $request)
    {
        try {
            $data = $request->validated();
            
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName(); // Generate nama unik
                $file->storeAs('assets/file/penghargaan', $filename, 'public'); // Simpan file

                $data['file'] = $filename; // Simpan hanya nama file di database
            }

            Penghargaan::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Penghargaan berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataPenghargaan(PenghargaanRequest $request)
    {
        try {
            $data = $request->validated();
            $id_penghargaan = $data['id_penghargaan'];

            unset($data['id_penghargaan']);

            if (!$id_penghargaan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan.',
                ], 400);
            }

            // Tangani upload file jika ada
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('assets/file/penghargaan', $filename, 'public');
                $data['file'] = $filename;
            }

            // Update data ke DB
            Penghargaan::where('id_penghargaan', $id_penghargaan)->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Penghargaan berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function destroyDataPenghargaan(Request $request)
    {
        $id_penghargaan = $request->id_penghargaan;

        try {
            // Ambil data penghargaan
            $penghargaan = Penghargaan::where('id_penghargaan', $id_penghargaan)->first();

            if (!$penghargaan) {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }

            // Hapus file jika ada
            if ($penghargaan->file && Storage::disk('public')->exists('assets/file/penghargaan/' . $penghargaan->file)) {
                Storage::disk('public')->delete('assets/file/penghargaan/' . $penghargaan->file);
            }

            // Hapus data dari database
            $penghargaan->delete();

            return response()->json(['success' => true, 'message' => 'Data and file deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }

    public function tambahDataSuratPeringatan(SuratPeringatanRequest $request)
    {
        try {
            $data = $request->validated();
            
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName(); // Generate nama unik
                $file->storeAs('assets/file/sp', $filename, 'public'); // Simpan file

                $data['file'] = $filename; // Simpan hanya nama file di database
            }

            SuratPeringatan::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Surat Peringatan berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataSuratPeringatan(SuratPeringatanRequest $request)
    {
        try {
            $data = $request->validated();
            $id_sp = $data['id_sp'];

            unset($data['id_sp']);

            if (!$id_sp) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan.',
                ], 400);
            }

            // Tangani upload file jika ada
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('assets/file/sp', $filename, 'public');
                $data['file'] = $filename;
            }

            // Update data ke DB
            SuratPeringatan::where('id_sp', $id_sp)->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Surat Peringatan berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function destroyDataSuratPeringatan(Request $request)
    {
        $id_sp = $request->id_sp;

        try {
            // Ambil data surat peringatan
            $suratPeringatan = SuratPeringatan::where('id_sp', $id_sp)->first();

            if (!$suratPeringatan) {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }

            // Hapus file jika ada
            if ($suratPeringatan->file && Storage::disk('public')->exists('assets/file/sp/' . $suratPeringatan->file)) {
                Storage::disk('public')->delete('assets/file/sp/' . $suratPeringatan->file);
            }

            // Hapus data dari database
            $suratPeringatan->delete();

            return response()->json(['success' => true, 'message' => 'Data and file deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }

    public function tambahDataBahasa(BahasaRequest $request)
    {
        try {
            $data = $request->validated();

            Bahasa::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Bahasa berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataBahasa(BahasaRequest $request)
    {
        try {
            $data = $request->validated();
            $id = $data['id'];

            unset($data['id']);

            if (!$id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan.',
                ], 400);
            }


            // Update data ke DB
            Bahasa::where('id', $id)->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Bahasa berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function destroyDataBahasa(Request $request)
    {
        $id = $request->id;

        try {
            $deleted = Bahasa::where('id', $id)->delete(); // FIXED!

            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Data deleted successfully'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }

    public function tambahDataBank(BankRequest $request)
    {
        try {
            $data = $request->validated();

            Bank::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Bank berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataBank(BankRequest $request)
    {
        try {
            $data = $request->validated();
            $id_account = $data['id_account'];

            unset($data['id_account']);

            if (!$id_account) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan.',
                ], 400);
            }


            // Update data ke DB
            Bank::where('id_account', $id_account)->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Bank berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function destroyDataBank(Request $request)
    {
        $id_account = $request->id_account;

        try {
            $deleted = Bank::where('id_account', $id_account)->delete(); // FIXED!

            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Data deleted successfully'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }

    public function tambahDataNpwp(NpwpRequest $request)
    {
        try {
            $data = $request->validated();
            
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName(); // Generate nama unik
                $file->storeAs('assets/file/npwp', $filename, 'public'); // Simpan file

                $data['file'] = $filename; // Simpan hanya nama file di database
            }

            Npwp::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Data NPWP berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataNpwp(NpwpRequest $request)
    {
        try {
            $data = $request->validated();
            $id_npwp = $data['id_npwp'];

            unset($data['id_npwp']);

            if (!$id_npwp) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan.',
                ], 400);
            }

            // Tangani upload file jika ada
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('assets/file/npwp', $filename, 'public');
                $data['file'] = $filename;
            }

            // Update data ke DB
            Npwp::where('id_npwp', $id_npwp)->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Data NPWP berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function destroyDataNpwp(Request $request)
    {
        $id_npwp = $request->id_npwp;

        try {
            // Ambil data npwp
            $npwp = Npwp::where('id_npwp', $id_npwp)->first();

            if (!$npwp) {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }

            // Hapus file jika ada
            if ($npwp->file && Storage::disk('public')->exists('assets/file/npwp/' . $npwp->file)) {
                Storage::disk('public')->delete('assets/file/npwp/' . $npwp->file);
            }

            // Hapus data dari database
            $npwp->delete();

            return response()->json(['success' => true, 'message' => 'Data and file deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }

    public function tambahDataPengalamanKerja(PengalamanKerjaRequest $request)
    {
        try {
            $data = $request->validated();
            
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName(); // Generate nama unik
                $file->storeAs('assets/file/paklaring', $filename, 'public'); // Simpan file

                $data['file'] = $filename; // Simpan hanya nama file di database
            }

            PengalamanKerja::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Pengalaman Kerja berhasil ditambahkan!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataPengalamanKerja(PengalamanKerjaRequest $request)
    {
        try {
            $data = $request->validated();
            $id = $data['id'];

            unset($data['id']);

            if (!$id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan.',
                ], 400);
            }

            // Tangani upload file jika ada
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('assets/file/paklaring', $filename, 'public');
                $data['file'] = $filename;
            }

            // Update data ke DB
            PengalamanKerja::where('id', $id)->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Data Pengalaman Kerja berhasil diperbarui!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function destroyDataPengalamanKerja(Request $request)
    {
        $id = $request->id;

        try {
            // Ambil data npwp
            $pengalamanKerja = PengalamanKerja::where('id', $id)->first();

            if (!$pengalamanKerja) {
                return response()->json(['success' => false, 'message' => 'Data not found'], 404);
            }

            // Hapus file jika ada
            if ($pengalamanKerja->file && Storage::disk('public')->exists('assets/file/paklaring/' . $pengalamanKerja->file)) {
                Storage::disk('public')->delete('assets/file/paklaring/' . $pengalamanKerja->file);
            }

            // Hapus data dari database
            $pengalamanKerja->delete();

            return response()->json(['success' => true, 'message' => 'Data and file deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }

    public function updateDataRekamMedis(RekamMedisRequest $request, $nik) 
    {
        try {
            $pegawai = Pegawai::where('nik', $nik)->firstOrFail();
            $pegawai->update($request->validated());
    
            // Pastikan respons JSON dikembalikan untuk AJAX request
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil diperbarui!',
                ]);
            }
    
            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            // Tangani kesalahan dan kembalikan respons error yang sesuai
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateDataUserAkun(UserAccountRequest $request, $nik) 
    {
        try {
            $pegawai = Pegawai::where('nik', $nik)->firstOrFail();
            $pegawai->update($request->validated());
            
            // Cek apakah status_karyawan menjadi 'Inactive'
            if ($request->input('status_karyawan') === 'Inactive') {
                // Hapus data user yang sesuai
                $deleted = User::where('nik', $nik)->delete();
            }
            // Pastikan respons JSON dikembalikan untuk AJAX request
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil diperbarui!',
                ]);
            }
    
            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            // Tangani kesalahan dan kembalikan respons error yang sesuai
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function destroyDataUserAkun(Request $request)
    {
        $nik = $request->nik;
        $dataPegawai = Pegawai::where('nik', $nik)->first();
        if (!$dataPegawai) {
            return response()->json(['success' => false, 'message' => 'Pegawai tidak ditemukan'], 404);
        }

        $ams_role = $dataPegawai->ams_role;
        $ams_location = $dataPegawai->ams_location;

        $dataUser = User::where('id_user', $nik)->first();
        if (!$dataUser) {
            return response()->json(['success' => false, 'message' => 'User tidak ditemukan'], 404);
        }

        $ams = $dataUser->ams;
        $ams_synced = $dataUser->ams_synced;
        $ims = $dataUser->ims;
        $ims_synced = $dataUser->ims_synced;

        // Kirim permintaan DELETE ke AMS jika data valid
        if (!empty($ams_role) && !empty($ams_location) && !empty($ams) && $ams != 0 && !empty($ams_synced) && $ams_synced != 0) {
            try {
                $amsToken = 'iCI0YUAb0hu+2HF62lR_xs9FUsguF3OI6BqU2O33vP46fq$AO42UAE647vCeu4Shxfw';
                $responseAms = Http::withHeaders([
                    'Content-Type' => 'application/json; charset=UTF-8',
                    'Authorization' => 'Bearer ' . $amsToken,
                ])->delete('https://ams.karyaoptima.com/api/public/delete-user', [
                    'nik' => $dataUser->id_user
                ]);

                if (!$responseAms->successful()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Gagal menghapus user dari AMS',
                        'status_code' => $responseAms->status(),
                        'response' => $responseAms->body()
                    ], 500);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kesalahan koneksi ke API AMS',
                    'error' => $e->getMessage()
                ], 500);
            }
        }

        if (!empty($ims) && $ims != 0 && !empty($ims_synced) && $ims_synced != 0) {
            try {
                $data_api_ims = json_encode(['nik' => $dataUser->id_user]);

                $headers_ims = [
                    "Content-type: application/json; charset=UTF-8",
                    "Authorization: Bearer KFhNebzV8EvLWTyWYZ0XPKafNGDwtANTN7WzZtka_TfGTqPQtmANLiRfMtCI8JKyxg9"
                ];

                $ch = curl_init();
                curl_setopt_array($ch, [
                    CURLOPT_URL => "https://api-ims.karyaoptima.com/public/delete-user",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => "DELETE",
                    CURLOPT_POSTFIELDS => $data_api_ims,
                    CURLOPT_HTTPHEADER => $headers_ims,
                    CURLOPT_HEADER => true
                ]);

                $response = curl_exec($ch);
                $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if ($status_code < 200 || $status_code >= 300) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Gagal menghapus user dari IMS',
                        'status_code' => $status_code,
                        'response' => $response
                    ], 500);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kesalahan koneksi ke API IMS',
                    'error' => $e->getMessage()
                ], 500);
            }
        }

        try {
            // Hapus data dari semua tabel terkait
            Anak::where('nik', $nik)->delete();
            Approval::where('nik', $nik)->delete();
            Bahasa::where('nik', $nik)->delete();
            Bank::where('nik', $nik)->delete();
            PenilaianAkhir::where('nik', $nik)->delete();
            PengalamanKerja::where('nik', $nik)->delete();
            IzinPersonal::where('nik', $nik)->delete();
            Jabatan::where('nik', $nik)->delete();
            Karir::where('nik', $nik)->delete();
            KendaraanOperasional::where('nik', $nik)->delete();
            KopensasiCutiBesar::where('nik', $nik)->delete();
            LimitReimbursement::where('nik', $nik)->delete();
            LimitReimbursementTahunLalu::where('nik', $nik)->delete();
            MeetingRoom::where('nik', $nik)->delete();
            Cuti::where('nik', $nik)->delete();
            Npwp::where('nik', $nik)->delete();
            Pelatihan::where('nik', $nik)->delete();
            Medical::where('nik', $nik)->delete();
            Spd::where('nik', $nik)->delete();
            Penghargaan::where('nik', $nik)->delete();
            Pendidikan::where('nik', $nik)->delete();
            Sertifikasi::where('nik', $nik)->delete();
            KontrakKaryawan::where('nik', $nik)->delete();
            SuamiIstri::where('nik', $nik)->delete();
            SuratPeringatan::where('nik', $nik)->delete();

            User::where('id_user', $nik)->delete();
            Pegawai::where('nik', $nik)->delete();
            // Pegawai::where('nik', $nik)->update(['status_karyawan' => 'Inactive']);

            return response()->json([
                'success' => true,
                'message' => 'Data karyawan berhasil dihapus dan dinonaktifkan',
                'redirect' => route('employee.index')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data lokal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create(Request $request) {
        $unit_kerja = Divisi::latest()->get()->unique('nama');
        $departments = Department::query()->latest()->get();
        $masterJabatan = MasterJabatan::query()->get();
        $masterGrade = MasterEselon::query()->get();
        $masterPosisi = MasterPosisi::query()->get();
        $masterLokasi = LokasiKerja::query()->get();

        // Data awal untuk approval dan hirarki (bisa dikosongkan atau diisi default)
        $dataApproval = collect(); // Collection kosong atau data default
        $dataHirarki = collect();  // Collection kosong atau data default
    
        // Ambil data direksi
        $dataDirektorat = Pegawai::join('tb_jabatan', 'tb_pegawai.id', '=', 'tb_jabatan.id_peg')
        ->where('tb_jabatan.jabatan', '6')
        ->select('tb_pegawai.nama', 'tb_pegawai.nik')
        ->get();

        // === Generate NIK ===
        $huruf = 'KT-';
        $datenow = date('Ym');              // Misalnya: 202505
        $tahunBulan = substr($datenow, -4); // Ambil 4 digit terakhir: 2505

        // Ambil nik terakhir
        $lastNik = Pegawai::orderByDesc('id')->value('nik');
        $lastNumber = 0;

        // Ekstrak 4 digit terakhir dari NIK terakhir jika ada
        if ($lastNik && preg_match('/(\d{4})$/', $lastNik, $match)) {
            $lastNumber = (int)$match[1];
        }

        // Loop sampai ketemu nik yang belum digunakan
        do {
            $newUrut = str_pad(++$lastNumber, 4, '0', STR_PAD_LEFT);
            $nikBaru = $huruf . $tahunBulan . $newUrut;
        } while (Pegawai::where('nik', $nikBaru)->exists());

       // === Ambil data dari AMS API ===
        $token = 'iCI0YUAb0hu+2HF62lR_xs9FUsguF3OI6BqU2O33vP46fq$AO42UAE647vCeu4Shxfw';
        $roles = [];
        $locations = [];

        try {
            // AMS Role
            $resRole = Http::withToken($token)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->withOptions(['verify' => false])
                ->get('https://ams.triasmitra.com/api/public/get-role');

            if ($resRole->successful()) {
                $roles = $resRole->json('result.data');
            }

            // AMS Location
            $resLoc = Http::withToken($token)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->withOptions(['verify' => false])
                ->get('https://ams.triasmitra.com/api/public/get-location');

            if ($resLoc->successful()) {
                $locations = $resLoc->json('result.data');
            }
        } catch (\Exception $e) {
            Log::error("Gagal ambil data dari AMS API: " . $e->getMessage());
        }

        // === Ambil data dari IMS API
        $tokenIms = 'KFhNebzV8EvLWTyWYZ0XPKafNGDwtANTN7WzZtka_TfGTqPQtmANLiRfMtCI8JKyxg9';
        $hirarkiDataIms = [];
        try {
            $resHirarkiIms = Http::withToken($tokenIms)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->withOptions(['verify' => false])
            ->get('https://ims.triasmitra.com/api/public/get-hierarchy');

            if($resHirarkiIms->successful()) {
                $hirarkiDataIms = $resHirarkiIms->json('result.data');
            }
        }

        catch(\Exception $e) {
            Log::error("Gagal ambil data dari IMS API: " . $e->getMessage());
        }


        return view('hrd.employee.form', compact('unit_kerja', 'departments', 'masterJabatan', 'masterGrade', 'dataApproval', 'dataHirarki', 
        'dataDirektorat', 'nikBaru', 'roles', 'locations', 'hirarkiDataIms', 'masterPosisi', 'masterLokasi'));
    }

    public function getApprovalData($unit_kerja)
    {
        $dataApproval = Pegawai::where('nik', '!=', '')
            ->where('status_karyawan', 'Active')
            ->where('nik', 'NOT LIKE', '%FKT%')
            ->where('unit_kerja', $unit_kerja) // Filter berdasarkan unit kerja
            ->distinct('nik')
            ->get();

        // $dataHirarki = Pegawai::join('tb_jabatan', 'tb_pegawai.id', '=', 'tb_jabatan.id_peg')
        //     ->where('tb_pegawai.nik', '!=', '')
        //     ->where('tb_pegawai.status_karyawan', 'Active')
        //     ->where('tb_pegawai.nik', 'NOT LIKE', '%FKT%')
        //     ->where('tb_jabatan.jabatan', '!=', 6)
        //     ->where('tb_pegawai.unit_kerja', $unit_kerja) // Filter berdasarkan unit kerja
        //     ->select('tb_pegawai.nama', 'tb_pegawai.nik')
        //     ->get();
        $dataHirarki = Pegawai::where('nik', '!=', '')
            ->where('status_karyawan', 'Active')
            ->where('nik', 'NOT LIKE', '%FKT%')
            ->where('unit_kerja', $unit_kerja)
            ->whereHas('jabatan', function($query) {
                $query->where('jabatan', '!=', 6);
            })
            ->select('nama', 'nik')
            ->get();

        return response()->json([
            'dataApproval' => $dataApproval,
            'dataHirarki' => $dataHirarki
        ]);
    }

    public function store(Request $request) {
        try{
            DB::beginTransaction();

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'jk' => 'nullable|string',
                'tempat_lhr' => 'nullable|string',
                'tgl_lhr' => 'nullable|date',
                'agama' => 'nullable|string',
                'gol_darah' => 'nullable|string',
                'status_nikah' => 'nullable|string',
                'alamat' => 'nullable|string',
                'telp' => 'nullable|string',
                'email' => 'nullable|string',
                'nip' => 'nullable|string',
                'sim' => 'nullable|string',
                'nik' => 'nullable|string',
                'company' => 'required|string',
                'unit_kerja' => 'required|integer',
                'id_departement' => 'required|integer',
                'status_kepeg' => 'required|string',
                'tgl_kontrak' => 'nullable|date',
                'tanggal_masuk' => 'nullable|date',
                'lok_kerja' => 'nullable|string',
                'jenis_peg' => 'nullable|string',
                'jabatan' => 'required|string',
                'eselon' => 'required|string',
                'posisi' => 'required|string',
                'no_sk' => 'nullable|string',
                'tgl_sk' => 'nullable|date',
                'atasan1_general' => 'required|string',
                'atasan2_general' => 'required|string',
                'atasan1_spd' => 'required|string',
                'atasan2_spd' => 'required|string',
                'atasan1_ko' => 'required|string',
                'unit_approval' => 'nullable|string',
                'subsi_approval' => 'nullable|string',
                'kasie_approval' => 'nullable|string',
                'kadept_approval' => 'nullable|string',
                'kadiv_approval' => 'nullable|string',
                'direktorat_approval' => 'nullable|string',
                'apps' => 'nullable|array',
                'aas_p' => 'nullable|boolean',
                'aas_c' => 'nullable|boolean',
                'aas_r' => 'nullable|boolean',
                'ams_role' => 'nullable|string',
                'ams_location' => 'nullable|string',
                'ims_hirarki' => 'nullable|string',
                'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
                'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
                'alamat_domisili' => 'nullable|string',
                'file_ktp' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
                'file_sim' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            ]);

            $telp = $validated['telp'];
            if (substr($telp, 0, 1) === '0') {
                $phoneNumber = '62' . substr($telp, 1);
            } else {
                $phoneNumber = $telp; // diasumsikan sudah dalam format internasional
            }

            $foto = null;
            $fotoName = null;
            // Process file upload if present
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time() . '_' . $foto->getClientOriginalName(); // Generate unique name
                $foto->storeAs('assets/img/foto', $fotoName, 'public');
            }

            $fileKtp = null;
            $fileKtpName = null;
            // Process file upload if present
            if ($request->hasFile('file_ktp')) {
                $fileKtp = $request->file('file_ktp');
                $fileKtpName = time() . '_' . $fileKtp->getClientOriginalName(); // Generate unique name
                $fileKtp->storeAs('assets/file/ktp', $fileKtpName, 'public');
            }

            $fileSim = null;
            $fileSimName = null;
            // Process file upload if present
            if ($request->hasFile('file_sim')) {
                $fileSim = $request->file('file_sim');
                $fileSimName = time() . '_' . $fileSim->getClientOriginalName(); // Generate unique name
                $fileSim->storeAs('assets/file/sim', $fileSimName, 'public');
            }


            $dataPegawai = Pegawai::create([
                'nama' => $validated['nama'],
                'jk' => $validated['jk'],
                'tempat_lhr' => $validated['tempat_lhr'],
                'tgl_lhr' => $validated['tgl_lhr'],
                'agama' => $validated['agama'],
                'gol_darah' => $validated['gol_darah'],
                'status_nikah' => $validated['status_nikah'],
                'alamat' => $validated['alamat'],
                'telp' => $phoneNumber,
                'email' => $validated['email'],
                'nip' => $validated['nip'],
                'sim' => $validated['sim'],
                'nik' => $validated['nik'],
                'company' => $validated['company'],
                'unit_kerja' => $validated['unit_kerja'],
                'id_departement' => $validated['id_departement'],
                'status_kepeg' => $validated['status_kepeg'],
                'tgl_kontrak' => $validated['tgl_kontrak'],
                'status_karyawan' => 'Active',
                'tanggal_masuk' => $validated['tanggal_masuk'],
                'lok_kerja' => $validated['lok_kerja'],
                'jenis_peg' => $validated['jenis_peg'],
                'foto' => $fotoName,
                'alamat_domisili' => $validated['alamat_domisili'],
                'file_ktp' => $fileKtpName,
                'file_sim' => $fileSimName,
            ]);


            $id_peg = $dataPegawai->id;

            $filename = null;
            // Process file upload if present
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName(); // Generate unique name
                $file->storeAs('assets/file/sk_pegawai', $filename, 'public');
            }

            $dataOrganisasi = StrukturOrganisasi::create([
                'id_peg' => $id_peg,
                'nik' => $validated['nik'],
                'unit_approval' => $validated['unit_approval'],
                'subsi_approval' => $validated['subsi_approval'],
                'kasie_approval' => $validated['kasie_approval'],
                'kadept_approval' => $validated['kadept_approval'],
                'kadiv_approval' => $validated['kadiv_approval'],
                'direktorat_approval' => $validated['direktorat_approval'],
            ]);

            $dataJabatan = Jabatan::create([
                'id_peg' => $id_peg,
                'nik' => $validated['nik'],
                'jabatan' => $validated['jabatan'],
                'eselon' => $validated['eselon'],
                'posisi' => $validated['posisi'],
                'no_sk' => $validated['no_sk'],
                'tgl_sk' => $validated['tgl_sk'],
                'file' => $filename,
            ]);

            $dataApproval = Approval::create([
                'id_peg' => $id_peg,
                'nik' => $validated['nik'],
                'nama' => $validated['nama'],
                'atasan1_general' => $validated['atasan1_general'],
                'atasan2_general' => $validated['atasan2_general'],
                'atasan1_spd' => $validated['atasan1_spd'],
                'atasan2_spd' => $validated['atasan2_spd'],
                'atasan1_ko' => $validated['atasan1_ko'],
            ]);

            function generateUniqueTransisiNo($nik)
            {
                $prefix = 'CT';
                $kodeNik = substr($nik, 0, 8); // atau substr lain sesuai struktur nik kamu

                do {
                    $random = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
                    $transisiNo = "$prefix-$kodeNik-$random";
                } while (Karir::where('transisi_no', $transisiNo)->exists());

                return $transisiNo;
            }
            $nik = $validated['nik'];
            $transisiNo = generateUniqueTransisiNo($nik);

            $dataKarir = Karir::create([
                'transisi_no' => $transisiNo,
                'id_peg' => $id_peg,
                'nik' => $validated['nik'],
                'jabatan_baru' => $validated['jabatan'],
                'posisi_baru' => $validated['eselon'],
                'jenis_transisi' => 'Join',
                'tanggal_transisi_mulai' => $validated['tanggal_masuk'],
                'unit_kerja_baru' => $validated['unit_kerja'],
                'no_sk' => $validated['no_sk'],
                'tanggal_sk' => $validated['tgl_sk'],
                'status_karyawan' => 'Active',
            ]);

            $hris = in_array('hris', $validated['apps'] ?? []) ? 1 : 0;
            $aas = in_array('aas', $validated['apps'] ?? []) ? 1 : 0;
            $ams = in_array('ams', $validated['apps'] ?? []) ? 1 : 0;
            $ims = in_array('ims', $validated['apps'] ?? []) ? 1 : 0;
            $shocart = in_array('shocart', $validated['apps'] ?? []) ? 1 : 0;
            $helpdesk = in_array('helpdesk', $validated['apps'] ?? []) ? 1 : 0;
            $das = in_array('das', $validated['apps'] ?? []) ? 1 : 0;
            $rms = in_array('rms', $validated['apps'] ?? []) ? 1 : 0;
            $dms = in_array('dms', $validated['apps'] ?? []) ? 1 : 0;

            $id_role = $aas === 1 ? 1 : null;

            $dataUser = User::create([
                'id_peg' => $id_peg,
                'nama_user' => $validated['nama'],
                'hak_akses' => 'Pegawai',
                'password' => 'ad791d23f07d40c964ab0dac4fab7e98',
                'status_karyawan' => 'Active'
            ]); 

            $dataUser->assignRole('Pegawai');

            $dataHakAksesPegawai = HakAksesPegawai::create([
                'id_peg' => $id_peg,
                'nik' => $validated['nik'],
                'hris' => $hris,
                'aas' => $aas,
                'ams' => $ams,
                'ims' => $ims,
                'shocart' => $shocart,
                'helpdesk' => $helpdesk,
                'das' => $das,
                'rms' => $rms,
                'dms' => $dms,
                'aas_p' => $validated['aas_p'],
                'aas_c' => $validated['aas_c'],
                'aas_r' => $validated['aas_r'],
                'id_role' => $id_role,
            ]);



            $time = Carbon::now();
            $tahun_sekarang = $time->format('Y');
            $bulan_sekarang = $time->format('n');

            $saldoCuti = SaldoCuti::create([
                'id_peg' => $id_peg,
                'nik' => $validated['nik'],
                'tahun' => $tahun_sekarang,
                'jenis_cuti' => 'tahunan',
                'hak_cuti_awal' => 0,
                'sisa_cuti' => 0,
                'status_saldo_cuti' => 'Active'
            ]);

            DB::commit();

            $supervisor_nik = ($validated['subsi_approval'] === $validated['nik'] || $validated['subsi_approval'] === '-') ? '' : $validated['subsi_approval'];
            $kadep_nik = ($validated['kadept_approval'] === $validated['nik'] || $validated['kadept_approval'] === '-') ? '' : $validated['kadept_approval'];
            $kadiv_nik = ($validated['kadiv_approval'] === $validated['nik'] || $validated['kadiv_approval'] === '-') ? '' : $validated['kadiv_approval'];
            if ($ams === 1) {
                // Siapkan data untuk API AMS
                $data_api = [
                    "role_id"           => $validated['ams_role'],
                    "location_id"       => $validated['ams_location'],
                    "nik"               => $validated['nik'],
                    "name"              => $validated['nama'],
                    "email"             => $validated['email'],
                    "encrypted_password" => '2024rising8',
                    "phone"             => $phoneNumber,
                    "job_title"         => $validated['posisi'],
                    "superior_nik"      => $validated['atasan1_general'],
                    "supervisor_nik"    => $supervisor_nik,
                    "kadep_nik"         => $kadep_nik,
                    "kadiv_nik"         => $kadiv_nik,
                    // "cfo_nik" => '', // jika ada
                    "status"            => '1'
                ];

                $token = 'iCI0YUAb0hu+2HF62lR_xs9FUsguF3OI6BqU2O33vP46fq$AO42UAE647vCeu4Shxfw';

                try {
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $token,
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
                    ])->post('https://ams.karyaoptima.com/api/public/create-user', $data_api);

                        if ($response->failed()) {
                            //Jika Gagal
                            $errorData = $response->json(); // ambil response sebagai array
                            $wrongOnly = isset($errorData['wrong']) ? json_encode($errorData['wrong']) : $response->body();

                            $dataHakAksesPegawai->update([
                                'ams_synced' => false,
                                'ams_sync_error' => $wrongOnly,
                            ]);
                        } else {
                        // Berhasil Sync
                        $dataHakAksesPegawai->update([
                            'ams_synced' => true,
                            'ams_sync_error' => null,
                        ]);
                        // $dataPegawai->update([
                        //     'ams_role' => $validated['ams_role'],
                        //     'ams_location' => $validated['ams_location'],
                        // ]);
                    }
                } catch (\Exception $e) {
                    // Tangani jika API error atau timeout
                    $dataHakAksesPegawai->update([
                        'ams_synced' => false,
                        'ams_sync_error' => $e->getMessage(),
                    ]);
                }
            }

            if ($ims === 1) {
                // Siapkan data untuk API AMS
                $data_api = [
                    "hierarchy_id"      => $validated['ims_hirarki'],
                    "nik"               => $validated['nik'],
                    "name"              => $validated['nama'],
                    "email"             => $validated['email'],
                    "encrypted_password" => '2024rising8',
                    "phone"             => $phoneNumber,
                ];

                $token = 'KFhNebzV8EvLWTyWYZ0XPKafNGDwtANTN7WzZtka_TfGTqPQtmANLiRfMtCI8JKyxg9';

                try {
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $token,
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
                    ])->post('https://api-ims.karyaoptima.com/public/create-user', $data_api);

                        if ($response->failed()) {
                            $errorData = $response->json(); // ambil response sebagai array
                            $wrongOnly = isset($errorData['wrong']) ? json_encode($errorData['wrong']) : $response->body();

                            $dataHakAksesPegawai->update([
                                'ims_synced' => false,
                                'ims_sync_error' => $wrongOnly,
                            ]);
                        } else {
                        // Tandai berhasil sync
                        $dataHakAksesPegawai->update([
                            'ims_synced' => true,
                            'ims_sync_error' => null,
                        ]);

                        $dataPegawai->update([
                            'ims_hirarki' => $validated['ims_hirarki'],
                        ]);
                    }
                } catch (\Exception $e) {
                    // Tangani jika API error atau timeout
                    $dataHakAksesPegawai->update([
                        'ims_synced' => false,
                        'ims_sync_error' => $e->getMessage(),
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Data karyawan berhasil disimpan',
                'data' => $dataPegawai
            ]);
        }
        catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        };
    }

    public function updateFoto(Request $request, $nik)
    {
        try {
            // Validasi request
            $validated = $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Cari pegawai berdasarkan NIK
            $pegawai = Pegawai::where('nik', $nik)->firstOrFail();

            // Proses upload foto
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                
                // Generate unique filename
                $filename = 'foto_' . $nik . '_' . time() . '.' . $file->getClientOriginalExtension();
                
                // Simpan file ke storage
                $file->storeAs('assets/img/foto', $filename, 'public');

                // Hapus foto lama jika ada
                if ($pegawai->foto && Storage::disk('public')->exists("assets/img/foto/{$pegawai->foto}")) {
                    Storage::disk('public')->delete("assets/img/foto/{$pegawai->foto}");
                }

                // Update database
                $pegawai->update(['foto' => $filename]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Foto berhasil diupdate',
                    'new_url' => asset("storage/assets/img/foto/{$filename}")
                ]);
            }

            return response()->json(['status' => 'error', 'message' => 'Tidak ada file yang diupload'], 400);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data pegawai tidak ditemukan'
            ], 404);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan server: ' . $e->getMessage()
            ], 500);
        }
    }
}
