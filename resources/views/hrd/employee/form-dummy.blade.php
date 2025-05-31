@extends('layouts.master')



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
                                <div class="step-title">Struktur Orchart</div>
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
                                <div class="step-title">Manage Application</div>
                                <div class="step-bar-left"></div>
                                <div class="step-bar-right"></div>
                            </div>
                            <div class="stepper-six step">
                                <div class="step-circle"><span>6</span></div>
                                <div class="step-title">Finish</div>
                                <div class="step-bar-left"></div>
                                <div class="step-bar-right"></div>
                            </div>
                        </div>
                        <div class="shipping-content" id="msform">
                            <form class="stepper-one row g-3 needs-validation shipping-wizard" novalidate="">
                                <div class="row g-3 custom-input">
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
                                    </div>
                                    <div class="row">
                                        <div class="col-6 position-relative">
                                            <label class="form-label" for="unit_kerja"><span style="color: red">*
                                                </span>Divisi</label>
                                            <select name="unit_kerja" id="unit_kerja" class="js-example-basic-single">
                                                <option selected disabled value="">Pilih Divisi</option>
                                                @foreach ($unit_kerja as $data)
                                                    <option value="{{ $data->id_unit }}">
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
                                                    <option value="{{ $data->id_department }}">
                                                        {{ $data->nama_department }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="error-departement" style="display: none;">
                                            </div>
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
                                                    <option value="{{ $data->id_masterjab }}">
                                                        {{ $data->nama_masterjab }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback" id="error-jabatan" style="display: none;">
                                            </div>
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
                                                @foreach ($dataHirarki as $rowUnit)
                                                    <option value="{{ $rowUnit->nik }}">
                                                        {{ $rowUnit->nama }}
                                                    </option>
                                                @endforeach
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
                                                @foreach ($dataHirarki as $rowSubsi)
                                                    <option value="{{ $rowSubsi->nik }}">
                                                        {{ $rowSubsi->nama }}
                                                    </option>
                                                @endforeach
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
                                                @foreach ($dataHirarki as $rowKasie)
                                                    <option value="{{ $rowKasie->nik }}">
                                                        {{ $rowKasie->nama }}
                                                    </option>
                                                @endforeach
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
                                                @foreach ($dataHirarki as $rowKadept)
                                                    <option value="{{ $rowKadept->nik }}">
                                                        {{ $rowKadept->nama }}
                                                    </option>
                                                @endforeach
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
                                                @foreach ($dataHirarki as $rowKadiv)
                                                    <option value="{{ $rowKadiv->nik }}">
                                                        {{ $rowKadiv->nama }}
                                                    </option>
                                                @endforeach
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
                                                        @foreach ($dataApproval as $rowAtasan)
                                                            <option value="{{ $rowAtasan->nik }}">{{ $rowAtasan->nama }}
                                                            </option>
                                                        @endforeach
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
                                                        @foreach ($dataApproval as $rowAtasan)
                                                            <option value="{{ $rowAtasan->nik }}">
                                                                {{ $rowAtasan->nama }}
                                                            </option>
                                                        @endforeach
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
                                                        @foreach ($dataApproval as $rowAtasan)
                                                            <option value="{{ $rowAtasan->nik }}">
                                                                {{ $rowAtasan->nama }}
                                                            </option>
                                                        @endforeach
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
                                                        @foreach ($dataApproval as $rowAtasan)
                                                            <option value="{{ $rowAtasan->nik }}">
                                                                {{ $rowAtasan->nama }}
                                                            </option>
                                                        @endforeach
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
                                                        @foreach ($dataApproval as $rowAtasan)
                                                            <option value="{{ $rowAtasan->nik }}">
                                                                {{ $rowAtasan->nama }}
                                                            </option>
                                                        @endforeach
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
                                            </ul>
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
                                Back</button>
                            <button class="btn btn-primary" id="nextbtn" onclick="nextStep()">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('script')
    <script>
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


        // The original nextStep function with validation added
        function nextStep() {
            // Jika di step terakhir, submit form
            if (currentStep === 5) {
                submitForm();
                return;
            }

            // Validasi step 1 (Informasi Pribadi)
            if (currentStep === 0) {
                return;
            }

            // Validasi step 2 (Data Karyawan)
            if (currentStep === 1) {
                return;
            }

            // Validasi step 3 (Strutktur Orchart)
            if (currentStep === 2) {
                return;
            }

            // Validasi step 4 (Approval Karyawan)
            if (currentStep === 3) {
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
                    document.getElementById("nextbtn").textContent = "Finish";
                }
            });
        }
    </script>
@endsection
