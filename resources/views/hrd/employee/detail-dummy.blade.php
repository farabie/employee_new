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
        top: 210px;
        /* geser ke bawah dari lingkaran */
        left: 50%;
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

<div class="container-fluid">
    <div class="user-profile">
        <div class="row">
            <div class="row mb-3">
                <div class="col-12" id="foto-karyawan-upload-container">
                    {{-- <div class="foto-karyawan-upload-wrapper">
                        <div class="foto-karyawan-border-circle">
                            <img id="preview-foto-karyawan"
                                src="{{ empty($pegawai->foto)
                                    ? ($pegawai->jk == 'Laki-laki'
                                        ? asset('storage/assets/img/foto/no-foto-male.png')
                                        : asset('storage/assets/img/foto/no-foto-female.png'))
                                    : asset("storage/assets/img/foto/$pegawai->foto") }}"
                                alt="Preview Foto" class="foto-karyawan-preview"
                                style="width: 200px; height: 200px; object-fit: cover;">

                            <!-- Loading overlay -->
                            <div class="loading-overlay" id="loading-overlay">
                                <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
                            </div>

                            <!-- Icon edit -->
                            <div class="edit-foto-icon" onclick="triggerFileInput()">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>

                        <!-- Input file tersembunyi -->
                        <input type="file" id="input-foto-karyawan" accept="image/*" onchange="previewFoto(event)">

                        <!-- Badge nama dan NIK -->
                        <div class="employee-badge text-center">
                            <div class="employee-name" id="employee-name">{{ $pegawai->nama ?? 'Nama Tidak Tersedia' }}
                            </div>
                            <div class="employee-nik" id="employee-nik">NIK: {{ $pegawai->nik ?? 'NIK Tidak Tersedia' }}
                            </div>
                        </div>
                    </div> --}}
                    <div class="foto-karyawan-upload-wrapper">
                        <div class="foto-karyawan-border-circle">
                            <img id="preview-foto-karyawan" ...>
                            <div class="loading-overlay" id="loading-overlay">
                                <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
                            </div>
                        </div>

                        <!-- Icon edit DI LUAR lingkaran -->
                        <div class="edit-foto-icon" onclick="triggerFileInput()">
                            <i class="fas fa-pencil-alt"></i>
                        </div>

                        <input type="file" id="input-foto-karyawan" accept="image/*" onchange="previewFoto(event)">
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
</div>
