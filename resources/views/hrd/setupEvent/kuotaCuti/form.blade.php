@extends('layouts.master')

@section('css')
    <style>
        .form-label {
            margin-bottom: 4px;
            font-size: 16px;
            font-weight: 500;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flatpickr/flatpickr.min.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">

    <style>
        .form-label {
            font-size: 14px;
            font-weight: 500
        }

        .select2-container--default .select2-selection--multiple {
            border: 1px solid #e4e4e4 !important;
            /* Warna abu-abu */
            border-radius: 5px;
            padding: 5px;
            min-height: 38px;
            transition: border-color 0.3s ease-in-out;
        }

        .select2-container--default .select2-selection--multiple:has(.select2-selection__choice),
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #3460ff !important;
            /* Warna biru */
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Edit Kuota Cuti</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Setup & Event</li>
                        <li class="breadcrumb-item active">{{ $page_meta['title'] }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @php
        use Carbon\Carbon;

        $time = Carbon::now();
        $tahun_berjalan = $time->format('Y');
        $satu_tahun_lalu = $time->clone()->subYear()->format('Y');
        $dua_tahun_lalu = $time->clone()->subYears(2)->format('Y');

        $alreadyCutiBesar = $kuotaCuti->already_cuti_besar;
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $page_meta['title'] }}</h5>
                    </div>
                    <div class="card-body animated-form">
                        <form class="row g-3 needs-validation custom-input" novalidate="" method="post"
                            action="{{ $page_meta['url'] }}">
                            @method($page_meta['method'])
                            @csrf
                            <div class="col-12 position-relative">
                                <label class="form-label" for="jenis_edit_cuti"><span style="color: red">* </span>Jenis Edit
                                    Kuota Cuti</label>
                                <select class="form-select" required="" name="jenis_edit_cuti" id="jenis_edit_cuti">
                                    <option selected disabled value="">Pilih Edit Jenis Kuota Cuti</option>
                                    <option value="penambahan_kuota_cuti">Penambahan Kuota Cuti</option>
                                    <option value="pengurangan_kuota_cuti">Pengurangan Kuota Cuti</option>
                                </select>
                                <div class="invalid-feedback">Pilih Edit Jenis Kuota</div>
                            </div>
                            <div class="col-12 position-relative">
                                <label class="form-label" for="jenis_tahun_cuti"><span style="color: red">* </span>
                                    Tahun Cuti</label>
                                <select class="form-select" required="" name="jenis_tahun_cuti" id="jenis_tahun_cuti">
                                    <option selected disabled value="">Pilih Tahun Cuti</option>
                                    <option value="hak_cuti_tahun_berjalan">{{ $tahun_berjalan }}</option>
                                    <option value="hak_cuti_tahun_2">{{ $satu_tahun_lalu }}</option>
                                    <option value="hak_cuti_tahun_1">{{ $dua_tahun_lalu }}</option>
                                    {{-- <option value="hak_cuti_besar">Cuti Besar</option> --}}
                                </select>
                                <div class="invalid-feedback">Pilih jenis cuti terlebih dahulu</div>
                            </div>
                            <div class="col-12 position-relative">
                                <label class="form-label" for="jenis_peg"><span style="color: red">* </span> Jenis
                                    Karyawan</label>
                                <select class="form-select" required="" name="jenis_peg" id="jenis_peg">
                                    <option selected disabled value="">Pilih Jenis Karyawan</option>
                                    <option value="HO">HO</option>
                                    <option value="Lapangan">Lapangan</option>
                                    <option value="Shift">Shift</option>
                                    <option value="Semua Karyawan">Semua Karyawan</option>
                                    <option value="karyawan_khusus">Setup Individu Per Karyawan</option>
                                </select>
                                <div class="invalid-feedback">Pilih Jenis Karyawan Terlebih Dahulu</div>
                            </div>
                            <div class="col-12 position-relative" id="jumlah-cuti-container" style="display: none;">
                                <label class="form-label" for="jumlah_cuti">
                                    <span style="color: red">* </span> Jumlah Cuti</label>
                                <input id="jumlah_cuti" name="jumlah_cuti" class="form-control digits" type="number"
                                    placeholder="Jumlah Cuti" required="" value="">
                                <div class="invalid-feedback">Masukkan jumlah cuti</div>
                            </div>
                            <div class="col-12 position-relative" id="pegawai-container" style="display: none;">
                                <label class="form-label" for="peg_cuti[]">
                                    <span style="color: red">* </span> Pegawai</label>
                                <select name="peg_cuti[]" id="peg_cuti" class="js-example-basic-multiple"
                                    multiple="multiple">
                                    <option value="">...</option>
                                    @foreach ($dataPegawai as $pegawai)
                                        <option value="{{ $pegawai->nik }}">
                                            {{ $pegawai->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <label><span style="color: red">*</span> Pegawai yang diedit kuota cutinya</label>
                            </div>
                            <div class="col-12 position-relative">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <input name="keterangan" class="form-control" id="keterangan" type="text" value="">
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary" type="submit">{{ $page_meta['submit_text'] }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('script')
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    <script src="{{ asset('assets/js/height-equal.js') }}"></script>
    <script src="{{ asset('assets/js/custom-animated-form.js') }}"></script>
    <script src="{{ asset('assets/js/custom-pwd-validation.js') }}"></script>

    <script src="{{ asset('assets/js/flat-pickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/flat-pickr/custom-flatpickr.js') }}"></script>

    <script>
        $(".js-example-basic-single").select2({
            theme: "classic"
        });
    </script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                allowClear: true
            }).on('change', function() {
                let parent = $(this).next(".select2-container");
                if ($(this).val().length > 0) {
                    parent.find(".select2-selection").css("border-color", "#3460ff");
                } else {
                    parent.find(".select2-selection").css("border-color", "#e4e4e4");
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            let pegawaiContainer = $('#pegawai-container');

            // Sembunyikan select pegawai saat halaman dimuat
            pegawaiContainer.hide();

            // Event listener untuk jenis pegawai
            $('#jenis_peg').on('change', function() {
                if ($(this).val() === 'karyawan_khusus') {
                    pegawaiContainer.slideDown(); // Tampilkan dengan animasi slide
                } else {
                    pegawaiContainer.slideUp(); // Sembunyikan dengan animasi slide
                }
            });
        });
        $(document).ready(function() {
            let pegawaiContainer = $('#pegawai-container');
            let jumlahCutiContainer = $('#jumlah-cuti-container');

            // Sembunyikan select pegawai dan jumlah cuti saat halaman dimuat
            pegawaiContainer.hide();
            jumlahCutiContainer.hide();

            // Event listener untuk jenis pegawai
            $('#jenis_peg').on('change', function() {
                if ($(this).val() === 'karyawan_khusus') {
                    pegawaiContainer.slideDown(); // Tampilkan dropdown pegawai
                } else {
                    pegawaiContainer.slideUp(); // Sembunyikan dropdown pegawai
                }

                // Tampilkan input jumlah cuti setelah memilih jenis karyawan
                if ($(this).val() !== '') {
                    jumlahCutiContainer.slideDown();
                } else {
                    jumlahCutiContainer.slideUp();
                }
            });
        });
    </script>
@endsection
