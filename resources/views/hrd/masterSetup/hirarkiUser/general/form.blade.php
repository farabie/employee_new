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
                    <h3>Struktur Orchart</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Hirarki Karyawan</li>
                        <li class="breadcrumb-item active">Strutktur Orchart</li>
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
                        <div class="row">
                            <div class="col-12">
                                <form class="row g-3" method="post" action="{{ $page_meta['url'] }}">
                                    @method($page_meta['method'])
                                    @csrf
                                    <div class="col-lg-4 col-md-6">
                                        <label class="form-label" for="unit_approval">Unit(Staff)</label>
                                        @if ($cekJabatan->jabatan == 1)
                                            <select name="unit_approval" id="unit_approval"
                                                class="js-example-disabled form-control">
                                                <option value="{{ $cekJabatan->nik }}">{{ $cekJabatan->nama }}</option>
                                            </select>
                                            <input name="unit_approval" type="text" value="{{ $cekJabatan->nik }}"
                                                hidden>
                                        @else
                                            <select name="unit_approval" id="unit_approval"
                                                class="js-example-basic-single form-control">
                                                <option value="">...</option>
                                                @foreach ($dataUnit as $rowUnit)
                                                    <option value="{{ $rowUnit->nik }}" @selected(old('unit_approval', $rowUnit->nik) == $hirarkiUser->unit_approval)>
                                                        {{ $rowUnit->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <label class="form-label" for="subsi_approval">Subsi(SPV)</label>
                                        @if ($cekJabatan->jabatan == 2)
                                            <select name="subsi_approval" id="subsi_approval"
                                                class="js-example-disabled form-control">
                                                <option value="{{ $cekJabatan->nik }}">{{ $cekJabatan->nama }}</option>
                                            </select>
                                            <input name="subsi_approval" type="text" value="{{ $cekJabatan->nik }}"
                                                hidden>
                                        @else
                                            <select name="subsi_approval" id="subsi_approval"
                                                class="js-example-basic-single form-control">
                                                <option value="">...</option>
                                                @foreach ($dataSubsi as $rowSubsi)
                                                    <option value="{{ $rowSubsi->nik }}" @selected(old('subsi_approval', $rowSubsi->nik) == $hirarkiUser->subsi_approval)>
                                                        {{ $rowSubsi->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <label class="form-label" for="kasie_approval">Kasie(Manager)</label>
                                        @if ($cekJabatan->jabatan == 3)
                                            <select name="kasie_approval" id="kasie_approval"
                                                class="js-example-disabled form-control">
                                                <option value="{{ $cekJabatan->nik }}">{{ $cekJabatan->nama }}</option>
                                            </select>
                                            <input name="kasie_approval" type="text" value="{{ $cekJabatan->nik }}"
                                                hidden>
                                        @else
                                            <select name="kasie_approval" id="kasie_approval"
                                                class="js-example-basic-single form-control">
                                                <option value="">...</option>
                                                @foreach ($dataKasie as $rowKasie)
                                                    <option value="{{ $rowKasie->nik }}" @selected(old('kasie_approval', $rowKasie->nik) == $hirarkiUser->kasie_approval)>
                                                        {{ $rowKasie->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <label class="form-label" for="kadept_approval">Kadept(Senior Manager)</label>
                                        @if ($cekJabatan->jabatan == 4)
                                            <select name="kadept_approval" id="kadept_approval"
                                                class="js-example-disabled form-control">
                                                <option value="{{ $cekJabatan->nik }}">{{ $cekJabatan->nama }}</option>
                                            </select>
                                            <input name="kadept_approval" type="text" value="{{ $cekJabatan->nik }}"
                                                hidden>
                                        @else
                                            <select name="kadept_approval" id="kadept_approval"
                                                class="js-example-basic-single form-control">
                                                <option value="">...</option>
                                                @foreach ($dataKadept as $rowKadept)
                                                    <option value="{{ $rowKadept->nik }}" @selected(old('kadept_approval', $rowKadept->nik) == $hirarkiUser->kadept_approval)>
                                                        {{ $rowKadept->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <label class="form-label" for="kadiv_approval">Kadiv(GM)</label>
                                        @if ($cekJabatan->jabatan == 5)
                                            <select name="kadiv_approval" id="kadiv_approval"
                                                class="js-example-disabled form-control">
                                                <option value="{{ $cekJabatan->nik }}">{{ $cekJabatan->nama }}</option>
                                            </select>
                                            <input name="kadiv_approval" type="text" value="{{ $cekJabatan->nik }}"
                                                hidden>
                                        @else
                                            <select name="kadiv_approval" id="kadiv_approval"
                                                class="js-example-basic-single form-control">
                                                <option value="">...</option>
                                                @foreach ($dataKadiv as $rowKadiv)
                                                    <option value="{{ $rowKadiv->nik }}" @selected(old('kadiv_approval', $rowKadiv->nik) == $hirarkiUser->kadiv_approval)>
                                                        {{ $rowKadiv->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <label class="form-label" for="direktorat_approval">Direktorat(Direktur)</label>
                                        @if ($cekJabatan->jabatan == 6)
                                            <select name="direktorat_approval" id="direktorat_approval"
                                                class="js-example-disabled form-control">
                                                <option value="{{ $cekJabatan->nik }}">{{ $cekJabatan->nama }}</option>
                                            </select>
                                            <input name="direktorat_approval" type="text"
                                                value="{{ $cekJabatan->nik }}" hidden>
                                        @else
                                            <select name="direktorat_approval" id="direktorat_approval"
                                                class="js-example-basic-single form-control">
                                                <option value="">...</option>
                                                @foreach ($dataDirektorat as $rowDirektorat)
                                                    <option value="{{ $rowDirektorat->nik }}"
                                                        @selected(old('direktorat_approval', $rowDirektorat->nik) == $hirarkiUser->direktorat_approval)>
                                                        {{ $rowDirektorat->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-md-12 text-end">
                                        <button class="btn btn-primary"
                                            type="submit">{{ $page_meta['submit_text'] }}</button>
                                    </div>
                                </form>
                            </div>
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
