@extends('layouts.master')

@section('title', 'Data Kuota Cuti Karyawan')

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
                    <h3>Data Kuota Cuti Karyawan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Setup & Event</li>
                        <li class="breadcrumb-item active">Data Kuota Cuti Pegawai</li>
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
        use Carbon\Carbon;

        $time = Carbon::now();
        $tahun_berjalan = $time->format('Y');
        $satu_tahun_lalu = $time->clone()->subYear()->format('Y');
        $dua_tahun_lalu = $time->clone()->subYears(2)->format('Y');
    @endphp

    <!-- Container-fluid starts-->
    <div class="container-fluid datatable-init">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <div class="header-top">
                            <h5>Data Kuota Cuti Pegawai</h5>
                        </div>
                    </div>
                    <div class="card-header card-no-border text-start">
                        <div class="card-header-right-icon"><a class="btn btn-primary f-w-500"
                                href="{{ route('kuota-cuti.create') }}"><i class="fa-solid fa-pencil pe-2"></i>Edit Kuota Cuti</a></div>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive custom-scrollbar">
                            <table class="isplay table-striped border table-lg" id="export-button">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Jenis Karyawan</th>
                                        <th>{{ $dua_tahun_lalu }}</th>
                                        <th>{{ $satu_tahun_lalu }}</th>
                                        <th>{{ $tahun_berjalan }}</th>
                                        <th>Cuti Besar</th>
                                        <th>Hak Cuti</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kuotaCuti as $data)
                                        @php
                                            $foto = $data['foto'];
                                            $jk = $data['jk'];
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if (empty($foto))
                                                    @if ($jk == 'Laki-laki')
                                                        <img class="b-r-8 img-70"
                                                            src="{{ asset('storage/assets/img/foto/no-foto-male.png') }}"
                                                            alt="#">
                                                    @else
                                                        <img class="b-r-8 img-70"
                                                            src="{{ asset('storage/assets/img/foto/no-foto-female.png') }}"
                                                            alt="#">
                                                    @endif
                                                @else
                                                    <img class="b-r-8 img-70"
                                                        src="{{ asset("storage/assets/img/foto/$data->foto") }}"
                                                        alt="#">
                                                @endif
                                            </td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->jenis_peg }}</td>
                                            <td>{{ $data->hak_cuti_tahun_1 }}</td>
                                            <td>{{ $data->hak_cuti_tahun_2 }}</td>
                                            <td>{{ $data->hak_cuti_tahun_berjalan }}</td>
                                            <td>{{ $data->hak_cuti_besar }}</td>
                                            <td>{{ $data->hak_cuti }}</td>
                                            {{-- <td>
                                                <a type="button" class="btn btn-success"
                                                    href="{{ route('kuota-cuti.edit', $data->nik) }}" title="edit">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                            </td> --}}
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
