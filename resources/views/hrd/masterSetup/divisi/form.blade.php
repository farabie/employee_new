@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Divisi</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Master Data</li>
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
                            <label class="form-label" for="divisi_name">Nama Divisi</label>
                            <input name="nama" class="form-control required" id="divisi_name" type="text"
                                placeholder="Masukkan nama divisi" required=""
                                value="{{ old('nama', $divisi->nama) }}">

                            @error('nama')

                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>

                            @enderror
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
@endsection