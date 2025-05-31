@extends('layouts.master')

@section('title', 'Detail Medical Claim')

@section('css')
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <style>
        .form-group {
            margin-bottom: 1rem;
            font-weight: 500;
        }
    </style>

    <style>
        /* Add this to your CSS file or within a <style> tag in your layout */
        .timeline-container {
            margin: 20px 0;
            position: relative;
            overflow: hidden;
        }

        .timeline-steps {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: relative;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .timeline-steps:before {
            content: '';
            position: absolute;
            height: 2px;
            top: 35px;
            left: 0;
            right: 0;
            background-color: #e0e0e0;
            z-index: 1;
        }

        .timeline-step {
            position: relative;
            z-index: 2;
            flex: 1;
            text-align: center;
        }

        .timeline-step:after {
            content: '';
            position: absolute;
            height: 2px;
            top: 35px;
            left: 0;
            width: 100%;
            background-color: #e0e0e0;
            z-index: -1;
        }

        .timeline-step.completed:after {
            background-color: #3b7ddd;
        }

        .timeline-step.rejected:after {
            background-color: #dc3545;
        }

        .timeline-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 24px;
            position: relative;
            z-index: 3;
        }

        .timeline-step.completed .timeline-icon {
            background-color: #3b7ddd;
        }

        .timeline-step.rejected .timeline-icon {
            background-color: #dc3545;
        }

        .timeline-text {
            min-height: 100px;
            /* Add minimum height to ensure consistent alignment */
        }

        .timeline-content span {
            display: block;
        }

        .text-muted {
            font-weight: normal;
            font-size: 14px;
            margin-bottom: 25px;
            /* Add significant space between status and name */
        }

        .timeline-title {
            font-weight: 600;
            /* Semi-bold */
            font-size: 16px;
            margin-top: 0;
            line-height: 1.3;
            /* Add line height for multi-line names */
            max-width: 200px;
            /* Limit width to encourage wrapping in a controlled manner */
            margin-left: auto;
            margin-right: auto;
            word-wrap: break-word;
            /* Allow words to break if needed */
        }

        .timeline-date {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }

        /* Make timeline responsive */
        @media (max-width: 768px) {
            .timeline-steps {
                flex-direction: column;
            }

            .timeline-steps:before {
                height: 100%;
                width: 2px;
                top: 0;
                left: 50%;
                transform: translateX(-50%);
            }

            .timeline-step {
                margin-bottom: 40px;
            }

            .timeline-step:after {
                height: 100%;
                width: 2px;
                top: 70px;
                left: 50%;
                transform: translateX(-50%);
            }

            .timeline-text {
                min-height: auto;
                /* Remove min-height on mobile */
            }
        }
    </style>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Tracking Document Medical Claim</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Tracking Document</li>
                        <li class="breadcrumb-item active">Detail Medical Claim</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
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
                            <h3>Detail Medical Claim</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body px-0 pb-0">
                            <div class="panel-body">
                                <div class="timeline-container">
                                    @php
                                        // Define statuses
                                        // 0 = pending, 1 = in process, 2 = approved, 3 = rejected
                                        $requestorStatus = 2; // Always completed when viewing details
                                    @endphp
                                    <ul class="timeline-steps">
                                        <!-- Start Requestor -->
                                        <li
                                            class="timeline-step {{ $requestorStatus == 2 ? 'completed' : ($requestorStatus == 1 ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($requestorStatus == 2)
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($requestorStatus == 1)
                                                        <i class="fa fa-times-circle fa-2x"></i>
                                                    @else
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fa-solid fa-hourglass-start"
                                                                style="color: #767676;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="timeline-text">
                                                    <span class="text-muted">Created</span>
                                                    <span class="timeline-title">{{ $nama }}</span>
                                                    @if ($medical->tgl_pengajuan)
                                                        <span
                                                            class="timeline-date">{{ $medical->tgl_pengajuan_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Requestor !-->

                                        <!-- Start Document Received HRD -->
                                        <li
                                            class="timeline-step {{ $hard_copy == 'received' ? 'completed' : ($hard_copy == 'not_received' ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($hard_copy == 'received')
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($hard_copy == 'not_received')
                                                        <i class="fa fa-times-circle fa-2x"></i>
                                                    @else
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fa-solid fa-hourglass-start"
                                                                style="color: #767676;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="timeline-text">
                                                    <span class="text-muted">
                                                        @if ($hard_copy == 'process')
                                                            Process
                                                        @elseif($hard_copy == 'not_received')
                                                            Not Received
                                                        @else
                                                            Received
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">Document Received HRD</span>
                                                    @if ($medical->date_approval_hrd)
                                                        <span
                                                            class="timeline-date">{{ $medical->date_approval_hrd_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Document Received HRD !-->

                                        <!-- HRD Approval -->
                                        <li
                                            class="timeline-step {{ $approve_hrd == 'verified' ? 'completed' : ($approve_hrd == 'unverified' ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($approve_hrd == 'verified')
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($approve_hrd == 'unverified')
                                                        <i class="fa fa-times-circle fa-2x"></i>
                                                    @else
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fa-solid fa-hourglass-start"
                                                                style="color: #767676;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="timeline-text">
                                                    <span class="text-muted">
                                                        @if ($approve_hrd == 'process')
                                                            Process
                                                        @elseif($approve_hrd == 'unverified')
                                                            Unverified
                                                        @else
                                                            Verified
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">HRD</span>
                                                    @if ($medical->date_approval_hrd)
                                                        <span
                                                            class="timeline-date">{{ $medical->date_approval_hrd_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Hrd Approval-->

                                        <!-- Kadiv HRD -->
                                        <li
                                            class="timeline-step {{ $approve_gm_hrd == 'approve' ? 'completed' : ($approve_gm_hrd == 'reject' ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($approve_gm_hrd == 'approve')
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($approve_gm_hrd == 'reject')
                                                        <i class="fa fa-times-circle fa-2x"></i>
                                                    @else
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fa-solid fa-hourglass-start"
                                                                style="color: #767676;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="timeline-text">
                                                    <span class="text-muted">
                                                        @if ($approve_gm_hrd == 'process' || $approve_gm_hrd == '-')
                                                            Process
                                                        @elseif($approve_gm_hrd == 'reject')
                                                            Rejected
                                                        @else
                                                            Approved
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">Kadiv HRD</span>
                                                    @if ($medical->date_approval_gm_hrd)
                                                        <span
                                                            class="timeline-date">{{ $medical->date_approval_gm_hrd_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Kadiv Hrd -->

                                        <!-- Start Document Received Finance Verifikasi -->
                                        <li
                                            class="timeline-step {{ $hard_copy_finance == 'received' ? 'completed' : ($hard_copy_finance == 'not_received' ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($hard_copy_finance == 'received')
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($hard_copy_finance == 'not_received')
                                                        <i class="fa fa-times-circle fa-2x"></i>
                                                    @else
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fa-solid fa-hourglass-start"
                                                                style="color: #767676;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="timeline-text">
                                                    <span class="text-muted">
                                                        @if ($hard_copy_finance == 'process')
                                                            Process
                                                        @elseif($hard_copy_finance == 'not_received')
                                                            Not Received
                                                        @else
                                                            Received
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">Document Received Finance Verifikasi</span>
                                                    @if ($medical->date_approval_finance_verified)
                                                        <span
                                                            class="timeline-date">{{ $medical->date_approval_finance_verified_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Document Received HRD !-->

                                        <!-- Finance Verifikasi -->
                                        <li
                                            class="timeline-step {{ $status_finance_verified == 'verified' ? 'completed' : ($status_finance_verified == 'unverified' ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($status_finance_verified == 'verified')
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($status_finance_verified == 'unverified')
                                                        <i class="fa fa-times-circle fa-2x"></i>
                                                    @else
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fa-solid fa-hourglass-start"
                                                                style="color: #767676;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="timeline-text">
                                                    <span class="text-muted">
                                                        @if ($status_finance_verified == 'process')
                                                            Process
                                                        @elseif($status_finance_verified == 'unverified')
                                                            Unverified
                                                        @else
                                                            Verified
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">Finance Verifikasi</span>
                                                    @if ($medical->date_approval_finance_verified)
                                                        <span
                                                            class="timeline-date">{{ $medical->date_approval_finance_verified_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Finance Verifikasi -->

                                        <!-- Finance Treasury -->
                                        <li
                                            class="timeline-step {{ $paid == 'paid' ? 'completed' : ($paid == 'unpaid' ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($paid == 'paid')
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($paid == 'unpaid')
                                                        <i class="fa fa-times-circle fa-2x"></i>
                                                    @else
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fa-solid fa-hourglass-start"
                                                                style="color: #767676;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="timeline-text">
                                                    <span class="text-muted">
                                                        @if ($paid == 'process')
                                                            Process
                                                        @elseif($paid == 'unpaid')
                                                            Unpaid
                                                        @else
                                                            Paid
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">Finance Treasury</span>
                                                    @if ($medical->date_approval_treasury)
                                                        <span
                                                            class="timeline-date">{{ $medical->date_approval_treasury_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Finance Treasury -->
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="nomor_medical_claim">Nomor Medical Claim</label>
                                        <input disabled name="nomor_medical_claim" class="form-control" id="nomor_medical_claim"
                                            type="text" value="{{ old('nomor_medical_claim', $nomor_medical_claim) }}">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="nama">Nama</label>
                                        <input disabled name="nama" class="form-control" id="nama"
                                            type="text" value="{{ old('nama', $nama) }}">
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Nomor </label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp;
                                        {{ $nomor_medical_claim }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Nama </label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp; {{ $nama }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Nik </label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp; {{ $nik }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Document Received HRD</label>
                                    @if ($hard_copy == 'process')
                                        <label style="color:Blue;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Process</label>
                                    @elseif($hard_copy == 'not_received')
                                        <label style="color:Red;" class="col-md-6 control-label text-left"> : &nbsp; Not
                                            Received
                                        </label>
                                    @elseif($hard_copy == 'received')
                                        <label style="color:Green;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Received</label>
                                    @elseif($hard_copy == '-')
                                        <label style="color:black;" class="col-md-6 control-label text-left"> : &nbsp;
                                            -</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Status HRD Approval</label>
                                    @if ($approve_hrd == 'process')
                                        <label style="color:Blue;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Process</label>
                                    @elseif($approve_hrd == 'unverified')
                                        <label style="color:Red;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Unverified
                                            @if ($keterangan_reject_hrd)
                                                ({{ $keterangan_reject_hrd }})
                                            @endif
                                        </label>
                                    @elseif($approve_hrd == 'verified')
                                        <label style="color:Green;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Approve</label>
                                    @elseif($approve_hrd == '-')
                                        <label style="color:black;" class="col-md-6 control-label text-left"> : &nbsp;
                                            -</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Kadiv HRD Approval</label>
                                    @if ($approve_gm_hrd == 'process')
                                        <label style="color:Blue;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Process</label>
                                    @elseif($approve_gm_hrd == 'reject')
                                        <label style="color:Red;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Reject</label>
                                    @elseif($approve_gm_hrd == 'approve')
                                        <label style="color:Green;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Approve</label>
                                    @elseif($approve_gm_hrd == '-')
                                        <label style="color:Black;" class="col-md-6 control-label text-left"> : &nbsp;
                                            -</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Document Received Finance</label>
                                    @if ($hard_copy_finance == 'process')
                                        <label style="color:Blue;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Process</label>
                                    @elseif($hard_copy_finance == 'not_received')
                                        <label style="color:Red;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Not Received</label>
                                    @elseif($hard_copy_finance == 'received')
                                        <label style="color:Green;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Received</label>
                                    @elseif($hard_copy_finance == '-')
                                        <label style="color:Black;" class="col-md-6 control-label text-left"> : &nbsp;
                                            -</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Finance Verifikasi</label>
                                    @if ($status_finance_verified == 'process')
                                        <label style="color:Blue;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Process</label>
                                    @elseif($status_finance_verified == 'unverified')
                                        <label style="color:Red;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Unverified</label>
                                    @elseif($status_finance_verified == 'verified')
                                        <label style="color:Green;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Verified</label>
                                    @elseif($status_finance_verified == '-')
                                        <label style="color:Black;" class="col-md-6 control-label text-left"> : &nbsp;
                                            -</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Treasury
                                        {{ $number_revision }}</label>
                                    @if ($paid == 'process')
                                        <label style="color:Blue;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Process</label>
                                    @elseif($paid == 'unpaid')
                                        <label style="color:Red;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Unpaid</label>
                                    @elseif($paid == 'paid')
                                        <label style="color:Green;" class="col-md-6 control-label text-left"> : &nbsp;
                                            Paid</label>
                                    @elseif($paid == '-')
                                        <label style="color:Black;" class="col-md-6 control-label text-left"> : &nbsp;
                                            -</label>
                                    @endif
                                </div> --}}
                                <hr>
                                @if ($number_revision != 0)
                                    <div
                                        style="overflow-x:scroll; padding:2rem; border: solid 3px black; margin-top:5rem;">
                                        <h3 style="margin-bottom: 4rem;">Initial Medical Claim</h3>
                                        <table style="font-size:1rem" class="table">
                                            <thead>
                                                <tr>
                                                    <th style="min-width:10rem;" scope="col">Tanggal Kwitansi</th>
                                                    <th style="min-width:10rem;" scope="col">Upload Kwitansi/Nota
                                                        Pembayaran</th>
                                                    <th style="min-width:10rem;" scope="col">File Pendukung</th>
                                                    <th style="min-width:10rem;" scope="col">Tertanggung</th>
                                                    <th style="min-width:10rem;" scope="col">Keterangan</th>
                                                    <th style="min-width:10rem;" scope="col">Jumlah</th>
                                                    <th style="min-width:10rem;" scope="col">Jenis Medical Claim</th>
                                                    <th style="min-width:10rem;" scope="col">Note HRD</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableToModify">
                                                @php
                                                    $jumlah_total = 0;
                                                @endphp
                                                @foreach ($medical_original as $data)
                                                    @php
                                                        $jumlah_total = $jumlah_total + $data->jumlah;
                                                    @endphp
                                                    <tr id="rowToClone">
                                                        <td>{{ $data->tgl_bukti_kwitansi }}</td>
                                                        <td>
                                                            <a href="{{ asset("storage/assets/file/medical/$data->file") }}"
                                                                target="_blank">File Kwitansi</a>
                                                        </td>
                                                        <td>
                                                            @if ($data->file_pendukung == '' || $data->file_pendukung == null)
                                                                -
                                                            @else
                                                                <a href="{{ asset("storage/assets/file/medical_pendukung/$data->file_pendukung") }}"
                                                                    target="_blank">File Pendukung</a>
                                                            @endif
                                                        </td>
                                                        <td>{{ $data->tertanggung }}</td>
                                                        <td>{{ $data->keterangan }}</td>
                                                        <td>
                                                            Rp.{{ number_format($data->jumlah ?? 0, 0, ',', '.') }}
                                                        </td>
                                                        <td class="text-transform: capitalize;">
                                                            {{ str_replace('_', ' ', $data->jenis_rembuisement) }}
                                                        </td>
                                                        <td>{{ $data->keterangan_hrd }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <div class="form-group">
                                                <label class="form-label" for="jumlah_total">
                                                    Total Jumlah</label>
                                                <div class = "col-md-3">
                                                    <input disabled class="form-control" name='jumlah_total'
                                                        id="jumlah_total" type="text"
                                                        value="Rp.  {{ number_format($jumlah_total ?? 0, 0, ',', '.') }}">
                                                </div>
                                            </div>
                                        </table>
                                    </div>
                                @endif
                                <div style="overflow-x:scroll; padding:2rem; border: solid 3px black; margin-top:5rem;">
                                    @if ($number_revision == 0)
                                        <h3 style="margin-bottom: 4rem;">Initial Medical Claim</h3>
                                    @else
                                        <h3 style="margin-bottom: 4rem;">Final Medical Claim</h3>
                                    @endif
                                    <table style="font-size:1rem" class="table">
                                        <thead>
                                            <tr>
                                                <th style="min-width:10rem;" scope="col">Tanggal Kwitansi</th>
                                                <th style="min-width:10rem;" scope="col">Upload Kwitansi/Nota
                                                    Pembayaran</th>
                                                <th style="min-width:10rem;" scope="col">File Pendukung</th>
                                                <th style="min-width:10rem;" scope="col">Tertanggung</th>
                                                <th style="min-width:10rem;" scope="col">Keterangan</th>
                                                <th style="min-width:10rem;" scope="col">Jumlah</th>
                                                <th style="min-width:10rem;" scope="col">Jenis Medical Claim</th>
                                                <th style="min-width:10rem;" scope="col">Note HRD</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableToModify">
                                            @php
                                                $jumlah_total = 0;
                                            @endphp
                                            @foreach ($medical_query as $data)
                                                @php
                                                    $jumlah_total = $jumlah_total + $data->jumlah;
                                                @endphp
                                                <tr id="rowToClone">
                                                    <td>{{ $data->tgl_bukti_kwitansi }}</td>
                                                    <td>
                                                        <a href="{{ asset("storage/assets/file/medical/$data->file") }}"
                                                            target="_blank">File Kwitansi</a>
                                                    </td>
                                                    <td>
                                                        @if ($data->file_pendukung == '' || $data->file_pendukung == null)
                                                            -
                                                        @else
                                                            <a href="{{ asset("storage/assets/file/medical_pendukung/$data->file_pendukung") }}"
                                                                target="_blank">File Pendukung</a>
                                                        @endif
                                                    </td>
                                                    <td>{{ $data->tertanggung }}</td>
                                                    <td>{{ $data->keterangan }}</td>
                                                    <td>
                                                        Rp.{{ number_format($data->jumlah ?? 0, 0, ',', '.') }}
                                                    </td>
                                                    <td class="text-transform: capitalize;">
                                                        {{ str_replace('_', ' ', $data->jenis_rembuisement) }}
                                                    </td>
                                                    <td>{{ $data->keterangan_hrd }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <div class="form-group">
                                            <label class="form-label" for="jumlah_total">
                                                Total Jumlah</label>
                                            <div class = "col-md-3">
                                                <input disabled class="form-control" name='jumlah_total'
                                                    id="jumlah_total" type="text"
                                                    value="Rp.  {{ number_format($jumlah_total ?? 0, 0, ',', '.') }}">
                                            </div>
                                        </div>
                                    </table>
                                </div>
                                {{-- @if ($updCek >= 1)
                            <div style="padding:1rem 5rem 5rem 5rem; border: solid 3px black; margin-top:3rem;">
                                <h3 style="margin-bottom: 3rem;">Form UPD Karyawan</h3>
                                <div>
                                    <h5>UPD Harian</h5>
                                    <table style="font-size:1rem" class="table">
                                        <thead>
                                            <tr>
                                                <th style="min-width:10rem;" scope="col">Kategori</span></th>
                                                <th scope="min-width:10rem;" scope="col">Wilayah</span></th>
                                                <th scope="min-width:10rem;" scope="col">Zona</th>
                                                <th style="min-width:10rem;" scope="col">Jumlah Hari</span></th>
                                                <th style="min-width:10rem;" scope="col">Jumlah UPD</span></th>
                                                <th style="min-width:10rem;" scope="col">Total UPD</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableToModify">
                                            @foreach ($dataUpd as $data)
                                            <tr id="rowToClone">
                                                <td>{{ $data->kategori }}</td>
                                                <td>{{ $data->wilayah }}</td>
                                                <td>{{ $data->zona }}</td>
                                                <td>{{ $data->jml_hari }} Hari</td>
                                                <td>Rp. {{ number_format($data->upd_harian ?? 0, 0, ',', '.') }}</td>
                                                <td>Rp. {{ number_format($data->total_upd_harian ?? 0, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="form-group" style="margin-top: 1rem">
                                        <div class="col-md-5 position-relative">
                                            <label class="form-label" for="upd_transportasi">UPD Transportasi</label>
                                            <input disabled class="form-control" name='upd_transportasi'
                                                id="upd_transportasi" type="text"
                                                value="Rp.  {{ number_format($dataUpd2->upd_transportasi ?? 0, 0, ',', '.') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5 position-relative">
                                            <label class="form-label" for="upd_bulanan">UPD Bulanan</label>
                                            <input disabled class="form-control" name='upd_bulanan' id="upd_bulanan"
                                                type="text"
                                                value="Rp.  {{ number_format($dataUpd2->upd_bulanan ?? 0, 0, ',', '.') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5 position-relative">
                                            <label class="form-label" for="grand_total">Grand Total</label>
                                            <input disabled class="form-control" name='grand_total' id="grand_total"
                                                type="text"
                                                value="Rp.  {{ number_format($dataUpd2->grand_total ?? 0, 0, ',', '.') }} ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif --}}
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
@endsection
