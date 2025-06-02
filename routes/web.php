<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hrd\DashboardController;
use App\Http\Controllers\hrd\employee\EmployeeController;
use App\Http\Controllers\hrd\masterSetup\ApprovalUserController;
use App\Http\Controllers\hrd\masterSetup\DepartmentController;
use App\Http\Controllers\hrd\masterSetup\DivisiController;
use App\Http\Controllers\hrd\masterSetup\HirarkiUserController;
use App\Http\Controllers\hrd\masterSetup\LokasiKerjaController;
use App\Http\Controllers\hrd\masterSetup\MasterEselonController;
use App\Http\Controllers\hrd\masterSetup\MasterJabatanController;
use App\Http\Controllers\hrd\masterSetup\MasterPosisiController;
use App\Http\Controllers\hrd\masterSetup\ResetPassUserController;
use App\Http\Controllers\hrd\setupEvent\CutiBersamaController;
use App\Http\Controllers\hrd\setupEvent\HariLiburNasionalController;
use App\Http\Controllers\hrd\setupEvent\KuotaCutiController;
use App\Http\Controllers\hrd\setupEvent\PemotonganCutiController;
use App\Http\Controllers\hrd\trackingDocument\TrackingDocumentController;
use Illuminate\Support\Facades\Auth;

// Route utama - cek apakah user sudah login
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('login');
});

// Route untuk dashboard dengan middleware auth
Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';
//Master Setup
Route::resource('master-setup/divisi', DivisiController::class)->except('show');
Route::resource('master-setup/department', DepartmentController::class)->except('show');
Route::resource('master-setup/master-jabatan', MasterJabatanController::class)->except('show');
Route::resource('master-setup/master-eselon', MasterEselonController::class)->except('show');
Route::resource('master-setup/lokasi-kerja', LokasiKerjaController::class)->except('show');
Route::resource('master-setup/master-posisi', MasterPosisiController::class)->except('show');

Route::get('/master-setup/view-reset-pass-user', [ResetPassUserController::class, 'index'])->name('reset.pass.user.index');
Route::post('/master-setup/reset-pass-user{id_user}', [ResetPassUserController::class, 'resetPassword'])->name('reset.password');

Route::resource('/master-setup/hirarkiUser/general', HirarkiUserController::class)->except('show', 'store', 'create', 'update');
Route::put('/master-setup/hirarkiUser/general/{nik}', [HirarkiUserController::class, 'update'])->name('general.update');

Route::get('master-setup/approval/', [ApprovalUserController::class, 'index'])->name('approval.index');
Route::get('master-setup/approval/{nik}/edit', [ApprovalUserController::class, 'edit'])->name('approval.edit');
Route::put('/master-setup/approval/{nik}', [ApprovalUserController::class, 'update'])->name('approval.update');

//Setup & Event
Route::get('setup-event/hari-libur-nasional', [HariLiburNasionalController::class, 'index'])->name('hari-libur-nasional.index');
Route::get('setup-event/hari-libur-nasional/create', [HariLiburNasionalController::class, 'create'])->name('hari-libur-nasional.create');
Route::post('setup-event/hari-libur-nasional', [HariLiburNasionalController::class, 'store'])->name('hari-libur-nasional.store');
Route::get('setup-event/hari-libur-nasional/edit/{code}', [HariLiburNasionalController::class, 'edit'])->name('hari-libur-nasional.edit');
Route::put('setup-event/hari-libur-nasional/edit/{code}', [HariLiburNasionalController::class, 'update'])->name('hari-libur-nasional.update');
Route::delete('setup-event/hari-libur-nasional/{code}', [HariLiburNasionalController::class, 'destroy'])->name('hari-libur-nasional.destroy');

Route::get('setup-event/cuti-bersama', [CutiBersamaController::class, 'index'])->name('cuti-bersama.index');
Route::get('setup-event/cuti-bersama/create', [CutiBersamaController::class, 'create'])->name('cuti-bersama.create');
Route::post('setup-event/cuti-bersama', [CutiBersamaController::class, 'store'])->name('cuti-bersama.store');
Route::get('setup-event/cuti-bersama/edit/{code}', [CutiBersamaController::class, 'edit'])->name('cuti-bersama.edit');
Route::put('setup-event/cuti-bersama/edit/{code}', [CutiBersamaController::class, 'update'])->name('cuti-bersama.update');
Route::delete('setup-event/cuti-bersama/{code}', [CutiBersamaController::class, 'destroy'])->name('cuti-bersama.destroy');

Route::resource('setup-event/pemotongan-cuti', PemotonganCutiController::class)->except('show');

