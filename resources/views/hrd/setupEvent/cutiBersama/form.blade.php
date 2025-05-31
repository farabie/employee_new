@extends('layouts.master')

@section('title', 'Cuti Bersama')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flatpickr/flatpickr.min.css') }}">
<link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Cuti Bersama</h3>
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
                            <label class="form-label" for="nama_cuti_bersama">Deskripsi Libur</label>
                            <input name="nama_cuti_bersama" class="form-control required" id="nama_cuti_bersama" type="text"
                                placeholder="Enter nama cuti bersama" required=""
                                value="{{ old('nama_cuti_bersama', $cutiBersama->nama_cuti_bersama) }}">

                            @error('nama_cuti_bersama')

                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>

                            @enderror
                        </div>
                        <div class="col-12 position-relative">
                            <label class="col-xxl-3 box-col-12 text-start">Tanggal Libur</label>
                            <div class="col-xxl-12 box-col-12">
                                <div class="input-group flatpicker-calender">
                                    <input name = "tanggal_cuti_bersama" class="form-control" id="multiple-date" type="text"
                                    value="{{ old('tanggal_cuti_bersama', $tanggalLiburList ?? '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 position-relative">
                            <label class="form-label" for="lama_cuti">Lama Cuti (Hari)</label>
                            <input name="lama_cuti" type="text" id="lama_cuti" class="form-control" readonly>
                        </div>
                        <input type="hidden" name="code" value="{{ bin2hex(random_bytes(10)) }}">
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('multiple-date');
        const lamaCutiInput = document.getElementById('lama_cuti');

        flatpickr(dateInput, {
            mode: "multiple",
            dateFormat: "d-m-Y",
            onChange: function(selectedDates) {
                lamaCutiInput.value = selectedDates.length;
            }
        });
    });
</script>
<script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
<script src="{{ asset('assets/js/height-equal.js') }}"></script>
<script src="{{ asset('assets/js/custom-animated-form.js') }}"></script>
<script src="{{ asset('assets/js/custom-pwd-validation.js') }}"></script>

<script src="{{ asset('assets/js/flat-pickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/js/flat-pickr/custom-flatpickr.js') }}"></script>
@endsection