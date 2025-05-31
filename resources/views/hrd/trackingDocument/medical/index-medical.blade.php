@extends('layouts.master')

@section('title', 'Tracking Document Medical')

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
                    <h3>Tracking Document Medical</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Tracking Document</li>
                        <li class="breadcrumb-item active">Medical</li>
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
                            <h5>Tracking Document Medical</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body px-0 pb-0">
                            <div class="dt-ext table-responsive custom-scrollbar">
                                <table class="display table-striped border table-lg" id="export-button">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Claim</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Detail Saldo</th>
                                            <th>Print Out</th>
                                            {{-- <th>NIK</th> --}}
                                            {{-- <th>Tanggal Pengajuan</th> --}}
                                            {{-- <th>Jenis Rembuisment</th> --}}
                                            {{-- <th>Document Received HRD</th> --}}
                                            {{-- <th>HRD Verifikasi</th> --}}
                                            {{-- <th>Date Approval HRD Verifikasi</th> --}}
                                            {{-- <th>Kadiv HRD Approval</th> --}}
                                            {{-- <th>Date Approval Kadiv HRD</th> --}}
                                            {{-- <th>Document Received Finance</th> --}}
                                            {{-- <th>Finance Verifikasi</th> --}}
                                            {{-- <th>Date Approval Finance Verifikasi</th> --}}
                                            {{-- <th>Date Approval Treasury</th> --}}
                                            {{-- <th>Detail Medical</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trackingMedical as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('tracking-medical.detail', $data->nomor_medical_claim) }}">{{ $data->nomor_medical_claim ?? '-' }}</a></td>
                                                <td>{{ $data->nama ?? '-' }}</td>
                                                <td>{{ $data->getStatusBadge($data->paid) }}</td>
                                                <td>
                                                    @if ($data->kwitansiYear == $currentYear)
                                                        <button class="btn btn-success" type="button"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#saldo_tahun_sekarang_{{ $data->nik }}"><i
                                                                class="icofont icofont-money"></i></button>
                                                    @elseif ($data->kwitansiYear == $lastYear)
                                                        <button class="btn btn-success" type="button"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#saldo_tahun_lalu_{{ $data->nik }}"><i
                                                                class="icofont icofont-money"></i></button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('tracking-medical.print', $data->nomor_medical_claim) }}"
                                                        class="btn btn-info" type="button"><i
                                                            class="icofont icofont-printer"></i></a>
                                                </td>
                                                {{-- <td>{{ $data->formatted_tgl_pengajuan }}</td> --}}
                                                {{-- <td>{{ $data->nik ?? '-' }}</td> --}}
                                                {{-- <td>
                                                    {{ $data->getJenisReimbusementText() }}
                                                </td> --}}
                                                {{-- <td>{{ $data->getStatusBadge($data->hard_copy) }}</td> --}}
                                                {{-- <td>{{ $data->getStatusBadge($data->approve_hrd) }}</td> --}}
                                                {{-- <td>{{ $data->formatted_date_approval_hrd }}</td> --}}
                                                {{-- <td>{{ $data->getStatusBadge($data->approve_gm_hrd) }}</td> --}}
                                                {{-- <td>{{ $data->formatted_date_approval_gm_hrd }}</td> --}}
                                                {{-- <td>{{ $data->getStatusBadge($data->hard_copy_finance) }}</td> --}}
                                                {{-- <td>{{ $data->getStatusBadge($data->status_finance_verified) }}</td> --}}
                                                {{-- <td>{{ $data->formatted_date_approval_finance_verified }}</td> --}}
                                                {{-- <td>{{ $data->formatted_date_approval_treasury }}</td> --}}
                                                {{-- <td>
                                                    <a href="{{ route('tracking-medical.detail', $data->nomor_medical_claim) }}"
                                                        class="btn btn-primary" type="button"><i
                                                            class="icofont icofont-files"></i></a>
                                                    <a href='{{ route('tracking-medical.detail',  $data->nomor_medical_claim) }}'>Detail</a>
                                                </td> --}}
                                            </tr>

                                            <div class="modal fade" id="saldo_tahun_sekarang_{{ $data->nik }}"
                                                tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModal"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myExtraLargeModal">Saldo
                                                                Rembuirsement | Tahun {{ $currentYear }} |
                                                                {{ $data->nama }}
                                                            </h4>
                                                            <button class="btn-close py-0" type="button"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body dark-modal">
                                                            @php
                                                                $limitSekarang = DB::table('tb_limit_rembuisement')
                                                                    ->where('nik', $data->nik)
                                                                    ->first();
                                                            @endphp
                                                            <p class="modal-padding-space mb-4">Saldo Total Reimbursement
                                                                ({{ $currentYear }})
                                                                : Rp.
                                                                {{ number_format($limitSekarang->saldo_total_rembuisement ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitSekarang->limit_total_rembuisement ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo kacamata
                                                                : Rp.
                                                                {{ number_format($limitSekarang->limit_kacamata ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitSekarang->kacamata ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo Kehamilan
                                                                : Rp.
                                                                {{ number_format($limitSekarang->limit_kehamilan ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitSekarang->kehamilan ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo Pengobatan Gigi
                                                                : Rp.
                                                                {{ number_format($limitSekarang->limit_pengobatan_gigi ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitSekarang->pengobatan_gigi ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo Vaksinasi Anak
                                                                : Rp.
                                                                {{ number_format($limitSekarang->limit_vaksinasi_anak ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitSekarang->vaksinasi_anak ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo Medical Check-Up
                                                                : Rp.
                                                                {{ number_format($limitSekarang->limit_medical_check_up ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitSekarang->medical_check_up ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo Tunjangan Kesehatan
                                                                : Rp.
                                                                {{ number_format($limitSekarang->limit_tunjangan_kesehatan ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitSekarang->tunjangan_kesehatan ?? 0, 0, ',', '.') }})
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="saldo_tahun_lalu_{{ $data->nik }}"
                                                tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModal"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myExtraLargeModal">Saldo
                                                                Rembuirsement | Tahun {{ $lastYear }} |
                                                                {{ $data->nama }}
                                                            </h4>
                                                            <button class="btn-close py-0" type="button"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body dark-modal">
                                                            @php
                                                                $limitTahunLalu = DB::table(
                                                                    'tb_limit_rembuisement_tahun_lalu',
                                                                )
                                                                    ->where('nik', $data->nik)
                                                                    ->first();
                                                            @endphp
                                                            <p class="modal-padding-space mb-4">Saldo Total Reimbursement
                                                                ({{ $lastYear }})
                                                                : Rp.
                                                                {{ number_format($limitTahunLalu->saldo_total_rembuisement ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitTahunLalu->limit_total_rembuisement ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo kacamata
                                                                : Rp.
                                                                {{ number_format($limitTahunLalu->limit_kacamata ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitTahunLalu->kacamata ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo Kehamilan
                                                                : Rp.
                                                                {{ number_format($limitTahunLalu->limit_kehamilan ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitTahunLalu->kehamilan ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo Pengobatan Gigi
                                                                : Rp.
                                                                {{ number_format($limitTahunLalu->limit_pengobatan_gigi ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitTahunLalu->pengobatan_gigi ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo Vaksinasi Anak
                                                                : Rp.
                                                                {{ number_format($limitTahunLalu->limit_vaksinasi_anak ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitTahunLalu->vaksinasi_anak ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo Medical Check-Up
                                                                : Rp.
                                                                {{ number_format($limitTahunLalu->limit_medical_check_up ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitTahunLalu->medical_check_up ?? 0, 0, ',', '.') }})
                                                            </p>
                                                            <p class="modal-padding-space mb-4">Saldo Tunjangan Kesehatan
                                                                : Rp.
                                                                {{ number_format($limitTahunLalu->limit_tunjangan_kesehatan ?? 0, 0, ',', '.') }}
                                                                (Tersisa :
                                                                {{ number_format($limitTahunLalu->tunjangan_kesehatan ?? 0, 0, ',', '.') }})
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Claim</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Detail Saldo</th>
                                            <th>Print Out</th>
                                            {{-- <th>Tanggal Pengajuan</th> --}}
                                            {{-- <th>NIK</th> --}}
                                            {{-- <th>Jenis Rembuisment</th> --}}
                                            {{-- <th>Document Received HRD</th> --}}
                                            {{-- <th>HRD Verifikasi</th> --}}
                                            {{-- <th>Date Approval HRD Verifikasi</th> --}}
                                            {{-- <th>Kadiv HRD Approval</th> --}}
                                            {{-- <th>Date Approval Kadiv HRD</th> --}}
                                            {{-- <th>Document Received Finance</th> --}}
                                            {{-- <th>Finance Verifikasi</th> --}}
                                            {{-- <th>Date Approval Finance Verifikasi</th> --}}
                                            {{-- <th>Date Approval Treasury</th> --}}
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
        document.addEventListener("DOMContentLoaded", function() {
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
