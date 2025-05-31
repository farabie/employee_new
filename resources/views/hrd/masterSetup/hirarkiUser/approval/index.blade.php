@extends('layouts.master')

@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dataTables.bootstrap5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">

{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dataTables.bootstrap5.css') }}">
<link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen"> --}}
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
                                <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Hirarki Karyawan</li>
                    <li class="breadcrumb-item active">Approval</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div id="success-alert"
    class="alert alert-bg-success light alert-dismissible fade show txt-success border-left-success mx-auto"
    role="alert" style="transition: opacity 0.5s ease-in-out;">
    <i data-feather="check-square"></i>
    <p>{{ session('success') }}</p>
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Container-fluid starts-->
<div class="container-fluid datatable-init">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">
                    <h1>Data Approval</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                        <table class="display table-striped border table-lg" id="basic-1">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama Karyawan</th>
                                    <th colspan="2">Cuti & Izin Personal</th>
                                    <th colspan="2">SPD</th>
                                    <th colspan="1">Kendaraan Operasional</th>
                                    <th rowspan="2">Action</th>
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
                                @foreach ($approvalSummary as $approval)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $approval->nama }}</td>
                                    <td>{{ $approval->atasan_1_general_name }}</td>
                                    <td>{{ $approval->atasan_2_general_name }}</td>
                                    <td>{{ $approval->atasan_1_spd_name }}</td>
                                    <td>{{ $approval->atasan_2_spd_name }}</td>
                                    <td>{{ $approval->atasan_1_ko_name }}</td>
                                    <td>
                                        <a type="button" class="btn btn-success"
                                            href="{{ route('approval.edit', $approval->nik) }}" title="edit">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection

@section('script')
<script src="{{ asset('assets/js/datatable/datatables/dataTables1.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom2.js') }}"></script>

<script src="{{ asset('assets/js/alert.js') }}"></script>
<script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
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

{{-- <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables1.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom2.js') }}"></script> --}}
@endsection