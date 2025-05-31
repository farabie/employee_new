@extends('layouts.master')

@section('title', 'Data Karyawan')

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
@endsection

<style>
    /* Mengubah warna background button */
    .buttons-copy.buttons-html5,
    .buttons-csv.buttons-html5,
    .buttons-excel.buttons-html5,
    .buttons-pdf.buttons-html5 {
        background-color: #4CAF50 !important;
        /* Warna hijau */
    }

    /* Warna hover (opsional) */
    .buttons-copy.buttons-html5,
    .buttons-csv.buttons-html5,
    .buttons-excel.buttons-html5,
    .buttons-pdf.buttons-html5:hover {
        background-color: #45a049 !important;
    }

    /* Warna active/click (opsional) */
    .buttons-copy.buttons-html5,
    .buttons-csv.buttons-html5,
    .buttons-excel.buttons-html5,
    .buttons-pdf.buttons-html5:active {
        background-color: #3d8b40 !important;
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Reset Pass Karyawan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">Reset Pass Karyawan</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<!-- Container-fluid starts-->
<div class="container-fluid subscribed-user">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header card-no-border">
                    <div class="header-top">
                        <h5>Data Karyawan</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dt-ext table-responsive custom-scrollbar html-expert-table">
                        <table class="display table-striped border table-lg" id="export-button">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Password</th>
                                    <th>Hak Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $data )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->id_user }}</td>
                                    <td>{{ $data->nama_user }}</td>
                                    <td>****</td>
                                    <td>{{ $data->hak_akses }}</td>
                                    <td>
                                        <a type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#changePassword{{ $data->id_user }}" data-bs-placement="top" 
                                            data-bs-title="Change Password">
                                            <i class="fa-solid fa-arrows-rotate"></i>
                                        </a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="changePassword{{ $data->id_user }}" tabindex="-1"
                                    role="dialog" aria-labelledby="changePassword{{ $data->id_user }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ganti Password Karyawan</h5>
                                                <button class="btn-close py-0" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Password {{ $data->id_user }} akan direset menjadi
                                                    2024rising8</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <form action="{{ route('reset.password', $data->id_user) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Password</th>
                                    <th>Hak Akses</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
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
<script src="{{ asset('assets/js/datatable/datatable-extension/rowReorder.bootstrap5.jss') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>
@endsection