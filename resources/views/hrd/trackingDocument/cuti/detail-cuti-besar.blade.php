@extends('layouts.master')

@section('title', 'Detail Cuti Besar')

@section('css')
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
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
                    <h3>Detail Cuti Besar</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Tracking Cuti Besar</li>
                        <li class="breadcrumb-item active">Detail Cuti Besar</li>
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
                            <h3>Detail Tracking Cuti Besar ({{ $cutiBesar->nama_pegawai }})</h3>
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
                                        $atasan1Status = $cutiBesar->approve_atasan_1;
                                        $atasan2Status = $cutiBesar->approve_atasan_2;
                                        $hrdStatus = $cutiBesar->approve_atasan_3;
                                        // $dirStatus = $cutiBesar->approve_direktur ?? 0;
                                    @endphp

                                    <ul class="timeline-steps">
                                        <!-- Requestor -->
                                        <li
                                            class="timeline-step {{ $requestorStatus == 2 ? 'completed' : ($requestorStatus == 1 ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($requestorStatus == 2)
                                                        {{-- <i class="fa fa-check"></i> --}}
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($requestorStatus == 1)
                                                        {{-- <i class="fa fa-times"></i> --}}
                                                        <i class="fa fa-times-circle fa-2x"></i>
                                                    @else
                                                        {{-- <i class="fa fa-clock"></i> --}}
                                                        {{-- <i class="fa-solid fa-hourglass-start fa-2x"></i> --}}
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fa-solid fa-hourglass-start"
                                                                style="color: #767676;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="timeline-text">
                                                    <span class="text-muted">Created</span>
                                                    <span class="timeline-title">{{ $cutiBesar->nama_pegawai }}</span>
                                                    @if ($cutiBesar->tgl_pengajuan)
                                                        <span
                                                            class="timeline-date">{{ \Carbon\Carbon::parse($cutiBesar->tgl_pengajuan)->format('d M Y') }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>

                                        <!-- Atasan 1 -->
                                        <li
                                            class="timeline-step {{ $atasan1Status == 2 ? 'completed' : ($atasan1Status == 1 ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($atasan1Status == 2)
                                                        {{-- <i class="fa fa-check"></i> --}}
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($atasan1Status == 1)
                                                        {{-- <i class="fa fa-times"></i> --}}
                                                        <i class="fa fa-times-circle fa-2x"></i>
                                                    @else
                                                        {{-- <i class="fa fa-clock"></i> --}}
                                                        {{-- <i class="fa-solid fa-hourglass-start fa-2x"></i> --}}
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fa-solid fa-hourglass-start"
                                                                style="color: #767676;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="timeline-text">
                                                    <span class="text-muted">
                                                        @if ($atasan1Status == 0)
                                                            Process
                                                        @elseif($atasan1Status == 1)
                                                            Rejected
                                                        @else
                                                            Approved
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">{{ $cutiBesar->nama_atasan1 }}</span>
                                                    @if ($cutiBesar->date_approve_atasan_1)
                                                        <span
                                                            class="timeline-date">{{ \Carbon\Carbon::parse($cutiBesar->date_approve_atasan_1)->format('d M Y') }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>

                                        <!-- Atasan 2 -->
                                        <li
                                            class="timeline-step {{ $atasan2Status == 2 ? 'completed' : ($atasan2Status == 1 ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($atasan2Status == 2)
                                                        {{-- <i class="fa fa-check"></i> --}}
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($atasan2Status == 1)
                                                        {{-- <i class="fa fa-times"></i> --}}
                                                        <i class="fa fa-times-circle fa-2x"></i>
                                                    @else
                                                        {{-- <i class="fa fa-clock"></i> --}}
                                                        {{-- <i class="fa-solid fa-hourglass-start fa-2x"></i> --}}
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fa-solid fa-hourglass-start"
                                                                style="color: #767676;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="timeline-text">
                                                    <span class="text-muted">
                                                        @if ($atasan2Status == 0)
                                                            Process
                                                        @elseif($atasan2Status == 1)
                                                            Rejected
                                                        @else
                                                            Approved
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">{{ $cutiBesar->nama_atasan2 }}</span>
                                                    @if ($cutiBesar->date_approve_atasan_2)
                                                        <span
                                                            class="timeline-date">{{ \Carbon\Carbon::parse($cutiBesar->date_approve_atasan_2)->format('d M Y') }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>

                                        <!-- Add more steps as needed (HRD, Director, etc.) -->
                                        <!-- Example for HRD -->
                                        <li
                                            class="timeline-step {{ $hrdStatus == 2 ? 'completed' : ($hrdStatus == 1 ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($hrdStatus == 2)
                                                        {{-- <i class="fa fa-check"></i> --}}
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($hrdStatus == 1)
                                                        {{-- <i class="fa fa-times"></i> --}}
                                                        <i class="fa fa-times-circle fa-2x"></i>
                                                    @else
                                                        {{-- <i class="fa fa-clock"></i> --}}
                                                        {{-- <i class="fa-solid fa-hourglass-start fa-2x"></i> --}}
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                            <i class="fa-solid fa-hourglass-start"
                                                                style="color: #767676;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="timeline-text">
                                                    <span class="text-muted">
                                                        @if ($hrdStatus == 0)
                                                            Process
                                                        @elseif($hrdStatus == 1)
                                                            Rejected
                                                        @else
                                                            Approved
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">HRD</span>
                                                    @if ($cutiBesar->date_approve_hrd)
                                                        <span
                                                            class="timeline-date">{{ \Carbon\Carbon::parse($cutiBesar->date_approve_hrd)->format('d M Y') }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="nama">Nama Karyawan</label>
                                        <input disabled name="nama" class="form-control" id="nama" type="text"
                                            value="{{ old('nama', $cutiBesar->nama_pegawai) }}">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="tgl_pengajuan">Tanggal Pengajuan</label>
                                        <input disabled name="tgl_pengajuan" class="form-control" id="tgl_pengajuan"
                                            type="text" value="{{ old('tgl_pengajuan', $cutiBesar->tgl_pengajuan) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="tgl_mulai">Tanggal Mulai</label>
                                        <input disabled name="tgl_mulai" class="form-control" id="tgl_mulai"
                                            type="text" value="{{ old('tgl_mulai', $cutiBesar->tgl_mulai) }}">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="tgl_selesai">Tanggal Selesai</label>
                                        <input disabled name="tgl_selesai" class="form-control" id="tgl_selesai"
                                            type="text" value="{{ old('tgl_selesai', $cutiBesar->tgl_selesai) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="lama_cuti">Lama Cuti</label>
                                        <input disabled name="lama_cuti" class="form-control" id="lama_cuti"
                                            type="text" value="{{ old('lama_cuti', $cutiBesar->lama_cuti) }} Hari">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="pengganti_cuti">Pengganti Cuti</label>
                                        <input disabled name="pengganti_cuti" class="form-control" id="pengganti_cuti"
                                            type="text"
                                            value="{{ old('pengganti_cuti', $cutiBesar->nama_pengganti) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="atasan1">Atasan 1</label>
                                        <input disabled name="atasan1" class="form-control" id="atasan1"
                                            type="text" value="{{ old('atasan1', $cutiBesar->nama_atasan1) }} Hari">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="atasan2">Atasan 2</label>
                                        <input disabled name="atasan2" class="form-control" id="atasan2"
                                            type="text" value="{{ old('atasan2', $cutiBesar->nama_atasan2) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="keterangan">Keterangan</label>
                                        <input disabled name="keterangan" class="form-control" id="keterangan"
                                            type="text" value="{{ old('keterangan', $cutiBesar->keterangan) }}">
                                    </div>
                                    @if (!empty($cutiBesar->keterangan_reject))
                                        <div class="col-6 position-relative mb-3">
                                            <label class="form-label" for="keterangan_reject">Keterangan Reject</label>
                                            <input disabled name="keterangan_reject" class="form-control"
                                                id="keterangan_reject" type="text"
                                                value="{{ old('keterangan_reject', $cutiBesar->keterangan_reject) }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