Route::get('setup-event/kuota-cuti', [KuotaCutiController::class, 'index'])->name('kuota-cuti.index');
Route::get('setup-event/kuota-cuti/create', [KuotaCutiController::class, 'create'])->name('kuota-cuti.create');
Route::post('setup-event/kuota-cuti', [KuotaCutiController::class, 'store'])->name('kuota-cuti.store');
// Route::get('setup-event/kuota-cuti/edit/{nik}', [KuotaCutiController::class, 'edit'])->name('kuota-cuti.edit');
// Route::put('setup-event/kuota-cuti/edit/{nik}', [KuotaCutiController::class, 'update'])->name('kuota-cuti.update');
//Tracking Document Cuti
Route::get('tracking-dokument/cuti', [TrackingDocumentController::class, 'indexCuti'])->name('tracking-cuti.index');
Route::get('tracking-dokument/cuti-tahunan/detail/{id_cuti}', [TrackingDocumentController::class, 'detailCutiTahunan'])->name('tracking-cuti-tahunan.detail');
Route::get('tracking-dokument/cuti-umum/detail/{id_cuti}', [TrackingDocumentController::class, 'detailCutiUmum'])->name('tracking-cuti-umum.detail');
Route::get('tracking-dokument/cuti-besar/detail/{id_cuti}', [TrackingDocumentController::class, 'detailCutiBesar'])->name('tracking-cuti-besar.detail');

Route::get('tracking-dokument/izin-personal', [TrackingDocumentController::class, 'indexIzinPersonal'])->name('tracking-izin-personal.index');
Route::get('tracking-dokument/izin-personal/detail/{id}', [TrackingDocumentController::class, 'detailIzinPersonal'])->name('tracking-izin-personal.detail');

