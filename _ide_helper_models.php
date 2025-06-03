<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property string $id_user
 * @property string $nama_user
 * @property string $password
 * @property string $hak_akses
 * @property string|null $avatar
 * @property int $id_peg
 * @property int|null $shocart
 * @property int|null $hris
 * @property int|null $cms
 * @property int|null $ams
 * @property int|null $ams_synced
 * @property string|null $ams_sync_error
 * @property int|null $ims
 * @property int|null $ims_synced
 * @property string|null $ims_sync_error
 * @property int|null $aas
 * @property int|null $helpdesk
 * @property int|null $rms
 * @property int|null $dms
 * @property int $cp
 * @property int|null $id_role
 * @property int|null $aas_p
 * @property int|null $aas_c
 * @property int|null $aas_r
 * @property string|null $session_token
 * @property string|null $updated_at
 * @property string|null $update_date
 * @property string|null $created_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAas($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAasC($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAasP($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAasR($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAmsSyncError($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAmsSynced($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereHakAkses($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereHelpdesk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereHris($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereImsSyncError($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereImsSynced($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNamaUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSessionToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereShocart($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id
 * @property string|null $nik
 * @property string|null $nama
 * @property string|null $atasan1_general
 * @property string|null $atasan2_general
 * @property string|null $atasan1_spd
 * @property string|null $atasan2_spd
 * @property string|null $atasan1_ko
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval whereAtasan1General($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval whereAtasan1Ko($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval whereAtasan1Spd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval whereAtasan2General($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval whereAtasan2Spd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Approval whereUpdatedAt($value)
 */
	class Approval extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id
 * @property string|null $nama_cuti_bersama
 * @property int|null $lama_cuti
 * @property string|null $tanggal_cuti_bersama
 * @property string|null $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CutiBersama newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CutiBersama newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CutiBersama query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CutiBersama whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CutiBersama whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CutiBersama whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CutiBersama whereLamaCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CutiBersama whereNamaCutiBersama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CutiBersama whereTanggalCutiBersama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CutiBersama whereUpdatedAt($value)
 */
	class CutiBersama extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id_department
 * @property string $nama_department
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereIdDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereNamaDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id_unit
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Divisi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Divisi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Divisi query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Divisi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Divisi whereIdUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Divisi whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Divisi whereUpdatedAt($value)
 */
	class Divisi extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id
 * @property string|null $jenis_edit_cuti
 * @property string|null $jenis_tahun_cuti
 * @property string|null $jenis_peg
 * @property int|null $jumlah_cuti
 * @property string|null $keterangan
 * @property string|null $peg_cuti
 * @property string|null $execute_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti whereExecuteBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti whereJenisEditCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti whereJenisPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti whereJenisTahunCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti whereJumlahCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti wherePegCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistoryEditCuti whereUpdatedAt($value)
 */
	class HistoryEditCuti extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id_jab
 * @property int|null $id_peg
 * @property string|null $id_user
 * @property string $jabatan
 * @property string $eselon
 * @property string|null $no_sk
 * @property string|null $tgl_sk
 * @property string|null $tmt_jabatan
 * @property string|null $sampai_tgl
 * @property string|null $file
 * @property string|null $status_jab
 * @property string|null $jk_jab
 * @property string|null $posisi
 * @property int $id_peg_child
 * @property string|null $posisi_column
 * @property string|null $kode_promosi_demosi
 * @property int $id_history_jab
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereEselon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereIdHistoryJab($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereIdJab($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereIdPegChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereJkJab($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereKodePromosiDemosi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereNoSk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan wherePosisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan wherePosisiColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereSampaiTgl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereStatusJab($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereTglSk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereTmtJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Jabatan whereUpdatedAt($value)
 */
	class Jabatan extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id
 * @property string|null $transisi_no
 * @property string|null $nik
 * @property int|null $jabatan_lama
 * @property int|null $jabatan_baru
 * @property int|null $eselon_lama
 * @property int|null $eselon_baru
 * @property string|null $posisi_lama
 * @property string|null $posisi_baru
 * @property string|null $jenis_transisi
 * @property string|null $tanggal_transisi_mulai
 * @property string|null $tanggal_transisi_akhir
 * @property int|null $unit_kerja_lama
 * @property int|null $unit_kerja_baru
 * @property string|null $no_sk
 * @property string|null $tanggal_sk
 * @property string|null $file
 * @property string|null $status_karyawan
 * @property string|null $alasan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereAlasan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereEselonBaru($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereEselonLama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereJabatanBaru($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereJabatanLama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereJenisTransisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereNoSk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir wherePosisiBaru($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir wherePosisiLama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereStatusKaryawan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereTanggalSk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereTanggalTransisiAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereTanggalTransisiMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereTransisiNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereUnitKerjaBaru($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereUnitKerjaLama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Karir whereUpdatedAt($value)
 */
	class Karir extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id_kontrak
 * @property string $nik
 * @property string|null $status_kontrak
 * @property string|null $tgl_kontrak
 * @property int|null $kontrak_ke
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KontrakKaryawan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KontrakKaryawan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KontrakKaryawan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KontrakKaryawan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KontrakKaryawan whereIdKontrak($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KontrakKaryawan whereKontrakKe($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KontrakKaryawan whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KontrakKaryawan whereStatusKontrak($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KontrakKaryawan whereTglKontrak($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KontrakKaryawan whereUpdatedAt($value)
 */
	class KontrakKaryawan extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id_peg
 * @property string $nip
 * @property string|null $file_ktp
 * @property string|null $tipe_sim
 * @property string|null $sim
 * @property string|null $file_sim
 * @property string $nama
 * @property string $tempat_lhr
 * @property string|null $tgl_lhr
 * @property string $agama
 * @property string $jk
 * @property string $gol_darah
 * @property string $status_nikah
 * @property string $status_kepeg
 * @property string|null $tgl_kontrak
 * @property int|null $kontrak_ke
 * @property string $alamat
 * @property string|null $alamat_domisili
 * @property string $telp
 * @property string $email
 * @property string|null $email_secondary
 * @property int $unit_kerja
 * @property int|null $id_departement
 * @property string $foto
 * @property string $tgl_pensiun
 * @property string $date_reg
 * @property string|null $urut_pangkat
 * @property string|null $pangkat
 * @property string|null $jabatan
 * @property string|null $sekolah
 * @property string|null $status_mut
 * @property string|null $lok_kerja
 * @property string $nik
 * @property string|null $tanggal_masuk
 * @property int|null $hak_cuti_tahun_1
 * @property string|null $expired_tahun_1
 * @property int|null $hak_cuti_tahun_2
 * @property string|null $expired_tahun_2
 * @property int|null $hak_cuti_tahun_berjalan
 * @property int|null $hak_cuti_besar
 * @property int $already_cuti_besar
 * @property int $active_cuti_besar
 * @property string $tanggal_tambah_kuota_cuti_besar
 * @property int|null $hak_cuti
 * @property string $company
 * @property string|null $tanggal_keluar
 * @property string|null $status_karyawan
 * @property string|null $atasan_1
 * @property string|null $atasan_2
 * @property int|null $id_jab
 * @property string $jenis_peg
 * @property string|null $ims_hirarki
 * @property string|null $ams_role
 * @property string|null $ams_location
 * @property string|null $unit_approval
 * @property string|null $subsi_approval
 * @property string|null $kasie_approval
 * @property string|null $kadept_approval
 * @property string|null $kadiv_approval
 * @property string|null $direktorat_approval
 * @property string|null $nomor_kk
 * @property string|null $file_kk
 * @property string|null $nomor_paspor
 * @property string|null $file_paspor
 * @property string|null $masa_berlaku_paspor
 * @property int|null $tinggi_badan
 * @property string|null $berat_badan
 * @property string|null $lensa_kacamata
 * @property string|null $ukuran_baju
 * @property int|null $ukuran_sepatu
 * @property string|null $kontak_darurat1
 * @property string|null $nama_kontak_darurat1
 * @property string|null $hub_kontak_darurat1
 * @property string|null $kontak_darurat2
 * @property string|null $nama_kontak_darurat2
 * @property string|null $hub_kontak_darurat2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereActiveCutiBesar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereAlamatDomisili($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereAlreadyCutiBesar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereAmsLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereAmsRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereAtasan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereAtasan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereBeratBadan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereDateReg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereDirektoratApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereEmailSecondary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereExpiredTahun1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereExpiredTahun2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereFileKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereFileKtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereFilePaspor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereFileSim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereGolDarah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereHakCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereHakCutiBesar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereHakCutiTahun1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereHakCutiTahun2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereHakCutiTahunBerjalan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereHubKontakDarurat1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereHubKontakDarurat2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereIdDepartement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereIdJab($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereImsHirarki($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereJenisPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereKadeptApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereKadivApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereKasieApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereKontakDarurat1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereKontakDarurat2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereKontrakKe($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereLensaKacamata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereLokKerja($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereMasaBerlakuPaspor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereNamaKontakDarurat1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereNamaKontakDarurat2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereNomorKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereNomorPaspor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti wherePangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereSekolah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereSim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereStatusKaryawan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereStatusKepeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereStatusMut($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereStatusNikah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereSubsiApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereTanggalKeluar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereTanggalMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereTanggalTambahKuotaCutiBesar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereTempatLhr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereTglKontrak($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereTglLhr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereTglPensiun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereTinggiBadan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereTipeSim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereUkuranBaju($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereUkuranSepatu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereUnitApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereUnitKerja($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KuotaCuti whereUrutPangkat($value)
 */
	class KuotaCuti extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id
 * @property string|null $nama_libur
 * @property string|null $tanggal_libur
 * @property string|null $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LiburNasional newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LiburNasional newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LiburNasional query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LiburNasional whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LiburNasional whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LiburNasional whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LiburNasional whereNamaLibur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LiburNasional whereTanggalLibur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LiburNasional whereUpdatedAt($value)
 */
	class LiburNasional extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id
 * @property string|null $nama_lok_kerja
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LokasiKerja newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LokasiKerja newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LokasiKerja query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LokasiKerja whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LokasiKerja whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LokasiKerja whereNamaLokKerja($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LokasiKerja whereUpdatedAt($value)
 */
	class LokasiKerja extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id_masteresl
 * @property string $nama_masteresl
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterEselon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterEselon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterEselon query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterEselon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterEselon whereIdMasteresl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterEselon whereNamaMasteresl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterEselon whereUpdatedAt($value)
 */
	class MasterEselon extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id_masteresl
 * @property string $nama_masteresl
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterGrade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterGrade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterGrade query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterGrade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterGrade whereIdMasteresl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterGrade whereNamaMasteresl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterGrade whereUpdatedAt($value)
 */
	class MasterGrade extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id_masterjab
 * @property string|null $kode_jabatan
 * @property string $nama_masterjab
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterJabatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterJabatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterJabatan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterJabatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterJabatan whereIdMasterjab($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterJabatan whereKodeJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterJabatan whereNamaMasterjab($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterJabatan whereUpdatedAt($value)
 */
	class MasterJabatan extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id
 * @property string|null $nama_posisi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterPosisi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterPosisi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterPosisi query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterPosisi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterPosisi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterPosisi whereNamaPosisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MasterPosisi whereUpdatedAt($value)
 */
	class MasterPosisi extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id_setup_cuti
 * @property string|null $jenis_setup_cuti
 * @property int|null $lama_cuti
 * @property string|null $tgl_mulai
 * @property string|null $tgl_selesai
 * @property string|null $keterangan
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti whereIdSetupCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti whereJenisSetupCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti whereLamaCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti whereTglSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PemotonganCuti whereUpdatedAt($value)
 */
	class PemotonganCuti extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id_pa
 * @property string $nik
 * @property string|null $nilai_pa
 * @property string|null $tahun_pa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PenilaianAkhir newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PenilaianAkhir newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PenilaianAkhir query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PenilaianAkhir whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PenilaianAkhir whereIdPa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PenilaianAkhir whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PenilaianAkhir whereNilaiPa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PenilaianAkhir whereTahunPa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PenilaianAkhir whereUpdatedAt($value)
 */
	class PenilaianAkhir extends \Eloquent {}
}

namespace App\Models\hrd{
/**
 * 
 *
 * @property int $id_sp
 * @property int $id_peg
 * @property string|null $nik
 * @property string $jenis_sp
 * @property string $periode_awal
 * @property string $periode_akhir
 * @property string $keterangan
 * @property string $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan whereIdSp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan whereJenisSp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan wherePeriodeAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan wherePeriodeAwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuratPeringatan whereUpdatedAt($value)
 */
	class SuratPeringatan extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_anak
 * @property int $id_peg
 * @property string|null $nik
 * @property string|null $id_user
 * @property string|null $nama
 * @property string|null $tmp_lhr
 * @property string|null $tgl_lhr
 * @property string|null $jk
 * @property string|null $pendidikan
 * @property string|null $pekerjaan
 * @property string|null $status_hub
 * @property string|null $date_reg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereDateReg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereIdAnak($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak wherePendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereStatusHub($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereTglLhr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereTmpLhr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Anak whereUpdatedAt($value)
 */
	class Anak extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_bhs
 * @property int $id_peg
 * @property string|null $nik
 * @property string $jns_bhs
 * @property string $bahasa
 * @property string $kemampuan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bahasa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bahasa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bahasa query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bahasa whereBahasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bahasa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bahasa whereIdBhs($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bahasa whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bahasa whereJnsBhs($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bahasa whereKemampuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bahasa whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bahasa whereUpdatedAt($value)
 */
	class Bahasa extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_account
 * @property int $id_peg
 * @property string|null $nik
 * @property string $nomor_account
 * @property string $nama_bank
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank whereIdAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank whereNamaBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank whereNomorAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bank whereUpdatedAt($value)
 */
	class Bank extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_cuti
 * @property int $id_peg
 * @property string|null $nik
 * @property int $id_unit
 * @property int $id_mastercuti
 * @property string $kuota_cuti
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property int $lama_cuti
 * @property string $pengganti_cuti
 * @property string $keterangan
 * @property int $atasan_1
 * @property int $atasan_2
 * @property int $atasan_3
 * @property int $approve_atasan_1
 * @property int $approve_atasan_2
 * @property int $approve_atasan_3
 * @property string $status_cuti
 * @property string $tgl_pengajuan
 * @property string $file
 * @property int $his_sisa_cuti
 * @property int $notif_status
 * @property string|null $keterangan_reject
 * @property string|null $date_approve_atasan_1
 * @property string|null $date_approve_atasan_2
 * @property string|null $date_approve_atasan_3
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\shared\Pegawai|null $atasan1
 * @property-read \App\Models\shared\Pegawai|null $atasan2
 * @property-read \App\Models\shared\Pegawai|null $pegawai
 * @property-read \App\Models\shared\Pegawai|null $pengganti
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereApproveAtasan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereApproveAtasan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereApproveAtasan3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereAtasan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereAtasan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereAtasan3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereDateApproveAtasan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereDateApproveAtasan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereDateApproveAtasan3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereHisSisaCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereIdCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereIdMastercuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereIdUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereKeteranganReject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereKuotaCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereLamaCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereNotifStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti wherePenggantiCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereStatusCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereTglPengajuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereTglSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cuti whereUpdatedAt($value)
 */
	class Cuti extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property string $id
 * @property string $nama_karyawan
 * @property string $department
 * @property string $date
 * @property string $jenis_izin
 * @property string $keterangan
 * @property string $atasan1
 * @property string $approve_atasan_1
 * @property string|null $date_approval_atasan_1
 * @property string $approve_hrd
 * @property string|null $date_approval_hrd
 * @property string $status
 * @property string|null $suratsakit
 * @property string|null $kembalikantor
 * @property string|null $jam_keluar
 * @property string|null $jam_kembali
 * @property string|null $tujuan
 * @property string|null $alasan
 * @property string|null $id_absensi
 * @property string|null $nik
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\shared\Pegawai|null $atasan1Nama
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereAlasan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereApproveAtasan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereApproveHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereAtasan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereDateApprovalAtasan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereDateApprovalHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereIdAbsensi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereJamKeluar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereJamKembali($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereJenisIzin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereKembalikantor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereNamaKaryawan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereSuratsakit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IzinPersonal whereUpdatedAt($value)
 */
	class IzinPersonal extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_kendaraan_operasional
 * @property string $no_surat_kendaraan_operasional
 * @property string $nik
 * @property string $nama_peg
 * @property string $divisi
 * @property string $tujuan
 * @property int $jumlah_orang
 * @property string $keterangan
 * @property string $jam_berangkat
 * @property string $tgl_berangkat
 * @property string $jam_kembali
 * @property string $tgl_kembali
 * @property string $nik_final_approval
 * @property string $final_approval
 * @property string $final_approval_date
 * @property string $ga_approval
 * @property string $ga_approval_date
 * @property string $status_approval
 * @property string $keterangan_reject_approval
 * @property string $keterangan_reject_ga
 * @property string $createdAt
 * @property string $update_date
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereDivisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereFinalApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereFinalApprovalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereGaApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereGaApprovalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereIdKendaraanOperasional($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereJamBerangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereJamKembali($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereJumlahOrang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereKeteranganRejectApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereKeteranganRejectGa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereNamaPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereNikFinalApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereNoSuratKendaraanOperasional($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereStatusApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereTglBerangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereTglKembali($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KendaraanOperasional whereUpdateDate($value)
 */
	class KendaraanOperasional extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_kopensasi
 * @property int $id_peg
 * @property string|null $nik
 * @property int $jumlah
 * @property int $approve
 * @property string $tgl_pengajuan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KopensasiCutiBesar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KopensasiCutiBesar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KopensasiCutiBesar query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KopensasiCutiBesar whereApprove($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KopensasiCutiBesar whereIdKopensasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KopensasiCutiBesar whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KopensasiCutiBesar whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KopensasiCutiBesar whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KopensasiCutiBesar whereTglPengajuan($value)
 */
	class KopensasiCutiBesar extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id
 * @property string $nik
 * @property int $kacamata
 * @property int $limit_kacamata
 * @property int $kehamilan
 * @property int $limit_kehamilan
 * @property int $pengobatan_gigi
 * @property int $limit_pengobatan_gigi
 * @property int $vaksinasi_anak
 * @property int $limit_vaksinasi_anak
 * @property int $medical_check_up
 * @property int $limit_medical_check_up
 * @property int $tunjangan_kesehatan
 * @property int $limit_tunjangan_kesehatan
 * @property int $saldo_total_rembuisement
 * @property int $limit_total_rembuisement
 * @property string $tahun
 * @property string $update_date
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereKacamata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereKehamilan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereLimitKacamata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereLimitKehamilan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereLimitMedicalCheckUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereLimitPengobatanGigi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereLimitTotalRembuisement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereLimitTunjanganKesehatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereLimitVaksinasiAnak($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereMedicalCheckUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement wherePengobatanGigi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereSaldoTotalRembuisement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereTunjanganKesehatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereUpdateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursement whereVaksinasiAnak($value)
 */
	class LimitReimbursement extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id
 * @property string $nik
 * @property int $kacamata
 * @property int $limit_kacamata
 * @property int $kehamilan
 * @property int $limit_kehamilan
 * @property int $pengobatan_gigi
 * @property int $limit_pengobatan_gigi
 * @property int $vaksinasi_anak
 * @property int $limit_vaksinasi_anak
 * @property int $medical_check_up
 * @property int $limit_medical_check_up
 * @property int $tunjangan_kesehatan
 * @property int $limit_tunjangan_kesehatan
 * @property int $saldo_total_rembuisement
 * @property int $limit_total_rembuisement
 * @property string $tahun
 * @property string $update_date
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereKacamata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereKehamilan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereLimitKacamata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereLimitKehamilan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereLimitMedicalCheckUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereLimitPengobatanGigi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereLimitTotalRembuisement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereLimitTunjanganKesehatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereLimitVaksinasiAnak($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereMedicalCheckUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu wherePengobatanGigi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereSaldoTotalRembuisement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereTunjanganKesehatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereUpdateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LimitReimbursementTahunLalu whereVaksinasiAnak($value)
 */
	class LimitReimbursementTahunLalu extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id
 * @property string|null $nomor_medical_claim
 * @property string|null $nik
 * @property string $tertanggung
 * @property string|null $jenis_rembuisement
 * @property string $tgl_pengajuan
 * @property string|null $tgl_bukti_kwitansi
 * @property string|null $keterangan
 * @property string|null $file
 * @property string|null $file_pendukung
 * @property int|null $jumlah
 * @property string $hard_copy
 * @property string $revision_id
 * @property string $approve_hrd
 * @property string $date_approval_hrd
 * @property string|null $keterangan_hrd
 * @property string $approve_gm_hrd
 * @property string $date_approval_gm_hrd
 * @property string|null $status
 * @property string $keterangan_reject_hrd
 * @property string $hard_copy_finance
 * @property string|null $status_finance_verified
 * @property string $verifiedByFinance
 * @property string $date_approval_finance_verified
 * @property string $keterangan_reject_finance
 * @property string|null $paid
 * @property string $jumlah_payment
 * @property string $date_approval_treasury
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $formatted_date_approval_finance_verified
 * @property-read mixed $formatted_date_approval_gm_hrd
 * @property-read mixed $formatted_date_approval_hrd
 * @property-read mixed $formatted_date_approval_treasury
 * @property-read mixed $formatted_tgl_pengajuan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereApproveGmHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereApproveHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereDateApprovalFinanceVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereDateApprovalGmHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereDateApprovalHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereDateApprovalTreasury($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereFilePendukung($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereHardCopy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereHardCopyFinance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereJenisRembuisement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereJumlahPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereKeteranganHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereKeteranganRejectFinance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereKeteranganRejectHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereNomorMedicalClaim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereRevisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereStatusFinanceVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereTertanggung($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereTglBuktiKwitansi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereTglPengajuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medical whereVerifiedByFinance($value)
 */
	class Medical extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_booking
 * @property int $id_peg
 * @property string $nik
 * @property string $nama_peg
 * @property string $divisi
 * @property string $tgl_pengajuan
 * @property string $tgl_booking
 * @property string $jam_mulai
 * @property string $jam_selesai
 * @property string $ruangan
 * @property string $keterangan
 * @property string|null $kategori
 * @property string|null $kategori_lainlain
 * @property string $status_booking
 * @property string $keterangan_reject
 * @property string $keterangan_reschedule
 * @property string $createdAt
 * @property string $update_date
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereDivisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereIdBooking($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereJamMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereJamSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereKategoriLainlain($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereKeteranganReject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereKeteranganReschedule($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereNamaPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereRuangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereStatusBooking($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereTglBooking($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereTglPengajuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MeetingRoom whereUpdateDate($value)
 */
	class MeetingRoom extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_npwp
 * @property int $id_peg
 * @property string|null $nik
 * @property string|null $nomor_npwp
 * @property string|null $tanggungan
 * @property string|null $tgl_terdaftar
 * @property string|null $alamat
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp whereIdNpwp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp whereNomorNpwp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp whereTanggungan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp whereTglTerdaftar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Npwp whereUpdatedAt($value)
 */
	class Npwp extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_ortu
 * @property int $id_peg
 * @property string|null $nik
 * @property string|null $id_user
 * @property string|null $nama
 * @property string|null $tmp_lhr
 * @property string|null $tgl_lhr
 * @property string|null $jk
 * @property string|null $pendidikan
 * @property string|null $pekerjaan
 * @property string|null $status_hub
 * @property string|null $date_reg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereDateReg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereIdOrtu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu wherePendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereStatusHub($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereTglLhr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereTmpLhr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ortu whereUpdatedAt($value)
 */
	class Ortu extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_peg
 * @property string $nip
 * @property string|null $file_ktp
 * @property string|null $tipe_sim
 * @property string|null $sim
 * @property string|null $file_sim
 * @property string $nama
 * @property string $tempat_lhr
 * @property string|null $tgl_lhr
 * @property string $agama
 * @property string $jk
 * @property string $gol_darah
 * @property string $status_nikah
 * @property string $status_kepeg
 * @property string|null $tgl_kontrak
 * @property int|null $kontrak_ke
 * @property string $alamat
 * @property string|null $alamat_domisili
 * @property string $telp
 * @property string $email
 * @property string|null $email_secondary
 * @property int $unit_kerja
 * @property int|null $id_departement
 * @property string $foto
 * @property string $tgl_pensiun
 * @property string $date_reg
 * @property string|null $urut_pangkat
 * @property string|null $pangkat
 * @property string|null $jabatan
 * @property string|null $sekolah
 * @property string|null $status_mut
 * @property string|null $lok_kerja
 * @property string $nik
 * @property string|null $tanggal_masuk
 * @property int|null $hak_cuti_tahun_1
 * @property string|null $expired_tahun_1
 * @property int|null $hak_cuti_tahun_2
 * @property string|null $expired_tahun_2
 * @property int|null $hak_cuti_tahun_berjalan
 * @property int|null $hak_cuti_besar
 * @property int $already_cuti_besar
 * @property int $active_cuti_besar
 * @property string $tanggal_tambah_kuota_cuti_besar
 * @property int|null $hak_cuti
 * @property string $company
 * @property string|null $tanggal_keluar
 * @property string|null $status_karyawan
 * @property string|null $atasan_1
 * @property string|null $atasan_2
 * @property int|null $id_jab
 * @property string $jenis_peg
 * @property string|null $ims_hirarki
 * @property string|null $ams_role
 * @property string|null $ams_location
 * @property string|null $unit_approval
 * @property string|null $subsi_approval
 * @property string|null $kasie_approval
 * @property string|null $kadept_approval
 * @property string|null $kadiv_approval
 * @property string|null $direktorat_approval
 * @property string|null $nomor_kk
 * @property string|null $file_kk
 * @property string|null $nomor_paspor
 * @property string|null $file_paspor
 * @property string|null $masa_berlaku_paspor
 * @property int|null $tinggi_badan
 * @property string|null $berat_badan
 * @property string|null $lensa_kacamata
 * @property string|null $ukuran_baju
 * @property int|null $ukuran_sepatu
 * @property string|null $kontak_darurat1
 * @property string|null $nama_kontak_darurat1
 * @property string|null $hub_kontak_darurat1
 * @property string|null $kontak_darurat2
 * @property string|null $nama_kontak_darurat2
 * @property string|null $hub_kontak_darurat2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereActiveCutiBesar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereAlamatDomisili($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereAlreadyCutiBesar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereAmsLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereAmsRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereAtasan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereAtasan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereBeratBadan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereDateReg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereDirektoratApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereEmailSecondary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereExpiredTahun1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereExpiredTahun2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereFileKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereFileKtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereFilePaspor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereFileSim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereGolDarah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereHakCuti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereHakCutiBesar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereHakCutiTahun1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereHakCutiTahun2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereHakCutiTahunBerjalan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereHubKontakDarurat1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereHubKontakDarurat2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereIdDepartement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereIdJab($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereImsHirarki($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereJenisPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereKadeptApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereKadivApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereKasieApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereKontakDarurat1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereKontakDarurat2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereKontrakKe($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereLensaKacamata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereLokKerja($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereMasaBerlakuPaspor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereNamaKontakDarurat1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereNamaKontakDarurat2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereNomorKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereNomorPaspor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai wherePangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereSekolah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereSim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereStatusKaryawan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereStatusKepeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereStatusMut($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereStatusNikah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereSubsiApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereTanggalKeluar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereTanggalMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereTanggalTambahKuotaCutiBesar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereTempatLhr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereTglKontrak($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereTglLhr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereTglPensiun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereTinggiBadan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereTipeSim($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereUkuranBaju($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereUkuranSepatu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereUnitApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereUnitKerja($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pegawai whereUrutPangkat($value)
 */
	class Pegawai extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_pelatihan
 * @property string $nik
 * @property string|null $jenis_pelatihan
 * @property string|null $sertifikat_kompetensi
 * @property string|null $nama_pelatihan
 * @property string|null $tempat_pelatihan
 * @property string|null $penyelenggara
 * @property string|null $tanggal_mulai_pelatihan
 * @property string|null $tanggal_selesai_pelatihan
 * @property string|null $nomor_sertifikat_pelatihan
 * @property string|null $tanggal_sertifikat_pelatihan
 * @property string|null $file_sertifikat
 * @property string|null $lainlain_pelatihan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereFileSertifikat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereIdPelatihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereJenisPelatihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereLainlainPelatihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereNamaPelatihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereNomorSertifikatPelatihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan wherePenyelenggara($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereSertifikatKompetensi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereTanggalMulaiPelatihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereTanggalSelesaiPelatihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereTanggalSertifikatPelatihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereTempatPelatihan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelatihan whereUpdatedAt($value)
 */
	class Pelatihan extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_sekolah
 * @property int $id_peg
 * @property string|null $nik
 * @property string|null $tingkat
 * @property string|null $nama_sekolah
 * @property string|null $lokasi
 * @property string|null $jurusan
 * @property string|null $tahun
 * @property string|null $ijazah
 * @property string|null $keterangan
 * @property string|null $status
 * @property string|null $gol
 * @property string|null $pangkat
 * @property string|null $eselon
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereEselon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereGol($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereIdSekolah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereIjazah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereJurusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereLokasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereNamaSekolah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan wherePangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereTingkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pendidikan whereUpdatedAt($value)
 */
	class Pendidikan extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_history
 * @property int $id_peg
 * @property string|null $nik
 * @property string|null $periode_start
 * @property string|null $periode_end
 * @property string|null $nama_perusahaan
 * @property string|null $jenis_usaha
 * @property string|null $alamat
 * @property string|null $posisi_awal
 * @property string|null $posisi_akhir
 * @property int|null $jumlah_karyawan
 * @property string|null $keterangan
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja whereIdHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja whereJenisUsaha($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja whereJumlahKaryawan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja whereNamaPerusahaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja wherePeriodeEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja wherePeriodeStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja wherePosisiAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja wherePosisiAwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PengalamanKerja whereUpdatedAt($value)
 */
	class PengalamanKerja extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_penghargaan
 * @property int $id_peg
 * @property string|null $nik
 * @property string|null $penghargaan
 * @property string|null $tahun
 * @property string|null $pemberi
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan whereIdPenghargaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan wherePemberi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan wherePenghargaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Penghargaan whereUpdatedAt($value)
 */
	class Penghargaan extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_sertifikat
 * @property int $id_peg
 * @property string|null $nik
 * @property string $nama_sertifikat
 * @property string $tahun
 * @property string $file
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikasi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikasi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikasi query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikasi whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikasi whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikasi whereIdSertifikat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikasi whereNamaSertifikat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikasi whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikasi whereTahun($value)
 */
	class Sertifikasi extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_spd
 * @property string $nomor_spd
 * @property int $id_peg
 * @property string $nik
 * @property string|null $nama_peg
 * @property string|null $divisi
 * @property string|null $grade
 * @property string|null $ket_spd
 * @property string|null $tujuan
 * @property string|null $tgl_berangkat
 * @property string|null $tgl_kembali
 * @property int|null $jml_hari
 * @property string|null $ket_tgl_kembali
 * @property string|null $transportasi
 * @property string|null $transportasi_lainlain
 * @property string|null $kendaraan_oper
 * @property string|null $jenis_kendaraan
 * @property string|null $alasan_sewa
 * @property string|null $akomodasi
 * @property string|null $jenis_akomodasi
 * @property string|null $nama_serpo
 * @property string|null $ket_lain
 * @property string|null $maksud_tujuan
 * @property string|null $catatan
 * @property string|null $nama_proyek
 * @property string|null $file
 * @property string|null $atasan1
 * @property string|null $approve_atasan_1
 * @property string|null $date_approve_atasan1
 * @property string|null $atasan1_asby
 * @property string|null $atasan2
 * @property string|null $approve_atasan_2
 * @property string|null $date_approve_atasan2
 * @property string|null $atasan2_asby
 * @property string|null $approve_hrd
 * @property string|null $date_approve_hrd
 * @property string|null $approve_gm_hrd
 * @property string|null $date_approve_gm_hrd
 * @property string|null $status_payment
 * @property string|null $date_approve_finance_treasury
 * @property string|null $status_finance_verifikasi
 * @property string|null $date_approve_finance_verifikasi
 * @property string|null $verifiedByFinance
 * @property string|null $status_spd
 * @property string|null $keterangan_reject
 * @property string|null $ket_reject_finance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\shared\Pegawai|null $atasan1Nama
 * @property-read \App\Models\shared\Pegawai|null $atasan2Nama
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereAkomodasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereAlasanSewa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereApproveAtasan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereApproveAtasan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereApproveGmHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereApproveHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereAtasan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereAtasan1Asby($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereAtasan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereAtasan2Asby($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereDateApproveAtasan1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereDateApproveAtasan2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereDateApproveFinanceTreasury($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereDateApproveFinanceVerifikasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereDateApproveGmHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereDateApproveHrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereDivisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereIdSpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereJenisAkomodasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereJenisKendaraan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereJmlHari($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereKendaraanOper($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereKetLain($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereKetRejectFinance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereKetSpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereKetTglKembali($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereKeteranganReject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereMaksudTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereNamaPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereNamaProyek($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereNamaSerpo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereNomorSpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereStatusFinanceVerifikasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereStatusPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereStatusSpd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereTglBerangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereTglKembali($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereTransportasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereTransportasiLainlain($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Spd whereVerifiedByFinance($value)
 */
	class Spd extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property int $id_si
 * @property int $id_peg
 * @property string|null $nik
 * @property string|null $id_user
 * @property string|null $nama
 * @property string|null $tmp_lhr
 * @property string|null $tgl_lhr
 * @property string|null $jk
 * @property string|null $pendidikan
 * @property string|null $pekerjaan
 * @property string|null $status_hub
 * @property string|null $date_reg
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereDateReg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereIdSi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri wherePendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereStatusHub($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereTglLhr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereTmpLhr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SuamiIstri whereUpdatedAt($value)
 */
	class SuamiIstri extends \Eloquent {}
}

namespace App\Models\shared{
/**
 * 
 *
 * @property string $id_user
 * @property string $nama_user
 * @property string $password
 * @property string $hak_akses
 * @property string|null $avatar
 * @property int $id_peg
 * @property int|null $shocart
 * @property int|null $hris
 * @property int|null $cms
 * @property int|null $ams
 * @property int|null $ams_synced
 * @property string|null $ams_sync_error
 * @property int|null $ims
 * @property int|null $ims_synced
 * @property string|null $ims_sync_error
 * @property int|null $aas
 * @property int|null $helpdesk
 * @property int|null $rms
 * @property int|null $dms
 * @property int $cp
 * @property int|null $id_role
 * @property int|null $aas_p
 * @property int|null $aas_c
 * @property int|null $aas_r
 * @property string|null $session_token
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $update_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAas($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAasC($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAasP($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAasR($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAmsSyncError($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAmsSynced($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereHakAkses($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereHelpdesk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereHris($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdPeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereImsSyncError($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereImsSynced($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNamaUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSessionToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereShocart($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

