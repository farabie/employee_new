@extends('layouts.master')

@section('title', 'Tracking Document SPD')

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
                <h3>Tracking Document SPD</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Tracking Document</li>
                    <li class="breadcrumb-item active">SPD</li>
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
                        <h5>Tracking Document SPD</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body px-0 pb-0">
                        <div class="dt-ext table-responsive custom-scrollbar">
                            <table class="display table-striped border table-lg" id="export-button">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor SPD</th>
                                        <th>Nama</th>
                                        <th>Divisi</th>
                                        <th>Status</th>
                                        <th>Print Out</th>
                                        {{-- <th>NIK</th> --}}
                                        {{-- <th>Tanggal Pengajuan</th> --}}
                                        {{-- <th>Atasan 1</th> --}}
                                        {{-- <th>Date Approval Atasan 1</th> --}}
                                        {{-- <th>Atasan 2</th> --}}
                                        {{-- <th>Date Approval Atasan 2</th> --}}
                                        {{-- <th>HRD</th> --}}
                                        {{-- <th>Date Approval HRD</th> --}}
                                        {{-- <th>GM HRD</th> --}}
                                        {{-- <th>Date Approval GM HRD</th> --}}
                                        {{-- <th>Status Approval</th> --}}
                                        {{-- <th>Date Approval Finance Verifikasi</th> --}}
                                        {{-- <th>Status Finance Verifikasi</th> --}}
                                        {{-- <th>Date Approval Finance Treasury</th> --}}
                                        {{-- <th>Schedule SPD</th> --}}
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trackingSpd as $data )
                                    @php
                                    $statusPayment = $data->status_payment;
                                    // $atasan1 = $data->approve_atasan_1;
                                    // $atasan2 = $data->approve_atasan_2;
                                    // $approveHrd = $data->approve_hrd;
                                    // $approveKadivHrd = $data->approve_gm_hrd;
                                    // $status = $data->status_spd;
                                    // $statusFinanceVerifikasi = $data->status_finance_verifikasi;
                                    // $file = $data->file;
                                    // $jamKeluar = $data->jam_keluar;
                                    // $jamKembali = $data->jam_kembali;
                                    // $tujuan = $data->tujuan;
                                    // $created_at = $data->created_at;
                                    // $date_approve_atasan1 = $data->date_approve_atasan1;
                                    // $date_approve_atasan2 = $data->date_approve_atasan2;
                                    // $date_approve_hrd = $data->date_approve_hrd;
                                    // $date_approve_gm_hrd = $data->date_approve_gm_hrd;
                                    // $date_approve_finance_verifikasi = $data->date_approve_finance_verifikasi;
                                    // $date_approve_finance_treasury = $data->date_approve_finance_treasury;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('tracking-spd.detail', $data->id_spd) }}">{{ $data->nomor_spd ?? '' }}</a></td>
                                        <td>{{ $data->nama_peg ?? '' }}</td>
                                        <td>{{ $data->divisi ?? '' }}</td>
                                        <td>
                                            @if ($statusPayment == 'process')
                                            <span class="badge badge-info">Process</span>
                                            @elseif ($statusPayment == 'unpaid')
                                            <span class="badge badge-danger">Rejected</span>
                                            @elseif($statusPayment == 'paid')
                                            <span class="badge badge-success">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href='{{ route('tracking-spd.print', $data->id_spd) }}'>Print</a>
                                        </td>
                                        {{-- <td>
                                            {{ \Carbon\Carbon::parse($created_at)->locale('id')->translatedFormat('d F Y H:i:s') }}
                                        </td> --}}
                                        {{-- <td>{{ $data->nik ?? '' }}</td> --}}
                                        {{-- <td>
                                            @if ($atasan1 == '0')
                                            <span class="badge badge-info">Process</span>
                                            @elseif ($atasan1 == '1')
                                            <span class="badge badge-danger">Reject</span>
                                            @elseif($atasan1 == '2')
                                            <span class="badge badge-success">Approve</span>
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if (empty($date_approve_atasan1) || $date_approve_atasan1 == '0000-00-00 00:00:00')
                                                -
                                            @else
                                                {{ \Carbon\Carbon::parse($date_approve_atasan1)->locale('id')->translatedFormat('d F Y H:i:s') }}   
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if ($atasan2 == '0')
                                            <span class="badge badge-info">Process</span>
                                            @elseif ($atasan2 == '1')
                                            <span class="badge badge-danger">Reject</span>
                                            @elseif($atasan2 == '2')
                                            <span class="badge badge-success">Approve</span>
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if (empty($date_approve_atasan2) || $date_approve_atasan2 == '0000-00-00 00:00:00')
                                                -
                                            @else
                                                {{ \Carbon\Carbon::parse($date_approve_atasan2)->locale('id')->translatedFormat('d F Y H:i:s') }}   
                                            @endif
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
                                        {{-- <td> 
                                            @if (empty($date_approve_hrd) || $date_approve_hrd == '0000-00-00 00:00:00')
                                                -
                                            @else
                                                {{ \Carbon\Carbon::parse($date_approve_hrd)->locale('id')->translatedFormat('d F Y H:i:s') }}    
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if ($approveKadivHrd == '0')
                                            <span class="badge badge-info">Process</span>
                                            @elseif ($approveKadivHrd == '1')
                                            <span class="badge badge-danger">Reject</span>
                                            @elseif($approveKadivHrd == '2')
                                            <span class="badge badge-success">Approve</span>
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if (empty($date_approve_gm_hrd) || $date_approve_gm_hrd == '0000-00-00 00:00:00')
                                                -
                                            @else
                                                {{ \Carbon\Carbon::parse($date_approve_gm_hrd)->locale('id')->translatedFormat('d F Y H:i:s') }}   
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if ($status == '0')
                                            <span class="badge badge-info">Process</span>
                                            @elseif ($status == '1')
                                            <span class="badge badge-danger">Reject</span>
                                            @elseif($status == '2')
                                            <span class="badge badge-success">Approve</span>
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if (empty($date_approve_finance_verifikasi) || $date_approve_finance_verifikasi == '0000-00-00 00:00:00')
                                                -
                                            @else
                                                {{ \Carbon\Carbon::parse($date_approve_finance_verifikasi)->locale('id')->translatedFormat('d F Y H:i:s') }}    
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if ($statusFinanceVerifikasi == 'process')
                                            <span class="badge badge-info">Process</span>
                                            @elseif ($statusFinanceVerifikasi == 'unverified')
                                            <span class="badge badge-danger">Unverified</span>
                                            @elseif($statusFinanceVerifikasi == 'verified')
                                            <span class="badge badge-success">Verified</span>
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            @if (empty($date_approve_finance_treasury) || $date_approve_finance_treasury == '0000-00-00 00:00:00')
                                                -
                                            @else
                                                {{ \Carbon\Carbon::parse($date_approve_finance_treasury)->locale('id')->translatedFormat('d F Y H:i:s') }}    
                                            @endif
                                        </td> --}}
                                        {{-- <td style="width: 10%">
                                            @if (!empty($file))
                                            <a class="badge b-ln-height badge-danger" href="{{ asset("storage/assets/file/rundown_spd/$file") }}" target="_blank" id="badge-pdf">
                                                <i class="icofont icofont-file-pdf"></i>
                                            </a>
                                            @else
                                            -
                                            @endif
                                        </td> --}}
                                        {{-- <td>
                                            <a href='{{ route('tracking-spd.detail', $data->id_spd) }}'>Detail</a>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor SPD</th>
                                        <th>Nama</th>
                                        <th>Divisi</th>
                                        <th>Status</th>
                                        <th>Print Out</th>
                                        {{-- <th>NIK</th> --}}
                                        {{-- <th>Tanggal Pengajuan</th> --}}
                                        {{-- <th>Atasan 1</th> --}}
                                        {{-- <th>Date Approval Atasan 1</th> --}}
                                        {{-- <th>Atasan 2</th> --}}
                                        {{-- <th>Date Approval Atasan 2</th> --}}
                                        {{-- <th>HRD</th> --}}
                                        {{-- <th>Date Approval HRD</th> --}}
                                        {{-- <th>GM HRD</th> --}}
                                        {{-- <th>Date Approval GM HRD</th> --}}
                                        {{-- <th>Status Approval</th> --}}
                                        {{-- <th>Date Approval Finance Verifikasi</th> --}}
                                        {{-- <th>Status Finance Verifikasi</th> --}}
                                        {{-- <th>Date Approval Finance Treasury</th> --}}
                                        {{-- <th>Schedule SPD</th> --}}
                                        {{-- <th>Action</th> --}}
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