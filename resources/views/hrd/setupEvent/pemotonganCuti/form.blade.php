@extends('layouts.master')

@section('title', 'Data Pemotongan Cuti')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flatpickr/flatpickr.min.css') }}">
<link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

<style>
    .form-label {
        font-size: 16px;
        font-weight: 500
    }

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #e4e4e4 !important; /* Warna abu-abu */
        border-radius: 5px;
        padding: 5px;
        min-height: 38px;
        transition: border-color 0.3s ease-in-out;
    }
    .select2-container--default .select2-selection--multiple:has(.select2-selection__choice),
    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: 1px solid #3460ff !important; /* Warna biru */
    }
</style>
@endsection





@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Data Pemotongan Cuti</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Master Setup</li>
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
                            <label class="form-label" for="jenis_setup_cuti">
                                <span style="color: red">* </span> Tahun Pemotongan</label>
                            <label class="d-block" for="hak_cuti_berjalan"></label>
                            <input class="radio_animated" id="hak_cuti_berjalan" type="radio" name="jenis_cuti"
                                value="hak_cuti_tahun_berjalan">Tahun:
                            {{ $tahun_berjalan }}
                            <label class="d-block" for="hak_cuti_tahun_2"></label>
                            <input class="radio_animated" id="hak_cuti_tahun_2" type="radio" name="jenis_cuti"
                                value="hak_cuti_tahun_2">Tahun: {{
                            $satu_tahun_lalu }}
                            <label class="d-block" for="hak_cuti_tahun_1"></label>
                            <input class="radio_animated" id="hak_cuti_tahun_1" type="radio" name="jenis_cuti"
                                value="hak_cuti_tahun_1">Tahun: {{
                            $dua_tahun_lalu }}
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label" for="tgl_mulai"><span style="color: red">* </span> Tanggal
                                Mulai</label>
                            <div class="input-group flatpicker-calender">
                                <input placeholder="Tanggal Mulai" class="form-control" name="tgl_mulai"
                                    id="human-friendly" type="date">
                            </div>
                            <div class="invalid-tooltip">Please provide tanggal mulai</div>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label" for="tgl_selesai"><span style="color: red">* </span> Tanggal
                                Selesai</label>
                            <div class="input-group flatpicker-calender">
                                <input placeholder="Tanggal Selesai" class="form-control" name="tgl_selesai"
                                    id="human-friendly" type="date" required>
                            </div>
                            <div class="invalid-tooltip">Please provide tanggal selesai</div>
                        </div>
                        <div class="col-12 position-relative">
                            <label class="form-label" for="lama_libur">
                                <span style="color: red">* </span> Jumlah Pemotongan Cuti</label>
                            <input id="lama_cuti" name="lama_cuti" class="form-control digits" type="number"
                                placeholder="Jumlah Pemotongan Cuti" required=""
                                value="{{ old('lama_cuti', $pemotonganCuti->lama_cuti) }}">
                        </div>
                        <div class="col-12 position-relative">
                            <label class="form-label" for="jenis_setup_cuti">
                                <span style="color: red">* </span> Deskripsi Pemotongan</label>
                            <input name="jenis_setup_cuti" class="form-control required" id="jenis_setup_cuti"
                                type="text" placeholder="Deskripsi Pemotongan" required=""
                                value="{{ old('jenis_setup_cuti', $pemotonganCuti->jenis_setup_cuti) }}">
                        </div>
                        <div class="col-12 position-relative"> 
                            <label class="form-label" for="keterangan">
                                <span style="color: red">* </span> Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" placeholder="keterangan" required=""></textarea>
                            <div class="invalid-feedback">Please enter keterangan</div>
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
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2({
            allowClear: true
        }).on('change', function () {
            let parent = $(this).next(".select2-container");
            if ($(this).val().length > 0) {
                parent.find(".select2-selection").css("border-color", "#3460ff");
            } else {
                parent.find(".select2-selection").css("border-color", "#e4e4e4");
            }
        });
    });
</script>

@endsection