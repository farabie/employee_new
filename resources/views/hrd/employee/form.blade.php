@extends('layouts.master')

@section('title', 'Form Tambah Data Karyawan')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flatpickr/flatpickr.min.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

    <style>
        .checkbox-wrapper {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* 4 kolom */
            gap: 1rem;
            max-width: 600px;
            margin: 0 auto;
            padding: 0;
            list-style: none;
        }

        .checkbox-wrapper li {
            text-align: center;
            background: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
        }
    </style>

    <style>
        .form-select {
            color: #000 !important;
        }
    </style>

    <style>
        /* Tinggi field Select2 agar match dengan input Bootstrap */
        .select2-container .select2-selection--single {
            height: 38px !important;
            font-size: 14px;
            font-family: 'Rubik', sans-serif !important;
            padding: 6px 12px;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

        /* Agar teks tetap di tengah */
        .select2-selection__rendered {
            line-height: 26px !important;
            padding-left: 0 !important;
        }

        /* Panah dropdown Select2 */
        .select2-selection__arrow {
            height: 38px !important;
            top: 0 !important;
        }
    </style>

    <style>
        /* Gunakan ID yang spesifik untuk mencegah konflik dengan style lain */
        #foto-karyawan-upload-container {
            text-align: center;
            width: 100%;
        }

        .foto-karyawan-upload-wrapper {
            display: block;
            margin: 0 auto;
            position: relative;
            max-width: 300px;
        }

        .foto-karyawan-border-circle {
            width: 150px;
            height: 150px;
            border: 2px dashed #ccc;
            border-radius: 50%;
            padding: 5px;
            background-color: #f9f9f9;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .foto-karyawan-preview {
            object-fit: cover;
            max-width: 100%;
            max-height: 100%;
            border-radius: 50%;
        }

        .foto-karyawan-input {
            max-width: 250px;
            margin: 0.5rem auto;
            display: block;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Tambah Data Karyawan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Informasi Karyawan</li>
                        <li class="breadcrumb-item active">Tambah Data Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row shipping-form">
            <div class="col-xl-12">
                <div class="card checkout-cart">
                    <div class="card-header">
                        <h5>Tambah Data Karyawan</h5>
                    </div>
                    <div class="card-body basic-wizard important-validation">
                        <div class="stepper-horizontal custom-scrollbar" id="stepper1">
                            <div class="stepper-one stepper step editing active">
                                <div class="step-circle"><span>1</span></div>
                                <div class="step-title">Informasi Pribadi</div>
                                <div class="step-bar-left"></div>
                                <div class="step-bar-right"></div>
                            </div>
                            <div class="stepper-two step">
                                <div class="step-circle"><span>2</span></div>
                                <div class="step-title">Data Karyawan</div>
                                <div class="step-bar-left"></div>
                                <div class="step-bar-right"></div>
                            </div>
                            <div class="stepper-three step">
                                <div class="step-circle"><span>3</span></div>
                                {{-- <div class="step-title">Struktur Orchart</div> --}}
                                <div class="step-title">Struktur Organisasi</div>
                                <div class="step-bar-left"></div>
                                <div class="step-bar-right"></div>
                            </div>
                            <div class="stepper-four step">
                                <div class="step-circle"><span>4</span></div>
                                <div class="step-title">Approval Karyawan</div>
                                <div class="step-bar-left"></div>
                                <div class="step-bar-right"></div>
                            </div>
                            <div class="stepper-five step">
                                <div class="step-circle"><span>5</span></div>
                                {{-- <div class="step-title">Manage Application</div> --}}
                                <div class="step-title">Pengaturan Aplikasi</div>
                                <div class="step-bar-left"></div>
                                <div class="step-bar-right"></div>
                            </div>
                            <div class="stepper-six step">
                                <div class="step-circle"><span>6</span></div>
                                {{-- <div class="step-title">Finish</div> --}}
                                <div class="step-title">Selesai</div>
                                <div class="step-bar-left"></div>
                                <div class="step-bar-right"></div>
                            </div>
                        </div>
                        <div class="shipping-content" id="msform">
                            <form class="stepper-one row g-3 needs-validation shipping-wizard" novalidate="">
                                <div class="row g-3 custom-input">
                                    <div class="row mb-3">
                                        <div class="col-12" id="foto-karyawan-upload-container">
                                            <label for="foto-karyawan" class="form-label d-block">Foto Karyawan</label>
                                            <div class="foto-karyawan-upload-wrapper">
                                                <div class="foto-karyawan-border-circle">
                                                    <img id="preview-foto-karyawan"
                                                        src="{{ asset('storage/assets/img/foto/no-foto-female.png') }}"
                                                        alt="Preview Foto" class="foto-karyawan-preview"
                                                        style="width: 120px; height: 120px; object-fit: cover;">
                                                </div>
                                                <input type="file" name="foto" id="foto-karyawan" accept="image/*"
                                                    class="form-control foto-karyawan-input mt-2"
                                                    onchange="previewFotoKaryawan(event)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="nama"><span style="color: red">* </span>
                                                Nama
                                                Karyawan</label>
                                            <input name="nama" placeholder="Masukan Nama Karyawan" class="form-control"
                                                id="nama" type="text" value="" required>
                                            <div id="error-nama" class="invalid-feedback" style="display: none;">
                                                Nama Karyawan wajib diisi.
                                            </div>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="jk"><span style="color: red">*
                                                </span>Jenis Kelamin</label>
                                            <select class="form-select" name="jk" id="jk" required>
                                                <option selected disabled value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <div class="invalid-feedback" id="error-jk" style="display: none;"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tempat_lhr"><span style="color: red">*
                                                </span>Tempat Lahir</label>
                                            <input required name="tempat_lhr" class="form-control" id="tempat_lhr"
                                                type="text" placeholder="Masukan Tempat Lahir" value=""
                                                required>
                                            <div class="invalid-feedback" id="error-tempat_lhr" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tgl_lhr"><span style="color: red">*
                                                </span>Tanggal Lahir</label>
                                            <input required class="form-control flatpickr" name="tgl_lhr" id="tgl_lhr"
                                                placeholder="Pilih Tanggal Lahir" type="text" value="">
                                            <div class="invalid-feedback" id="error-tgl_lhr" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="agama"><span style="color: red">*
                                                </span>Agama</label>
                                            <select class="form-select" name="agama" id="agama" required>
                                                <option selected disabled value="">Pilih Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                                            </select>
                                            <div class="invalid-feedback" id="error-agama" style="display: none;"></div>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="gol_darah"><span style="color: red">*
                                                </span>Golongan Darah</label>
                                            <select class="form-select" name="gol_darah" id="gol_darah" required>
                                                <option selected disabled value="">Pilih Golongan Darah</option>
                                                <option value="A">A</option>
                                                <option value="AB">AB</option>
                                                <option value="B">B</option>
                                                <option value="O">O</option>
                                            </select>
                                            <div class="invalid-feedback" id="error-gol_darah" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="status_nikah"><span style="color: red">*
                                                </span>Status Pernikahan</label>
                                            <select class="form-select" name="status_nikah" id="status_nikah" required>
                                                <option selected disabled value="">Pilih Status Pernikahan</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Lajang">Lajang</option>
                                                <option value="Cerai">Cerai</option>
                                            </select>
                                            <div class="invalid-feedback" id="error-status_nikah" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="alamat"><span style="color: red">*
                                                </span>Alamat KTP</label>
                                            <textarea name="alamat" class="form-control" id="alamat" rows="1" required></textarea>
                                            <div class="invalid-feedback" id="error-alamat" style="display: none;"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="alamat_domisili"><span style="color: red">*
                                                </span>Alamat Domisili</label>
                                            <textarea name="alamat_domisili" class="form-control" id="alamat_domisili" rows="1" required></textarea>
                                            <div class="invalid-feedback" id="error-alamat-domisili"
                                                style="display: none;"></div>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="telp"><span style="color: red">*
                                                </span>Nomor Telpon</label>
                                            <div class="input-group"><span class="input-group-text"
                                                    id="inputGroup-sizing-default">+62</span>
                                                <input name="telp" id="telp" class="form-control" type="number"
                                                    required>
                                                <div class="invalid-feedback" id="error-telp" style="display: none;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="email"><span style="color: red">*
                                                </span>Email</label>
                                            <input name="email" class="form-control" id="email" type="text"
                                                value="" required>
                                            <div class="invalid-feedback" id="error-email" style="display: none;"></div>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="nip"><span style="color: red">* </span>No
                                                KTP</label>
                                            <input name="nip" class="form-control" id="nip" type="number"
                                                value="" required>
                                            <div class="invalid-feedback" id="error-nip" style="display: none;"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label" for="file_ktp"><span style="color: red">*
                                                </span>File KTP</label>
                                            <input class="form-control" name="file_ktp" id="file_ktp" type="file"
                                                required="">
                                            <div class="invalid-feedback" id="error-file-ktp" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="sim">No SIM</label>
                                            <input name="sim" class="form-control" id="sim" type="text"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label class="form-label" for="file_sim">File SIM</label>
                                        <input class="form-control" name="file_sim" id="file_sim" type="file">
                                    </div>
                                </div>
                            </form>
                            <form class="stepper-two row g-3 needs-validation shipping-wizard" novalidate=""
                                enctype="multipart/form-data">
                                <div class="row g-3 custom-input">
                                    <h3>Data Karyawan</h3>
                                    <div class="row mb-3 mt-3">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="nik">NIK</label>
                                            <input disabled name="nik" class="form-control" id="nik"
                                                type="text" value="{{ $nikBaru }}">
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="company"><span style="color: red">*
                                                </span>Perusahaan</label>
                                            <select class="form-select" name="company" id="company" required>
                                                <option selected disabled value="">Pilih Perusahaan</option>
                                                <option value="KT">KT</option>
                                                <option value="TMI">TMI</option>
                                                <option value="JMP">JMP</option>
                                            </select>
                                            <div class="invalid-feedback" id="error-company" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="unit_kerja"><span style="color: red">*
                                                </span>Divisi</label>
                                            <select name="unit_kerja" id="unit_kerja" class="js-example-basic-single">
                                                <option selected disabled value="">Pilih Divisi</option>
                                                @foreach ($unit_kerja as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="error-divisi" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="id_departement"><span style="color: red">*
                                                </span>Departement</label>
                                            <select name="id_departement" id="id_departement"
                                                class="js-example-basic-single">
                                                <option selected disabled value="">Pilih Departemen</option>
                                                @foreach ($departments as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->nama_department }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="error-departement" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="jenis_peg"><span style="color: red">*
                                                </span>Jenis Pegawai</label>
                                            <select class="form-select" name="jenis_peg" id="jenis_peg" required>
                                                <option selected disabled value="">Pilih Jenis Pegawai</option>
                                                <option value="HO">HO</option>
                                                <option value="Lapangan">Lapangan</option>
                                                <option value="Shift">Shift</option>
                                            </select>
                                            <div class="invalid-feedback" id="error-jenis_peg" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="lok_kerja"><span style="color: red">*
                                                </span>Lokasi Kerja</label>
                                            <select name="lok_kerja" id="lok_kerja" class="js-example-basic-single">
                                                <option selected disabled value="">Pilih Lokasi Kerja</option>
                                                @foreach ($masterLokasi as $lokasi)
                                                    <option value="{{ $lokasi->nama_lok_kerja }}">
                                                        {{ $lokasi->nama_lok_kerja }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="error-lokasi-kerja" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                                            <input class="form-control flatpickr" name="tanggal_masuk" id="tanggal_masuk"
                                                type="text" value="">
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="status_kepeg"><span style="color: red">*
                                                </span>Status Kepegawaian</label>
                                            <select class="form-select" name="status_kepeg" id="status_kepeg" required>
                                                <option selected disabled value="">Pilih Status Kepegawaian</option>
                                                <option value="PKWT">PKWT</option>
                                                <option value="PKWTT">PKWTT</option>
                                            </select>
                                            <div class="invalid-feedback" id="error-status_kepeg" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tgl_kontrak">Tanggal Kontrak</label>
                                            <input class="form-control flatpickr" name="tgl_kontrak" id="tgl_kontrak"
                                                placeholder="Pilih Tanggal Kontrak" type="text" value="">
                                        </div>
                                    </div>
                                    <h3>Jabatan</h3>
                                    <div class="row mt-3">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="jabatan"><span style="color: red">*
                                                </span>Jabatan</label>
                                            <select name="jabatan" id="jabatan" class="js-example-basic-single">
                                                <option selected disabled value="">Pilih Jabatan</option>
                                                @foreach ($masterJabatan as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->nama_masterjab }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="error-jabatan" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="eselon"><span style="color: red">*
                                                </span>Grade</label>
                                            <select name="eselon" id="eselon" class="js-example-basic-single">
                                                <option selected disabled value="">Pilih Grade</option>
                                                @foreach ($masterGrade as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->nama_masteresl }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="error-eselon" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="posisi"><span style="color: red">*
                                                </span>Posisi</label>
                                            <select name="posisi" id="posisi" class="js-example-basic-single">
                                                <option selected disabled value="">Pilih Posisi</option>
                                                @foreach ($masterPosisi as $posisi)
                                                    <option value="{{ $posisi->nama_posisi }}">
                                                        {{ $posisi->nama_posisi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="error-posisi" style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="no_sk">Nomor SK</label>
                                            <input name="no_sk" class="form-control" id="no_sk" type="text"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tgl_sk">Tanggal SK</label>
                                            <input class="form-control flatpickr" name="tgl_sk" id="tgl_sk"
                                                type="text" value="">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label" for="formFile">File SK</label>
                                            <input class="form-control" name="file" id="formFile" type="file">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form class="stepper-three row g-3 needs-validation shipping-wizard" novalidate="">
                                <div class="row g-3 custom-input">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="unit_approval"><span style="color: red">*
                                                </span>Unit(Staff)</label>
                                            <select name="unit_approval" id="unit_approval"
                                                class="js-example-basic-single">
                                                <option value="-">-</option>
                                                {{-- @foreach ($dataHirarki as $rowUnit)
                                                    <option value="{{ $rowUnit->nik }}">
                                                        {{ $rowUnit->nama }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            <div class="invalid-feedback" id="error-unit-approval"
                                                style="display: none;"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="subsi_approval"><span style="color: red">*
                                                </span>Subsi(SPV)</label>
                                            <select name="subsi_approval" id="subsi_approval"
                                                class="js-example-basic-single">
                                                <option value="-">-</option>
                                                {{-- @foreach ($dataHirarki as $rowSubsi)
                                                    <option value="{{ $rowSubsi->nik }}">
                                                        {{ $rowSubsi->nama }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            <div class="invalid-feedback" id="error-subsi-approval"
                                                style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="kasie_approval"><span style="color: red">*
                                                </span>Kasie(Manager)</label>
                                            <select name="kasie_approval" id="kasie_approval"
                                                class="js-example-basic-single">
                                                <option value="-">-</option>
                                                {{-- @foreach ($dataHirarki as $rowKasie)
                                                    <option value="{{ $rowKasie->nik }}">
                                                        {{ $rowKasie->nama }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            <div class="invalid-feedback" id="error-kasie-approval"
                                                style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="kadept_approval"><span style="color: red">*
                                                </span>Kadept(Senior Manager)</label>
                                            <select name="kadept_approval" id="kadept_approval"
                                                class="js-example-basic-single">
                                                <option value="-">-</option>
                                                {{-- @foreach ($dataHirarki as $rowKadept)
                                                    <option value="{{ $rowKadept->nik }}">
                                                        {{ $rowKadept->nama }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            <div class="invalid-feedback" id="error-kadept-approval"
                                                style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="kadiv_approval"><span style="color: red">*
                                                </span>Kadiv(GM)</label>
                                            <select name="kadiv_approval" id="kadiv_approval"
                                                class="js-example-basic-single">
                                                <option value="-">-</option>
                                                {{-- @foreach ($dataHirarki as $rowKadiv)
                                                    <option value="{{ $rowKadiv->nik }}">
                                                        {{ $rowKadiv->nama }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            <div class="invalid-feedback" id="error-kadiv-approval"
                                                style="display: none;">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="direktorat_approval"><span
                                                    style="color: red">*
                                                </span>Direktorat(Direktur)</label>
                                            <select name="direktorat_approval" id="direktorat_approval"
                                                class="js-example-basic-single">
                                                <option value="-">-</option>
                                                @foreach ($dataDirektorat as $rowDirektorat)
                                                    <option value="{{ $rowDirektorat->nik }}">
                                                        {{ $rowDirektorat->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="error-direktorat-approval"
                                                style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="container px-4">
                                <form class="stepper-four row g-3 needs-validation shipping-wizard" novalidate="">
                                    <div class="row g-3 custom-input">
                                        <div class="mt-2 mb-3 p-3" style="border: 2px solid black; border-radius: 15px;">
                                            <h6 class="mb-2">Atasan Cuti & Izin</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="atasan1_general"><span
                                                            style="color: red">*</span>Atasan 1</label>
                                                    <select name="atasan1_general" id="atasan1_general"
                                                        class="js-example-basic-single" required>
                                                        <option value="">...</option>
                                                        {{-- @foreach ($dataApproval as $rowAtasan)
                                                            <option value="{{ $rowAtasan->nik }}">{{ $rowAtasan->nama }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                    <div class="invalid-feedback" id="error-atasan1-cuti"
                                                        style="display: none;">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="atasan2_general"><span
                                                            style="color: red">*
                                                        </span>Atasan 2</label>
                                                    <select name="atasan2_general" id="atasan2_general"
                                                        class="js-example-basic-single" required>
                                                        <option value="">...</option>
                                                        {{-- @foreach ($dataApproval as $rowAtasan)
                                                            <option value="{{ $rowAtasan->nik }}">
                                                                {{ $rowAtasan->nama }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                    <div class="invalid-feedback" id="error-atasan2-cuti"
                                                        style="display: none;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2 mb-3 p-3" style="border: 2px solid black; border-radius: 15px;">
                                            <h6 class="mb-2">Atasan SPD</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="atasan1_spd"><span
                                                            style="color: red">*
                                                        </span>Atasan 1</label>
                                                    <select name="atasan1_spd" id="atasan1_spd"
                                                        class="js-example-basic-single" required>
                                                        <option value="">...</option>
                                                        {{-- @foreach ($dataApproval as $rowAtasan)
                                                            <option value="{{ $rowAtasan->nik }}">
                                                                {{ $rowAtasan->nama }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                    <div class="invalid-feedback" id="error-atasan1-spd"
                                                        style="display: none;">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="atasan2_spd"><span
                                                            style="color: red">*
                                                        </span>Atasan 2</label>
                                                    <select name="atasan2_spd" id="atasan2_spd"
                                                        class="js-example-basic-single" required>
                                                        <option value="">...</option>
                                                        {{-- @foreach ($dataApproval as $rowAtasan)
                                                            <option value="{{ $rowAtasan->nik }}">
                                                                {{ $rowAtasan->nama }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                    <div class="invalid-feedback" id="error-atasan2-spd"
                                                        style="display: none;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2 mb-3 p-3" style="border: 2px solid black; border-radius: 15px;">
                                            <h6 class="mb-2">Atasan Kendaraan Operasional</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="atasan1_ko"><span style="color: red">*
                                                        </span>Atasan 1</label>
                                                    <select name="atasan1_ko" id="atasan1_ko"
                                                        class="js-example-basic-single" required>
                                                        <option value="">...</option>
                                                        {{-- @foreach ($dataApproval as $rowAtasan)
                                                            <option value="{{ $rowAtasan->nik }}">
                                                                {{ $rowAtasan->nama }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                    <div class="invalid-feedback" id="error-atasan1-kendaraan-operasional"
                                                        style="display: none;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <form class="stepper-five row g-3 needs-validation shipping-wizard" novalidate="">
                                <div class="col-12 order-xl-0 order-sm-1">
                                    <div class="card-wrapper border rounded-3 h-100 checkbox-checked">
                                        <h6 class="sub-title">Pilih Aplikasi Yang Bisa Dibuka User</h6>
                                        <div class="form-check checkbox checkbox-primary ps-0 main-icon-checkbox">
                                            <ul class="checkbox-wrapper">
                                                <li>
                                                    <input class="form-check-input checkbox-shadow" id="checkbox-hris"
                                                        type="checkbox" name="apps[]" value="hris" checked="">
                                                    <label
                                                        class="form-check-label text-center d-flex flex-column align-items-center"
                                                        for="checkbox-hris">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="55"
                                                            height="55" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="m16 21l-.3-1.5q-.3-.125-.562-.262T14.6 18.9l-1.45.45l-1-1.7l1.15-1q-.05-.35-.05-.65t.05-.65l-1.15-1l1-1.7l1.45.45q.275-.2.538-.337t.562-.263L16 11h2l.3 1.5q.3.125.563.275t.537.375l1.45-.5l1 1.75l-1.15 1q.05.3.05.625t-.05.625l1.15 1l-1 1.7l-1.45-.45q-.275.2-.537.338t-.563.262L18 21zM2 20v-2.8q0-.825.425-1.55t1.175-1.1q1.275-.65 2.875-1.1T10 13h.35q.15 0 .3.05q-.725 1.8-.6 3.575T11.25 20zm15-2q.825 0 1.413-.587T19 16t-.587-1.412T17 14t-1.412.588T15 16t.588 1.413T17 18m-7-6q-1.65 0-2.825-1.175T6 8t1.175-2.825T10 4t2.825 1.175T14 8t-1.175 2.825T10 12" />
                                                        </svg>
                                                        <span class="mt-2">HRIS</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input class="form-check-input checkbox-shadow" id="checkbox-aas"
                                                        type="checkbox" name="apps[]" value="aas">
                                                    <label
                                                        class="form-check-label text-center d-flex flex-column align-items-center"
                                                        for="checkbox-aas">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="55"
                                                            height="55" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="m16 21l-.3-1.5q-.3-.125-.562-.262T14.6 18.9l-1.45.45l-1-1.7l1.15-1q-.05-.35-.05-.65t.05-.65l-1.15-1l1-1.7l1.45.45q.275-.2.538-.337t.562-.263L16 11h2l.3 1.5q.3.125.563.275t.537.375l1.45-.5l1 1.75l-1.15 1q.05.3.05.625t-.05.625l1.15 1l-1 1.7l-1.45-.45q-.275.2-.537.338t-.563.262L18 21zM2 20v-2.8q0-.825.425-1.55t1.175-1.1q1.275-.65 2.875-1.1T10 13h.35q.15 0 .3.05q-.725 1.8-.6 3.575T11.25 20zm15-2q.825 0 1.413-.587T19 16t-.587-1.412T17 14t-1.412.588T15 16t.588 1.413T17 18m-7-6q-1.65 0-2.825-1.175T6 8t1.175-2.825T10 4t2.825 1.175T14 8t-1.175 2.825T10 12" />
                                                        </svg>
                                                        <span class="mt-2">AAS</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input class="form-check-input checkbox-shadow" id="checkbox-ams"
                                                        type="checkbox" name="apps[]" value="ams">
                                                    <label
                                                        class="form-check-label text-center d-flex flex-column align-items-center"
                                                        for="checkbox-ams">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="55"
                                                            height="55" viewBox="0 0 2048 2048">
                                                            <path fill="currentColor"
                                                                d="M1792 1280h256v768H1024v-768h256v-256h512zm-384-128v128h256v-128zm512 768v-256h-128v128h-128v-128h-256v128h-128v-128h-128v256zm0-384v-128h-768v128zm-768-512v128H896v256H640v-128h128v-128H512v256H0V640h128V128h1536v768h-128V256H256v384h256v384zm-768 256V768H128v512z" />
                                                        </svg>
                                                        <span class="mt-2">AMS</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input class="form-check-input checkbox-shadow" id="checkbox-ims"
                                                        type="checkbox" name="apps[]" value="ims">
                                                    <label
                                                        class="form-check-label text-center d-flex flex-column align-items-center"
                                                        for="checkbox-ims">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="55"
                                                            height="55" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M13.986 4a2.25 2.25 0 0 0-2.236-2h-3.5a2.25 2.25 0 0 0-2.236 2H4.25A2.25 2.25 0 0 0 2 6.25v13.5A2.25 2.25 0 0 0 4.25 22h8.56a6.5 6.5 0 0 1-1.078-1.5H4.25a.75.75 0 0 1-.75-.75V6.25a.75.75 0 0 1 .75-.75h2.129c.404.603 1.091 1 1.871 1h3.5c.78 0 1.467-.397 1.871-1h2.129a.75.75 0 0 1 .75.75v4.826a6.6 6.6 0 0 1 1.5-.057V6.25A2.25 2.25 0 0 0 15.75 4zm.009.096L14 4.25q0-.078-.005-.154M8.25 3.5h3.5a.75.75 0 0 1 0 1.5h-3.5a.75.75 0 0 1 0-1.5m3.707 10.604a6.5 6.5 0 0 1 2.147-2.147l.926-.927a.75.75 0 1 0-1.06-1.06L9 14.94l-1.97-1.97a.75.75 0 0 0-1.06 1.06l2.5 2.5a.75.75 0 0 0 1.06 0zM23 17.5a5.5 5.5 0 1 0-11 0a5.5 5.5 0 0 0 11 0m-5 .5l.001 2.503a.5.5 0 1 1-1 0V18h-2.505a.5.5 0 0 1 0-1H17v-2.5a.5.5 0 1 1 1 0V17h2.497a.5.5 0 0 1 0 1z" />
                                                        </svg>
                                                        <span class="mt-2">IMS</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input class="form-check-input checkbox-shadow" id="checkbox-shocart"
                                                        type="checkbox" name="apps[]" value="shocart" checked="">
                                                    <label
                                                        class="form-check-label text-center d-flex flex-column align-items-center"
                                                        for="checkbox-shocart">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="55"
                                                            height="55" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25q0-.075.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2" />
                                                        </svg>
                                                        <span class="mt-2">SHOCART</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input class="form-check-input checkbox-shadow" id="checkbox-helpdesk"
                                                        type="checkbox" name="apps[]" value="helpdesk" checked="">
                                                    <label
                                                        class="form-check-label text-center d-flex flex-column align-items-center"
                                                        for="checkbox-helpdesk">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="55"
                                                            height="55" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="m22.77 19.32l-1.07-.82c.02-.17.04-.33.04-.5s-.01-.33-.04-.5l1.06-.82a.26.26 0 0 0 .06-.32l-1-1.73c-.06-.13-.19-.13-.32-.13l-1.23.5c-.27-.18-.54-.35-.85-.47l-.19-1.32A.236.236 0 0 0 19 13h-2a.26.26 0 0 0-.26.21l-.19 1.32c-.3.13-.59.29-.85.47l-1.24-.5c-.11 0-.24 0-.31.13l-1 1.73c-.06.11-.04.24.06.32l1.06.82a4.2 4.2 0 0 0 0 1l-1.06.82a.26.26 0 0 0-.06.32l1 1.73c.06.13.19.13.31.13l1.24-.5c.26.18.54.35.85.47l.19 1.32c.02.12.12.21.26.21h2c.11 0 .22-.09.24-.21l.19-1.32c.3-.13.57-.29.84-.47l1.23.5c.13 0 .26 0 .33-.13l1-1.73a.26.26 0 0 0-.06-.32M18 19.5c-.84 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5s1.5.67 1.5 1.5s-.67 1.5-1.5 1.5m-.38-16.28c-.19-.14-.4-.22-.62-.22H3c-.22 0-.43.08-.62.22a1 1 0 0 0-.17 1.4L7 10.75v5.12c-.04.29.06.6.29.83l4.01 4.01c.1.1.2.17.35.22C11.22 20 11 19 11 18c0-1.83.72-3.59 2-4.9v-2.35l4.79-6.13a1 1 0 0 0-.17-1.4M11 10.05v7.53l-2-2v-5.52L5.04 5h9.92z" />
                                                        </svg>
                                                        <span class="mt-2">HELPDESK</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input class="form-check-input checkbox-shadow" id="checkbox-das"
                                                        type="checkbox" name="apps[]" value="das">
                                                    <label
                                                        class="form-check-label text-center d-flex flex-column align-items-center"
                                                        for="checkbox-das">
                                                        <svg width="55" height="55"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M64 112c-8.8 0-16 7.2-16 16l0 22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1l0-22.1c0-8.8-7.2-16-16-16L64 112zM48 212.2L48 384c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-171.8L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64l384 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128z" />
                                                        </svg>
                                                        <span class="mt-2">DAS</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input class="form-check-input checkbox-shadow" id="checkbox-rms"
                                                        type="checkbox" name="apps[]" value="rms">
                                                    <label
                                                        class="form-check-label text-center d-flex flex-column align-items-center"
                                                        for="checkbox-rms">
                                                        <svg width="55" height="55"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64L0 400c0 44.2 35.8 80 80 80l400 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 416c-8.8 0-16-7.2-16-16L64 64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z" />
                                                        </svg>
                                                        <span class="mt-2">RMS</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input class="form-check-input checkbox-shadow" id="checkbox-dms"
                                                        type="checkbox" name="apps[]" value="dms">
                                                    <label
                                                        class="form-check-label text-center d-flex flex-column align-items-center"
                                                        for="checkbox-dms">
                                                        <svg width="55" height="55"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                            <path
                                                                d="M384 96l0 224L64 320 64 96l320 0zM64 32C28.7 32 0 60.7 0 96L0 320c0 35.3 28.7 64 64 64l117.3 0-10.7 32L96 416c-17.7 0-32 14.3-32 32s14.3 32 32 32l256 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-74.7 0-10.7-32L384 384c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L64 32zm464 0c-26.5 0-48 21.5-48 48l0 352c0 26.5 21.5 48 48 48l64 0c26.5 0 48-21.5 48-48l0-352c0-26.5-21.5-48-48-48l-64 0zm16 64l32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm-16 80c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16zm32 160a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                                        </svg>
                                                        <span class="mt-2">DMS</span>
                                                    </label>
                                                </li>

                                            </ul>
                                        </div>
                                        <div id="aas-inputs" class="form-check-size rtl-input mt-4 mb-3"
                                            style="display: none;">
                                            {{-- <label class="form-label" for="aas_menu">AAS Menu</label> --}}
                                            <h6 class="mb-2" style="font-weight: 400; font-size: 15px">AAS Menu</h6>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input me-2" name="aas_p" id="aas_p"
                                                    type="checkbox" value="1">
                                                <label class="form-check-label" for="aas_p">Petty Cash</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input me-2" name = "aas_c" id="aas_c"
                                                    type="checkbox" value="1">
                                                <label class="form-check-label" for="aas_c">Cash Advance</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input me-2" name = "aas_r" id="aas_r"
                                                    type="checkbox" value="1">
                                                <label class="form-check-label" for="aas_r">Realisasi</label>
                                            </div>
                                        </div>
                                        <div id="ams-inputs" class="mt-2" style="display: none;">
                                            <div>
                                                <label class="form-label" for="ams_role">AMS Role</label>
                                                <select name="ams_role" id="ams_role"
                                                    class="js-example-basic-single form-control">
                                                    <option value="">Pilih Ams Role</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label" for="ams_location">AMS Location</label>
                                                <select name="ams_location" id="ams_location"
                                                    class="js-example-basic-single form-control">
                                                    <option value="">Pilih Ams Location</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location['id'] }}">{{ $location['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div id="ims-inputs" style="display: none;">
                                            <label for="ims_hirarki">Hirarki IMS</label>
                                            <select name="ims_hirarki" id="ims_hirarki"
                                                class="js-example-basic-single form-control">
                                                <option value="">Pilih Hirarki Ims</option>
                                                @foreach ($hirarkiDataIms as $hirarkiData)
                                                    <option value="{{ $hirarkiData['id'] }}">{{ $hirarkiData['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form class="stepper-six row g-3 needs-validation shipping-wizard" novalidate="">
                                <div class="col-12 mt-4">
                                    <div class="successful-form"><img class="img-fluid"
                                            src="{{ asset('assets/images/gif/dashboard-8/successful.gif') }}"
                                            alt="successful">
                                        <h6>Congratulations </h6>
                                        <p>Well done! You have successfully completed. </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="wizard-footer d-flex gap-2 justify-content-end mt-3">
                            <button class="btn button-light-primary" id="backbtn" onclick="backStep()">
                                Kembali</button>
                            <button class="btn btn-primary" id="nextbtn" onclick="nextStep()">Simpan & Lanjut</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('script')
    <script src="{{ asset('assets/js/form-wizard/custom-number-wizard.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/custom_seller.js') }}"></script> --}}
    <script src="{{ asset('assets/js/select/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('assets/js/flat-pickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/flat-pickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Atasan Script !-->
    <!-- jQuery dulu -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CSS Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- JS Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Baru inisialisasi -->
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            $('.js-example-basic-single').select2({
                width: '100%'
            });

            // Fokus otomatis ke input pencarian saat dropdown dibuka
            $('.js-example-basic-single').on('select2:open', function() {
                let input = document.querySelector('.select2-container--open .select2-search__field');
                if (input) {
                    input.focus();
                }
            });
        });
    </script>

    <script>
        // Jangan lupa update fungsi preview karena ID berubah
        function previewFotoKaryawan(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview-foto-karyawan');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script>
        flatpickr("#tgl_lhr", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        flatpickr("#tanggal_masuk", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        flatpickr("#tgl_kontrak", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        flatpickr("#tgl_sk", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxAas = document.getElementById('checkbox-aas');
            const checkboxAms = document.getElementById('checkbox-ams');
            const checkboxIms = document.getElementById('checkbox-ims');

            const aasInputs = document.getElementById('aas-inputs');
            const amsInputs = document.getElementById('ams-inputs');
            const imsInputs = document.getElementById('ims-inputs');

            checkboxAas.addEventListener('change', function() {
                aasInputs.style.display = this.checked ? 'block' : 'none';
            });

            checkboxAms.addEventListener('change', function() {
                amsInputs.style.display = this.checked ? 'block' : 'none';
            });

            checkboxIms.addEventListener('change', function() {
                imsInputs.style.display = this.checked ? 'block' : 'none';
            });
        });
    </script>

    <script>
        // Add this function to validate the nama field
        // function validateNamaField() {
        //     const namaField = document.getElementById('nama');
        //     const errorElement = document.getElementById('error-nama');

        //     if (!namaField.value.trim()) {
        //         // Show error message
        //         errorElement.textContent = "Nama Karyawan wajib diisi.";
        //         errorElement.style.display = "block";
        //         namaField.classList.add("is-invalid");
        //         return false;
        //     } else {
        //         // Clear error message
        //         errorElement.style.display = "none";
        //         namaField.classList.remove("is-invalid");
        //         namaField.classList.add("is-valid");
        //         return true;
        //     }
        // }

        // General function to validate required fields (used for step 2)
        function validateField(id, message) {
            const field = document.getElementById(id);
            let error = document.getElementById(`error-${id}`);

            if (!error) {
                // Create error element if it doesn't exist
                error = document.createElement('div');
                error.id = `error-${id}`;
                error.className = 'invalid-feedback';
                error.style.display = 'none';
                field.parentNode.appendChild(error);
                // error.style.marginTop = "-10px";
                error.style.marginBottom = "10px";
            }

            if (!field.value.trim()) {
                error.textContent = message;
                error.style.display = "block";
                field.classList.add("is-invalid");
                return false;
            } else {
                error.style.display = "none";
                field.classList.remove("is-invalid");
                field.classList.add("is-valid");
                return true;
            }
        }

        function validateField2(id, message) {
            const field = document.getElementById(id);
            let error = document.getElementById(`error-${id}`);

            if (!error) {
                // Create error element if it doesn't exist
                error = document.createElement('div');
                error.id = `error-${id}`;
                error.className = 'invalid-feedback';
                error.style.display = 'none';
                field.parentNode.appendChild(error);
                error.style.marginTop = "-10px";
                error.style.marginBottom = "10px";
            }

            if (!field.value.trim()) {
                error.textContent = message;
                error.style.display = "block";
                field.classList.add("is-invalid");
                return false;
            } else {
                error.style.display = "none";
                field.classList.remove("is-invalid");
                field.classList.add("is-valid");
                return true;
            }
        }

        //Validate all required fields on step 1
        function validateRequiredFieldsStep1() {
            let valid = true;

            valid &= validateField('nama', 'Nama wajib diisi.');
            valid &= validateField('jk', 'Jenis kelamin wajib diisi.');
            valid &= validateField('tempat_lhr', 'Tempat lahir wajib diisi.');
            valid &= validateField('tgl_lhr', 'Tanggal lahir wajib diisi.');
            valid &= validateField('agama', 'Agama wajib dipilih.');
            valid &= validateField('gol_darah', 'Golongan darah wajib dipilih.');
            valid &= validateField('status_nikah', 'Status pernikahan wajib dipilih.');
            valid &= validateField('alamat', 'Alamat ktp wajib diisi.');
            valid &= validateField('alamat_domisili', 'Alamat domisili wajib diisi.');
            valid &= validateField('telp', 'Nomor telpon wajib diisi.');
            valid &= validateField('email', 'Email wajib diisi.');
            valid &= validateField('nip', 'No KTP wajib diisi.');
            valid &= validateField('file_ktp', 'File KTP wajib diisi.');

            return !!valid;
        }

        // Validate all required fields on step 2
        function validateRequiredFieldsStep2() {
            let valid = true;

            valid &= validateField('company', 'Perusahaan wajib dipilih.');
            valid &= validateField('unit_kerja', 'Divisi wajib dipilih.');
            valid &= validateField('id_departement', 'Departement wajib dipilih.');
            valid &= validateField('status_kepeg', 'Status Kepegawaian wajib dipilih.');
            valid &= validateField('lok_kerja', 'Lokasi Kerja wajib diisi.');
            valid &= validateField('jenis_peg', 'Jenis Pegawai wajib dipilih.');
            valid &= validateField('jabatan', 'Jabatan wajib dipilih.');
            valid &= validateField('eselon', 'Grade wajib dipilih.');
            valid &= validateField('posisi', 'Posisi wajib diisi.');

            return !!valid;
        }

        function validateRequiredFieldsStep3() {
            let valid = true;

            valid &= validateField2('unit_approval', 'Unit Approval wajib dipilih.');
            valid &= validateField2('subsi_approval', 'Subsi Approval cuti wajib dipilih.');
            valid &= validateField2('kasie_approval', 'Kasih Approval wajib dipilih.');
            valid &= validateField2('kadept_approval', 'Kadept Approval spd wajib dipilih.');
            valid &= validateField2('kadiv_approval', 'Kadiv Approval kendaraan operasional wajib dipilih.');
            valid &= validateField2('direktorat_approval', 'Direktorat Approval kendaraan operasional wajib dipilih.');
            return !!valid;
        }

        function validateRequiredFieldsStep4() {
            let valid = true;

            valid &= validateField2('atasan1_general', 'Atasan 1 cuti wajib dipilih.');
            valid &= validateField2('atasan2_general', 'Atasan 2 cuti wajib dipilih.');
            valid &= validateField2('atasan1_spd', 'Atasan 1 spd wajib dipilih.');
            valid &= validateField2('atasan2_spd', 'Atasan 2 spd wajib dipilih.');
            valid &= validateField2('atasan1_ko', 'Atasan 1 kendaraan operasional wajib dipilih.');
            return !!valid;
        }


        function collectFormData() {
            const formData = {
                // Step 1
                nama: document.getElementById('nama').value,
                jk: document.getElementById('jk').value,
                tempat_lhr: document.getElementById('tempat_lhr').value,
                tgl_lhr: document.getElementById('tgl_lhr').value,
                agama: document.getElementById('agama').value,
                gol_darah: document.getElementById('gol_darah').value,
                status_nikah: document.getElementById('status_nikah').value,
                alamat: document.getElementById('alamat').value,
                alamat_domisili: document.getElementById('alamat_domisili').value,
                telp: document.getElementById('telp').value,
                email: document.getElementById('email').value,
                nip: document.getElementById('nip').value,
                sim: document.getElementById('sim').value,

                // Step 2
                nik: document.getElementById('nik').value,
                company: document.getElementById('company').value,
                unit_kerja: document.getElementById('unit_kerja').value,
                id_departement: document.getElementById('id_departement').value,
                status_kepeg: document.getElementById('status_kepeg').value,
                tanggal_masuk: document.getElementById('tanggal_masuk').value,
                lok_kerja: document.getElementById('lok_kerja').value,
                jenis_peg: document.getElementById('jenis_peg').value,
                tgl_kontrak: document.getElementById('tgl_kontrak').value,
                jabatan: document.getElementById('jabatan').value,
                eselon: document.getElementById('eselon').value,
                posisi: document.getElementById('posisi').value,
                no_sk: document.getElementById('no_sk').value,
                tgl_sk: document.getElementById('tgl_sk').value,

                //Step 3
                unit_approval: document.getElementById('unit_approval').value,
                subsi_approval: document.getElementById('subsi_approval').value,
                kasie_approval: document.getElementById('kasie_approval').value,
                kadept_approval: document.getElementById('kadept_approval').value,
                kadiv_approval: document.getElementById('kadiv_approval').value,
                direktorat_approval: document.getElementById('direktorat_approval').value,

                // Step 4
                atasan1_general: document.getElementById('atasan1_general').value,
                atasan2_general: document.getElementById('atasan2_general').value,
                atasan1_spd: document.getElementById('atasan1_spd').value,
                atasan2_spd: document.getElementById('atasan2_spd').value,
                atasan1_ko: document.getElementById('atasan1_ko').value,

                // Step 5
                apps: Array.from(document.querySelectorAll('input[name="apps[]"]:checked')).map(el => el.value),
                aas_p: document.getElementById('aas_p').checked,
                aas_c: document.getElementById('aas_c').checked,
                aas_r: document.getElementById('aas_r').checked,
                ams_role: document.getElementById('ams_role').value,
                ams_location: document.getElementById('ams_location').value,
                ims_hirarki: document.getElementById('ims_hirarki').value
            };

            return formData;
        }

        // Fungsi untuk menampilkan loading indicator pada tombol
        function showLoadingButton(button) {
            // Simpan teks asli tombol
            button.setAttribute('data-original-text', button.textContent);

            // Buat spinner
            const spinner = document.createElement('span');
            spinner.className = 'spinner-border spinner-border-sm me-2';
            spinner.setAttribute('role', 'status');
            spinner.setAttribute('aria-hidden', 'true');

            // Kosongkan tombol dan tambahkan spinner + teks "Loading..."
            button.disabled = true;
            button.innerHTML = '';
            button.appendChild(spinner);
            button.appendChild(document.createTextNode(' Loading...'));
        }

        // Fungsi untuk mengembalikan tombol ke keadaan normal
        function resetButton(button) {
            // Kembalikan teks asli tombol
            button.innerHTML = button.getAttribute('data-original-text');
            button.disabled = false;
        }

        async function submitForm() {
            // Gunakan FormData untuk mengirim file bersama data lain
            const fileInput = document.getElementById('formFile');
            const fotoInput = document.getElementById('foto-karyawan');
            const fileKtpInput = document.getElementById('file_ktp');
            const fileSimInput = document.getElementById('file_sim');
            const formDataObj = new FormData();

            // Tambahkan semua data formulir ke FormData
            const formData = collectFormData();

            // Tambahkan semua field ke FormData
            Object.keys(formData).forEach(key => {
                // Untuk input checkbox yang bisa multiple (apps[])
                if (key === 'apps') {
                    formData[key].forEach(app => {
                        formDataObj.append('apps[]', app);
                    });
                }
                // Untuk checkbox boolean
                else if (key === 'aas_p' || key === 'aas_c' || key === 'aas_r') {
                    formDataObj.append(key, formData[key] ? '1' : '0');
                }
                // Field biasa
                else {
                    formDataObj.append(key, formData[key] || '');
                }
            });

            // Tambahkan file jika ada
            if (fileInput.files.length > 0) {
                formDataObj.append('file', fileInput.files[0]);
            }

            if (fotoInput.files.length > 0) {
                formDataObj.append('foto', fotoInput.files[0]);
            }

            if (fileKtpInput.files.length > 0) {
                formDataObj.append('file_ktp', fileKtpInput.files[0]);
            }

            if (fileSimInput.files.length > 0) {
                formDataObj.append('file_sim', fileSimInput.files[0]);
            }

            const submitButton = document.getElementById('nextbtn');

            // Tampilkan loading indicator
            showLoadingButton(submitButton);

            try {
                const response = await fetch('/employee/store', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                        // Jangan tambahkan Content-Type di sini, browser akan otomatis menambahkan
                        // dengan boundary yang tepat untuk FormData
                    },
                    body: formDataObj
                });

                const data = await response.json();

                // Kembalikan tombol ke keadaan normal
                resetButton(submitButton);

                if (data.success) {
                    // Tampilkan pesan sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = '/employee'; // Sesuaikan dengan route yang diinginkan
                    });
                } else {
                    throw new Error(data.message);
                }
            } catch (error) {
                // Kembalikan tombol ke keadaan normal jika terjadi error
                resetButton(submitButton);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: error.message
                });
            }
        }

        function backStep() {
            currentStep--;
            var stepper = document.getElementById("stepper1");
            var steps = stepper.getElementsByClassName("step");
            let stepLength = steps.length;
            document.getElementById("nextbtn").textContent = "Simpan & Lanjut";
            document.getElementById("nextbtn").disabled = false;
            if (currentStep < stepLength - 1) {
                document.getElementById("backbtn").disabled = false;
                fieldsets[currentStep + 1].style.display = "none";
                fieldsets[currentStep].style.display = "flex";
                removeClass(steps[currentStep], "done");
                removeClass(steps[currentStep], "active");
                if (currentStep == 0) {
                document.getElementById("backbtn").disabled = true;
                }
            } else {
                removeClass(steps[currentStep], "done");
                removeClass(steps[currentStep], "active");
            }
        }

        // The original nextStep function with validation added
        function nextStep() {
            // Jika di step terakhir, submit form
            if (currentStep === 5) {
                submitForm();
                return;
            }

            // Validasi step 1 (Informasi Pribadi)
            if (currentStep === 0 && !validateRequiredFieldsStep1()) {
                return;
            }

            // Validasi step 2 (Data Karyawan)
            if (currentStep === 1 && !validateRequiredFieldsStep2()) {
                return;
            }

            // Validasi step 3 (Strutktur Orchart)
            if (currentStep === 2 && !validateRequiredFieldsStep3()) {
                return;
            }

            // Validasi step 4 (Approval Karyawan)
            if (currentStep === 3 && !validateRequiredFieldsStep4()) {
                return;
            }

            // Lanjut ke step berikutnya
            document.getElementById("backbtn").disabled = false;
            currentStep++;

            // Update UI stepper
            var stepper = document.getElementById("stepper1");
            var steps = stepper.getElementsByClassName("step");

            Array.from(steps).forEach((step, index) => {
                let stepNum = index + 1;
                let stepLength = steps.length;

                if (stepNum === currentStep && currentStep < stepLength) {
                    addClass(step, "editing");
                    fieldsets[currentStep].style.display = "flex";
                } else {
                    removeClass(step, "editing");
                }

                if (stepNum <= currentStep) {
                    addClass(step, "done");
                    addClass(step, "active");
                    removeClass(step, "editing");
                    if (fieldsets[currentStep - 1]) {
                        fieldsets[currentStep - 1].style.display = "none";
                    }
                } else {
                    removeClass(step, "done");
                }

                if (currentStep === stepLength - 1) {
                    document.getElementById("nextbtn").textContent = "Selesai";
                }
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tunggu sampai semua element dan library ter-load
            setTimeout(function() {
                initializeJabatanHandler();
            }, 500);
        });

        function initializeJabatanHandler() {
            const jabatanSelect = document.getElementById('jabatan');

            if (!jabatanSelect) {
                console.error('Jabatan select element not found');
                return;
            }

            // Remove existing event listeners to prevent duplicates
            jabatanSelect.removeEventListener('change', handleJabatanChange);

            // Add the event listener
            jabatanSelect.addEventListener('change', handleJabatanChange);

            // If using Select2, also handle Select2 change event
            if (typeof $ !== 'undefined' && $(jabatanSelect).hasClass('js-example-basic-single')) {
                $(jabatanSelect).off('change.jabatan').on('change.jabatan', function() {
                    handleJabatanChange();
                });
            }
        }

        function handleJabatanChange() {
            const jabatanSelect = document.getElementById('jabatan');
            const selectedJabatan = parseInt(jabatanSelect.value);

            console.log('Jabatan changed to:', selectedJabatan); // Debug log

            if (!selectedJabatan) {
                clearStructureChartFields();
                return;
            }

            // Get current employee data
            const currentNik = getCurrentNik();
            const currentName = getCurrentName();

            console.log('Current NIK:', currentNik, 'Current Name:', currentName); // Debug log

            if (!currentNik || !currentName) {
                console.warn('NIK or Name is empty');
                alert('Mohon lengkapi Nama Karyawan terlebih dahulu sebelum memilih jabatan');
                jabatanSelect.value = '';
                if (typeof $ !== 'undefined' && $(jabatanSelect).hasClass('js-example-basic-single')) {
                    $(jabatanSelect).trigger('change');
                }
                return;
            }

            // Clear all structure chart fields first
            clearStructureChartFields();

            // Add delay to ensure clearing is complete
            setTimeout(function() {
                // Populate appropriate field based on selected jabatan
                switch (selectedJabatan) {
                    case 1: // Staff
                        populateSelect('unit_approval', currentNik, currentName);
                        break;
                    case 2: // SPV
                        populateSelect('subsi_approval', currentNik, currentName);
                        break;
                    case 3: // Manager
                        populateSelect('kasie_approval', currentNik, currentName);
                        break;
                    case 4: // Senior Manager
                        populateSelect('kadept_approval', currentNik, currentName);
                        break;
                    case 5: // GM
                        populateSelect('kadiv_approval', currentNik, currentName);
                        break;
                    case 6: // Director
                        populateSelect('direktorat_approval', currentNik, currentName);
                        break;
                    default:
                        console.warn('Unknown jabatan ID:', selectedJabatan);
                        break;
                }
            }, 100);
        }

        function getCurrentNik() {
            const nikElement = document.getElementById('nik');
            return nikElement ? nikElement.value.trim() : '';
        }

        function getCurrentName() {
            const namaElement = document.getElementById('nama');
            return namaElement ? namaElement.value.trim() : '';
        }

        function clearStructureChartFields() {
            const structureFields = [
                'unit_approval',
                'subsi_approval',
                'kasie_approval',
                'kadept_approval',
                'kadiv_approval',
                'direktorat_approval'
            ];

            structureFields.forEach(fieldId => {
                const select = document.getElementById(fieldId);
                if (select) {
                    // For regular select
                    select.value = '';

                    // For Select2
                    if (typeof $ !== 'undefined' && $(select).hasClass('js-example-basic-single')) {
                        $(select).val('').trigger('change');
                    }

                    console.log('Cleared field:', fieldId); // Debug log
                }
            });
        }

        function populateSelect(selectId, value, displayName) {
            const select = document.getElementById(selectId);

            if (!select) {
                console.error('Select element not found:', selectId);
                return;
            }

            console.log('Populating select:', selectId, 'with value:', value, 'name:', displayName); // Debug log

            // Check if the option already exists
            let optionExists = false;
            for (let i = 0; i < select.options.length; i++) {
                if (select.options[i].value === value) {
                    optionExists = true;
                    break;
                }
            }

            // If the option doesn't exist, create it
            if (!optionExists && value && displayName) {
                const option = new Option(displayName, value, false, true);
                select.appendChild(option);
                console.log('Added new option to', selectId); // Debug log
            }

            // Set the value
            select.value = value;

            // For Select2, trigger change event
            if (typeof $ !== 'undefined' && $(select).hasClass('js-example-basic-single')) {
                $(select).val(value).trigger('change');
                console.log('Updated Select2:', selectId); // Debug log
            }

            // Validate that the value was set correctly
            if (select.value !== value) {
                console.warn('Failed to set value for', selectId, 'Expected:', value, 'Actual:', select.value);
            }
        }

        // Function to reinitialize when moving between steps
        function reinitializeJabatanHandler() {
            setTimeout(function() {
                initializeJabatanHandler();
            }, 200);
        }
    </script>

    <script>
        $(document).ready(function() {
            // Event handler ketika unit kerja berubah
            $('#unit_kerja').on('change', function() {
                const unitKerja = $(this).val();
                
                if (unitKerja) {
                    // Tampilkan loading indicator
                    showLoadingForApprovalSelects();
                    
                    // Ambil data approval dan hirarki berdasarkan unit kerja
                    fetch(`{{ route('employee.approval-data', '') }}/${unitKerja}`)
                        .then(response => response.json())
                        .then(data => {
                            // Update dropdown untuk Struktur Orchart (Step 3)
                            updateHirarki(data.dataHirarki);
                            
                            // Update dropdown untuk Approval Karyawan (Step 4) 
                            updateApproval(data.dataApproval);
                            
                            // Hilangkan loading indicator
                            hideLoadingForApprovalSelects();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            hideLoadingForApprovalSelects();
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Gagal mengambil data approval'
                            });
                        });
                } else {
                    // Reset semua dropdown jika unit kerja tidak dipilih
                    resetApprovalDropdowns();
                }
            });
        });


        function showLoadingForApprovalSelects() {
            // Tampilkan loading pada dropdown yang akan diupdate
            const approvalSelects = [
                '#unit_approval', '#subsi_approval', '#kasie_approval', 
                '#kadept_approval', '#kadiv_approval',
                '#atasan1_general', '#atasan2_general', '#atasan1_spd', 
                '#atasan2_spd', '#atasan1_ko'
            ];
            
            approvalSelects.forEach(selector => {
                $(selector).prop('disabled', true);
                $(selector).html('<option>Loading...</option><option value="KT-23111405">KT-23111405</option>');
            });
        }

        function hideLoadingForApprovalSelects() {
            const approvalSelects = [
                '#unit_approval', '#subsi_approval', '#kasie_approval', 
                '#kadept_approval', '#kadiv_approval',
                '#atasan1_general', '#atasan2_general', '#atasan1_spd', 
                '#atasan2_spd', '#atasan1_ko'
            ];
            
            approvalSelects.forEach(selector => {
                $(selector).prop('disabled', false);
            });
        }

        function updateHirarki(dataHirarki) {
            // Update dropdown untuk Struktur Orchart
            const hirarkirSelects = [
                '#unit_approval', '#subsi_approval', '#kasie_approval', 
                '#kadept_approval', '#kadiv_approval'
            ];
            
            hirarkirSelects.forEach(selector => {
                let options = '<option value="-">-</option>';
                dataHirarki.forEach(item => {
                    options += `<option value="${item.nik}">${item.nama}</option>`;
                });
                $(selector).html(options);
                
                // Refresh select2 jika menggunakan select2
                if ($(selector).hasClass('js-example-basic-single')) {
                    $(selector).trigger('change');
                }
            });
        }

        function updateApproval(dataApproval) {
            // Update dropdown untuk Approval Karyawan
            const approvalSelects = [
                '#atasan1_general', '#atasan2_general', '#atasan1_spd', 
                '#atasan2_spd', '#atasan1_ko'
            ];
            
            approvalSelects.forEach(selector => {
                let options = '<option value="">...</option><option value="KT-23111405">KT-23111405</option>';
                dataApproval.forEach(item => {
                    options += `<option value="${item.nik}">${item.nama}</option>`;
                });
                $(selector).html(options);
                
                // Refresh select2 jika menggunakan select2
                if ($(selector).hasClass('js-example-basic-single')) {
                    $(selector).trigger('change');
                }
            });
        }

        function resetApprovalDropdowns() {
            // Reset semua dropdown ke kondisi awal
            const hirarkirSelects = [
                '#unit_approval', '#subsi_approval', '#kasie_approval', 
                '#kadept_approval', '#kadiv_approval'
            ];
            
            const approvalSelects = [
                '#atasan1_general', '#atasan2_general', '#atasan1_spd', 
                '#atasan2_spd', '#atasan1_ko'
            ];
            
            hirarkirSelects.forEach(selector => {
                $(selector).html('<option value="-">-</option>');
                if ($(selector).hasClass('js-example-basic-single')) {
                    $(selector).trigger('change');
                }
            });
        }

        approvalSelects.forEach(selector => {
            $(selector).html('<option value="">...</option><option value="KT-23111405">KT-23111405</option>');
            if ($(selector).hasClass('js-example-basic-single')) {
                $(selector).trigger('change');
            }
        });

    </script>

@endsection
