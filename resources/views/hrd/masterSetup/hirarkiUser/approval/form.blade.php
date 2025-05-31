@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">

    <style>
        .select2-container .select2-selection--single .select2-selection__arrow {
            top: 40% !important;
            transform: translateY(-50%) !important;
        }
    </style>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Approval</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Hirarki Karyawan</li>
                        <li class="breadcrumb-item active">Approval</li>
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
                    <div class="card-body">
                        <div class="container px-4">
                            <form class="row g-3" method="post" action="{{ $page_meta['url'] }}">
                                @method($page_meta['method'])
                                @csrf
                                <div class="row g-3 custom-input">
                                    <div class="mt-2 mb-3 p-3" style="border: 2px solid black; border-radius: 15px;">
                                        <h6 class="mb-2">Atasan Cuti & Izin</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label" for="atasan1_general">Atasan 1 Cuti & Izin</label>
                                                <select name="atasan1_general" id="atasan1_general"
                                                    class="js-example-basic-single form-control">
                                                    <option value="">...</option>
                                                    @foreach ($dataAtasanGeneral1 as $rowAtasanGeneral1)
                                                        <option value="{{ $rowAtasanGeneral1->nik }}"
                                                            @selected(old('atasan1_general', $rowAtasanGeneral1->nik) == $hirarkiApproval->atasan1_general)>
                                                            {{ $rowAtasanGeneral1->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="atasan2_general">Atasan 2 Cuti & Izin</label>
                                                <select name="atasan2_general" id="atasan2_general"
                                                    class="js-example-basic-single form-control">
                                                    <option value="">...</option>
                                                    @foreach ($dataAtasanGeneral2 as $rowAtasanGeneral2)
                                                        <option value="{{ $rowAtasanGeneral2->nik }}"
                                                            @selected(old('atasan2_general', $rowAtasanGeneral2->nik) == $hirarkiApproval->atasan2_general)>
                                                            {{ $rowAtasanGeneral2->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-3 p-3" style="border: 2px solid black; border-radius: 15px;">
                                        <h6 class="mb-2">Atasan SPD</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label" for="atasan1_spd">Atasan 1 SPD</label>
                                                <select name="atasan1_spd" id="atasan1_spd"
                                                    class="js-example-basic-single form-control">
                                                    <option value="">...</option>
                                                    @foreach ($dataAtasanSpd1 as $rowAtasanSpd1)
                                                        <option value="{{ $rowAtasanSpd1->nik }}"
                                                            @selected(old('atasan1_spd', $rowAtasanSpd1->nik) == $hirarkiApproval->atasan1_spd)>
                                                            {{ $rowAtasanSpd1->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="atasan2_spd">Atasan 2 SPD</label>
                                                <select name="atasan2_spd" id="atasan2_spd"
                                                    class="js-example-basic-single form-control">
                                                    <option value="">...</option>
                                                    @foreach ($dataAtasanSpd2 as $rowAtasanSpd2)
                                                        <option value="{{ $rowAtasanSpd2->nik }}"
                                                            @selected(old('atasan2_spd', $rowAtasanSpd2->nik) == $hirarkiApproval->atasan2_spd)>
                                                            {{ $rowAtasanSpd2->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-3 p-3" style="border: 2px solid black; border-radius: 15px;">
                                        <h6 class="mb-2">Atasan Kendaraan Operasional</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label" for="atasan1_ko">Atasan 1 Kendaraan
                                                    Operasional</label>
                                                <select name="atasan1_ko" id="atasan1_ko"
                                                    class="js-example-basic-single form-control">
                                                    <option value="">...</option>
                                                    @foreach ($dataAtasanKo1 as $rowAtasanKo1)
                                                        <option value="{{ $rowAtasanKo1->nik }}"
                                                            @selected(old('atasan1_ko', $rowAtasanKo1->nik) == $hirarkiApproval->atasan1_ko)>
                                                            {{ $rowAtasanKo1->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-end">
                                    <button class="btn btn-primary" type="submit">{{ $page_meta['submit_text'] }}</button>
                                </div>
                            </form>
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
        $(".js-example-basic-single").select2({
            theme: "classic"
        });
    </script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
@endsection
