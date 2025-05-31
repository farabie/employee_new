@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flatpickr/flatpickr.min.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">

    <style>
        .fade-scale {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.4s ease-out, transform 0.4s ease-out;
        }

        .fade-scale.show {
            opacity: 1;
            transform: scale(1);
        }
    </style>

    {{-- <style>
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
            width: 200px;
            height: 200px;
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
    </style> --}}

    <style>
        /* Gunakan ID yang spesifik untuk mencegah konflik dengan style lain */
        #foto-karyawan-upload-container {
            text-align: center;
            width: 100%;
        }

        /* .foto-karyawan-upload-wrapper {
                            display: block;
                            margin: 0 auto;
                            position: relative;
                            max-width: 300px;
                        } */

        .foto-karyawan-upload-wrapper {
            position: relative;
            display: inline-block;
            text-align: center;
        }

        .foto-karyawan-border-circle {
            width: 200px;
            height: 200px;
            border: 2px dashed #ccc;
            border-radius: 50%;
            padding: 5px;
            background-color: #f9f9f9;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .foto-karyawan-preview {
            object-fit: cover;
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .foto-karyawan-input {
            max-width: 250px;
            margin: 0.5rem auto;
            display: block;
        }

        /* Style untuk icon edit */
        /* .edit-foto-icon {
                        position: absolute;
                        bottom: 10px;
                        right: 10px;
                        width: 40px;
                        height: 40px;
                        background-color: #007bff;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        cursor: pointer;
                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
                        transition: all 0.3s ease;
                        z-index: 10;
                    } */

        .edit-foto-icon {
            position: absolute;
            top: 150px;
            left: 85%;
            transform: translateX(-50%);
            z-index: 10;
            width: 40px;
            height: 40px;
            background-color: #007bff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .edit-foto-icon:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .edit-foto-icon i {
            color: white;
            font-size: 16px;
        }

        /* Input file tersembunyi */
        #input-foto-karyawan {
            display: none;
        }

        /* Badge untuk nama dan NIK */
        .employee-badge {
            background: linear-gradient(135deg, #548aff 0%, #a13bf0 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 15px;
            margin-top: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .employee-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .employee-nik {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Hover effect untuk foto */
        .foto-karyawan-border-circle:hover {
            border-color: #007bff;
        }

        /* Loading overlay */
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.8);
            display: none;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .bg-primary {
            background-color: #007bff !important;
        }

        .txt-light {
            color: white !important;
        }

        .border-l-primary {
            border-left: 5px solid #007bff !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Informasi Karyawan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Informasi Karyawan</li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <div id="alert-container"></div>
                <div class="row mb-3">
                    <div class="col-12" id="foto-karyawan-upload-container">
                        <div class="foto-karyawan-upload-wrapper">
                            <div class="foto-karyawan-border-circle">
                                <img id="preview-foto-karyawan"
                                    src="{{ empty($pegawai->foto)
                                        ? ($pegawai->jk == 'Laki-laki'
                                            ? asset('storage/assets/img/foto/no-foto-male.png')
                                            : asset('storage/assets/img/foto/no-foto-female.png'))
                                        : asset("storage/assets/img/foto/$pegawai->foto") }}"
                                    alt="Preview Foto" class="foto-karyawan-preview">
                                <div class="loading-overlay" id="loading-overlay">
                                    <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
                                </div>
                            </div>

                            <!-- Icon edit dipindah ke SINI -->
                            <div class="edit-foto-icon" onclick="triggerFileInput()">
                                <i class="fas fa-pencil-alt"></i>
                            </div>

                            <input type="file" id="input-foto-karyawan" accept="image/*" onchange="previewFoto(event)">

                            <div class="employee-badge text-center">
                                <div class="employee-name" id="employee-name">{{ $pegawai->nama ?? 'Nama Tidak Tersedia' }}
                                </div>
                                <div class="employee-nik" id="employee-nik">NIK: {{ $pegawai->nik ?? 'NIK Tidak Tersedia' }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 mt-4">
                    <div class="card user-bio card-absolute p-1 border-l-primary border-9">
                        <div class="card-header bg-primary">
                            <h5 class="txt-light">Informasi Karyawan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-sitemap pe-2"></i>Divisi</h6>
                                        <span>
                                            {{ $pegawai->nama_unit_kerja ?? '-' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-diagram-project pe-2"></i>Departement</h6>
                                        <span>
                                            {{ $pegawai->nama_department ?? '-' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-briefcase pe-2"></i>Jabatan</h6>
                                        <span>{{ $pegawai->nama_masterjab ?? '-' }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-tasks pe-2"></i>Posisi</h6>
                                        <span>{{ $pegawai->posisi ?? '-' }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-calendar pe-2"></i>Tanggal Masuk</h6>
                                        <span>
                                            @if (empty($pegawai->tanggal_masuk) || $pegawai->tanggal_masuk == '0000-00-00')
                                                -
                                            @else
                                                {{ \Carbon\Carbon::parse($pegawai->tanggal_masuk)->locale('id')->translatedFormat('d F Y') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-phone pe-2"></i>Telp</h6>
                                        <span>
                                            @if ($pegawai->telp == '')
                                                -
                                            @else
                                                {{ $pegawai->telp }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-location-arrow pe-2"></i>Lokasi Kerja</h6>
                                        <span>
                                            @if ($pegawai->lok_kerja == '')
                                                -
                                            @else
                                                {{ $pegawai->lok_kerja }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-envelope pe-2"></i>Email</h6>
                                        <span>
                                            @if ($pegawai->email == '')
                                                -
                                            @else
                                                {{ $pegawai->email }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-user pe-2"></i>Atasan 1</h6>
                                        <span>
                                            @if ($pegawai->nama_atasan_1 == '')
                                                -
                                            @else
                                                {{ $pegawai->nama_atasan_1 }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-user pe-2"></i>Atasan 2</h6>
                                        <span>
                                            @if ($pegawai->nama_atasan_2 == '')
                                                -
                                            @else
                                                {{ $pegawai->nama_atasan_2 }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-cake-candles pe-2"></i> Umur</h6>
                                        <span>
                                            @php
                                                $tgl_lahir = \Carbon\Carbon::parse($pegawai->tgl_lhr);
                                                $umur = $tgl_lahir->diff(\Carbon\Carbon::now());
                                            @endphp
                                            {{ $umur->y }} tahun, {{ $umur->m }} bulan, {{ $umur->d }}
                                            hari
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-briefcase pe-2"></i> Masa Kerja</h6>
                                        <span>
                                            @php
                                                $tanggal_masuk = \Carbon\Carbon::parse($pegawai->tanggal_masuk);
                                                $masa_kerja = $tanggal_masuk->diff(\Carbon\Carbon::now());
                                            @endphp
                                            {{ $masa_kerja->y }} tahun, {{ $masa_kerja->m }} bulan, {{ $masa_kerja->d }}
                                            hari
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-id-badge pe-2"></i>Status Kepegawaian</h6>
                                        <span>
                                            {{ $pegawai->status_kepeg ?? '-' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="ttl-info text-start">
                                        <h6><i class="fa-solid fa-user-tie pe-2"></i>Jenis Pegawai</h6>
                                        <span>
                                            {{ $pegawai->jenis_peg ?? '-' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-2">
            <div class="row">
                <!-- Sidebar (Accordion dalam Card) -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="accordion dark-accordion" id="outlineaccordion">
                                <!-- Informasi Pribadi -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingPersonal">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapsePersonal" aria-expanded="true"
                                            aria-controls="collapsePersonal">
                                            <i class="fa-solid fa-user pe-2"></i> Informasi Pribadi
                                            <i class="svg-color" data-feather="chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id="collapsePersonal" class="accordion-collapse collapse show"
                                        aria-labelledby="headingPersonal" data-bs-parent="#menuAccordion">
                                        <div class="accordion-body">
                                            <ul class="nav flex-column nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#data-pribadi"
                                                        onclick="resetTabs()">Data Pribadi</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#kontak-tab"
                                                        onclick="resetTabs()">Kontak</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#kontak-darurat-tab"
                                                        onclick="resetTabs()">Kontak Darurat</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#keluarga"
                                                        onclick="resetTabs()">Keluarga</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#pendidikan-tab"
                                                        onclick="resetTabs()">Pendidikan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#dokument-pribadi"
                                                        onclick="resetTabs()">Dokumen Pribadi</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Data Karyawan -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingEmployee">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseEmployee"
                                            aria-expanded="false" aria-controls="collapseEmployee">
                                            <i class="fa-solid fa-briefcase pe-2"></i> Data Karyawan
                                            <i class="svg-color" data-feather="chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseEmployee" class="accordion-collapse collapse"
                                        aria-labelledby="headingEmployee" data-bs-parent="#menuAccordion">
                                        <div class="accordion-body">
                                            <ul class="nav flex-column nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#info-karyawan"
                                                        onclick="resetTabs()">Informasi Karyawan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#atasan"
                                                        onclick="resetTabs()">Atasan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#kontrak-karyawan"
                                                        onclick="resetTabs()">Kontrak Karyawan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#penilaian-akhir"
                                                        onclick="resetTabs()">Penilaian Akhir</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#pelatihan"
                                                        onclick="resetTabs()">Pelatihan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#penghargaan"
                                                        onclick="resetTabs()">Penghargaan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#surat-peringatan"
                                                        onclick="resetTabs()">Surat Peringatan/Teguran</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#karir"
                                                        onclick="resetTabs()">Karir</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Data Tambahan -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingAdditional">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseAdditional"
                                            aria-expanded="false" aria-controls="collapseAdditional">
                                            <i class="fa-solid fa-folder-open pe-2"></i> Data Tambahan
                                            <i class="svg-color" data-feather="chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseAdditional" class="accordion-collapse collapse"
                                        aria-labelledby="headingAdditional" data-bs-parent="#menuAccordion">
                                        <div class="accordion-body">
                                            <ul class="nav flex-column nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#bahasa"
                                                        onclick="resetTabs()">Bahasa</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#bank"
                                                        onclick="resetTabs()">Rekening Bank</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#npwp"
                                                        onclick="resetTabs()">NPWP</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#pengalaman-kerja"
                                                        onclick="resetTabs()">Pengalaman Kerja</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#rekam-medis"
                                                        onclick="resetTabs()">Rekam Medis</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Data Tambahan -->

                                <!-- Start Akses Profil -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingAksesProfil">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseHakAksesProfil"
                                            aria-expanded="false" aria-controls="collapseHakAksesProfil">
                                            <i class="fa-solid fa-user-shield pe-2"></i> Hak Akses Profil
                                            <i class="svg-color" data-feather="chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseHakAksesProfil" class="accordion-collapse collapse"
                                        aria-labelledby="headingAksesProfil" data-bs-parent="#menuAccordion">
                                        <div class="accordion-body">
                                            <ul class="nav flex-column nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#user-account"
                                                        onclick="resetTabs()">User Akun </a>
                                                </li>
                                                {{-- <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#change-password"
                                                        onclick="resetTabs()">Ganti Password</a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Akses Profil -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content (Dalam Card) -->
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="data-pribadi">
                            <div id="data-pribadi" class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-data">Data Pribadi</h4>
                                    <div id="loading-text-data" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary" role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataPribadi" class="row g-3"
                                        action="{{ route('data-diri.update', $pegawai->nik) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nama">Nama Karyawan</label>
                                            <input name="nama" class="form-control" id="nama" type="text"
                                                value="{{ old('nama', $pegawai->nama) }}">
                                        </div>
                                        {{-- <div class="col-12 position-relative">
                                            <label class="form-label" for="nik">NIK</label>
                                            <input disabled name="nik" class="form-control" id="nik"
                                                type="text" value="{{ old('nik', $pegawai->nik) }}">
                                        </div> --}}
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tempat_lhr">Tempat Lahir</label>
                                            <input name="tempat_lhr" class="form-control" id="tempat_lhr" type="text"
                                                value="{{ old('tempat_lhr', $pegawai->tempat_lhr) }}">
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tgl_lhr">Tanggal Lahir</label>
                                            <input class="form-control" name="tgl_lhr" id="human-friendly"
                                                type="text" value="{{ old('tgl_lhr', $pegawai->tgl_lhr) }}">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="jk">Jenis Kelamin</label>
                                            <select class="form-select" name="jk" id="jk">
                                                <option selected disabled value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki" @selected(old('jk', $pegawai->jk) == 'Laki-laki')>Laki-laki
                                                </option>
                                                <option value="Perempuan" @selected(old('jk', $pegawai->jk) == 'Perempuan')>Perempuan
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="agama">Agama</label>
                                            <select class="form-select" name="agama" id="agama">
                                                <option selected disabled value="">...</option>
                                                <option value="Islam" @selected(old('agama', $pegawai->agama) == 'Islam')>Islam</option>
                                                <option value="Kristen" @selected(old('agama', $pegawai->agama) == 'Kristen')>Kristen</option>
                                                <option value="Katolik" @selected(old('agama', $pegawai->agama) == 'Katolik')>Katolik</option>
                                                <option value="Hindu" @selected(old('agama', $pegawai->agama) == 'Hindu')>Hindu</option>
                                                <option value="Buddha" @selected(old('agama', $pegawai->agama) == 'Buddha')>Buddha</option>
                                                <option value="Kong Hu Cu" @selected(old('agama', $pegawai->agama) == 'Kong Hu Cu')>Kong Hu Cu
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="gol_darah">Golongan Darah</label>
                                            <select class="form-select" name="gol_darah" id="gol_darah">
                                                <option selected disabled value="">...</option>
                                                <option value="A" @selected(old('gol_darah', $pegawai->gol_darah) == 'A')>A</option>
                                                <option value="AB" @selected(old('gol_darah', $pegawai->gol_darah) == 'AB')>AB</option>
                                                <option value="B" @selected(old('gol_darah', $pegawai->gol_darah) == 'B')>B</option>
                                                <option value="O" @selected(old('gol_darah', $pegawai->gol_darah) == 'O')>O</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="status_nikah">Status Pernikahan</label>
                                            <select class="form-select" name="status_nikah" id="status_nikah">
                                                <option selected disabled value="">...</option>
                                                <option value="Menikah" @selected(old('status_nikah', $pegawai->status_nikah) == 'Menikah')>Menikah</option>
                                                <option value="Lajang" @selected(old('status_nikah', $pegawai->status_nikah) == 'Lajang')>Lajang</option>
                                                <option value="Cerai" @selected(old('status_nikah', $pegawai->status_nikah) == 'Cerai')>Cerai</option>
                                            </select>
                                        </div>

                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="alamat">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="alamat" rows="2">{{ old('alamat', trim($pegawai->alamat)) }}</textarea>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="alamat_domisili">Alamat Domisili</label>
                                            <textarea name="alamat_domisili" class="form-control" id="alamat_domisili" rows="2">{{ old('alamat_domisili', trim($pegawai->alamat_domisili)) }}</textarea>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary" type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kontak-tab">
                            <div id="kontak" class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-kontak">Kontak</h4>
                                    <div id="loading-text-kontak" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary" role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formKontak" class="row g-3"
                                        action="{{ route('kontak.update', $pegawai->nik) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="telp">Nomor Telpon</label>
                                            <input name="telp" class="form-control" id="telp" type="text"
                                                value="{{ old('telp', $pegawai->telp) }}">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="email">Email</label>
                                            <input name="email" class="form-control" id="email" type="text"
                                                value="{{ old('email', $pegawai->email) }}">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="email_secondary">Email Alternatif</label>
                                            <input name="email_secondary" class="form-control" id="email_secondary"
                                                type="text"
                                                value="{{ old('email_secondary', $pegawai->email_secondary) }}">
                                        </div>
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary" type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kontak-darurat-tab">
                            <div id="kontak-darurat" class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-kontak-darurat">Kontak Darurat</h4>
                                    <div id="loading-text-kontak-darurat" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary" role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formKontakDarurat" class="row g-3"
                                        action="{{ route('kontak-darurat.update', $pegawai->nik) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="row mb-3">
                                            <h6 class="mb-3 mt-2">Kontak Darurat 1</h6>
                                            <div class="col-4 position-relative">
                                                <label class="form-label" for="kontak_darurat1">Nomor Kontak
                                                    Darurat</label>
                                                <input name="kontak_darurat1" class="form-control" id="kontak_darurat1"
                                                    type="text"
                                                    value="{{ old('kontak_darurat1', $pegawai->kontak_darurat1) }}">
                                            </div>
                                            <div class="col-4 position-relative">
                                                <label class="form-label" for="nama_kontak_darurat1">Nama Kontak
                                                    Darurat</label>
                                                <input name="nama_kontak_darurat1" class="form-control"
                                                    id="nama_kontak_darurat1" type="text"
                                                    value="{{ old('nama_kontak_darurat1', $pegawai->nama_kontak_darurat1) }}">
                                            </div>
                                            <div class="col-4 position-relative">
                                                <label class="form-label" for="hub_kontak_darurat1">Hubungan Kontak
                                                    Darurat</label>
                                                <input name="hub_kontak_darurat1" class="form-control"
                                                    id="hub_kontak_darurat1" type="text"
                                                    value="{{ old('hub_kontak_darurat1', $pegawai->hub_kontak_darurat1) }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <h6 class="mb-3 mt-2">Kontak Darurat 2</h6>
                                            <div class="col-4 position-relative">
                                                <label class="form-label" for="kontak_darurat2">Nomor Kontak
                                                    Darurat</label>
                                                <input name="kontak_darurat2" class="form-control" id="kontak_darurat2"
                                                    type="text"
                                                    value="{{ old('kontak_darurat2', $pegawai->kontak_darurat2) }}">
                                            </div>
                                            <div class="col-4 position-relative">
                                                <label class="form-label" for="nama_kontak_darurat2">Nama Kontak
                                                    Darurat</label>
                                                <input name="nama_kontak_darurat2" class="form-control"
                                                    id="nama_kontak_darurat2" type="text"
                                                    value="{{ old('nama_kontak_darurat2', $pegawai->nama_kontak_darurat2) }}">
                                            </div>
                                            <div class="col-4 position-relative">
                                                <label class="form-label" for="hub_kontak_darurat2">Hubungan Kontak
                                                    Darurat</label>
                                                <input name="hub_kontak_darurat2" class="form-control"
                                                    id="hub_kontak_darurat2" type="text"
                                                    value="{{ old('hub_kontak_darurat2', $pegawai->hub_kontak_darurat2) }}">
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary" type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="keluarga">
                            <div id="card-keluarga" class="card">
                                <div class="card-header">
                                    <h4>Keluarga</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a id="tambah-data-keluarga"
                                            class="btn btn-primary f-w-500" href="#"><i
                                                class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    {{-- <th>NIK (KK)</th> --}}
                                                    <th>Nama</th>
                                                    <th>TTL</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Pendidikan</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Hubungan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $allData = collect($anak)->merge($suamiIstri)->merge($ortu);
                                                @endphp

                                                @if ($allData->isEmpty())
                                                    <tr>
                                                        <td colspan="9" class="text-center">Tidak ada data keluarga
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($allData as $index => $data)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            {{-- <td>{{ $data->nik }}</td> --}}
                                                            <td>{{ $data->nama }}</td>
                                                            <td>
                                                                {{ $data->tmp_lhr ?: '-' }},
                                                                {{ $data->tgl_lhr && $data->tgl_lhr != '0000-00-00' ? $data->tgl_lhr : '-' }}
                                                            </td>
                                                            <td>{{ $data->jk }}</td>
                                                            <td>{{ $data->pendidikan }}</td>
                                                            <td>{{ $data->pekerjaan }}</td>
                                                            <td>{{ $data->status_hub }}</td>
                                                            <td>
                                                                <a type="button"
                                                                    class="btn btn-success btn-edit-keluarga"
                                                                    data-id="{{ isset($data->id_ortu) ? $data->id_ortu : (isset($data->id_si) ? $data->id_si : (isset($data->id_anak) ? $data->id_anak : '')) }}"
                                                                    data-nik="{{ $data->nik }}"
                                                                    data-nama="{{ $data->nama }}"
                                                                    data-tmp_lhr="{{ $data->tmp_lhr }}"
                                                                    data-tgl_lhr="{{ $data->tgl_lhr }}"
                                                                    data-jk="{{ $data->jk }}"
                                                                    data-pendidikan="{{ $data->pendidikan }}"
                                                                    data-pekerjaan="{{ $data->pekerjaan }}"
                                                                    data-status_hub="{{ $data->status_hub }}"
                                                                    title="Edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                                <a type="button" class="btn btn-danger btn-delete"
                                                                    data-url="{{ route('keluarga.delete') }}"
                                                                    data-id="{{ isset($data->id_ortu) ? $data->id_ortu : (isset($data->id_si) ? $data->id_si : (isset($data->id_anak) ? $data->id_anak : '')) }}"
                                                                    data-type="{{ $data->status_hub }}"
                                                                    data-name="{{ $data->nama }}" title="hapus">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div id="form-tambah-data-keluarga" class="card d-none">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-tambah-data-keluarga">Tambah Data Keluarga</h4>
                                    <div id="loading-text-tambah-data-keluarga" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary" role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formTambahDataKeluarga" class="row g-3"
                                        action="{{ route('keluarga.create') }}" method="post">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="id" id="id_keluarga">
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nama">Nama Keluarga</label>
                                            <input name="nama" class="form-control" type="text" value="">
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tmp_lhr">Tempat Lahir Keluarga</label>
                                            <input name="tmp_lhr" class="form-control" type="text" value="">
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tgl_lhr">Tanggal Lahir Keluarga</label>
                                            <div class="input-group flatpicker-calender">
                                                <input class="form-control" name="tgl_lhr" id="human-friendly"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="jk">Jenis Kelamin</label>
                                            <select class="form-select" name="jk">
                                                <option selected disabled value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="pendidikan">Pendidikan Keluarga</label>
                                            <select class="form-select" name="pendidikan">
                                                <option selected disabled value="">...</option>
                                                <option value="SD">SD</option>
                                                <option value="SLTP">SLTP</option>
                                                <option value="SLTA">SLTA</option>
                                                <option value="D3">D3</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="pekerjaan">Pekerjaan Keluarga</label>
                                            <input name="pekerjaan" class="form-control" type="text" value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="status_hub">Status Hubungan Keluarga</label>
                                            <select class="form-select" name="status_hub">
                                                <option selected disabled value="">...</option>
                                                <option value="Ayah Kandung">Ayah Kandung</option>
                                                <option value="Ibu Kandung">Ibu Kandung</option>
                                                <option value="Suami">Suami</option>
                                                <option value="Istri">Istri</option>
                                                <option value="Anak Ke 1">Anak Ke 1</option>
                                                <option value="Anak Ke 2">Anak Ke 2</option>
                                                <option value="Anak Ke 3">Anak Ke 3</option>
                                                <option value="Anak Ke 4">Anak Ke 4</option>
                                                <option value="Anak Ke 5">Anak Ke 5</option>
                                                <option value="Anak Ke 6">Anak Ke 6</option>
                                                <option value="Anak Ke 7">Anak Ke 7</option>
                                            </select>
                                        </div>
                                        <input type="text" value="{{ $pegawai->nik }}" name = "id_user" hidden>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary"
                                                id="btn-kembali">Kembali</button>
                                            <button class="btn btn-primary" type="submit"
                                                id="submitKeluarga">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pendidikan-tab">
                            <div id="card-pendidikan" class="card">
                                <div class="card-header">
                                    <h4>Pendidikan</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a id="tambah-data-pendidikan"
                                            class="btn btn-primary f-w-500" href="#"><i
                                                class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tingkat</th>
                                                    <th>Nama Sekolah</th>
                                                    <th>Lokasi</th>
                                                    <th>Jurusan</th>
                                                    <th>Tahun Kelulusan</th>
                                                    <th>Ijazah</th>
                                                    <th>Keterangan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($pendidikan as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->tingkat }}</td>
                                                        <td>{{ $data->nama_sekolah }}</td>
                                                        <td>{{ $data->lokasi }}</td>
                                                        <td>{{ $data->jurusan }}</td>
                                                        <td>{{ $data->tahun }}</td>
                                                        <td>
                                                            @if ($data->ijazah == '1')
                                                                Ber-Ijazah
                                                            @else
                                                                Tidak Ber-Ijazah
                                                            @endif

                                                            @if ($data->file == '')
                                                                -
                                                            @else
                                                                <a href="{{ asset("storage/assets/file/ijazah/$data->file") }}"
                                                                    target='_blank' title='ijazah'><i
                                                                        class="fas fa-file-text"></i></a>
                                                            @endif
                                                        </td>
                                                        <td>{{ $data->keterangan }}</td>
                                                        <td>
                                                            <a type="button" class="btn btn-success btn-edit-pendidikan"
                                                                data-id_sekolah="{{ $data->id_sekolah }}"
                                                                data-tingkat="{{ $data->tingkat }}"
                                                                data-nama_sekolah="{{ $data->nama_sekolah }}"
                                                                data-lokasi="{{ $data->lokasi }}"
                                                                data-jurusan="{{ $data->jurusan }}"
                                                                data-tahun="{{ $data->tahun }}"
                                                                data-ijazah="{{ $data->ijazah }}"
                                                                data-file="{{ $data->file }}"
                                                                data-keterangan="{{ $data->keterangan }}" title="Edit">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </a>
                                                            <a type="button" class="btn btn-danger btn-delete-pendidikan"
                                                                data-url="{{ route('pendidikan.delete') }}"
                                                                data-id_sekolah="{{ $data->id_sekolah }}"
                                                                data-name="{{ $data->nama_sekolah }}" title="hapus">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center">Tidak ada data pendidikan
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="form-tambah-data-pendidikan" class="card d-none">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-form-pendidikan">Tambah Data Pendidikan</h4>
                                    <div id="loading-text-form-pendidikan" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary" role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataPendidikan" class="row g-3"
                                        action="{{ route('pendidikan.create') }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="id_sekolah" id="id_sekolah">
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="tingkat">Tingkat</label>
                                            <select class="form-select" name="tingkat" required>
                                                <option selected disabled value="">...</option>
                                                <option value="SD">SD</option>
                                                <option value="SLTP">SLTP</option>
                                                <option value="SMU">SMU</option>
                                                <option value="SMK">SMK</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nama_sekolah">Nama Sekolah /
                                                Universitas</label>
                                            <input name="nama_sekolah" class="form-control" type="text"
                                                value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="lokasi">Lokasi</label>
                                            <input name="lokasi" class="form-control" type="text" value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="jurusan">Jurusan</label>
                                            <input name="jurusan" class="form-control" type="text" value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="tahun">Tahun Kelulusan</label>
                                            <input name="tahun" class="form-control" type="text" value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="ijazah">
                                                Ijazah</label>
                                            <label class="d-block" for="berijazah"></label>
                                            <input class="radio_animated" id="berijazah" type="radio" name="ijazah"
                                                value="1">Berijazah
                                            <label class="d-block" for="tidak_berijazah"></label>
                                            <input class="radio_animated" id="tidak_berijazah" type="radio"
                                                name="ijazah" value="0">Tidak Berijazah
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="keterangan">Keterangan</label>
                                            <input name="keterangan" class="form-control" type="text" value="">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="formFile">File Ijazah</label>
                                            <div id="file-preview" class="mb-2"></div> <!-- tempat untuk preview -->
                                            <input class="form-control" name="file" id="formFile" type="file">
                                        </div>
                                        {{-- <div class="col-12"> 
                                            <label class="form-label" for="formFile">File Ijazah</label>
                                            <input class="form-control" name="file" id="formFile" type="file">
                                        </div> --}}
                                        <input type="text" value="{{ $pegawai->nik }}" name = "nik" hidden>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary"
                                                id="btn-kembali-pendidikan">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dokument-pribadi">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Dokument Pribadi dan Sertifikat</h4>
                                </div>
                                {{-- <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a class="btn btn-primary f-w-500"
                                            href="#"><i class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div> --}}
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <h5>Dokument Pribadi</h5>
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Dokumen</th>
                                                    <th>Nomor Dokumen</th>
                                                    <th>File Doc</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp

                                                {{-- Periksa apakah ada setidaknya satu kontak darurat yang memiliki data --}}
                                                @if ($dokumentPribadi->contains(fn($data) => $data->nip))
                                                    @foreach ($dokumentPribadi as $data)
                                                        @if ($data->nip)
                                                            {{-- Nip (File KTP) --}}
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>KTP</td>
                                                                <td>{{ $data->nip }}</td>
                                                                <td>
                                                                    @if ($data->file_ktp == '')
                                                                        -
                                                                    @else
                                                                        <a href="{{ asset("storage/assets/file/ktp/$data->file_ktp") }}"
                                                                            target='_blank' title='ktp'><i
                                                                                class="fas fa-file-text"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        {{-- Nomor KK (jika ada) --}}
                                                        @if ($data->nomor_kk)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>KK (Kartu Keluarga)</td>
                                                                <td>{{ $data->nomor_kk }}</td>
                                                                <td>
                                                                    @if ($data->file_kk == '')
                                                                        -
                                                                    @else
                                                                        <a href="{{ asset("storage/assets/file/ktp/$data->file_kk") }}"
                                                                            target='_blank' title='kk'><i
                                                                                class="fas fa-file-text"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        {{-- SIM jika ada --}}
                                                        @if ($data->sim)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>SIM</td>
                                                                <td>{{ $data->sim }}</td>
                                                                <td>
                                                                    @if ($data->file_sim == '')
                                                                        -
                                                                    @else
                                                                        <a href="{{ asset("storage/assets/file/sim/$data->file_sim") }}"
                                                                            target='_blank' title='sim'><i
                                                                                class="fas fa-file-text"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif

                                                        @if ($data->nomor_paspor)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>Paspor</td>
                                                                <td>{{ $data->nomor_paspor }}</td>
                                                                <td>
                                                                    @if ($data->file_paspor == '')
                                                                        -
                                                                    @else
                                                                        <a href="{{ asset("storage/assets/file/ktp/$data->file_paspor") }}"
                                                                            target='_blank' title='passpor'><i
                                                                                class="fas fa-file-text"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="4" class="text-center">Tidak ada Dokument Pribadi
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <div class="table-responsive custom-scrollbar">
                                        <h5>Dokumen Sertifikat</h5>
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Dokumen</th>
                                                    <th>Nomor Dokumen</th>
                                                    <th>File Doc</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sertifikasi as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->nama_sertifikat }}</td>
                                                        <td>{{ $data->tahun }}</td>
                                                        <td>
                                                            @if ($data->file == '')
                                                                -
                                                            @else
                                                                <a href="{{ asset("storage/assets/file/sertifikat/$data->file") }}"
                                                                    target='_blank' title='sertifikat'><i
                                                                        class="fas fa-file-text"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="info-karyawan">
                            <div id="card-informasi-karyawan" class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-informasi-karyawan">Informasi Karyawan</h4>
                                    <div id="loading-text-informasi-karyawan" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary" role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                {{-- <div class="card-header">
                                    <h4>Informasi Karyawan</h4>
                                </div> --}}
                                <div class="card-body">
                                    <form id="formDataInformasiKaryawan" class="row g-3"
                                        action="{{ route('info-karyawan.update', $pegawai->nik) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nik">NIK</label>
                                            <input disabled name="nik" class="form-control" id="nik"
                                                type="text" value="{{ old('nik', $pegawai->nik) }}">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="status_kepeg">Status Kepegawaian</label>
                                            <select class="form-select" name="status_kepeg" id="status_kepeg">
                                                <option selected disabled value="">Pilih Status Kepegawaian</option>
                                                <option value="PKWT" @selected(old('status_kepeg', $pegawai->status_kepeg) == 'PKWT')>PKWT</option>
                                                <option value="PKWTT" @selected(old('status_kepeg', $pegawai->status_kepeg) == 'PKWTT')>PKWTT</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="company">Perusahaan</label>
                                            <select class="form-select" name="company" id="company">
                                                <option selected disabled value="">Pilih Perusahaan</option>
                                                <option value="KT" @selected(old('company', $pegawai->company) == 'KT')>KT</option>
                                                <option value="TMI" @selected(old('company', $pegawai->company) == 'TMI')>TMI</option>
                                                <option value="JMP" @selected(old('company', $pegawai->company) == 'JMP')>JMP</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="unit_kerja">Divisi</label>
                                            <select class="form-select" name="unit_kerja" id="unit_kerja">
                                                <option selected disabled value="">...</option>
                                                @foreach ($unit_kerja as $unit)
                                                    <option value="{{ $unit->id_unit }}" @selected(old('unit_kerja', $pegawai->unit_kerja) == $unit->id_unit)>
                                                        {{ $unit->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="id_departement">Departement</label>
                                            <select class="form-select" name="id_departement" id="id_departement">
                                                <option selected disabled value="">...</option>
                                                @foreach ($departments as $data)
                                                    <option value="{{ $data->id_department }}"
                                                        @if (old('id_departement', $pegawai->id_departement) == $data->id_department &&
                                                                $departments->contains('id_department', $pegawai->id_departement)) selected @endif>
                                                        {{ $data->nama_department }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                                            <input class="form-control" name="tanggal_masuk" id="human-friendly"
                                                type="text"
                                                value="{{ old('tanggal_masuk', $pegawai->tanggal_masuk) }}">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="lok_kerja">Lokasi Kerja</label>
                                            <input name="lok_kerja" class="form-control" id="lok_kerja" type="text"
                                                value="{{ old('lok_kerja', $pegawai->lok_kerja) }}">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="jenis_peg">Jenis Pegawai</label>
                                            <select class="form-select" name="jenis_peg" id="jenis_peg">
                                                <option selected disabled value="">Pilih Jenis Pegawai</option>
                                                <option value="HO" @selected(old('jenis_peg', $pegawai->jenis_peg) == 'HO')>HO</option>
                                                <option value="Lapangan" @selected(old('jenis_peg', $pegawai->jenis_peg) == 'Lapangan')>Lapangan</option>
                                                <option value="Shift" @selected(old('jenis_peg', $pegawai->jenis_peg) == 'Shift')>Shift</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="jabatan">Jabatan</label>
                                            <select class="form-select" name="jabatan" id="jabatan">
                                                <option selected disabled value="">...</option>
                                                @foreach ($masterJabatan as $data)
                                                    <option value="{{ $data->id_masterjab }}"
                                                        @if (
                                                            !empty($pegawai->jabatan) &&
                                                                old('jabatan', $pegawai->jabatan) == $data->id_masterjab &&
                                                                $masterJabatan->contains('id_masterjab', $pegawai->jabatan)) selected @endif>
                                                        {{ $data->nama_masterjab }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="eselon">Grade</label>
                                            <select class="form-select" name="eselon" id="eselon">
                                                <option selected disabled value="">...</option>
                                                @foreach ($masterGrade as $data)
                                                    <option value="{{ $data->id_masteresl }}"
                                                        @if (
                                                            !empty($pegawai->eselon) &&
                                                                old('eselon', $pegawai->eselon) == $data->id_masteresl &&
                                                                $masterGrade->contains('id_masteresl', $pegawai->eselon)) selected @endif>
                                                        {{ $data->nama_masteresl }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="posisi">Posisi</label>
                                            <input name="posisi" class="form-control" id="posisi" type="text"
                                                value="{{ old('posisi', $pegawai->posisi) }}">
                                        </div>
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary" type="submit">
                                                Update
                                            </button>
                                        </div>
                                        {{-- <div class="col-12 text-end">
                                            <button class="btn btn-primary" type="update">Update</button>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="atasan">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Informasi Atasan / Approval Atasan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">Nama</th>
                                                    <th colspan="2">Cuti & Izin Personal</th>
                                                    <th colspan="2">SPD</th>
                                                    <th colspan="1">Kendaraan Operasional</th>
                                                </tr>
                                                <tr>
                                                    <th>Atasan 1</th>
                                                    <th>Atasan 2</th>
                                                    <th>Atasan 1</th>
                                                    <th>Atasan 2</th>
                                                    <th>Atasan 1</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($approval as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->nama ?? '-' }}</td>
                                                        <td>{{ $data->atasan1_general_nama ?? '-' }}</td>
                                                        <td>{{ $data->atasan2_general_nama ?? '-' }}</td>
                                                        <td>{{ $data->atasan1_spd_nama ?? '-' }}</td>
                                                        <td>{{ $data->atasan2_spd_nama ?? '-' }}</td>
                                                        <td>{{ $data->atasan1_ko_nama ?? '-' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kontrak-karyawan">
                            <div id="card-kontrak-karyawan" class="card">
                                <div class="card-header">
                                    <h4>Kontrak Karyawan</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a id="tambah-data-kontrak-karyawan"
                                            class="btn btn-primary f-w-500" href="#"><i
                                                class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nik</th>
                                                    <th>Nama</th>
                                                    <th>Status Kontrak</th>
                                                    <th>Tanggal Kontrak</th>
                                                    <th>Kontrak Ke</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($kontrakKaryawan->isEmpty())
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak ada data kontrak
                                                            karyawan</td>
                                                    </tr>
                                                @else
                                                    @foreach ($kontrakKaryawan as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->nik ?? '-' }}</td>
                                                            <td>{{ $data->nama ?? '-' }}</td>
                                                            <td>{{ $data->status_kontrak ?? '-' }}</td>
                                                            <td>
                                                                @if ($data->tgl_kontrak == '0000-00-00' || $data->tgl_kontrak == null)
                                                                    -
                                                                @else
                                                                    {{ $data->tgl_kontrak }}
                                                                @endif
                                                            </td>
                                                            <td>{{ $data->kontrak_ke ?? '-' }}</td>
                                                            <td>
                                                                <a type="button"
                                                                    class="btn btn-success btn-edit-kontrak-karyawan"
                                                                    data-id_kontrak="{{ $data->id_kontrak }}"
                                                                    data-status_kontrak="{{ $data->status_kontrak }}"
                                                                    data-tgl_kontrak="{{ $data->tgl_kontrak }}"
                                                                    data-kontrak_ke="{{ $data->kontrak_ke }}"
                                                                    title="Edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                                <a type="button"
                                                                    class="btn btn-danger btn-delete-kontrak-karyawan"
                                                                    data-url="{{ route('kontrak-karyawan.delete') }}"
                                                                    data-id_kontrak="{{ $data->id_kontrak }}"
                                                                    data-name="{{ $data->status_kontrak }}"
                                                                    title="hapus">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="form-kontrak-karyawan-data" class="card d-none">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-form-kontrak-karyawan">Tambah Data Kontrak Karyawan</h4>
                                    <div id="loading-text-form-kontrak-karyawan" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary" role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataKontrakKaryawan" class="row g-3"
                                        action="{{ route('kontrak-karyawan.create') }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="id_kontrak" id="id_kontrak">
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="tgl_kontrak">Tanggal Kontrak</label>
                                            <input class="form-control" name="tgl_kontrak" id="human-friendly"
                                                type="text" value="{{ old('tgl_kontrak', $pegawai->tgl_kontrak) }}"
                                                required>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="status_kontrak">Status Kontrak</label>
                                            <select class="form-select" name="status_kontrak" required>
                                                <option selected disabled value="">...</option>
                                                <option value="MAGANG">Magang</option>
                                                <option value="PKWT6">Kontrak 6 Bulan</option>
                                                <option value="PKWT1">Kontrak 1 Tahun</option>
                                                <option value="PERMANEN">Permanen</option>
                                            </select>
                                        </div>
                                        <input type="text" value="{{ $pegawai->nik }}" name = "nik" hidden>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary"
                                                id="btn-kembali-kontrak-karyawan">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="penilaian-akhir">
                            <div id="card-penilaian-akhir" class="card">
                                <div class="card-header">
                                    <h4>Penilaian Akhir</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a id="tambah-data-penilaian-akhir"
                                            class="btn btn-primary f-w-500" href="#"><i
                                                class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nik</th>
                                                    <th>Nama</th>
                                                    <th>Nilai PA</th>
                                                    <th>Tahun</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($penilaianAkhir->isEmpty())
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak ada data penilaian
                                                            akhir</td>
                                                    </tr>
                                                @else
                                                    @foreach ($penilaianAkhir as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->nik ?? '-' }}</td>
                                                            <td>{{ $data->nama ?? '-' }}</td>
                                                            <td>{{ $data->nilai_pa ?? '-' }}</td>
                                                            <td>{{ $data->tahun_pa ?? '-' }}</td>
                                                            <td>
                                                                <a type="button"
                                                                    class="btn btn-success btn-edit-penilaian-akhir"
                                                                    data-id_pa ="{{ $data->id_pa }}"
                                                                    data-nilai_pa ="{{ $data->nilai_pa }}"
                                                                    data-tahun_pa ="{{ $data->tahun_pa }}"
                                                                    title="edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                                <a type="button"
                                                                    class="btn btn-danger btn-delete-penilaian-akhir"
                                                                    data-url="{{ route('penilaian-akhir.delete') }}"
                                                                    data-id_pa ="{{ $data->id_pa }}"
                                                                    data-name="{{ $data->tahun_pa }}" title="hapus">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="form-penilaian-akhir-data" class="card d-none">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-form-penilaian-akhir">Tambah Data Penilaian Akhir</h4>
                                    <div id="loading-text-form-penilaian-akhir" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary"
                                            role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataPenilaianAkhir" class="row g-3"
                                        action="{{ route('penilaian-akhir.create') }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="id_pa" id="id_pa">
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nilai_pa"><span style="color: red">*
                                                </span>Nilai Pa</label>
                                            <input name="nilai_pa" class="form-control" type="text"
                                                value="" placeholder="Contoh: 3.46">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="tahun_pa"><span style="color: red">*
                                                </span>Tahun</label>
                                            <input name="tahun_pa" class="form-control" type="text"
                                                value="" placeholder="Contoh: 2025">
                                        </div>
                                        <input type="text" value="{{ $pegawai->nik }}" name = "nik" hidden>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary"
                                                id="btn-kembali-penilaian-akhir">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pelatihan">
                            <div id="card-pelatihan" class="card">
                                <div class="card-header">
                                    <h4>Pelatihan</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a id="tambah-data-pelatihan"
                                            class="btn btn-primary f-w-500" href="#"><i
                                                class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Pelatihan</th>
                                                    <th>Sertifikasi Kompetensi</th>
                                                    <th>Nama Pelatihan</th>
                                                    <th>Tempat</th>
                                                    <th>Penyelenggara</th>
                                                    <th>Tanggal Pelaksanaan</th>
                                                    <th>Nomor & Tgl Piagam</th>
                                                    <th>Sertifikat<br />&nbsp;</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($pelatihan->isEmpty())
                                                    <tr>
                                                        <td colspan="9" class="text-center">Tidak ada data pelatihan
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($pelatihan as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                @if ($data->jenis_pelatihan == 'Lain-lain')
                                                                    {{ $data->jenis_pelatihan }}
                                                                    ({{ $data->lainlain_pelatihan }})
                                                                @else
                                                                    {{ $data->jenis_pelatihan }}
                                                                @endif
                                                            </td>
                                                            <td>{{ $data->sertifikat_kompetensi ?? '-' }}</td>
                                                            <td>{{ $data->nama_pelatihan ?? '-' }}</td>
                                                            <td>{{ $data->tempat_pelatihan ?? '-' }}</td>
                                                            <td>{{ $data->penyelenggara ?? '-' }}</td>
                                                            <td>{{ $data->tanggal_mulai_pelatihan ?? '-' }} s/d
                                                                {{ $data->tanggal_selesai_pelatihan }}</td>
                                                            <td>{{ $data->nomor_sertifikat_pelatihan ?? '-' }} <br />
                                                                {{ $data->tanggal_sertifikat_pelatihan }}</td>
                                                            <td>
                                                                @if ($data->file_sertifikat == '')
                                                                    -
                                                                @else
                                                                    <a href="{{ asset("storage/assets/file/sertifikat_pelatihan/$data->file_sertifikat") }}"
                                                                        target='_blank' title='file pelatihan'><i
                                                                            class="fas fa-file-text"></i></a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a type="button"
                                                                    class="btn btn-success btn-edit-pelatihan"
                                                                    data-id_pelatihan ="{{ $data->id_pelatihan }}"
                                                                    data-jenis_pelatihan ="{{ $data->jenis_pelatihan }}"
                                                                    data-sertifikat_kompetensi ="{{ $data->sertifikat_kompetensi }}"
                                                                    data-nama_pelatihan ="{{ $data->nama_pelatihan }}"
                                                                    data-lainlain_pelatihan ="{{ $data->lainlain_pelatihan }}"
                                                                    data-tempat_pelatihan ="{{ $data->tempat_pelatihan }}"
                                                                    data-penyelenggara ="{{ $data->penyelenggara }}"
                                                                    data-tanggal_mulai_pelatihan ="{{ $data->tanggal_mulai_pelatihan }}"
                                                                    data-tanggal_selesai_pelatihan ="{{ $data->tanggal_selesai_pelatihan }}"
                                                                    data-nomor_sertifikat_pelatihan ="{{ $data->nomor_sertifikat_pelatihan }}"
                                                                    data-tanggal_sertifikat_pelatihan ="{{ $data->tanggal_sertifikat_pelatihan }}"
                                                                    data-file_sertifikat ="{{ $data->file_sertifikat }}"
                                                                    title="edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                                <a type="button"
                                                                    class="btn btn-danger btn-delete-pelatihan"
                                                                    data-url="{{ route('pelatihan.delete') }}"
                                                                    data-id_pelatihan  ="{{ $data->id_pelatihan }}"
                                                                    data-name="{{ $data->nama_pelatihan }}"
                                                                    title="hapus">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="form-pelatihan-data" class="card d-none">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-form-pelatihan">Tambah Data Pelatihan</h4>
                                    <div id="loading-text-form-pelatihan" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary"
                                            role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataPelatihan" class="row g-3"
                                        action="{{ route('pelatihan.create') }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="id_pelatihan" id="id_pelatihan">
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="jenis_pelatihan"><span
                                                    style="color: red">*</span> Jenis Pelatihan</label>
                                            <select class="form-select" name="jenis_pelatihan" id="jenis_pelatihan"
                                                required>
                                                <option selected disabled value="">...</option>
                                                <option value="Seminar">Seminar</option>
                                                <option value="Pelatihan">Pelatihan</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative" id="lainlain_pelatihan_container"
                                            style="display: none;">
                                            <label class="form-label" for="lainlain_pelatihan"><span
                                                    style="color: red">*</span> Jenis Pelatihan Lainnya</label>
                                            <input name="lainlain_pelatihan" id="lainlain_pelatihan"
                                                class="form-control" type="text" value=""
                                                placeholder="Silahkan isi jenis pelatihan lainnya">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="sertifikat_kompetensi"><span
                                                    style="color: red">*</span> Sertifikat Kompetensi</label>
                                            <select class="form-select" name="sertifikat_kompetensi" required>
                                                <option selected disabled value="">...</option>
                                                <option value="Iya">Iya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nama_pelatihan"><span style="color: red">*
                                                </span>Nama Pelatihan</label>
                                            <input name="nama_pelatihan" class="form-control" type="text"
                                                value="" placeholder="Contoh: Pelatihan Power BI" required>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="tempat_pelatihan">Tempat Pelatihan</label>
                                            <input name="tempat_pelatihan" class="form-control" type="text"
                                                value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="penyelenggara">Penyelenggara</label>
                                            <input name="penyelenggara" class="form-control" type="text"
                                                value="">
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tanggal_mulai_pelatihan">Tanggal Mulai
                                                Pelatihan</label>
                                            <input class="form-control" name="tanggal_mulai_pelatihan"
                                                id="human-friendly" type="text"
                                                value="{{ old('tanggal_mulai_pelatihan', $pegawai->tanggal_mulai_pelatihan) }}">
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tanggal_selesai_pelatihan">Tanggal Selesai
                                                Pelatihan</label>
                                            <input class="form-control" name="tanggal_selesai_pelatihan"
                                                id="human-friendly" type="text"
                                                value="{{ old('tanggal_selesai_pelatihan', $pegawai->tanggal_selesai_pelatihan) }}">
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="nomor_sertifikat_pelatihan">Nomor Sertifikat
                                                Pelatihan</label>
                                            <input name="nomor_sertifikat_pelatihan" class="form-control"
                                                type="text" value="">
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="tanggal_sertifikat_pelatihan">Tanggal
                                                Sertifikat Pelatihan</label>
                                            <input class="form-control" name="tanggal_sertifikat_pelatihan"
                                                id="human-friendly" type="text"
                                                value="{{ old('tanggal_sertifikat_pelatihan', $pegawai->tanggal_sertifikat_pelatihan) }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="formFile">Sertifikat</label>
                                            <div id="file-preview-sertifikat" class="mb-2"></div>
                                            <!-- tempat untuk preview -->
                                            <input class="form-control" name="file_sertifikat" id="formFile"
                                                type="file">
                                        </div>
                                        <input type="text" value="{{ $pegawai->nik }}" name = "nik" hidden>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary"
                                                id="btn-kembali-pelatihan">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="penghargaan">
                            <div id="card-penghargaan" class="card">
                                <div class="card-header">
                                    <h4>Penghargaan</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a id="tambah-data-penghargaan"
                                            class="btn btn-primary f-w-500" href="#"><i
                                                class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Penghargaan</th>
                                                    <th>Tahun</th>
                                                    <th>Negara / Instansi Pemberi</th>
                                                    <th>Document</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($penghargaan->isEmpty())
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak ada data
                                                            penghargaan
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($penghargaan as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->penghargaan ?? '-' }}</td>
                                                            <td>{{ $data->tahun ?? '-' }}</td>
                                                            <td>{{ $data->pemberi ?? '-' }}</td>
                                                            <td>
                                                                @if ($data->file == '')
                                                                    -
                                                                @else
                                                                    <a href="{{ asset("storage/assets/file/penghargaan/$data->file") }}"
                                                                        target='_blank' title='file penghargaan'><i
                                                                            class="fas fa-file-text"></i></a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a type="button"
                                                                    class="btn btn-success btn-edit-penghargaan"
                                                                    data-id_penghargaan ="{{ $data->id_penghargaan }}"
                                                                    data-penghargaan ="{{ $data->penghargaan }}"
                                                                    data-tahun ="{{ $data->tahun }}"
                                                                    data-pemberi ="{{ $data->pemberi }}"
                                                                    data-file ="{{ $data->file }}" title="edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                                <a type="button"
                                                                    class="btn btn-danger btn-delete-penghargaan"
                                                                    data-url="{{ route('penghargaan.delete') }}"
                                                                    data-id_penghargaan  ="{{ $data->id_penghargaan }}"
                                                                    data-name="{{ $data->penghargaan }}"
                                                                    title="hapus">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="form-penghargaan-data" class="card d-none">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-form-penghargaan">Tambah Data Penghargaan</h4>
                                    <div id="loading-text-form-penghargaan" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary"
                                            role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataPenghargaan" class="row g-3"
                                        action="{{ route('penghargaan.create') }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="id_penghargaan" id="id_penghargaan">
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="penghargaan"><span style="color: red">*
                                                </span>Nama Penghargaan</label>
                                            <input name="penghargaan" class="form-control" type="text"
                                                value="" required>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="tahun">Tahun</label>
                                            <input name="tahun" class="form-control" maxlength="4" type="text"
                                                value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="pemberi">Negara / Instansi Pemberi</label>
                                            <input name="pemberi" class="form-control" maxlength="64" type="text"
                                                value="">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="formFile">File Pendukung</label>
                                            <div id="file-preview-penghargaan" class="mb-2"></div>
                                            <!-- tempat untuk preview -->
                                            <input class="form-control" name="file" id="formFile"
                                                type="file">
                                        </div>
                                        <input type="text" value="{{ $pegawai->nik }}" name = "nik" hidden>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary"
                                                id="btn-kembali-penghargaan">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="surat-peringatan">
                            <div id="card-surat-peringatan" class="card">
                                <div class="card-header">
                                    <h4>Surat Peringatan/Teguran</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a id="tambah-data-surat-peringatan"
                                            class="btn btn-primary f-w-500" href="#"><i
                                                class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis SP/ST</th>
                                                    <th>Masa Berlaku</th>
                                                    <th>Keterangan</th>
                                                    <th>File Pendukung</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($suratPeringatan->isEmpty())
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak ada data surat
                                                            peringatan
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($suratPeringatan as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->jenis_sp }}</td>
                                                            <td>
                                                                {{ $data->periode_awal ?? '-' }} s/d
                                                                {{ $data->periode_akhir }}
                                                            </td>
                                                            <td>{{ $data->keterangan ?? '-' }}</td>
                                                            <td>
                                                                @if ($data->file == '')
                                                                    -
                                                                @else
                                                                    <a href="{{ asset("storage/assets/file/sp/$data->file") }}"
                                                                        target='_blank' title='file surat peringatan'><i
                                                                            class="fas fa-file-text"></i></a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a type="button"
                                                                    class="btn btn-success btn-edit-surat-peringatan"
                                                                    data-id_sp ="{{ $data->id_sp }}"
                                                                    data-jenis_sp ="{{ $data->jenis_sp }}"
                                                                    data-periode_awal ="{{ $data->periode_awal }}"
                                                                    data-periode_akhir ="{{ $data->periode_akhir }}"
                                                                    data-keterangan ="{{ $data->keterangan }}"
                                                                    data-file ="{{ $data->file }}" title="edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                                <a type="button"
                                                                    class="btn btn-danger btn-delete-surat-peringatan"
                                                                    data-url="{{ route('surat-peringatan.delete') }}"
                                                                    data-id_sp  ="{{ $data->id_sp }}"
                                                                    data-name="{{ $data->jenis_sp }}" title="hapus">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="form-surat-peringatan-data" class="card d-none">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-form-surat-peringatan">Tambah Data Surat Peringatan</h4>
                                    <div id="loading-text-form-surat-peringatan" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary"
                                            role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataSuratPeringatan" class="row g-3"
                                        action="{{ route('surat-peringatan.create') }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="id_sp" id="id_sp">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="periode_awal"><span
                                                    style="color: red">*</span> Tanggal Mulai SP/Teguran</label>
                                            <input class="form-control" name="periode_awal" id="human-friendly"
                                                type="text" value="" required>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="periode_akhir"><span
                                                    style="color: red">*</span> Tanggal Selesai SP/Teguran</label>
                                            <input class="form-control" name="periode_akhir" id="human-friendly"
                                                type="text" value="" required>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="jenis_sp"><span style="color: red">*</span>
                                                Jenis SP/Teguran</label>
                                            <select class="form-select" name="jenis_sp" required>
                                                <option selected disabled value="">...</option>
                                                <option value="ST">ST</option>
                                                <option value="SP1">SP1</option>
                                                <option value="SP2">SP2</option>
                                                <option value="SP3">SP3</option>
                                                <option value="PHK">PHK</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="keterangan">Keterangan</label>
                                            <input name="keterangan" class="form-control" type="text"
                                                value="">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="formFile">File Pendukung</label>
                                            <div id="file-preview-surat-peringatan" class="mb-2"></div>
                                            <!-- tempat untuk preview -->
                                            <input class="form-control" name="file" id="formFile"
                                                type="file">
                                        </div>
                                        <input type="text" value="{{ $pegawai->nik }}" name = "nik" hidden>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary"
                                                id="btn-kembali-surat-peringatan">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="karir">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Transisi Karir</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a class="btn btn-primary f-w-500"
                                            href="#"><i class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Transisi No</th>
                                                    <th>Jenis Transisi</th>
                                                    <th>Tanggal Mulai</th>
                                                    {{-- <th>Tanggal Akhir</th> --}}
                                                    <th>Nik</th>
                                                    <th>Posisi</th>
                                                    <th>Jabatan</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($transisiKarir->isEmpty())
                                                    <tr>
                                                        <td colspan="9" class="text-center">Tidak ada data transisi
                                                            karir
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($transisiKarir as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><a href="#">{{ $data->transisi_no }}</a></td>
                                                            <td>{{ $data->jenis_transisi }}</td>
                                                            <td>{{ $data->tanggal_transisi_mulai ?? '-' }}</td>
                                                            {{-- <td>{{ $data->tanggal_transisi_akhir ?? '-' }}</td> --}}
                                                            <td>{{ $data->nik }}</td>
                                                            <td>{{ $data->posisi_baru }}</td>
                                                            <td>{{ $data->jabatan_baru_nama }}</td>
                                                            <td>
                                                                <a type="button" class="btn btn-success"
                                                                    href="#" title="edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                                <a type="button" class="btn btn-danger btn-delete"
                                                                    data-url="#" data-name="" title="hapus">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="bahasa">
                            <div id="card-bahasa" class="card">
                                <div class="card-header">
                                    <h4>Bahasa</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a id="tambah-data-bahasa"
                                            class="btn btn-primary f-w-500" href="#"><i
                                                class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Bahasa</th>
                                                    <th>Bahasa</th>
                                                    <th>Kemampuan Bicara</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($bahasa->isEmpty())
                                                    <tr>
                                                        <td colspan="5" class="text-center">Tidak ada data bahasa
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($bahasa as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->jns_bhs ?? '-' }}</td>
                                                            <td>{{ $data->bahasa ?? '-' }}</td>
                                                            <td>{{ $data->kemampuan ?? '-' }}</td>
                                                            <td>
                                                                <a type="button"
                                                                    class="btn btn-success btn-edit-bahasa"
                                                                    data-id_bhs ="{{ $data->id_bhs }}"
                                                                    data-jns_bhs ="{{ $data->jns_bhs }}"
                                                                    data-bahasa ="{{ $data->bahasa }}"
                                                                    data-kemampuan ="{{ $data->kemampuan }}"
                                                                    title="edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                                <a type="button"
                                                                    class="btn btn-danger btn-delete-bahasa"
                                                                    data-url="{{ route('bahasa.delete') }}"
                                                                    data-id_bhs = "{{ $data->id_bhs }}"
                                                                    data-name="{{ $data->bahasa }}" title="hapus">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="form-bahasa-data" class="card d-none">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-form-bahasa">Tambah Data Bahasa</h4>
                                    <div id="loading-text-form-bahasa" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary"
                                            role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataBahasa" class="row g-3" action="{{ route('bahasa.create') }}"
                                        method="post" enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="id_bhs" id="id_bhs">
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="jns_bhs"><span style="color: red">*</span>
                                                Jenis Bahasa</label>
                                            <input name="jns_bhs" maxlength="32" class="form-control" type="text"
                                                value="" required>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="bahasa">Bahasa</label>
                                            <input name="bahasa" maxlength="32" class="form-control" type="text"
                                                value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="kemampuan">Kemampuan</label>
                                            <select class="form-select" name="kemampuan">
                                                <option selected disabled value="">...</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Pasif">Pasif</option>
                                            </select>
                                        </div>
                                        <input type="text" value="{{ $pegawai->nik }}" name = "nik" hidden>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary"
                                                id="btn-kembali-bahasa">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="bank">
                            <div id="card-bank" class="card">
                                <div class="card-header">
                                    <h4>Rekening Bank</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a id="tambah-data-bank"
                                            class="btn btn-primary f-w-500" href="#"><i
                                                class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nomor Rekening</th>
                                                    <th>Nama Bank</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($bank->isEmpty())
                                                    <tr>
                                                        <td colspan="4" class="text-center">Tidak ada data bank
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($bank as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->nomor_account ?? '-' }}</td>
                                                            <td>{{ $data->nama_bank ?? '-' }}</td>
                                                            <td>
                                                                <a type="button" class="btn btn-success btn-edit-bank"
                                                                    data-id_account ="{{ $data->id_account }}"
                                                                    data-nomor_account ="{{ $data->nomor_account }}"
                                                                    data-nama_bank ="{{ $data->nama_bank }}"
                                                                    data-keterangan ="{{ $data->keterangan }}"
                                                                    title="edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                                <a type="button" class="btn btn-danger btn-delete-bank"
                                                                    data-url="{{ route('bank.delete') }}"
                                                                    data-id_account = "{{ $data->id_account }}"
                                                                    data-name="Nomor Akun Bank: {{ $data->nomor_account }}"
                                                                    data-name="" title="hapus">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="form-bank-data" class="card d-none">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-form-bank">Tambah Data Bank</h4>
                                    <div id="loading-text-form-bank" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary"
                                            role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataBank" class="row g-3" action="{{ route('bank.create') }}"
                                        method="post" enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="id_account" id="id_account">
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nomor_account"><span
                                                    style="color: red">*</span> Nomor Account</label>
                                            <input name="nomor_account" maxlength="32" class="form-control"
                                                type="text" value="" required>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nama_bank"><span
                                                    style="color: red">*</span> Bank</label>
                                            <input name="nama_bank" maxlength="32" class="form-control"
                                                type="text" value="" required>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="keterangan">Keterangan</label>
                                            <input name="keterangan" maxlength="32" class="form-control"
                                                type="text" value="">
                                        </div>
                                        <input type="text" value="{{ $pegawai->nik }}" name = "nik" hidden>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary"
                                                id="btn-kembali-bank">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="npwp">
                            <div id="card-npwp" class="card">
                                <div class="card-header">
                                    <h4>NPWP</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a id="tambah-data-npwp"
                                            class="btn btn-primary f-w-500" href="#"><i
                                                class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nomor NPWP</th>
                                                    <th>PTKP</th>
                                                    <th>Tanggal Terdaftar</th>
                                                    <th>Alamat</th>
                                                    <th>File NPWP</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($npwp->isEmpty())
                                                    <tr>
                                                        <td colspan="7" class="text-center">Tidak ada data npwp
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($npwp as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->nomor_npwp ?? '-' }}</td>
                                                            <td>{{ $data->tanggungan ?? '-' }}</td>
                                                            <td>
                                                                @if ($data->tgl_terdaftar == '0000-00-00' || $data->tgl_terdaftar == null)
                                                                    -
                                                                @else
                                                                    {{ $data->tgl_terdaftar }}
                                                                @endif
                                                            </td>
                                                            <td>{{ $data->alamat ?? '-' }}</td>
                                                            <td>
                                                                @if ($data->file == '')
                                                                    -
                                                                @else
                                                                    <a href="{{ asset("storage/assets/file/npwp/$data->file") }}"
                                                                        target='_blank' title='npwp'><i
                                                                            class="fas fa-file-text"></i></a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a type="button" class="btn btn-success btn-edit-npwp"
                                                                    data-id_npwp ="{{ $data->id_npwp }}"
                                                                    data-nomor_npwp ="{{ $data->nomor_npwp }}"
                                                                    data-tanggungan ="{{ $data->tanggungan }}"
                                                                    data-tgl_terdaftar ="{{ $data->tgl_terdaftar }}"
                                                                    data-alamat ="{{ $data->alamat }}"
                                                                    data-file ="{{ $data->file }}" title="edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                                <a type="button" class="btn btn-danger btn-delete-npwp"
                                                                    data-url="{{ route('npwp.delete') }}"
                                                                    data-id_npwp ="{{ $data->id_npwp }}"
                                                                    data-name="Nomor NPWP: {{ $data->nomor_npwp }}"
                                                                    title="hapus">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="form-npwp-data" class="card d-none">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-form-npwp">Tambah Data NPWP</h4>
                                    <div id="loading-text-form-npwp" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary"
                                            role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataNpwp" class="row g-3" action="{{ route('npwp.create') }}"
                                        method="post" enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="id_npwp" id="id_npwp">
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nomor_npwp"><span
                                                    style="color: red">*</span> Nomor NPWP</label>
                                            <input name="nomor_npwp" class="form-control" type="text"
                                                value="" required>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="tanggungan"><span
                                                    style="color: red">*</span> PTKP</label>
                                            <select class="form-select" name="tanggungan" required>
                                                <option selected disabled value="">...</option>
                                                <option value="TK/0">TK/0 (Tidak Kawin 0 Tanggungan)</option>
                                                <option value="TK/1">TK/1 (Tidak Kawin 1 Tanggungan)</option>
                                                <option value="TK/2">TK/2 (Tidak Kawin 2 Tanggungan)</option>
                                                <option value="TK/3">TK/3 (Tidak Kawin 3 Tanggungan)</option>
                                                <option value="K/0">K/0 (Kawin 0 Tanggungan)</option>
                                                <option value="K/1">K/1 (Kawin 1 Tanggungan)</option>
                                                <option value="K/2">K/2 (Kawin 2 Tanggungan)</option>
                                                <option value="K/3">K/3 (Kawin 3 Tanggungan)</option>
                                                <option value="KI/0">KI/0 (Kawin penghasilan istri digabung 0
                                                    Tanggungan)</option>
                                                <option value="KI/1">KI/1 (Kawin penghasilan istri digabung 1
                                                    Tanggungan)</option>
                                                <option value="KI/2">KI/2 (Kawin penghasilan istri digabung 2
                                                    Tanggungan)</option>
                                                <option value="KI/3">KI/3 (Kawin penghasilan istri digabung 3
                                                    Tanggungan)</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="tgl_terdaftar"> Tanggal Terdaftar</label>
                                            <input class="form-control" name="tgl_terdaftar" id="human-friendly"
                                                type="text" value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="alamat">Alamat</label>
                                            <textarea name="alamat" class="form-control" type="text" value=""></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="formFile">File Pendukung</label>
                                            <div id="file-preview-npwp" class="mb-2"></div>
                                            <!-- tempat untuk preview -->
                                            <input class="form-control" name="file" id="formFile"
                                                type="file">
                                        </div>
                                        <input type="text" value="{{ $pegawai->nik }}" name = "nik" hidden>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary"
                                                id="btn-kembali-npwp">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pengalaman-kerja">
                            <div id="card-pengalaman-kerja" class="card">
                                <div class="card-header">
                                    <h4>Pengalaman Kerja</h4>
                                </div>
                                <div class="card-header card-no-border text-end">
                                    <div class="card-header-right-icon"><a id="tambah-data-pengalaman-kerja"
                                            class="btn btn-primary f-w-500" href="#"><i
                                                class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Perusahaan<br />&nbsp;</th>
                                                    <th>Periode Mulai<br />Periode Akhir</th>
                                                    <th>Alamat<br />&nbsp;</th>
                                                    <th>Posisi Awal<br />Posisi Akhir</th>
                                                    <th>Paklaring<br />&nbsp;</th>
                                                    <th>Keterangan<br />&nbsp;</th>
                                                    <th>Action<br />&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($pengalamanKerja->isEmpty())
                                                    <tr>
                                                        <td colspan="8" class="text-center">Tidak ada data pengalaman
                                                            kerja
                                                        </td>
                                                    </tr>
                                                @else
                                                    @foreach ($pengalamanKerja as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->nama_perusahaan ?? '-' }}</td>
                                                            <td>{{ $data->periode_start ?? '-' }}&nbsp;<strong>s/d</strong>&nbsp;{{ $data->periode_end ?? '-' }}
                                                            </td>
                                                            <td>{{ $data->alamat ?? '-' }}</td>
                                                            <td>{{ $data->posisi_awal ?? '-' }}&nbsp;<strong>s/d</strong>&nbsp;{{ $data->posisi_akhir ?? '-' }}
                                                            </td>
                                                            <td>
                                                                @if ($data->file == '')
                                                                    -
                                                                @else
                                                                    <a href="{{ asset("storage/assets/file/paklaring/$data->file") }}"
                                                                        target='_blank' title='paklaring'><i
                                                                            class="fas fa-file-text"></i></a>
                                                                @endif
                                                            </td>
                                                            <td>{{ $data->keterangan ?? '-' }}</td>
                                                            <td>
                                                                <a type="button"
                                                                    class="btn btn-success btn-edit-pengalaman-kerja"
                                                                    data-id_history ="{{ $data->id_history }}"
                                                                    data-periode_start ="{{ $data->periode_start }}"
                                                                    data-periode_end ="{{ $data->periode_end }}"
                                                                    data-nama_perusahaan ="{{ $data->nama_perusahaan }}"
                                                                    data-jenis_usaha ="{{ $data->jenis_usaha }}"
                                                                    data-alamat ="{{ $data->alamat }}"
                                                                    data-posisi_awal ="{{ $data->posisi_awal }}"
                                                                    data-posisi_akhir ="{{ $data->posisi_akhir }}"
                                                                    data-jumlah_karyawan ="{{ $data->jumlah_karyawan }}"
                                                                    data-keterangan ="{{ $data->keterangan }}"
                                                                    data-file ="{{ $data->file }}" title="edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                                <a type="button"
                                                                    class="btn btn-danger btn-delete-pengalaman-kerja"
                                                                    data-url="{{ route('pengalaman-kerja.delete') }}"
                                                                    data-id_history ="{{ $data->id_history }}"
                                                                    data-name="Pengalaman Kerja: {{ $data->nama_perusahaan }}"
                                                                    title="hapus">
                                                                    <i class="fa-solid fa-trash-can"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="form-pengalaman-kerja-data" class="card d-none">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-form-pengalaman-kerja">Tambah Data Pengalaman Kerja</h4>
                                    <div id="loading-text-form-pengalaman-kerja" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary"
                                            role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataPengalamanKerja" class="row g-3"
                                        action="{{ route('pengalaman-kerja.create') }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="id_history" id="id_history">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="periode_start">Periode Awal Kerja</label>
                                            <input class="form-control" name="periode_start" placeholder="Mulai"
                                                id="human-friendly" type="text" value="">
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="periode_end">Periode Akhir Kerja</label>
                                            <input class="form-control" name="periode_end" placeholder="Akhir"
                                                id="human-friendly" type="text" value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nama_perusahaan"><span
                                                    style="color: red">*</span> Nama Perusahaan</label>
                                            <input name="nama_perusahaan" class="form-control" type="text"
                                                maxlength="50" value="" required>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="jenis_usaha">Jenis Usaha</label>
                                            <input name="jenis_usaha" class="form-control" type="text"
                                                maxlength="255" value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="alamat">Alamat</label>
                                            <textarea name="alamat" class="form-control" type="text" value=""></textarea>
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="posisi_awal">Posisi Awal</label>
                                            <input name="posisi_awal" class="form-control" type="text"
                                                maxlength="255" value="" placeholder="Awal">
                                        </div>
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="posisi_akhir">Posisi Akhir</label>
                                            <input name="posisi_akhir" class="form-control" type="text"
                                                maxlength="255" value="" placeholder="Akhir">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="jumlah_karyawan">Jumlah Karyawan</label>
                                            <input name="jumlah_karyawan" class="form-control" type="number"
                                                value="">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="keterangan">Keterangan</label>
                                            <input name="keterangan" class="form-control" type="text"
                                                maxlength="255" value="">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="formFile">File Paklaring</label>
                                            <div id="file-preview-pengalaman-kerja" class="mb-2"></div>
                                            <!-- tempat untuk preview -->
                                            <input class="form-control" name="file" id="formFile"
                                                type="file">
                                        </div>
                                        <input type="text" value="{{ $pegawai->nik }}" name = "nik" hidden>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary"
                                                id="btn-kembali-pengalaman-kerja">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="rekam-medis">
                            <div id="card-rekam-medis" class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-rekam-medis">Rekam Medis</h4>
                                    <div id="loading-text-rekam-medis" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary"
                                            role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataRekamMedis" class="row g-3"
                                        action="{{ route('rekam-medis.update', $pegawai->nik) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="tinggi_badan">Tinggi Badan</label>
                                            <div class="input-group">
                                                <input name="tinggi_badan" class="form-control" id="tinggi_badan"
                                                    type="text" placeholder="Contoh: 150, 161, 163"
                                                    value="{{ old('tinggi_badan', $pegawai->tinggi_badan) }}">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="berat_badan">Berat Badan</label>
                                            <div class="input-group">
                                                <input name="berat_badan" class="form-control" id="berat_badan"
                                                    type="text" placeholder="Contoh: 56, 60, 63"
                                                    value="{{ old('berat_badan', $pegawai->berat_badan) }}">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="lensa_kacamata">Lensa Kacamata</label>
                                            <input name="lensa_kacamata" class="form-control" id="lensa_kacamata"
                                                type="text" placeholder="Contoh: Minus 1 (Kanan) Minus 1,5 (Kiri)"
                                                value="{{ old('lensa_kacamata', $pegawai->lensa_kacamata) }}">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="ukuran_baju">Ukuran Baju</label>
                                            <input name="ukuran_baju" class="form-control" id="ukuran_baju"
                                                type="text" placeholder="Contoh: XL, L, M, S"
                                                value="{{ old('ukuran_baju', $pegawai->ukuran_baju) }}">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="ukuran_sepatu">Ukuran Sepatu</label>
                                            <input name="ukuran_sepatu" class="form-control" id="ukuran_sepatu"
                                                type="text" placeholder="Contoh: 40, 41, 42, 43"
                                                value="{{ old('ukuran_sepatu', $pegawai->ukuran_sepatu) }}">
                                        </div>
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary" type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="user-account">
                            <div id="card-user-account" class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 id="header-title-user-account">User Akun</h4>
                                    <div id="loading-text-user-account" class="d-none">
                                        <span class="spinner-border spinner-border-sm text-primary"
                                            role="status"></span>
                                        <span class="text-primary ms-2">Memperbarui data...</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="formDataUserAccount" class="row g-3"
                                        action="{{ route('user-account.update', $pegawai->nik) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nik">NIK</label>
                                            <input disabled name="nik" class="form-control" id="nik"
                                                type="text" value="{{ old('nik', $pegawai->nik) }}">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="nama">Nama</label>
                                            <input disabled name="nama" class="form-control" id="nama"
                                                type="text" value="{{ old('nama', $pegawai->nama) }}">
                                        </div>
                                        <div class="col-12 position-relative">
                                            <label class="form-label" for="status_karyawan">Status Karyawan</label>
                                            <select class="form-select" name="status_karyawan" id="status_karyawan">
                                                <option selected disabled value="">Pilih Status Karyawan</option>
                                                <option value="Active" @selected(old('status_karyawan', $pegawai->status_karyawan) == 'Active')>Active</option>
                                                <option value="Inactive" @selected(old('status_karyawan', $pegawai->status_karyawan) == 'Inactive')>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-12 position-relative d-none" id="tanggal-keluar-group">
                                            <label class="form-label" for="tanggal_keluar">Tanggal Keluar</label>
                                            <input class="form-control" name="tanggal_keluar" id="human-friendly"
                                                type="text"
                                                value="{{ old('tanggal_keluar', $pegawai->tanggal_keluar) }}">
                                        </div>
                                        {{-- <div class="col-12 d-flex justify-content-between"> --}}
                                        <div class="col-12 d-flex justify-content-end">
                                            {{-- <button type="button" class="btn btn-danger btn-delete-akun"
                                                data-url="{{ route('user-account.delete') }}"
                                                data-nik = "{{ $pegawai->nik }}" data-name="{{ $pegawai->nama }}"
                                                title="delete akun">
                                                Delete Akun
                                            </button> --}}
                                            <button class="btn btn-primary" type="submit">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Main Content -->
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('script')
    <script src="{{ asset('assets/js/flat-pickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/flat-pickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <script>
        function triggerFileInput() {
            document.getElementById("input-foto-karyawan").click();
        }

        function previewFoto(event) {
            const file = event.target.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append("foto", file);

            const preview = document.getElementById("preview-foto-karyawan");
            const loading = document.getElementById("loading-overlay");
            loading.style.display = "flex";

            fetch("{{ route('employee.update-photo', $pegawai->nik) }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    preview.src = URL.createObjectURL(file);
                } else {
                    alert("Gagal mengunggah foto.");
                }
            })
            .catch(error => {
                console.error(error);
                alert("Terjadi kesalahan.");
            })
            .finally(() => {
                loading.style.display = "none";
            });
        }
    </script> --}}

    <script>
        function triggerFileInput() {
            document.getElementById("input-foto-karyawan").click();
        }

        function previewFoto(event) {
            const file = event.target.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append("foto", file);

            const preview = document.getElementById("preview-foto-karyawan");
            const loading = document.getElementById("loading-overlay");
            loading.style.display = "flex";

            fetch("{{ route('employee.update-photo', $pegawai->nik) }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => {
                    // Cek jika response tidak OK (status bukan 2xx)
                    if (!response.ok) {
                        return response.text().then(text => {
                            throw new Error(text || 'Terjadi kesalahan server');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === "success") {
                        // Update preview dengan URL baru dari server
                        preview.src = data.new_url;

                        // alert('Foto berhasil diupdate!');

                        const alertContainer = document.getElementById("alert-container");
                        alertContainer.innerHTML = `
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <i data-feather='check-square'></i> Ganti Foto berhasil diperbarui!
                                <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        `;
                        // Optional: aktifkan feather icon (jika digunakan)
                        if (typeof feather !== 'undefined') feather.replace();

                        setTimeout(() => {
                            alertContainer.innerHTML = '';
                        }, 2000);
                    } else {
                        throw new Error(data.message || 'Gagal mengunggah foto');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);

                    try {
                        // Coba parse error message jika berupa JSON
                        const errorData = JSON.parse(error.message);
                        alert(`Error: ${errorData.message || error.message}`);
                    } catch (e) {
                        // Jika bukan JSON, tampilkan pesan asli
                        alert(`Error: ${error.message}`);
                    }

                    // Reset input file
                    event.target.value = '';
                })
                .finally(() => {
                    loading.style.display = "none";
                });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status_karyawan');
            const tanggalKeluarGroup = document.getElementById('tanggal-keluar-group');

            function toggleTanggalKeluar() {
                if (statusSelect.value === 'Inactive') {
                    tanggalKeluarGroup.classList.remove('d-none');
                } else {
                    tanggalKeluarGroup.classList.add('d-none');
                }
            }

            // Jalankan saat halaman dimuat (untuk data lama)
            toggleTanggalKeluar();

            // Jalankan saat user mengganti pilihan
            statusSelect.addEventListener('change', toggleTanggalKeluar);
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let successAlert = document.getElementById("success-alert");
            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.opacity = "0"; // Fade out
                    setTimeout(() => {
                        successAlert.remove(); // Hapus dari DOM setelah animasi selesai
                    }, 500); // Tunggu 0.5 detik agar efek fade-out terlihat
                }, 5000); // 5 detik
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fungsi untuk menyembunyikan semua tab (kecuali yang aktif saat ini)
            function resetTabs() {
                document.querySelectorAll(".tab-pane").forEach(tab => {
                    tab.classList.remove("show", "active"); // Sembunyikan semua tab konten
                });

                document.querySelectorAll(".nav-link").forEach(link => {
                    link.classList.remove("active"); // Reset semua tab link
                });
            }

            // Tambahkan event listener ke setiap nav-link dalam accordion
            document.querySelectorAll(".nav-link").forEach(link => {
                link.addEventListener("click", function() {
                    resetTabs(); // Reset dulu biar hanya satu tab yang aktif

                    let targetTab = document.querySelector(this.getAttribute(
                        "href")); // Ambil target tab
                    if (targetTab) {
                        targetTab.classList.add("show", "active"); // Tampilkan konten tab
                    }

                    this.classList.add("active"); // Tandai tab yang aktif
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-id"); // FIXED!
                let itemType = button.getAttribute("data-type");
                let itemName = button.getAttribute("data-name");

                // console.log("Delete URL:", deleteUrl);
                // console.log("ID:", itemId);
                // console.log("Type:", itemType);

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    id: itemId,
                                    type: itemType
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white" // Styling tombol OK
                                        }
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on("submit", "#formDataPribadi", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = form.serialize();

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Sembunyikan card-body dengan animasi, hanya menyisakan card-header
            $("#data-pribadi .card-body").slideUp(300, function() {
                $("#header-title-data").addClass("d-none");
                $("#loading-text-data").removeClass("d-none");
            });

            // Kirim AJAX ke server
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Reload card-body dan tambahkan alert sukses
                        $("#data-pribadi .card-body").load(location.href +
                            " #data-pribadi .card-body > *",
                            function() {
                                feather.replace();

                                flatpickr("#human-friendly", {
                                    altInput: true,
                                    altFormat: "F j, Y",
                                    dateFormat: "Y-m-d",
                                });

                                // Tambahkan alert sukses
                                $("<div class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                        "<i data-feather='check-square'></i> Data berhasil diperbarui!" +
                                        "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                        "</div>").hide().prependTo("#data-pribadi .card-body")
                                    .fadeIn(500);

                                // Kembalikan tampilan awal
                                $("#loading-text-data").addClass("d-none");
                                $("#header-title-data").removeClass("d-none");
                                $("#data-pribadi .card-body").slideDown(300);

                                // Aktifkan kembali tombol submit
                                form.find("button[type='submit']").prop("disabled", false);
                            });
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);

                    // Kembalikan tampilan awal jika terjadi error
                    $("#loading-text-data").addClass("d-none");
                    $("#header-title-data").removeClass("d-none");
                    $("#data-pribadi .card-body").slideDown(300);

                    // Aktifkan kembali tombol submit
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });
    </script>

    <script>
        $(document).on("submit", "#formKontak", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = form.serialize();

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Sembunyikan card-body dengan animasi, hanya menyisakan card-header
            $("#kontak .card-body").slideUp(300, function() {
                $("#header-title-kontak").addClass("d-none");
                $("#loading-text-kontak").removeClass("d-none");
            });

            // Kirim AJAX ke server
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Reload card-body dan tambahkan alert sukses
                        $("#kontak .card-body").load(location.href + " #kontak .card-body > *",
                            function() {
                                feather.replace();

                                // Tambahkan alert sukses
                                $("<div class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                    "<i data-feather='check-square'></i> Data berhasil diperbarui!" +
                                    "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                    "</div>").hide().prependTo("#kontak .card-body").fadeIn(500);

                                // Kembalikan tampilan awal
                                $("#loading-text-kontak").addClass("d-none");
                                $("#header-title-kontak").removeClass("d-none");
                                $("#kontak .card-body").slideDown(300);

                                // Aktifkan kembali tombol submit
                                form.find("button[type='submit']").prop("disabled", false);
                            });
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);

                    // Kembalikan tampilan awal jika terjadi error
                    $("#loading-text-kontak").addClass("d-none");
                    $("#header-title-kontak").removeClass("d-none");
                    $("#kontak .card-body").slideDown(300);

                    // Aktifkan kembali tombol submit
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });
    </script>

    <script>
        $(document).on("submit", "#formKontakDarurat", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = form.serialize();

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Sembunyikan card-body dengan animasi, hanya menyisakan card-header
            $("#kontak-darurat .card-body").slideUp(300, function() {
                $("#header-title-kontak-darurat").addClass("d-none");
                $("#loading-text-kontak-darurat").removeClass("d-none");
            });

            // Kirim AJAX ke server
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Reload card-body dan tambahkan alert sukses
                        $("#kontak-darurat .card-body").load(location.href +
                            " #kontak-darurat .card-body > *",
                            function() {
                                feather.replace();

                                // Tambahkan alert sukses
                                $("<div class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                        "<i data-feather='check-square'></i> Data berhasil diperbarui!" +
                                        "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                        "</div>").hide().prependTo("#kontak-darurat .card-body")
                                    .fadeIn(500);

                                // Kembalikan tampilan awal
                                $("#loading-text-kontak-darurat").addClass("d-none");
                                $("#header-title-kontak-darurat").removeClass("d-none");
                                $("#kontak-darurat .card-body").slideDown(300);

                                // Aktifkan kembali tombol submit
                                form.find("button[type='submit']").prop("disabled", false);
                            });
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);

                    // Kembalikan tampilan awal jika terjadi error
                    $("#loading-text-kontak-darurat").addClass("d-none");
                    $("#header-title-kontak-darurat").removeClass("d-none");
                    $("#kontak-darurat .card-body").slideDown(300);

                    // Aktifkan kembali tombol submit
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });
    </script>

    <script>
        $(document).on("submit", "#formTambahDataKeluarga", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = form.serialize();

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Tampilkan loading
            $("#header-title-tambah-data-keluarga").addClass("d-none");
            $("#loading-text-tambah-data-keluarga").removeClass("d-none");

            // Kirim AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Cek apakah alert sudah ada
                        if ($("#alert-success").length === 0) {
                            let alertSuccess = $(
                                "<div id='alert-success' class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                "<i data-feather='check-square'></i> " + response.message +
                                "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                "</div>"
                            );

                            $("#tambah-data-keluarga").before(alertSuccess);

                            setTimeout(function() {
                                alertSuccess.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }, 5000);
                        }

                        // Reset form setelah sukses
                        form[0].reset();

                        // Kembali ke tampilan tabel keluarga
                        $("#form-tambah-data-keluarga").addClass("d-none");
                        $("#card-keluarga").removeClass("d-none");

                        // Reload tabel keluarga tanpa reload halaman
                        $("#card-keluarga .table-responsive").load(location.href +
                            " #card-keluarga .table-responsive > *",
                            function() {
                                feather.replace(); // Reload ikon jika diperlukan
                            }
                        );
                    } else {
                        alert("Gagal: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                },
                complete: function() {
                    $("#loading-text-tambah-data-keluarga").addClass("d-none");
                    $("#header-title-tambah-data-keluarga").removeClass("d-none");
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });

        // Script Edit Data
        $(document).on("click", ".btn-edit-keluarga", function(event) {
            event.preventDefault();

            let id = $(this).data("id");
            let nama = $(this).data("nama");
            let tmp_lhr = $(this).data("tmp_lhr");
            let tgl_lhr = $(this).data("tgl_lhr");
            let jk = $(this).data("jk");
            let pendidikan = $(this).data("pendidikan");
            let pekerjaan = $(this).data("pekerjaan");
            let status_hub = $(this).data("status_hub");

            // console.log("tgl_lhr :", tgl_lhr);
            // console.log(tgl_lhr)

            // Pastikan hidden input id diisi
            $("#formTambahDataKeluarga input[name='id']").val(id);
            $("#formTambahDataKeluarga input[name='nama']").val(nama);
            $("#formTambahDataKeluarga input[name='tmp_lhr']").val(tmp_lhr);
            $("#formTambahDataKeluarga input[name='tgl_lhr']")[0]._flatpickr.setDate(tgl_lhr);
            $("#formTambahDataKeluarga select[name='jk']").val(jk);
            $("#formTambahDataKeluarga select[name='pendidikan']").val(pendidikan); // Perbaikan: gunakan select
            $("#formTambahDataKeluarga input[name='pekerjaan']").val(pekerjaan);
            $("#formTambahDataKeluarga select[name='status_hub']").val(status_hub); // Perbaikan: gunakan select

            // Ubah form action ke update
            $("#formTambahDataKeluarga").attr("action", "{{ route('keluarga.update') }}");

            // Ubah teks header menjadi Edit Data Keluarga
            $("#header-title-tambah-data-keluarga").text("Edit Data Keluarga");

            // Tampilkan form edit, sembunyikan tabel
            $("#form-tambah-data-keluarga").removeClass("d-none");
            $("#card-keluarga").addClass("d-none");
        });

        // Tombol Tambah Data dan Kembali
        document.addEventListener("DOMContentLoaded", function() {
            const btnTambah = document.getElementById("tambah-data-keluarga");
            const btnKembali = document.getElementById("btn-kembali");
            const cardKeluarga = document.getElementById("card-keluarga");
            const formTambah = document.getElementById("form-tambah-data-keluarga");

            if (btnTambah && btnKembali) {
                btnTambah.addEventListener("click", function(event) {
                    event.preventDefault();
                    cardKeluarga.classList.add("d-none");
                    formTambah.classList.remove("d-none");

                    // Reset form saat klik tambah data
                    $("#formTambahDataKeluarga")[0].reset();
                    $("#formTambahDataKeluarga").attr("action", "{{ route('keluarga.create') }}");
                    $("#header-title-tambah-data-keluarga").text("Tambah Data Keluarga");

                    $("#formTambahDataKeluarga button[type='submit']").text("Submit");
                });

                btnKembali.addEventListener("click", function() {
                    formTambah.classList.add("d-none");
                    cardKeluarga.classList.remove("d-none");
                });
            }
        });
    </script>

    <!-- Script Data Pendidikan !-->
    <script>
        $(document).on("submit", "#formDataPendidikan", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = new FormData(form[0]);

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Tampilkan loading
            $("#header-title-form-pendidikan").addClass("d-none");
            $("#loading-text-form-pendidikan").removeClass("d-none");

            // Kirim AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // Mencegah jQuery memproses data
                contentType: false, // Mencegah jQuery mengatur content-type
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Cek apakah alert sudah ada
                        if ($("#alert-success").length === 0) {
                            let alertSuccess = $(
                                "<div id='alert-success' class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                "<i data-feather='check-square'></i> " + response.message +
                                "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                "</div>"
                            );

                            $("#tambah-data-pendidikan").before(alertSuccess);

                            setTimeout(function() {
                                alertSuccess.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }, 5000);
                        }

                        // Reset form setelah sukses
                        form[0].reset();

                        // Kembali ke tampilan tabel pendidikan
                        $("#form-tambah-data-pendidikan").addClass("d-none");
                        $("#card-pendidikan").removeClass("d-none");

                        // Reload tabel pendidikan tanpa reload halaman
                        $("#card-pendidikan .table-responsive").load(location.href +
                            " #card-pendidikan .table-responsive > *",
                            function() {
                                feather.replace(); // Reload ikon jika diperlukan
                            }
                        );
                    } else {
                        alert("Gagal: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                },
                complete: function() {
                    $("#loading-text-form-pendidikan").addClass("d-none");
                    $("#header-title-form-pendidikan").removeClass("d-none");
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });

        // Script Edit Data Pendidikan
        $(document).on("click", ".btn-edit-pendidikan", function(event) {
            event.preventDefault();

            let id_sekolah = $(this).data("id_sekolah");
            let tingkat = $(this).data("tingkat");
            let nama_sekolah = $(this).data("nama_sekolah");
            let lokasi = $(this).data("lokasi");
            let jurusan = $(this).data("jurusan");
            let tahun = $(this).data("tahun");
            let ijazah = $(this).data("ijazah");
            let file = $(this).data("file");
            let keterangan = $(this).data("keterangan");

            // console.log("tgl_lhr :", tgl_lhr);
            // console.log(tgl_lhr)

            // Pastikan hidden input id diisi
            $("#formDataPendidikan input[name='id_sekolah']").val(id_sekolah);
            $("#formDataPendidikan select[name='tingkat']").val(tingkat);
            $("#formDataPendidikan input[name='nama_sekolah']").val(nama_sekolah);
            $("#formDataPendidikan input[name='lokasi']").val(lokasi);
            $("#formDataPendidikan input[name='jurusan']").val(jurusan);
            $("#formDataPendidikan input[name='tahun']").val(tahun);
            $("#formDataPendidikan input[name='ijazah']").val(ijazah);
            // $("#formDataPendidikan input[name='file']").val(file);
            //Preview File
            let filePreviewHtml = '';
            if (file !== '') {
                filePreviewHtml = `<a href="/storage/assets/file/ijazah/${file}" target="_blank" class="btn btn-sm btn-outline-primary">
                Lihat File Ijazah Sebelumnya
            </a>`;
            } else {
                filePreviewHtml = `<span class="text-muted">Tidak ada file sebelumnya</span>`;
            }
            $("#file-preview").html(filePreviewHtml);
            $("#formDataPendidikan input[name='keterangan']").val(keterangan);

            // Ubah form action ke update
            $("#formDataPendidikan").attr("action", "{{ route('pendidikan.update') }}");

            // Ubah teks header menjadi Edit Data Pendidikan
            $("#header-title-form-pendidikan").text("Edit Data Pendidikan");

            // Tampilkan form edit, sembunyikan tabel
            $("#form-tambah-data-pendidikan").removeClass("d-none");
            $("#card-pendidikan").addClass("d-none");
        });

        // Tombol Tambah Data dan Kembali
        document.addEventListener("DOMContentLoaded", function() {
            const btnTambah = document.getElementById("tambah-data-pendidikan");
            const btnKembaliPendidikan = document.getElementById("btn-kembali-pendidikan");
            const cardPendidikan = document.getElementById("card-pendidikan");
            const formTambah = document.getElementById("form-tambah-data-pendidikan");

            if (btnTambah && btnKembaliPendidikan) {
                btnTambah.addEventListener("click", function(event) {
                    event.preventDefault();
                    cardPendidikan.classList.add("d-none");
                    formTambah.classList.remove("d-none");

                    // Reset form saat klik tambah data
                    $("#formDataPendidikan")[0].reset();
                    $("#formDataPendidikan").attr("action", "{{ route('pendidikan.create') }}");
                    $("#header-title-form-pendidikan").text("Tambah Data Pendidikan");

                    $("#formDataPendidikan button[type='submit']").text("Submit");
                });

                btnKembaliPendidikan.addEventListener("click", function() {
                    formTambah.classList.add("d-none");
                    cardPendidikan.classList.remove("d-none");
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete-pendidikan");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-id_sekolah"); // FIXED!
                let itemName = button.getAttribute("data-name");

                console.log("Delete URL:", deleteUrl);
                console.log("ID:", itemId);

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    id_sekolah: itemId,
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white" // Styling tombol OK
                                        }
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>
    <!-- End Script Data Pendidikan !--->
    <script>
        $(document).on("submit", "#formDataInformasiKaryawan", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = form.serialize();

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Sembunyikan card-body dengan animasi, hanya menyisakan card-header
            $("#card-informasi-karyawan .card-body").slideUp(300, function() {
                $("#header-title-informasi-karyawan").addClass("d-none");
                $("#loading-text-informasi-karyawan").removeClass("d-none");
            });

            // Kirim AJAX ke server
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Reload card-body dan tambahkan alert sukses
                        $("#card-informasi-karyawan .card-body").load(location.href +
                            " #card-informasi-karyawan .card-body > *",
                            function() {
                                feather.replace();

                                flatpickr("#human-friendly", {
                                    altInput: true,
                                    altFormat: "F j, Y",
                                    dateFormat: "Y-m-d",
                                });

                                // Tambahkan alert sukses
                                $("<div class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                    "<i data-feather='check-square'></i> Data berhasil diperbarui!" +
                                    "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                    "</div>").hide().prependTo(
                                    "#card-informasi-karyawan .card-body").fadeIn(500);

                                // Kembalikan tampilan awal
                                $("#loading-text-informasi-karyawan").addClass("d-none");
                                $("#header-title-informasi-karyawan").removeClass("d-none");
                                $("#card-informasi-karyawan .card-body").slideDown(300);

                                // Aktifkan kembali tombol submit
                                form.find("button[type='submit']").prop("disabled", false);
                            });
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);

                    // Kembalikan tampilan awal jika terjadi error
                    $("#loading-text-informasi-karyawan").addClass("d-none");
                    $("#header-title-informasi-karyawan").removeClass("d-none");
                    $("#card-informasi-karyawan .card-body").slideDown(300);

                    // Aktifkan kembali tombol submit
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });
    </script>

    <!-- Script Data Kontrak Karyawan !--->
    <script>
        $(document).on("submit", "#formDataKontrakKaryawan", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = new FormData(form[0]);

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Tampilkan loading
            $("#header-title-form-kontrak-karyawan").addClass("d-none");
            $("#loading-text-form-kontrak-karyawan").removeClass("d-none");

            // Kirim AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // Mencegah jQuery memproses data
                contentType: false, // Mencegah jQuery mengatur content-type
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Cek apakah alert sudah ada
                        if ($("#alert-success").length === 0) {
                            let alertSuccess = $(
                                "<div id='alert-success' class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                "<i data-feather='check-square'></i> " + response.message +
                                "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                "</div>"
                            );

                            $("#tambah-data-kontrak-karyawan").before(alertSuccess);

                            setTimeout(function() {
                                alertSuccess.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }, 5000);
                        }

                        // Reset form setelah sukses
                        form[0].reset();

                        // Kembali ke tampilan tabel pendidikan
                        $("#form-kontrak-karyawan-data").addClass("d-none");
                        $("#card-kontrak-karyawan").removeClass("d-none");

                        // Reload tabel pendidikan tanpa reload halaman
                        $("#card-kontrak-karyawan .table-responsive").load(location.href +
                            " #card-kontrak-karyawan .table-responsive > *",
                            function() {
                                feather.replace(); // Reload ikon jika diperlukan
                            }
                        );
                    } else {
                        alert("Gagal: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                },
                complete: function() {
                    $("#loading-text-form-kontrak-karyawan").addClass("d-none");
                    $("#header-title-form-kontrak-karyawan").removeClass("d-none");
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });

        // Script Edit Data Pendidikan
        $(document).on("click", ".btn-edit-kontrak-karyawan", function(event) {
            event.preventDefault();

            let id_kontrak = $(this).data("id_kontrak");
            let status_kontrak = $(this).data("status_kontrak");
            let tgl_kontrak = $(this).data("tgl_kontrak");
            let kontrak_ke = $(this).data("kontrak_ke");

            // console.log("tgl_lhr :", tgl_lhr);
            // console.log(tgl_lhr)

            // Pastikan hidden input id diisi
            $("#formDataKontrakKaryawan input[name='id_kontrak']").val(id_kontrak);
            $("#formDataKontrakKaryawan select[name='status_kontrak']").val(status_kontrak);
            // $("#formDataKontrakKaryawan input[name='tgl_kontrak']").val(tgl_kontrak);
            let tglKontrakInput = document.querySelector("input[name='tgl_kontrak']");
            tglKontrakInput.value = tgl_kontrak; // fallback untuk jaga-jaga

            let flatpickrInstance = flatpickr(tglKontrakInput, {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
            flatpickrInstance.setDate(tgl_kontrak, true);


            $("#formDataKontrakKaryawan input[name='kontrak_ke']").val(kontrak_ke);

            // Ubah form action ke update
            $("#formDataKontrakKaryawan").attr("action", "{{ route('kontrak-karyawan.update') }}");

            // Ubah teks header menjadi Edit Data Kontrak Karyawan
            $("#header-title-form-kontrak-karyawan").text("Edit Data Kontrak Karyawan");

            // Tampilkan form edit, sembunyikan tabel
            $("#form-kontrak-karyawan-data").removeClass("d-none");
            $("#card-kontrak-karyawan").addClass("d-none");

            flatpickr("input[name='tgl_kontrak']", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
        });

        // Tombol Tambah Data dan Kembali
        document.addEventListener("DOMContentLoaded", function() {
            const btnTambah = document.getElementById("tambah-data-kontrak-karyawan");
            const btnKembaliKontrakKaryawan = document.getElementById("btn-kembali-kontrak-karyawan");
            const cardKontrakKaryawan = document.getElementById("card-kontrak-karyawan");
            const formTambah = document.getElementById("form-kontrak-karyawan-data");

            if (btnTambah && btnKembaliKontrakKaryawan) {
                btnTambah.addEventListener("click", function(event) {
                    event.preventDefault();

                    // Tampilkan form, sembunyikan tabel
                    cardKontrakKaryawan.classList.add("d-none");
                    formTambah.classList.remove("d-none");

                    // Reset form
                    const form = $("#formDataKontrakKaryawan")[0];
                    form.reset();

                    // Set form action ke "create"
                    $("#formDataKontrakKaryawan").attr("action",
                        "{{ route('kontrak-karyawan.create') }}");

                    // Set judul form
                    $("#header-title-form-kontrak-karyawan").text("Tambah Data Kontrak");

                    $("#formDataKontrakKaryawan button[type='submit']").text("Submit");

                    // Tangani reset nilai flatpickr
                    const tglKontrakInput = document.querySelector("input[name='tgl_kontrak']");
                    if (tglKontrakInput._flatpickr) {
                        tglKontrakInput._flatpickr.clear(); // Hapus nilai lama
                    } else {
                        flatpickr(tglKontrakInput, {
                            altInput: true,
                            altFormat: "F j, Y",
                            dateFormat: "Y-m-d"
                        });
                    }
                });

                btnKembaliKontrakKaryawan.addEventListener("click", function() {
                    formTambah.classList.add("d-none");
                    cardKontrakKaryawan.classList.remove("d-none");
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete-kontrak-karyawan");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-id_kontrak"); // FIXED!
                let itemName = button.getAttribute("data-name");

                console.log("Delete URL:", deleteUrl);
                console.log("ID:", itemId);

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    id_kontrak: itemId,
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white" // Styling tombol OK
                                        }
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>
    <!-- End Script Data Kontrak Karyawan !-->

    <!-- Start Script Penilaian Akhir !-->
    <script>
        $(document).on("submit", "#formDataPenilaianAkhir", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = new FormData(form[0]);

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Tampilkan loading
            $("#header-title-form-penilaian-akhir").addClass("d-none");
            $("#loading-text-form-penilaian-akhir").removeClass("d-none");

            // Kirim AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // Mencegah jQuery memproses data
                contentType: false, // Mencegah jQuery mengatur content-type
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Cek apakah alert sudah ada
                        if ($("#alert-success").length === 0) {
                            let alertSuccess = $(
                                "<div id='alert-success' class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                "<i data-feather='check-square'></i> " + response.message +
                                "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                "</div>"
                            );

                            $("#tambah-data-penilaian-akhir").before(alertSuccess);

                            setTimeout(function() {
                                alertSuccess.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }, 5000);
                        }

                        // Reset form setelah sukses
                        form[0].reset();

                        // Kembali ke tampilan tabel pendidikan
                        $("#form-penilaian-akhir-data").addClass("d-none");
                        $("#card-penilaian-akhir").removeClass("d-none");

                        // Reload tabel pendidikan tanpa reload halaman
                        $("#card-penilaian-akhir .table-responsive").load(location.href +
                            " #card-penilaian-akhir .table-responsive > *",
                            function() {
                                feather.replace(); // Reload ikon jika diperlukan
                            }
                        );
                    } else {
                        alert("Gagal: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                },
                complete: function() {
                    $("#loading-text-form-penilaian-akhir").addClass("d-none");
                    $("#header-title-form-penilaian-akhir").removeClass("d-none");
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });

        // Script Edit Data Penilaian Akhir
        $(document).on("click", ".btn-edit-penilaian-akhir", function(event) {
            event.preventDefault();

            let id_pa = $(this).data("id_pa");
            let nilai_pa = $(this).data("nilai_pa");
            let tahun_pa = $(this).data("tahun_pa");

            // console.log("tgl_lhr :", tgl_lhr);
            // console.log(tgl_lhr)

            // Pastikan hidden input id diisi
            $("#formDataPenilaianAkhir input[name='id_pa']").val(id_pa);
            $("#formDataPenilaianAkhir input[name='nilai_pa']").val(nilai_pa);
            $("#formDataPenilaianAkhir input[name='tahun_pa']").val(tahun_pa);

            // Ubah form action ke update
            $("#formDataPenilaianAkhir").attr("action", "{{ route('penilaian-akhir.update') }}");

            // Ubah teks header menjadi Edit Data Penilaian Akhir
            $("#header-title-form-kontrak-karyawan").text("Edit Data Kontrak Karyawan");

            // Tampilkan form edit, sembunyikan tabel
            $("#form-penilaian-akhir-data").removeClass("d-none");
            $("#card-penilaian-akhir").addClass("d-none");
        });

        // Tombol Tambah Data dan Kembali
        document.addEventListener("DOMContentLoaded", function() {
            const btnTambah = document.getElementById("tambah-data-penilaian-akhir");
            const btnKembaliPenilaianAkhir = document.getElementById("btn-kembali-penilaian-akhir");
            const cardPenilaianAkhir = document.getElementById("card-penilaian-akhir");
            const formTambah = document.getElementById("form-penilaian-akhir-data");

            if (btnTambah && btnKembaliPenilaianAkhir) {
                btnTambah.addEventListener("click", function(event) {
                    event.preventDefault();

                    // Tampilkan form, sembunyikan tabel
                    cardPenilaianAkhir.classList.add("d-none");
                    formTambah.classList.remove("d-none");

                    // Reset form
                    const form = $("#formDataPenilaianAkhir")[0];
                    form.reset();

                    // Set form action ke "create"
                    $("#formDataPenilaianAkhir").attr("action",
                        "{{ route('penilaian-akhir.create') }}");

                    // Set judul form
                    $("#header-title-form-penilaian-akhir").text("Tambah Data Penilaian Akhir");

                    $("#formDataPenilaianAkhir button[type='submit']").text("Submit");
                });

                btnKembaliPenilaianAkhir.addEventListener("click", function() {
                    formTambah.classList.add("d-none");
                    cardPenilaianAkhir.classList.remove("d-none");
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete-penilaian-akhir");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-id_pa");
                let itemName = button.getAttribute("data-name");

                console.log("Delete URL:", deleteUrl);
                console.log("ID:", itemId);

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    id_pa: itemId,
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white" // Styling tombol OK
                                        }
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>
    <!-- End Script Penilaian Akhir !-->

    <!--- Start Script Pelatihan !-->
    <script>
        // Function to toggle the visibility of lainlain_pelatihan input
        function toggleLainlainPelatihan() {
            if ($("#jenis_pelatihan").val() === "Lain-lain") {
                $("#lainlain_pelatihan_container").show();
                $("#lainlain_pelatihan").prop("required", true);
            } else {
                $("#lainlain_pelatihan_container").hide();
                $("#lainlain_pelatihan").prop("required", false);
            }
        }
        $(document).ready(function() {
            // Monitor changes to the jenis_pelatihan dropdown
            $("#jenis_pelatihan").change(function() {
                toggleLainlainPelatihan();
            });

            // Also run when editing existing data
            toggleLainlainPelatihan();

            // When "Tambah Data" is clicked, make sure the field is hidden initially
            $("#tambah-data-pelatihan").click(function() {
                $("#lainlain_pelatihan_container").hide();
                $("#lainlain_pelatihan").prop("required", false);
            });
        });
    </script>
    <script>
        $(document).on("submit", "#formDataPelatihan", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = new FormData(form[0]);

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Tampilkan loading
            $("#header-title-form-pelatihan").addClass("d-none");
            $("#loading-text-form-pelatihan").removeClass("d-none");

            // Kirim AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // Mencegah jQuery memproses data
                contentType: false, // Mencegah jQuery mengatur content-type
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Cek apakah alert sudah ada
                        if ($("#alert-success").length === 0) {
                            let alertSuccess = $(
                                "<div id='alert-success' class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                "<i data-feather='check-square'></i> " + response.message +
                                "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                "</div>"
                            );

                            $("#tambah-data-pelatihan").before(alertSuccess);

                            setTimeout(function() {
                                alertSuccess.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }, 5000);
                        }

                        // Reset form setelah sukses
                        form[0].reset();

                        // Kembali ke tampilan tabel pendidikan
                        $("#form-pelatihan-data").addClass("d-none");
                        $("#card-pelatihan").removeClass("d-none");

                        // Reload tabel pelatihan tanpa reload halaman
                        $("#card-pelatihan .table-responsive").load(location.href +
                            " #card-pelatihan .table-responsive > *",
                            function() {
                                feather.replace(); // Reload ikon jika diperlukan
                            }
                        );
                    } else {
                        alert("Gagal: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                },
                complete: function() {
                    $("#loading-text-form-pelatihan").addClass("d-none");
                    $("#header-title-form-pelatihan").removeClass("d-none");
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });

        // Script Edit Data Pelatihan
        $(document).on("click", ".btn-edit-pelatihan", function(event) {
            event.preventDefault();

            let id_pelatihan = $(this).data("id_pelatihan");
            let jenis_pelatihan = $(this).data("jenis_pelatihan");
            let sertifikat_kompetensi = $(this).data("sertifikat_kompetensi");
            let nama_pelatihan = $(this).data("nama_pelatihan");
            let lainlain_pelatihan = $(this).data("lainlain_pelatihan");
            let tempat_pelatihan = $(this).data("tempat_pelatihan");
            let penyelenggara = $(this).data("penyelenggara");
            let tanggal_mulai_pelatihan = $(this).data("tanggal_mulai_pelatihan");
            let tanggal_selesai_pelatihan = $(this).data("tanggal_selesai_pelatihan");
            let nomor_sertifikat_pelatihan = $(this).data("nomor_sertifikat_pelatihan");
            let tanggal_sertifikat_pelatihan = $(this).data("tanggal_sertifikat_pelatihan");
            let file_sertifikat = $(this).data("file_sertifikat");

            // console.log("tgl_lhr :", tgl_lhr);
            // console.log(tgl_lhr)

            // Pastikan hidden input id diisi
            $("#formDataPelatihan input[name='id_pelatihan']").val(id_pelatihan);
            $("#formDataPelatihan select[name='jenis_pelatihan']").val(jenis_pelatihan);
            $("#formDataPelatihan select[name='sertifikat_kompetensi']").val(sertifikat_kompetensi);
            $("#formDataPelatihan input[name='nama_pelatihan']").val(nama_pelatihan);
            $("#formDataPelatihan input[name='tempat_pelatihan']").val(tempat_pelatihan);
            $("#formDataPelatihan input[name='penyelenggara']").val(penyelenggara);

            toggleLainlainPelatihan();

            $("#formDataPelatihan input[name='lainlain_pelatihan']").val(lainlain_pelatihan);
            setTimeout(function() {
                toggleLainlainPelatihan();
            }, 100);
            //Tanggal Mulai Pelatihan
            let tglmulaiPelatihanInput = document.querySelector("input[name='tanggal_mulai_pelatihan']");
            tglmulaiPelatihanInput.value = tanggal_mulai_pelatihan; // fallback untuk jaga-jaga

            let flatpickrTglMulaiPelatihanInstance = flatpickr(tglmulaiPelatihanInput, {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
            flatpickrTglMulaiPelatihanInstance.setDate(tanggal_mulai_pelatihan, true);

            //Tanggal Selesai Pelatihan
            let tglselesaiPelatihanInput = document.querySelector("input[name='tanggal_selesai_pelatihan']");
            tglselesaiPelatihanInput.value = tanggal_selesai_pelatihan; // fallback untuk jaga-jaga

            let flatpickrTglSelesaiPelatihanInstance = flatpickr(tglselesaiPelatihanInput, {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
            flatpickrTglSelesaiPelatihanInstance.setDate(tanggal_selesai_pelatihan, true);

            $("#formDataPelatihan input[name='nomor_sertifikat_pelatihan']").val(nomor_sertifikat_pelatihan);

            //Tanggal Sertifikat Pelatihan
            let tglsertifikatPelatihanInput = document.querySelector("input[name='tanggal_sertifikat_pelatihan']");
            tglsertifikatPelatihanInput.value = tanggal_sertifikat_pelatihan; // fallback untuk jaga-jaga

            let flatpickrTanggalSertifikatInstance = flatpickr(tglsertifikatPelatihanInput, {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
            flatpickrTanggalSertifikatInstance.setDate(tanggal_sertifikat_pelatihan, true);
            //Preview File
            let filePreviewHtml = '';
            if (file_sertifikat !== '') {
                filePreviewHtml = `<a href="/storage/assets/file/sertifikat_pelatihan/${file_sertifikat}" target="_blank" class="btn btn-sm btn-outline-primary">
                Lihat File Sertifikat Sebelumnya
            </a>`;
            } else {
                filePreviewHtml = `<span class="text-muted">Tidak ada file sebelumnya</span>`;
            }
            $("#file-preview-sertifikat").html(filePreviewHtml);

            // Ubah form action ke update
            $("#formDataPelatihan").attr("action", "{{ route('pelatihan.update') }}");

            // Ubah teks header menjadi Edit Data Pelatihan
            $("#header-title-form-pelatihan").text("Edit Data Pelatihan");

            //Ubah teks button jadi update
            $("#formDataPelatihan button[type='submit']").text("Update");

            // Tampilkan form edit, sembunyikan tabel
            $("#form-pelatihan-data").removeClass("d-none");
            $("#card-pelatihan").addClass("d-none");

            flatpickr("input[name='tanggal_mulai_pelatihan']", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });

            flatpickr("input[name='tanggal_selesai_pelatihan']", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });

            flatpickr("input[name='tanggal_sertifikat_pelatihan']", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
        });

        // Tombol Tambah Data dan Kembali
        document.addEventListener("DOMContentLoaded", function() {
            const btnTambah = document.getElementById("tambah-data-pelatihan");
            const btnKembaliPelatihan = document.getElementById("btn-kembali-pelatihan");
            const cardPelatihan = document.getElementById("card-pelatihan");
            const formTambah = document.getElementById("form-pelatihan-data");

            if (btnTambah && btnKembaliPelatihan) {
                btnTambah.addEventListener("click", function(event) {
                    event.preventDefault();
                    cardPelatihan.classList.add("d-none");
                    formTambah.classList.remove("d-none");

                    // Reset form saat klik tambah data
                    $("#formDataPelatihan")[0].reset();
                    $("#formDataPelatihan").attr("action", "{{ route('pelatihan.create') }}");
                    $("#header-title-form-pelatihan").text("Tambah Data Pelatihan");

                    $("#formDataPelatihan button[type='submit']").text("Submit");

                    // Reset & re-init flatpickr
                    let tglMulaiInput = document.querySelector("input[name='tanggal_mulai_pelatihan']");
                    let tglSelesaiInput = document.querySelector("input[name='tanggal_selesai_pelatihan']");
                    let tglSertifikatInput = document.querySelector(
                        "input[name='tanggal_sertifikat_pelatihan']");

                    if (tglMulaiInput._flatpickr) tglMulaiInput._flatpickr.clear();
                    if (tglSelesaiInput._flatpickr) tglSelesaiInput._flatpickr.clear();
                    if (tglSertifikatInput._flatpickr) tglSertifikatInput._flatpickr.clear();

                    flatpickr(tglMulaiInput, {
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d"
                    });

                    flatpickr(tglSelesaiInput, {
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d"
                    });

                    flatpickr(tglSertifikatInput, {
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d"
                    });
                });

                btnKembaliPelatihan.addEventListener("click", function() {
                    formTambah.classList.add("d-none");
                    cardPelatihan.classList.remove("d-none");
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete-pelatihan");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-id_pelatihan"); // FIXED!
                let itemName = button.getAttribute("data-name");

                console.log("Delete URL:", deleteUrl);
                console.log("ID:", itemId);

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    id_pelatihan: itemId,
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white" // Styling tombol OK
                                        }
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>
    <!--- End Script Pelatihan !--->

    <!-- Start Script Penghargaan !-->
    <script>
        $(document).on("submit", "#formDataPenghargaan", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = new FormData(form[0]);

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Tampilkan loading
            $("#header-title-form-penghargaan").addClass("d-none");
            $("#loading-text-form-penghargaan").removeClass("d-none");

            // Kirim AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // Mencegah jQuery memproses data
                contentType: false, // Mencegah jQuery mengatur content-type
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Cek apakah alert sudah ada
                        if ($("#alert-success").length === 0) {
                            let alertSuccess = $(
                                "<div id='alert-success' class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                "<i data-feather='check-square'></i> " + response.message +
                                "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                "</div>"
                            );

                            $("#tambah-data-penghargaan").before(alertSuccess);

                            setTimeout(function() {
                                alertSuccess.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }, 5000);
                        }

                        // Reset form setelah sukses
                        form[0].reset();

                        // Kembali ke tampilan tabel pendidikan
                        $("#form-penghargaan-data").addClass("d-none");
                        $("#card-penghargaan").removeClass("d-none");

                        // Reload tabel penghargaan tanpa reload halaman
                        $("#card-penghargaan .table-responsive").load(location.href +
                            " #card-penghargaan .table-responsive > *",
                            function() {
                                feather.replace(); // Reload ikon jika diperlukan
                            }
                        );
                    } else {
                        alert("Gagal: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                },
                complete: function() {
                    $("#loading-text-form-penghargaan").addClass("d-none");
                    $("#header-title-form-penghargaan").removeClass("d-none");
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });

        // Script Edit Data Pelatihan
        $(document).on("click", ".btn-edit-penghargaan", function(event) {
            event.preventDefault();

            let id_penghargaan = $(this).data("id_penghargaan");
            let penghargaan = $(this).data("penghargaan");
            let tahun = $(this).data("tahun");
            let pemberi = $(this).data("pemberi");
            let file = $(this).data("file");

            // console.log("tgl_lhr :", tgl_lhr);
            // console.log(tgl_lhr)

            // Pastikan hidden input id diisi
            $("#formDataPenghargaan input[name='id_penghargaan']").val(id_penghargaan);
            $("#formDataPenghargaan input[name='penghargaan']").val(penghargaan);
            $("#formDataPenghargaan input[name='tahun']").val(tahun);
            $("#formDataPenghargaan input[name='pemberi']").val(pemberi);

            //Preview File
            let filePreviewHtml = '';
            if (file !== '') {
                filePreviewHtml = `<a href="/storage/assets/file/penghargaan/${file}" target="_blank" class="btn btn-sm btn-outline-primary">
                Lihat File Penghargaan Sebelumnya
            </a>`;
            } else {
                filePreviewHtml = `<span class="text-muted">Tidak ada file sebelumnya</span>`;
            }
            $("#file-preview-penghargaan").html(filePreviewHtml);

            // Ubah form action ke update
            $("#formDataPenghargaan").attr("action", "{{ route('penghargaan.update') }}");

            // Ubah teks header menjadi Edit Data Penghargaan
            $("#header-title-form-penghargaan").text("Edit Data Penghargaan");

            //Ubah teks button jadi update
            $("#formDataPenghargaan button[type='submit']").text("Update");

            // Tampilkan form edit, sembunyikan tabel
            $("#form-penghargaan-data").removeClass("d-none");
            $("#card-penghargaan").addClass("d-none");
        });

        // Tombol Tambah Data dan Kembali
        document.addEventListener("DOMContentLoaded", function() {
            const btnTambah = document.getElementById("tambah-data-penghargaan");
            const btnKembaliPenghargaan = document.getElementById("btn-kembali-penghargaan");
            const cardPenghargaan = document.getElementById("card-penghargaan");
            const formTambah = document.getElementById("form-penghargaan-data");

            if (btnTambah && btnKembaliPenghargaan) {
                btnTambah.addEventListener("click", function(event) {
                    event.preventDefault();
                    cardPenghargaan.classList.add("d-none");
                    formTambah.classList.remove("d-none");

                    // Reset form saat klik tambah data
                    $("#formDataPenghargaan")[0].reset();
                    $("#formDataPenghargaan").attr("action", "{{ route('penghargaan.create') }}");
                    $("#header-title-form-penghargaan").text("Tambah Data Penghargaan");

                    $("#formDataPenghargaan button[type='submit']").text("Submit");
                });

                btnKembaliPenghargaan.addEventListener("click", function() {
                    formTambah.classList.add("d-none");
                    cardPenghargaan.classList.remove("d-none");
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete-penghargaan");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-id_penghargaan"); // FIXED!
                let itemName = button.getAttribute("data-name");

                console.log("Delete URL:", deleteUrl);
                console.log("ID:", itemId);

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    id_penghargaan: itemId,
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white" // Styling tombol OK
                                        }
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>
    <!-- End Script Penghargaan !--->

    <!-- Start Script Surat Peringatan !-->
    <script>
        $(document).on("submit", "#formDataSuratPeringatan", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = new FormData(form[0]);

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Tampilkan loading
            $("#header-title-form-surat-peringatan").addClass("d-none");
            $("#loading-text-form-surat-peringatan").removeClass("d-none");

            // Kirim AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // Mencegah jQuery memproses data
                contentType: false, // Mencegah jQuery mengatur content-type
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Cek apakah alert sudah ada
                        if ($("#alert-success").length === 0) {
                            let alertSuccess = $(
                                "<div id='alert-success' class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                "<i data-feather='check-square'></i> " + response.message +
                                "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                "</div>"
                            );

                            $("#tambah-data-surat-peringatan").before(alertSuccess);

                            setTimeout(function() {
                                alertSuccess.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }, 5000);
                        }

                        // Reset form setelah sukses
                        form[0].reset();

                        // Kembali ke tampilan tabel pendidikan
                        $("#form-surat-peringatan-data").addClass("d-none");
                        $("#card-surat-peringatan").removeClass("d-none");

                        // Reload tabel surat peringatan tanpa reload halaman
                        $("#card-surat-peringatan .table-responsive").load(location.href +
                            " #card-surat-peringatan .table-responsive > *",
                            function() {
                                feather.replace(); // Reload ikon jika diperlukan
                            }
                        );
                    } else {
                        alert("Gagal: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                },
                complete: function() {
                    $("#loading-text-form-surat-peringatan").addClass("d-none");
                    $("#header-title-form-surat-peringatan").removeClass("d-none");
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });

        // Script Edit Data Surat Peringatan
        $(document).on("click", ".btn-edit-surat-peringatan", function(event) {
            event.preventDefault();

            let id_sp = $(this).data("id_sp");
            let jenis_sp = $(this).data("jenis_sp");
            let periode_awal = $(this).data("periode_awal");
            let periode_akhir = $(this).data("periode_akhir");
            let keterangan = $(this).data("keterangan");
            let file = $(this).data("file");

            // console.log("tgl_lhr :", tgl_lhr);
            // console.log(tgl_lhr)

            // Pastikan hidden input id diisi
            $("#formDataSuratPeringatan input[name='id_sp']").val(id_sp);
            $("#formDataSuratPeringatan select[name='jenis_sp']").val(jenis_sp);

            //Periode Awal Surat Peringatan
            let periodeAwalInput = document.querySelector("input[name='periode_awal']");
            periodeAwalInput.value = periode_awal; // fallback untuk jaga-jaga

            let flatpickrPeriodeAwalInstance = flatpickr(periodeAwalInput, {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
            flatpickrPeriodeAwalInstance.setDate(periode_awal, true);

            //Periode Akhir Surat Peringatan
            let periodeAkhirInput = document.querySelector("input[name='periode_akhir']");
            periodeAkhirInput.value = periode_akhir; // fallback untuk jaga-jaga

            let flatpickrPeriodeAkhirInstance = flatpickr(periodeAkhirInput, {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
            flatpickrPeriodeAkhirInstance.setDate(periode_akhir, true);

            $("#formDataSuratPeringatan input[name='keterangan']").val(keterangan);

            //Preview File
            let filePreviewHtml = '';
            if (file !== '') {
                filePreviewHtml = `<a href="/storage/assets/file/sp/${file}" target="_blank" class="btn btn-sm btn-outline-primary">
                Lihat File SP/Teguran Sebelumnya
            </a>`;
            } else {
                filePreviewHtml = `<span class="text-muted">Tidak ada file sebelumnya</span>`;
            }
            $("#file-preview-surat-peringatan").html(filePreviewHtml);

            // Ubah form action ke update
            $("#formDataSuratPeringatan").attr("action", "{{ route('surat-peringatan.update') }}");

            // Ubah teks header menjadi Edit Data Surat Peringatan
            $("#header-title-form-surat-peringatan").text("Edit Data Surat Peringatan");

            //Ubah teks button jadi update
            $("#formDataSuratPeringatan button[type='submit']").text("Update");

            // Tampilkan form edit, sembunyikan tabel
            $("#form-surat-peringatan-data").removeClass("d-none");
            $("#card-surat-peringatan").addClass("d-none");

            flatpickr("input[name='periode_awal']", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });

            flatpickr("input[name='periode_akhir']", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
        });

        // Tombol Tambah Data dan Kembali
        document.addEventListener("DOMContentLoaded", function() {
            const btnTambah = document.getElementById("tambah-data-surat-peringatan");
            const btnKembaliSuratPeringatan = document.getElementById("btn-kembali-surat-peringatan");
            const cardSuratPeringatan = document.getElementById("card-surat-peringatan");
            const formTambah = document.getElementById("form-surat-peringatan-data");

            if (btnTambah && btnKembaliSuratPeringatan) {
                btnTambah.addEventListener("click", function(event) {
                    event.preventDefault();
                    cardSuratPeringatan.classList.add("d-none");
                    formTambah.classList.remove("d-none");

                    // Reset form saat klik tambah data
                    $("#formDataSuratPeringatan")[0].reset();
                    $("#formDataSuratPeringatan").attr("action",
                        "{{ route('surat-peringatan.create') }}");
                    $("#header-title-form-surat-peringatan").text("Tambah Data Surat Peringatan");

                    $("#formDataSuratPeringatan button[type='submit']").text("Submit");

                    // Reset & re-init flatpickr
                    let periodeAwalInput = document.querySelector("input[name='periode_awal']");
                    let periodeAkhirInput = document.querySelector("input[name='periode_akhir']");

                    if (periodeAwalInput._flatpickr) periodeAwalInput._flatpickr.clear();
                    if (periodeAkhirInput._flatpickr) periodeAkhirInput._flatpickr.clear();

                    flatpickr(periodeAwalInput, {
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d"
                    });

                    flatpickr(periodeAkhirInput, {
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d"
                    });
                });

                btnKembaliSuratPeringatan.addEventListener("click", function() {
                    formTambah.classList.add("d-none");
                    cardSuratPeringatan.classList.remove("d-none");
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete-surat-peringatan");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-id_sp"); // FIXED!
                let itemName = button.getAttribute("data-name");

                console.log("Delete URL:", deleteUrl);
                console.log("ID:", itemId);

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    id_sp: itemId,
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white" // Styling tombol OK
                                        }
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>
    <!-- End Script Surat Peringatan !-->

    <!-- Start Script Bahasa !-->
    <script>
        $(document).on("submit", "#formDataBahasa", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = new FormData(form[0]);

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Tampilkan loading
            $("#header-title-form-bahasa").addClass("d-none");
            $("#loading-text-form-bahasa").removeClass("d-none");

            // Kirim AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // Mencegah jQuery memproses data
                contentType: false, // Mencegah jQuery mengatur content-type
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Cek apakah alert sudah ada
                        if ($("#alert-success").length === 0) {
                            let alertSuccess = $(
                                "<div id='alert-success' class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                "<i data-feather='check-square'></i> " + response.message +
                                "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                "</div>"
                            );

                            $("#tambah-data-bahasa").before(alertSuccess);

                            setTimeout(function() {
                                alertSuccess.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }, 5000);
                        }

                        // Reset form setelah sukses
                        form[0].reset();

                        // Kembali ke tampilan tabel pendidikan
                        $("#form-bahasa-data").addClass("d-none");
                        $("#card-bahasa").removeClass("d-none");

                        // Reload tabel bahasa tanpa reload halaman
                        $("#card-bahasa .table-responsive").load(location.href +
                            " #card-bahasa .table-responsive > *",
                            function() {
                                feather.replace(); // Reload ikon jika diperlukan
                            }
                        );
                    } else {
                        alert("Gagal: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                },
                complete: function() {
                    $("#loading-text-form-bahasa").addClass("d-none");
                    $("#header-title-form-bahasa").removeClass("d-none");
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });

        // Script Edit Data Bahasa
        $(document).on("click", ".btn-edit-bahasa", function(event) {
            event.preventDefault();

            let id_bhs = $(this).data("id_bhs");
            let jns_bhs = $(this).data("jns_bhs");
            let bahasa = $(this).data("bahasa");
            let kemampuan = $(this).data("kemampuan");

            // console.log("tgl_lhr :", tgl_lhr);
            // console.log(tgl_lhr)

            // Pastikan hidden input id diisi
            $("#formDataBahasa input[name='id_bhs']").val(id_bhs);
            $("#formDataBahasa input[name='jns_bhs']").val(jns_bhs);
            $("#formDataBahasa input[name='bahasa']").val(bahasa);
            $("#formDataBahasa select[name='kemampuan']").val(kemampuan);

            // Ubah form action ke update
            $("#formDataBahasa").attr("action", "{{ route('bahasa.update') }}");

            // Ubah teks header menjadi Edit Data Bahasa
            $("#header-title-form-bahasa").text("Edit Data Bahasa");

            //Ubah teks button jadi update
            $("#formDataBahasa button[type='submit']").text("Update");

            // Tampilkan form edit, sembunyikan tabel
            $("#form-bahasa-data").removeClass("d-none");
            $("#card-bahasa").addClass("d-none");
        });

        // Tombol Tambah Data dan Kembali
        document.addEventListener("DOMContentLoaded", function() {
            const btnTambah = document.getElementById("tambah-data-bahasa");
            const btnKembaliBahasa = document.getElementById("btn-kembali-bahasa");
            const cardBahasa = document.getElementById("card-bahasa");
            const formTambah = document.getElementById("form-bahasa-data");

            if (btnTambah && btnKembaliBahasa) {
                btnTambah.addEventListener("click", function(event) {
                    event.preventDefault();
                    cardBahasa.classList.add("d-none");
                    formTambah.classList.remove("d-none");

                    // Reset form saat klik tambah data
                    $("#formDataBahasa")[0].reset();
                    $("#formDataBahasa").attr("action", "{{ route('bahasa.create') }}");
                    $("#header-title-form-bahasa").text("Tambah Data Bahasa");

                    $("#formDataBahasa button[type='submit']").text("Submit");
                });

                btnKembaliBahasa.addEventListener("click", function() {
                    formTambah.classList.add("d-none");
                    cardBahasa.classList.remove("d-none");
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete-bahasa");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-id_bhs"); // FIXED!
                let itemName = button.getAttribute("data-name");

                console.log("Delete URL:", deleteUrl);
                console.log("ID:", itemId);

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    id_bhs: itemId,
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white" // Styling tombol OK
                                        }
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>
    <!-- End Script Bahasa !-->

    <!-- Start Script Rekening Bank !-->
    <script>
        $(document).on("submit", "#formDataBank", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = new FormData(form[0]);

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Tampilkan loading
            $("#header-title-form-bank").addClass("d-none");
            $("#loading-text-form-bank").removeClass("d-none");

            // Kirim AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // Mencegah jQuery memproses data
                contentType: false, // Mencegah jQuery mengatur content-type
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Cek apakah alert sudah ada
                        if ($("#alert-success").length === 0) {
                            let alertSuccess = $(
                                "<div id='alert-success' class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                "<i data-feather='check-square'></i> " + response.message +
                                "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                "</div>"
                            );

                            $("#tambah-data-bank").before(alertSuccess);

                            setTimeout(function() {
                                alertSuccess.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }, 5000);
                        }

                        // Reset form setelah sukses
                        form[0].reset();

                        // Kembali ke tampilan tabel bank
                        $("#form-bank-data").addClass("d-none");
                        $("#card-bank").removeClass("d-none");

                        // Reload tabel bank tanpa reload halaman
                        $("#card-bank .table-responsive").load(location.href +
                            " #card-bank .table-responsive > *",
                            function() {
                                feather.replace(); // Reload ikon jika diperlukan
                            }
                        );
                    } else {
                        alert("Gagal: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                },
                complete: function() {
                    $("#loading-text-form-bank").addClass("d-none");
                    $("#header-title-form-bank").removeClass("d-none");
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });

        // Script Edit Data Bank
        $(document).on("click", ".btn-edit-bank", function(event) {
            event.preventDefault();

            let id_account = $(this).data("id_account");
            let nomor_account = $(this).data("nomor_account");
            let nama_bank = $(this).data("nama_bank");
            let keterangan = $(this).data("keterangan");

            // console.log("tgl_lhr :", tgl_lhr);
            // console.log(tgl_lhr)

            // Pastikan hidden input id diisi
            $("#formDataBank input[name='id_account']").val(id_account);
            $("#formDataBank input[name='nomor_account']").val(nomor_account);
            $("#formDataBank input[name='nama_bank']").val(nama_bank);
            $("#formDataBank input[name='keterangan']").val(keterangan);

            // Ubah form action ke update
            $("#formDataBank").attr("action", "{{ route('bank.update') }}");

            // Ubah teks header menjadi Edit Data Bank
            $("#header-title-form-bank").text("Edit Data Bank");

            //Ubah teks button jadi update
            $("#formDataBank button[type='submit']").text("Update");

            // Tampilkan form edit, sembunyikan tabel
            $("#form-bank-data").removeClass("d-none");
            $("#card-bank").addClass("d-none");
        });

        // Tombol Tambah Data dan Kembali
        document.addEventListener("DOMContentLoaded", function() {
            const btnTambah = document.getElementById("tambah-data-bank");
            const btnKembaliBank = document.getElementById("btn-kembali-bank");
            const cardBank = document.getElementById("card-bank");
            const formTambah = document.getElementById("form-bank-data");

            if (btnTambah && btnKembaliBank) {
                btnTambah.addEventListener("click", function(event) {
                    event.preventDefault();
                    cardBank.classList.add("d-none");
                    formTambah.classList.remove("d-none");

                    // Reset form saat klik tambah data
                    $("#formDataBank")[0].reset();
                    $("#formDataBank").attr("action", "{{ route('bank.create') }}");
                    $("#header-title-form-bank").text("Tambah Data Bank");

                    $("#formDataBank button[type='submit']").text("Submit");
                });

                btnKembaliBank.addEventListener("click", function() {
                    formTambah.classList.add("d-none");
                    cardBank.classList.remove("d-none");
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete-bank");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-id_account"); // FIXED!
                let itemName = button.getAttribute("data-name");

                console.log("Delete URL:", deleteUrl);
                console.log("ID:", itemId);

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    id_account: itemId,
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white" // Styling tombol OK
                                        }
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>
    <!-- End Script Rekening Bank !-->

    <!-- Start Script NPWP !-->
    <script>
        $(document).on("submit", "#formDataNpwp", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = new FormData(form[0]);

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Tampilkan loading
            $("#header-title-form-npwp").addClass("d-none");
            $("#loading-text-form-npwp").removeClass("d-none");

            // Kirim AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // Mencegah jQuery memproses data
                contentType: false, // Mencegah jQuery mengatur content-type
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Cek apakah alert sudah ada
                        if ($("#alert-success").length === 0) {
                            let alertSuccess = $(
                                "<div id='alert-success' class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                "<i data-feather='check-square'></i> " + response.message +
                                "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                "</div>"
                            );

                            $("#tambah-data-npwp").before(alertSuccess);

                            setTimeout(function() {
                                alertSuccess.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }, 5000);
                        }

                        // Reset form setelah sukses
                        form[0].reset();

                        // Kembali ke tampilan tabel npwp
                        $("#form-npwp-data").addClass("d-none");
                        $("#card-npwp").removeClass("d-none");

                        // Reload tabel npwp tanpa reload halaman
                        $("#card-npwp .table-responsive").load(location.href +
                            " #card-npwp .table-responsive > *",
                            function() {
                                feather.replace(); // Reload ikon jika diperlukan
                            }
                        );
                    } else {
                        alert("Gagal: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                },
                complete: function() {
                    $("#loading-text-form-npwp").addClass("d-none");
                    $("#header-title-form-npwp").removeClass("d-none");
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });

        // Script Edit Data NPWP
        $(document).on("click", ".btn-edit-npwp", function(event) {
            event.preventDefault();

            let id_npwp = $(this).data("id_npwp");
            let nomor_npwp = $(this).data("nomor_npwp");
            let tanggungan = $(this).data("tanggungan");
            let tgl_terdaftar = $(this).data("tgl_terdaftar");
            let alamat = $(this).data("alamat");
            let file = $(this).data("file");

            // console.log("tgl_lhr :", tgl_lhr);
            // console.log(tgl_lhr)

            // Pastikan hidden input id diisi
            $("#formDataNpwp input[name='id_npwp']").val(id_npwp);
            $("#formDataNpwp input[name='nomor_npwp']").val(nomor_npwp);
            $("#formDataNpwp select[name='tanggungan']").val(tanggungan);

            //Tanggal Terdaftar NPWP
            let tglTerdaftarInput = document.querySelector("input[name='tgl_terdaftar']");
            tglTerdaftarInput.value = tgl_terdaftar; // fallback untuk jaga-jaga

            let flatpickrtglTerdaftarInstance = flatpickr(tglTerdaftarInput, {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
            flatpickrtglTerdaftarInstance.setDate(tgl_terdaftar, true);

            $("#formDataNpwp textarea[name='alamat']").val(alamat);

            //Preview File
            let filePreviewHtml = '';
            if (file !== '') {
                filePreviewHtml = `<a href="/storage/assets/file/npwp/${file}" target="_blank" class="btn btn-sm btn-outline-primary">
                Lihat File NPWP Sebelumnya
            </a>`;
            } else {
                filePreviewHtml = `<span class="text-muted">Tidak ada file sebelumnya</span>`;
            }
            $("#file-preview-npwp").html(filePreviewHtml);

            // Ubah form action ke update
            $("#formDataNpwp").attr("action", "{{ route('npwp.update') }}");

            // Ubah teks header menjadi Edit Data NPWP
            $("#header-title-form-npwp").text("Edit Data NPWP");

            //Ubah teks button jadi update
            $("#formDataNpwp button[type='submit']").text("Update");

            // Tampilkan form edit, sembunyikan tabel
            $("#form-npwp-data").removeClass("d-none");
            $("#card-npwp").addClass("d-none");

            flatpickr("input[name='tgl_terdaftar']", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
        });

        // Tombol Tambah Data dan Kembali
        document.addEventListener("DOMContentLoaded", function() {
            const btnTambah = document.getElementById("tambah-data-npwp");
            const btnKembaliNpwp = document.getElementById("btn-kembali-npwp");
            const cardNpwp = document.getElementById("card-npwp");
            const formTambah = document.getElementById("form-npwp-data");

            if (btnTambah && btnKembaliNpwp) {
                btnTambah.addEventListener("click", function(event) {
                    event.preventDefault();
                    cardNpwp.classList.add("d-none");
                    formTambah.classList.remove("d-none");

                    // Reset form saat klik tambah data
                    $("#formDataNpwp")[0].reset();
                    $("#formDataNpwp").attr("action", "{{ route('npwp.create') }}");
                    $("#header-title-form-npwp").text("Tambah Data NPWP");

                    $("#formDataNpwp button[type='submit']").text("Submit");

                    // Reset & re-init flatpickr
                    let tglTerdaftarInput = document.querySelector("input[name='tgl_terdaftar']");

                    if (tglTerdaftarInput._flatpickr) tglTerdaftarInput._flatpickr.clear();

                    flatpickr(tglTerdaftarInput, {
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d"
                    });
                });

                btnKembaliNpwp.addEventListener("click", function() {
                    formTambah.classList.add("d-none");
                    cardNpwp.classList.remove("d-none");
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete-npwp");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-id_npwp"); // FIXED!
                let itemName = button.getAttribute("data-name");

                console.log("Delete URL:", deleteUrl);
                console.log("ID:", itemId);

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    id_npwp: itemId,
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white" // Styling tombol OK
                                        }
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>
    <!-- End Script NPWP !-->

    <!-- Start Script Pengalaman Kerja !-->
    <script>
        $(document).on("submit", "#formDataPengalamanKerja", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = new FormData(form[0]);

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Tampilkan loading
            $("#header-title-form-pengalaman-kerja").addClass("d-none");
            $("#loading-text-form-pengalaman-kerja").removeClass("d-none");

            // Kirim AJAX
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // Mencegah jQuery memproses data
                contentType: false, // Mencegah jQuery mengatur content-type
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Cek apakah alert sudah ada
                        if ($("#alert-success").length === 0) {
                            let alertSuccess = $(
                                "<div id='alert-success' class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                "<i data-feather='check-square'></i> " + response.message +
                                "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                "</div>"
                            );

                            $("#tambah-data-pengalaman-kerja").before(alertSuccess);

                            setTimeout(function() {
                                alertSuccess.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            }, 5000);
                        }

                        // Reset form setelah sukses
                        form[0].reset();

                        // Kembali ke tampilan tabel pengalaman kerja
                        $("#form-pengalaman-kerja-data").addClass("d-none");
                        $("#card-pengalaman-kerja").removeClass("d-none");

                        // Reload tabel pengalaman kerja tanpa reload halaman
                        $("#card-pengalaman-kerja .table-responsive").load(location.href +
                            " #card-pengalaman-kerja .table-responsive > *",
                            function() {
                                feather.replace(); // Reload ikon jika diperlukan
                            }
                        );
                    } else {
                        alert("Gagal: " + response.message);
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                },
                complete: function() {
                    $("#loading-text-form-pengalaman-kerja").addClass("d-none");
                    $("#header-title-form-pengalaman-kerja").removeClass("d-none");
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });

        // Script Edit Data Pengalaman Kerja
        $(document).on("click", ".btn-edit-pengalaman-kerja", function(event) {
            event.preventDefault();

            let id_history = $(this).data("id_history");
            let periode_start = $(this).data("periode_start");
            let periode_end = $(this).data("periode_end");
            let nama_perusahaan = $(this).data("nama_perusahaan");
            let jenis_usaha = $(this).data("jenis_usaha");
            let alamat = $(this).data("alamat");
            let posisi_awal = $(this).data("posisi_awal");
            let posisi_akhir = $(this).data("posisi_akhir");
            let jumlah_karyawan = $(this).data("jumlah_karyawan");
            let keterangan = $(this).data("keterangan");
            let file = $(this).data("file");

            // console.log("tgl_lhr :", tgl_lhr);
            // console.log(tgl_lhr)

            // Pastikan hidden input id diisi
            $("#formDataPengalamanKerja input[name='id_history']").val(id_history);
            //Periode Start Pengalaman Kerja
            let periodeStartInput = document.querySelector("input[name='periode_start']");
            periodeStartInput.value = periode_start; // fallback untuk jaga-jaga

            let flatpickrperiodeStartInstance = flatpickr(periodeStartInput, {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
            flatpickrperiodeStartInstance.setDate(periode_start, true);
            //Periode End Pengalaman Kerja
            let periodeEndInput = document.querySelector("input[name='periode_end']");
            periodeEndInput.value = periode_end; // fallback untuk jaga-jaga

            let flatpickrperiodeEndInstance = flatpickr(periodeEndInput, {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
            flatpickrperiodeEndInstance.setDate(periode_end, true);

            $("#formDataPengalamanKerja input[name='nama_perusahaan']").val(nama_perusahaan);
            $("#formDataPengalamanKerja input[name='jenis_usaha']").val(jenis_usaha);
            $("#formDataPengalamanKerja textarea[name='alamat']").val(alamat);
            $("#formDataPengalamanKerja input[name='posisi_awal']").val(posisi_awal);
            $("#formDataPengalamanKerja input[name='posisi_akhir']").val(posisi_akhir);
            $("#formDataPengalamanKerja input[name='jumlah_karyawan']").val(jumlah_karyawan);
            $("#formDataPengalamanKerja input[name='keterangan']").val(keterangan);

            //Preview File
            let filePreviewHtml = '';
            if (file !== '') {
                filePreviewHtml = `<a href="/storage/assets/file/paklaring/${file}" target="_blank" class="btn btn-sm btn-outline-primary">
                Lihat File Paklaring Sebelumnya
            </a>`;
            } else {
                filePreviewHtml = `<span class="text-muted">Tidak ada file sebelumnya</span>`;
            }
            $("#file-preview-pengalaman-kerja").html(filePreviewHtml);

            // Ubah form action ke update
            $("#formDataPengalamanKerja").attr("action", "{{ route('pengalaman-kerja.update') }}");

            // Ubah teks header menjadi Edit Data Pengalaman Kerja
            $("#header-title-form-pengalaman-kerja").text("Edit Data Pengalaman Kerja");

            //Ubah teks button jadi update
            $("#formDataPengalamanKerja button[type='submit']").text("Update");

            // Tampilkan form edit, sembunyikan tabel
            $("#form-pengalaman-kerja-data").removeClass("d-none");
            $("#card-pengalaman-kerja").addClass("d-none");

            flatpickr("input[name='periode_start']", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
            flatpickr("input[name='periode_end']", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d"
            });
        });

        // Tombol Tambah Data dan Kembali
        document.addEventListener("DOMContentLoaded", function() {
            const btnTambah = document.getElementById("tambah-data-pengalaman-kerja");
            const btnKembaliPengalamanKerja = document.getElementById("btn-kembali-pengalaman-kerja");
            const cardPengalamanKerja = document.getElementById("card-pengalaman-kerja");
            const formTambah = document.getElementById("form-pengalaman-kerja-data");

            if (btnTambah && btnKembaliPengalamanKerja) {
                btnTambah.addEventListener("click", function(event) {
                    event.preventDefault();
                    cardPengalamanKerja.classList.add("d-none");
                    formTambah.classList.remove("d-none");

                    // Reset form saat klik tambah data
                    $("#formDataPengalamanKerja")[0].reset();
                    $("#formDataPengalamanKerja").attr("action",
                        "{{ route('pengalaman-kerja.create') }}");
                    $("#header-title-form-pengalaman-kerja").text("Tambah Data Pengalaman Kerja");

                    $("#formDataPengalamanKerja button[type='submit']").text("Submit");

                    // Reset & re-init flatpickr
                    let periodeStartInput = document.querySelector("input[name='periode_start']");
                    let periodeEndInput = document.querySelector("input[name='periode_end']");

                    if (periodeStartInput._flatpickr) periodeStartInput._flatpickr.clear();
                    if (periodeEndInput._flatpickr) periodeEndInput._flatpickr.clear();

                    flatpickr(periodeStartInput, {
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d"
                    });
                    flatpickr(periodeEndInput, {
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d"
                    });
                });

                btnKembaliPengalamanKerja.addEventListener("click", function() {
                    formTambah.classList.add("d-none");
                    cardPengalamanKerja.classList.remove("d-none");
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete-pengalaman-kerja");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-id_history"); // FIXED!
                let itemName = button.getAttribute("data-name");

                console.log("Delete URL:", deleteUrl);
                console.log("ID:", itemId);

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    id_history: itemId,
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white" // Styling tombol OK
                                        }
                                    }).then(() => location.reload());
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>
    <!-- End Script Pengalaman Kerja !-->

    <!-- Start Script Rekam Medis !-->
    <script>
        $(document).on("submit", "#formDataRekamMedis", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = form.serialize();

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Sembunyikan card-body dengan animasi, hanya menyisakan card-header
            $("#card-rekam-medis .card-body").slideUp(300, function() {
                $("#header-title-rekam-medis").addClass("d-none");
                $("#loading-text-rekam-medis").removeClass("d-none");
            });

            // Kirim AJAX ke server
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Reload card-body dan tambahkan alert sukses
                        $("#card-rekam-medis .card-body").load(location.href +
                            " #card-rekam-medis .card-body > *",
                            function() {
                                feather.replace();

                                // Tambahkan alert sukses
                                $("<div class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                        "<i data-feather='check-square'></i> Data berhasil diperbarui!" +
                                        "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                        "</div>").hide().prependTo("#card-rekam-medis .card-body")
                                    .fadeIn(500);

                                // Kembalikan tampilan awal
                                $("#loading-text-rekam-medis").addClass("d-none");
                                $("#header-title-rekam-medis").removeClass("d-none");
                                $("#card-rekam-medis .card-body").slideDown(300);

                                // Aktifkan kembali tombol submit
                                form.find("button[type='submit']").prop("disabled", false);
                            });
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);

                    // Kembalikan tampilan awal jika terjadi error
                    $("#loading-text-rekam-medis").addClass("d-none");
                    $("#header-title-rekam-medis").removeClass("d-none");
                    $("#card-rekam-medis .card-body").slideDown(300);

                    // Aktifkan kembali tombol submit
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });
    </script>
    <!-- End Script Rekam Medis !-->

    <!-- Start Script User Akun !-->
    <script>
        $(document).on("submit", "#formDataUserAccount", function(event) {
            event.preventDefault(); // Mencegah reload halaman

            let form = $(this);
            let url = form.attr("action");
            let formData = form.serialize();

            // Disable tombol submit agar tidak bisa diklik berulang
            form.find("button[type='submit']").prop("disabled", true);

            // Sembunyikan card-body dengan animasi, hanya menyisakan card-header
            $("#card-user-account .card-body").slideUp(300, function() {
                $("#header-title-user-account").addClass("d-none");
                $("#loading-text-user-account").removeClass("d-none");
            });

            // Kirim AJAX ke server
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        // Reload card-body dan tambahkan alert sukses
                        $("#card-user-account .card-body").load(location.href +
                            " #card-user-account .card-body > *",
                            function() {
                                feather.replace();

                                flatpickr("#human-friendly", {
                                    altInput: true,
                                    altFormat: "F j, Y",
                                    dateFormat: "Y-m-d",
                                });

                                // Tambahkan alert sukses
                                $("<div class='alert alert-success alert-dismissible fade show' role='alert'>" +
                                    "<i data-feather='check-square'></i> Data berhasil diperbarui!" +
                                    "<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>" +
                                    "</div>").hide().prependTo(
                                    "#card-user-account .card-body").fadeIn(500);

                                // Kembalikan tampilan awal
                                $("#loading-text-user-account").addClass("d-none");
                                $("#header-title-user-account").removeClass("d-none");
                                $("#card-user-account .card-body").slideDown(300);

                                // Aktifkan kembali tombol submit
                                form.find("button[type='submit']").prop("disabled", false);
                            });
                    }
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);

                    // Kembalikan tampilan awal jika terjadi error
                    $("#loading-text-user-account").addClass("d-none");
                    $("#header-title-user-account").removeClass("d-none");
                    $("#card-user-account .card-body").slideDown(300);

                    // Aktifkan kembali tombol submit
                    form.find("button[type='submit']").prop("disabled", false);
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.addEventListener("click", function(event) {
                let button = event.target.closest(".btn-delete-akun");
                if (!button) return;

                event.preventDefault();
                let deleteUrl = button.getAttribute("data-url");
                let itemId = button.getAttribute("data-nik"); // FIXED!
                let itemName = button.getAttribute("data-name");

                console.log("Delete URL:", deleteUrl);
                console.log("ID:", itemId);

                Swal.fire({
                    title: "Apa anda yakin?",
                    text: `Akun ${itemName} akan dihapus permanen?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute("content"),
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    nik: itemId,
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your data has been deleted.",
                                        icon: "success",
                                        confirmButtonText: "OK",
                                        customClass: {
                                            confirmButton: "btn btn-primary text-white"
                                        }
                                    }).then(() => {
                                        if (data.redirect) {
                                            window.location.href = data.redirect;
                                        }
                                    });
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            }).catch(error => {
                                console.error("Delete error:", error);
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            });
                    }
                });
            });
        });
    </script>
    <!-- End Script User Akun !-->
@endsection
