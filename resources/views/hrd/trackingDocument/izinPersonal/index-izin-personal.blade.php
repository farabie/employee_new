@extends('layouts.master')

@section('title', 'Tracking Document Izin Personal')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/jquery.dataTables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dataTables.bootstrap5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/autoFill.bootstrap5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/keyTable.bootstrap5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/buttons.bootstrap5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/fixedHeader.bootstrap5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/responsive.bootstrap5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rowReorder.bootstrap5.css') }}">
<link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">

<style>
    #badge-pdf {
        font-size: 24px;
        padding: 10px 10px;
        height: 40px;
        line-height: 30px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .badge {
        font-size: 12px;
        padding: 10px 10px;
    }
</style>

<style>
    .dt-buttons .buttons-html5 {
        background-color: #4CAF50 !important;
        color: white !important;
        border: none !important;
        padding: 6px 12px !important;
        margin: 2px !important;
        border-radius: 4px !important;
    }

    .dt-buttons .buttons-html5:hover {
        background-color: #45a049 !important;
        opacity: 0.9;
    }

    .dt-buttons .buttons-html5:active {
        background-color: #3d8b40 !important;
    }

    .dt-buttons .buttons-copy.buttons-html5 {
        background-color: #2196F3 !important;
    }

    .dt-buttons .buttons-excel.buttons-html5 {
        background-color: #4CAF50 !important;
    }

    .dt-buttons .buttons-csv.buttons-html5 {
        background-color: #FF9800 !important;
    }

    .dt-buttons .buttons-pdf.buttons-html5 {
        background-color: #f44336 !important;
    }
</style>
@endsection


@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Tracking Document Izin Personal</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Tracking Document</li>
                    <li class="breadcrumb-item active">Izin Personal</li>
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
<div class="container-fluid subscribed-user">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">
                    <div class="header-top">
                        <h5>Tracking Document Izin Personal</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body px-0 pb-0">
                        <div class="dt-ext table-responsive custom-scrollbar">
                            <table class="display table-striped border table-lg" id="export-button">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Izin</th>
                                        {{-- <th>Tanggal</th> --}}
                                        {{-- <th style="width: 10%">Surat Sakit</th> --}}
                                        {{-- <th>Jam Keluar</th> --}}
                                        {{-- <th>Jam Kembali</th> --}}
                                        {{-- <th>Keterangan</th> --}}
                                        {{-- <th>Tujuan</th> --}}
                                        {{-- <th>Approval Atasan</th> --}}
                                        {{-- <th>Date Approval Atasan</th> --}}
                                        {{-- <th>Approval HRD</th> --}}
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trackingIzinPersonal as $data )
                                    @php
                                    $jenisIzin = $data->jenis_izin;
                                    $status = $data->status;
                                    // $atasan1 = $data->approve_atasan_1;
                                    // $approveHrd = $data->approve_hrd;
                                    // $suratSakit = $data->suratsakit;
                                    // $jamKeluar = $data->jam_keluar;
                                    // $jamKembali = $data->jam_kembali;
                                    // $tujuan = $data->tujuan;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('tracking-izin-personal.detail', $data->id) }}">{{ $data->nama_karyawan ?? '' }}</a></td>
                                        <td>
                                            @if ($jenisIzin == '1')
                                            Sakit
                                            @elseif($jenisIzin == '2')
                                            Terlambat Masuk Kerja
                                            @elseif ($jenisIzin == '3')
                                            Pulang Lebih Awal
                                            @elseif ($jenisIzin == "4")
                                            Tugas Luar Kantor
                                            @else
                                            -
                                            @endif
                                        </td>
                                        {{-- <td>{{ \Carbon\Carbon::parse($data->date)->translatedFormat('d
                                            F Y') }}
                                        </td> --}}
                                        {{-- <td style="width: 10%">
                                            @if (!empty($suratSakit))
                                            <a class="badge b-ln-height badge-danger" href="{{ asset("storage$data->suratsakit") }}" target="_blank" id="badge-pdf">
                                                <i class="icofont icofont-file-pdf"></i>
                                            </a>
                                            @else
                                            -
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if (!empty($jamKeluar))
                                            {{ $jamKeluar }}
                                            @else
                                            -
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if (!empty($jamKembali))
                                            {{ $jamKembali }}
                                            @else
                                            -
                                            @endif
                                        </td> --}}
                                        {{-- <td>{{ $data->keterangan }}</td> --}}
                                        {{-- <td>
                                            @if (!empty($jamKembali))
                                            {{ $jamKembali }}
                                            @else
                                            -
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if ($atasan1 == '0')
                                            <span class="badge badge-info">Process</span>
                                            @elseif ($atasan1 == '1')
                                            <span class="badge badge-danger">Reject</span>
                                            @elseif($atasan1 == '2')
                                            <span class="badge badge-success">Approve</span>
                                            @endif
                                        </td> --}}
                                        {{-- <td>{{ \Carbon\Carbon::parse($data->date_approval_atasan_1)->translatedFormat('d
                                            F Y') }}
                                        </td> --}}
                                        {{-- <td>
                                            @if ($approveHrd == '0')
                                            <span class="badge badge-info">Process</span>
                                            @elseif ($approveHrd == '1')
                                            <span class="badge badge-danger">Reject</span>
                                            @elseif($approveHrd == '2')
                                            <span class="badge badge-success">Approve</span>
                                            @endif
                                        </td> --}}
                                        <td>
                                            @if ($status == '0')
                                            <span class="badge badge-info">Process</span>
                                            @elseif ($status == '1')
                                            <span class="badge badge-danger">Reject</span>
                                            @elseif($status == '2')
                                            <span class="badge badge-success">Approve</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Izin</th>
                                        <th>Status</th>
                                        {{-- <th>Tanggal</th> --}}
                                        {{-- <th>Surat Sakit</th> --}}
                                        {{-- <th>Keluar Jam</th> --}}
                                        {{-- <th>Jam Kembali</th> --}}
                                        {{-- <th>Keterangan</th> --}}
                                        {{-- <th>Tujuan</th> --}}
                                        {{-- <th>Approval Atasan</th> --}}
                                        {{-- <th>Date Approval Atasan</th> --}}
                                        {{-- <th>Approval HRD</th> --}}
                                    </tr>
                                </tfoot>
                            </table>
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
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables1.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.autoFill.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/autoFill.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.keyTable.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/keyTable.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/fixedHeader.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>


<script src="{{ asset('assets/js/alert.js') }}"></script>
<script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
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
@endsection