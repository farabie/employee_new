@extends('layouts.master')

@section('title', 'Detail SPD')

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
                    <h3>Tracking Document SPD</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Tracking Document</li>
                        <li class="breadcrumb-item active">Detail SPD</li>
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

    @php
        $nomor_spd = $spd->nomor_spd;
        $dataUpd = DB::table('tb_upd')
            ->where('nomor_spd', $nomor_spd)
            ->where('revision_id', function ($query) use ($nomor_spd) {
                $query->selectRaw('MAX(revision_id)')->from('tb_upd')->where('nomor_spd', $nomor_spd);
            })
            ->get();

        $updCek = DB::table('tb_upd')
            ->where('nomor_spd', $nomor_spd)
            ->where('revision_id', function ($query) use ($nomor_spd) {
                $query->selectRaw('MAX(revision_id)')->from('tb_upd')->where('nomor_spd', $nomor_spd);
            })
            ->count();

        $dataUpd2 = DB::table('tb_upd')
            ->where('nomor_spd', $nomor_spd)
            ->where('revision_id', function ($query) use ($nomor_spd) {
                $query->selectRaw('MAX(revision_id)')->from('tb_upd')->where('nomor_spd', $nomor_spd);
            })
            ->first();
    @endphp
    <!-- Container-fluid starts-->
    <div class="container-fluid subscribed-user">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <div class="header-top">
                            <h3>Detail SPD</h3>
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
                                        $atasan1Status = $spd->approve_atasan_1;
                                        $atasan2Status = $spd->approve_atasan_2;
                                        $hrdStatus = $spd->approve_hrd;
                                        $kadivHrdStatus = $spd->approve_gm_hrd;
                                        $financeVerifikasiStatus = $spd->status_finance_verifikasi;
                                        $financeTreasury = $spd->status_payment;
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
                                                    <span class="timeline-title">{{ $spd->nama_peg }}</span>
                                                    @if ($spd->created_at)
                                                        <span class="timeline-date">{{ $spd->created_at_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Requestor !-->

                                        <!-- Start Atasan 1 -->
                                        <li
                                            class="timeline-step {{ $atasan1Status == 2 ? 'completed' : ($atasan1Status == 1 ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($atasan1Status == 2)
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($atasan1Status == 1)
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
                                                        @if ($atasan1Status == 0)
                                                            Process
                                                        @elseif($atasan1Status == 1)
                                                            Rejected
                                                        @else
                                                            Approved
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">{{ $spd->nama_atasan1 }}</span>
                                                    @if ($spd->date_approve_atasan1)
                                                        <span
                                                            class="timeline-date">{{ $spd->date_approve_atasan1_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Atasan 1 !-->

                                        <!-- Start Atasan 2 -->
                                        <li
                                            class="timeline-step {{ $atasan2Status == 2 ? 'completed' : ($atasan2Status == 1 ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($atasan2Status == 2)
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($atasan2Status == 1)
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
                                                        @if ($atasan2Status == 0)
                                                            Process
                                                        @elseif($atasan2Status == 1)
                                                            Rejected
                                                        @else
                                                            Approved
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">{{ $spd->nama_atasan2 }}</span>
                                                    @if ($spd->date_approve_atasan2)
                                                        <span
                                                            class="timeline-date">{{ $spd->date_approve_atasan2_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Atasan 2 !-->

                                        <!-- HRD -->
                                        <li
                                            class="timeline-step {{ $hrdStatus == 2 ? 'completed' : ($hrdStatus == 1 ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($hrdStatus == 2)
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($hrdStatus == 1)
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
                                                        @if ($hrdStatus == 0)
                                                            Process
                                                        @elseif($hrdStatus == 1)
                                                            Rejected
                                                        @else
                                                            Approved
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">HRD</span>
                                                    @if ($spd->date_approve_hrd)
                                                        <span
                                                            class="timeline-date">{{ $spd->date_approve_hrd_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Hrd -->

                                        <!-- Kadiv HRD -->
                                        <li
                                            class="timeline-step {{ $kadivHrdStatus == 2 ? 'completed' : ($kadivHrdStatus == 1 ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($kadivHrdStatus == 2)
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($kadivHrdStatus == 1)
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
                                                        @if ($kadivHrdStatus == 0)
                                                            Process
                                                        @elseif($kadivHrdStatus == 1)
                                                            Rejected
                                                        @else
                                                            Approved
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">Kadiv HRD</span>
                                                    @if ($spd->date_approve_gm_hrd)
                                                        <span
                                                            class="timeline-date">{{ $spd->date_approve_gm_hrd_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Kadiv Hrd -->

                                        <!-- Finance Verifikasi -->
                                        <li
                                            class="timeline-step {{ $financeVerifikasiStatus == 'verified' ? 'completed' : ($financeVerifikasiStatus == 'unverified' ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($financeVerifikasiStatus == 'verified')
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($financeVerifikasiStatus == 'unverified')
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
                                                        @if ($financeVerifikasiStatus == 'process')
                                                            Process
                                                        @elseif($financeVerifikasiStatus == 'unverified')
                                                            Unverified
                                                        @else
                                                            Verified
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">Finance Verifikasi</span>
                                                    @if ($spd->date_approve_finance_verifikasi)
                                                        <span
                                                            class="timeline-date">{{ $spd->date_approve_finance_verifikasi_format }}</span>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <!-- End Finance Verifikasi -->

                                        <!-- Finance Treasury -->
                                        <li
                                            class="timeline-step {{ $financeTreasury == 'paid' ? 'completed' : ($financeTreasury == 'unpaid' ? 'rejected' : '') }}">
                                            <div class="timeline-content">
                                                <div class="timeline-icon">
                                                    @if ($financeTreasury == 'paid')
                                                        <i class="fa fa-check-circle fa-2x"></i>
                                                    @elseif($financeTreasury == 'unpaid')
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
                                                        @if ($financeTreasury == 'process')
                                                            Process
                                                        @elseif($financeTreasury == 'unpaid')
                                                            Unpaid
                                                        @else
                                                            Paid
                                                        @endif
                                                    </span>
                                                    <span class="timeline-title">Finance Treasury</span>
                                                    @if ($spd->date_approve_finance_treasury)
                                                        <span
                                                            class="timeline-date">{{ $spd->date_approve_finance_treasury_format }}</span>
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
                                        <label class="form-label" for="nomor_spd">Nomor SPD</label>
                                        <input disabled name="nomor_spd" class="form-control" id="nomor_spd"
                                            type="text" value="{{ old('nomor_spd', $nomor_spd) }}">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="ket_spd">Keterangan SPD</label>
                                        <input disabled name="ket_spd" class="form-control" id="ket_spd"
                                            type="text" value="{{ old('ket_spd', $spd->ket_spd) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="nama_peg">Nama Karyawan</label>
                                        <input disabled name="nama_peg" class="form-control" id="nama_peg"
                                            type="text" value="{{ old('nama_peg', $spd->nama_peg) }}">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="nik">NIK</label>
                                        <input disabled name="nik" class="form-control" id="nik"
                                            type="text" value="{{ old('nik', $spd->nik) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="divisi">Divisi</label>
                                        <input disabled name="divisi" class="form-control" id="divisi"
                                            type="text" value="{{ old('divisi', $spd->divisi) }}">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="grade">Grade</label>
                                        <input disabled name="grade" class="form-control" id="grade"
                                            type="text" value="{{ old('grade', $spd->grade) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="tujuan">Tujuan</label>
                                        <input disabled name="tujuan" class="form-control" id="tujuan"
                                            type="text" value="{{ old('tujuan', $spd->tujuan) }}">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="maksud_tujuan">Maksud Tujuan</label>
                                        <input disabled name="maksud_tujuan" class="form-control" id="maksud_tujuan"
                                            type="text" value="{{ old('maksud_tujuan', $spd->maksud_tujuan) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="tgl_berangkat_format">Tanggal Berangkat</label>
                                        <input disabled name="tgl_berangkat_format" class="form-control"
                                            id="tgl_berangkat_format" type="text"
                                            value="{{ old('tgl_berangkat_format', $spd->tgl_berangkat_format) }}">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="tgl_kembali_format">Tanggal Kembali</label>
                                        <input disabled name="tgl_kembali_format" class="form-control"
                                            id="tgl_kembali_format" type="text"
                                            value="{{ old('tgl_kembali_format', $spd->tgl_kembali_format) }} ({{ $spd->ket_tgl_kembali }})">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="jml_hari">Jumlah Hari</label>
                                        <input disabled name="jml_hari" class="form-control" id="jml_hari"
                                            type="text" value="{{ old('jml_hari', $spd->jml_hari) }} Hari">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="nama_proyek">Nama Proyek</label>
                                        <input disabled name="nama_proyek" class="form-control" id="nama_proyek"
                                            type="text" value="{{ old('nama_proyek', $spd->nama_proyek) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="transportasi">Transportasi</label>
                                        <input disabled name="transportasi" class="form-control" id="transportasi"
                                            type="text"
                                            value="{{ old('transportasi', $spd->transportasi) }}{{ $spd->transportasi == 'Lain-Lain' ? ' (' . $spd->transportasi_lainlain . ')' : '' }}">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="jenis_kendaraan">Selama Perjalanan Dinas</label>
                                        <input disabled name="jenis_kendaraan" class="form-control" id="jenis_kendaraan"
                                            type="text"
                                            value="{{ old('jenis_kendaraan', $spd->jenis_kendaraan) }}{{ $spd->jenis_kendaraan == 'Sewa' ? ' (' . $spd->alasan_sewa . ')' : '' }}">
                                    </div>
                                </div>
                                @php
                                    $akomodasiText =
                                        $spd->akomodasi == 'Ya'
                                            ? $spd->jenis_akomodasi .
                                                ($spd->jenis_akomodasi == 'Serpo/BaseCamp'
                                                    ? ' (' . $spd->nama_serpo . ')'
                                                    : ($spd->jenis_akomodasi == 'Lain-Lain'
                                                        ? ' (' . $spd->ket_lain . ')'
                                                        : ''))
                                            : $spd->akomodasi;
                                @endphp
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="akomodasi">Akomodasi</label>
                                        <input disabled name="akomodasi" style="text-align: left" class="form-control"
                                            id="akomodasi" type="text" value="{{ $akomodasiText }}">
                                    </div>
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="catatan">Catatan</label>
                                        <input disabled name="catatan" class="form-control" id="catatan"
                                            type="text" value="{{ old('catatan', $spd->catatan) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 position-relative mb-3">
                                        <label class="form-label" for="schedule">Schedule</label>
                                        <div class="mt-2">
                                            <a href="{{ asset("storage/assets/file/rundown_spd/$spd->file") }}"
                                                target="_blank" class="btn btn-danger">
                                                <i class="icofont icofont-file-pdf"></i> Schedule
                                            </a>
                                        </div>
                                    </div>
                                    @if ($spd->keterangan_reject)
                                        <div class="col-6 position-relative mb-3">
                                            <label class="form-label" for="keterangan_reject">Keterangan Reject</label>
                                            <input disabled name="keterangan_reject" style="text-align: left"
                                                class="form-control" id="keterangan_reject" type="text"
                                                value="{{ $spd->keterangan_reject }}">
                                        </div>
                                    @endif
                                    @if ($spd->ket_reject_finance)
                                        <div class="col-6 position-relative mb-3">
                                            <label class="form-label" for="keterangan_reject">Keterangan Reject</label>
                                            <input disabled name="keterangan_reject" style="text-align: left"
                                                class="form-control" id="keterangan_reject" type="text"
                                                value="{{ $spd->ket_reject_finance }}">
                                        </div>
                                    @endif
                                </div>
                                {{-- <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Nomor SPD </label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp; {{ $nomor_spd }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Keterangan SPD </label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp; {{ $spd->ket_spd }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Nama </label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp; {{ $spd->nama_peg }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">NIK</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp; {{ $spd->nik }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Divisi/Grade</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp; {{ $spd->divisi }} /
                                        {{ $spd->grade }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Tujuan</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp; {{ $spd->tujuan }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Tanggal Berangkat & Kembali</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp;
                                        {{ $spd->tgl_berangkat_format }}&nbsp; -
                                        &nbsp; {{ $spd->tgl_kembali_format }} ({{ $spd->ket_tgl_kembali }})</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Jumlah Hari</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp; {{ $spd->jml_hari }}
                                        Hari</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Maksud & Tujuan</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp;
                                        {{ $spd->maksud_tujuan }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Nama Proyek</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp;
                                        {{ $spd->nama_proyek }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Transportasi</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp; {{ $spd->transportasi }}
                                        @if ($spd->transportasi == 'Lain-Lain')
                                            {{ $spd->transportasi_lainlain }}
                                        @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Selama Perjalanan Dinas</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp;
                                        {{ $spd->jenis_kendaraan }}
                                        @if ($spd->jenis_kendaraan == 'Sewa')
                                            ({{ $spd->alasan_sewa }})
                                        @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Akomodasi Penginapan</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp;
                                        @if ($spd->akomodasi == 'Ya')
                                            {{ $spd->jenis_akomodasi }}
                                            @if ($spd->jenis_akomodasi == 'Serpo/BaseCamp')
                                                ({{ $spd->nama_serpo }})
                                            @elseif($spd->jenis_akomodasi == 'Lain-Lain')
                                                ({{ $spd->ket_lain }})
                                            @endif
                                        @else
                                            {{ $spd->akomodasi }}
                                        @endif
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Catatan</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp; {{ $spd->catatan }}</label>
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label class="col-md-2 control-label text-left">Schedule</label>
                                    <label class="col-md-6 control-label text-left"> : &nbsp;
                                        @if ($spd->file != '' || $spd->file != null)
                                            <a href="{{ asset(" storage/assets/file/rundown_spd/$spd->file") }}">Schedule
                                                <i class="fa fa-file"></i></a>
                                        @endif
                                    </label>
                                </div> --}}
                                <hr>
                                @if ($updCek >= 1)
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
                                                        <th style="min-width:10rem;" scope="col">Jumlah Hari</span>
                                                        </th>
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
                                                            <td>Rp.
                                                                {{ number_format($data->upd_harian ?? 0, 0, ',', '.') }}
                                                            </td>
                                                            <td>Rp.
                                                                {{ number_format($data->total_upd_harian ?? 0, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="form-group" style="margin-top: 1rem">
                                                <div class="col-md-5 position-relative">
                                                    <label class="form-label" for="upd_transportasi">UPD
                                                        Transportasi</label>
                                                    <input disabled class="form-control" name='upd_transportasi'
                                                        id="upd_transportasi" type="text"
                                                        value="Rp.  {{ number_format($dataUpd2->upd_transportasi ?? 0, 0, ',', '.') }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5 position-relative">
                                                    <label class="form-label" for="upd_bulanan">UPD Bulanan</label>
                                                    <input disabled class="form-control" name='upd_bulanan'
                                                        id="upd_bulanan" type="text"
                                                        value="Rp.  {{ number_format($dataUpd2->upd_bulanan ?? 0, 0, ',', '.') }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5 position-relative">
                                                    <label class="form-label" for="grand_total">Grand Total</label>
                                                    <input disabled class="form-control" name='grand_total'
                                                        id="grand_total" type="text"
                                                        value="Rp.  {{ number_format($dataUpd2->grand_total ?? 0, 0, ',', '.') }} ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