Route::get('tracking-dokument/spd', [TrackingDocumentController::class, 'indexSpd'])->name('tracking-spd.index');
Route::get('tracking-dokument/spd/print-spd/{id_spd}', [TrackingDocumentController::class, 'printSpd'])->name('tracking-spd.print');
Route::get('tracking-dokument/spd/detail-spd/{id_spd}', [TrackingDocumentController::class, 'detailSpd'])->name('tracking-spd.detail');
Route::get('tracking-dokument/medical', [TrackingDocumentController::class, 'indexMedical'])->name('tracking-medical.index');
Route::get('tracking-dokument/medical/print-medical/{nomor_medical_claim}', [TrackingDocumentController::class, 'printMedical'])->name('tracking-medical.print');
Route::get('tracking-dokument/spd/detail-medical/{nomor_medical_claim}', [TrackingDocumentController::class, 'detailMedical'])->name('tracking-medical.detail');

Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('employee/detail/{nik}', [EmployeeController::class, 'detail'])->name('employee.detail');
Route::get('employee/create/', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('employee/store/', [EmployeeController::class, 'store'])->name('employee.store');
Route::post('employee/update-photo/{nik}', [EmployeeController::class, 'updateFoto'])->name('employee.update-photo');
Route::get('employee/approval-data/{unit_kerja}', [EmployeeController::class, 'getApprovalData'])->name('employee.approval-data');
// Route::get('employee/get-hirarki-by-unit/{unitId}', [EmployeeController::class, 'getHirarkiByUnit']);

Route::put('employee/detail/data-diri/{nik}', [EmployeeController::class, 'updateDataPribadi'])->name('data-diri.update');
Route::put('employee/detail/kontak/{nik}', [EmployeeController::class, 'updateDataKontak'])->name('kontak.update');
Route::put('employee/detail/kontak-darurat/{nik}', [EmployeeController::class, 'updateDataKontakDarurat'])->name('kontak-darurat.update');
//Crud Keluarga
Route::post('employee/detail/keluarga/', [EmployeeController::class, 'tambahDataKeluarga'])->name('keluarga.create');
Route::post('employee/detail/keluarga/update', [EmployeeController::class, 'updateDataKeluarga'])->name('keluarga.update');
Route::delete('employee/detail/keluarga/delete', [EmployeeController::class, 'destroyDataKeluarga'])->name('keluarga.delete');
//Crud Pendidikan
Route::post('employee/detail/pendidikan/', [EmployeeController::class, 'tambahDataPendidikan'])->name('pendidikan.create');
Route::post('employee/detail/pendidikan/update', [EmployeeController::class, 'updateDataPendidikan'])->name('pendidikan.update');
Route::delete('employee/detail/pendidikan/delete', [EmployeeController::class, 'destroyDataPendidikan'])->name('pendidikan.delete');
//Update Informasi Karyawan
Route::put('employee/detail/informasi-karyawan/{nik}', [EmployeeController::class, 'updateDataInformasiKaryawan'])->name('info-karyawan.update');
//Update User Akun & Hapus Akun
Route::put('employee/detail/user-account/{nik}', [EmployeeController::class, 'updateDataUserAkun'])->name('user-account.update');
Route::delete('employee/detail/user-account/delete', [EmployeeController::class, 'destroyDataUserAkun'])->name('user-account.delete');
//CRUD Kontrak Karyawan
Route::post('employee/detail/kontrak-karyawan/', [EmployeeController::class, 'tambahDataKontrakKaryawan'])->name('kontrak-karyawan.create');
Route::post('employee/detail/kontrak-karyawan/update', [EmployeeController::class, 'updateDataKontrakKaryawan'])->name('kontrak-karyawan.update');
Route::delete('employee/detail/kontrak-karyawan/delete', [EmployeeController::class, 'destroyDataKontrakKaryawan'])->name('kontrak-karyawan.delete');
//CRUD Penilaian Akhir
Route::post('employee/detail/penilaian-akhir/', [EmployeeController::class, 'tambahDataPenilaianAkhir'])->name('penilaian-akhir.create');
Route::post('employee/detail/penilaian-akhir/update', [EmployeeController::class, 'updateDataPenilaianAkhir'])->name('penilaian-akhir.update');
Route::delete('employee/detail/penilaian-akhir/delete', [EmployeeController::class, 'destroyDataPenilaianAkhir'])->name('penilaian-akhir.delete');
//CRUD Pelatihan
Route::post('employee/detail/pelatihan/', [EmployeeController::class, 'tambahDataPelatihan'])->name('pelatihan.create');
Route::post('employee/detail/pelatihan/update', [EmployeeController::class, 'updateDataPelatihan'])->name('pelatihan.update');
Route::delete('employee/detail/pelatihan/delete', [EmployeeController::class, 'destroyDataPelatihan'])->name('pelatihan.delete');
//CRUD Penghargaan
Route::post('employee/detail/penghargaan/', [EmployeeController::class, 'tambahDataPenghargaan'])->name('penghargaan.create');
Route::post('employee/detail/penghargaan/update', [EmployeeController::class, 'updateDataPenghargaan'])->name('penghargaan.update');
Route::delete('employee/detail/penghargaan/delete', [EmployeeController::class, 'destroyDataPenghargaan'])->name('penghargaan.delete');
//CRUD Surat Peringatan
Route::post('employee/detail/surat-peringatan/', [EmployeeController::class, 'tambahDataSuratPeringatan'])->name('surat-peringatan.create');
Route::post('employee/detail/surat-peringatan/update', [EmployeeController::class, 'updateDataSuratPeringatan'])->name('surat-peringatan.update');
Route::delete('employee/detail/surat-peringatan/delete', [EmployeeController::class, 'destroyDataSuratPeringatan'])->name('surat-peringatan.delete');
//CRUD Bahasa
Route::post('employee/detail/bahasa/', [EmployeeController::class, 'tambahDataBahasa'])->name('bahasa.create');
Route::post('employee/detail/bahasa/update', [EmployeeController::class, 'updateDataBahasa'])->name('bahasa.update');
Route::delete('employee/detail/bahasa/delete', [EmployeeController::class, 'destroyDataBahasa'])->name('bahasa.delete');
//CRUD Bank
Route::post('employee/detail/bank/', [EmployeeController::class, 'tambahDataBank'])->name('bank.create');
Route::post('employee/detail/bank/update', [EmployeeController::class, 'updateDataBank'])->name('bank.update');
Route::delete('employee/detail/bank/delete', [EmployeeController::class, 'destroyDataBank'])->name('bank.delete');
//CRUD NPWP
Route::post('employee/detail/npwp/', [EmployeeController::class, 'tambahDataNpwp'])->name('npwp.create');
Route::post('employee/detail/npwp/update', [EmployeeController::class, 'updateDataNpwp'])->name('npwp.update');
Route::delete('employee/detail/npwp/delete', [EmployeeController::class, 'destroyDataNpwp'])->name('npwp.delete');
//CRUD Pengalaman Kerja
Route::post('employee/detail/pengalaman-kerja/', [EmployeeController::class, 'tambahDataPengalamanKerja'])->name('pengalaman-kerja.create');
Route::post('employee/detail/pengalaman-kerja/update', [EmployeeController::class, 'updateDataPengalamanKerja'])->name('pengalaman-kerja.update');
Route::delete('employee/detail/pengalaman-kerja/delete', [EmployeeController::class, 'destroyDataPengalamanKerja'])->name('pengalaman-kerja.delete');
//Update Rekam Medis
Route::put('employee/detail/rekam-medis/{nik}', [EmployeeController::class, 'updateDataRekamMedis'])->name('rekam-medis.update');


