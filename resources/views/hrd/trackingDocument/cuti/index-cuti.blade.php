@extends('layouts.master')

@section('title', 'Tracking Dokument Cuti')

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

    .dt-buttons .buttons-copy.buttons-html5 { background-color: #2196F3 !important; }
    .dt-buttons .buttons-excel.buttons-html5 { background-color: #4CAF50 !important; }
    .dt-buttons .buttons-csv.buttons-html5 { background-color: #FF9800 !important; }
    .dt-buttons .buttons-pdf.buttons-html5 { background-color: #f44336 !important; }
</style>

<style>
    .badge {
        font-size: 12px;
        padding: 10px 10px;
    }
</style>
@endsection





@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Tracking Document Cuti</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Tracking Document</li>
                    <li class="breadcrumb-item active">Cuti</li>
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
                        <h5>Tracking Document Cuti</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2 pb-2 p-0">
                        <ul class="nav nav-pills nav-primary" id="j-pills-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="cuti-tahunan-tab" data-bs-toggle="pill"
                                    href="#cuti-tahunan" role="tab" aria-controls="cuti-tahunan" aria-selected="true">
                                    Cuti Tahunan</a></li>
                            <li class="nav-item"><a class="nav-link" id="cuti-umum-tab" data-bs-toggle="pill"
                                    href="#cuti-umum" role="tab" aria-controls="cuti-umum" aria-selected="false">Cuti
                                    Umum</a></li>
                            <li class="nav-item"><a class="nav-link" id="cuti-besar-tab" data-bs-toggle="pill"
                                    href="#cuti-besar" role="tab" aria-controls="cuti-besar" aria-selected="false">Cuti
                                    Besar</a></li>
                        </ul>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="tab-content" id="j-pills-tabContent">
                            <div class="tab-pane fade show active" id="cuti-tahunan" role="tabpanel"
                                aria-labelledby="cuti-tahunan-tab">
                                <div class="dt-ext table-responsive custom-scrollbar">
                                    <table class="display table-striped border table-lg export-table" id="cuti-tahunan-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                {{-- <th>Tanggal Pengajuan</th> --}}
                                                {{-- <th>Tanggal Mulai</th> --}}
                                                {{-- <th>Tanggal Selesai</th> --}}
                                                {{-- <th>Lama Cuti</th> --}}
                                                {{-- <th>Pengganti Cuti</th> --}}
                                                {{-- <th>Atasan 1</th> --}}
                                                {{-- <th>Atasan 2</th> --}}
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                {{-- <th>Hak Cuti</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trackingCutiTahunan as $data )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('tracking-cuti-tahunan.detail', $data->id_cuti) }}">{{ $data->pegawai->nama ?? '' }}</a></td>
                                                {{-- <td>{{ \Carbon\Carbon::parse($data->tgl_pengajuan)->translatedFormat('d
                                                    F Y') }}
                                                </td> --}}
                                                {{-- <td>{{ \Carbon\Carbon::parse($data->tgl_mulai)->translatedFormat('d F
                                                    Y') }}</td> --}}
                                                {{-- <td>{{ \Carbon\Carbon::parse($data->tgl_selesai)->translatedFormat('d F
                                                    Y') }}</td> --}}
                                                {{-- <td>{{ $data->lama_cuti }} Hari</td> --}}
                                                {{-- <td>{{ $data->pengganti->nama ?? ''}}</td> --}}
                                                {{-- <td>{{ $data->atasan1->nama ?? '' }}</td> --}}
                                                {{-- <td>{{ $data->atasan2->nama ?? '' }}</td> --}}
                                                <td>{{ $data->keterangan }}</td>
                                                @php
                                                $statusCuti = $data->status_cuti
                                                @endphp
                                                <td>
                                                    @if ($statusCuti == '0')
                                                    <span class="badge badge-info">Process</span>
                                                    @elseif ($statusCuti == '1')
                                                    <span class="badge badge-danger">Rejected</span>
                                                    @else
                                                    <span class="badge badge-success">Approved</span>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $data->pegawai->hak_cuti ?? '' }} Hari</td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                {{-- <th>Tanggal Pengajuan</th> --}}
                                                {{-- <th>Tanggal Mulai</th> --}}
                                                {{-- <th>Tanggal Selesai</th> --}}
                                                {{-- <th>Lama Cuti</th> --}}
                                                {{-- <th>Pengganti Cuti</th> --}}
                                                {{-- <th>Atasan 1</th> --}}
                                                {{-- <th>Atasan 2</th> --}}
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                {{-- <th>Hak Cuti</th> --}}
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cuti-umum" role="tabpanel" aria-labelledby="cuti-umum-tab">
                                <div class="dt-ext table-responsive custom-scrollbar">
                                    <table class="display table-striped border table-lg export-table" id="cuti-umum-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                {{-- <th>Tanggal Pengajuan</th> --}}
                                                {{-- <th>Tanggal Mulai</th> --}}
                                                {{-- <th>Tanggal Selesai</th> --}}
                                                {{-- <th>Lama Cuti</th> --}}
                                                {{-- <th>Pengganti Cuti</th> --}}
                                                {{-- <th>Atasan 1</th> --}}
                                                {{-- <th>Atasan 2</th> --}}
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                {{-- <th>Hak Cuti</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trackingCutiUmum as $data )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('tracking-cuti-umum.detail', $data->id_cuti) }}">{{ $data->pegawai->nama ?? '' }}</a></td>
                                                {{-- <td>{{ \Carbon\Carbon::parse($data->tgl_pengajuan)->translatedFormat('d
                                                    F Y') }}
                                                </td> --}}
                                                {{-- <td>{{ \Carbon\Carbon::parse($data->tgl_mulai)->translatedFormat('d F
                                                    Y') }}</td> --}}
                                                {{-- <td>{{ \Carbon\Carbon::parse($data->tgl_selesai)->translatedFormat('d F
                                                    Y') }}</td> --}}
                                                {{-- <td>{{ $data->lama_cuti }} Hari</td> --}}
                                                {{-- <td>{{ $data->pengganti->nama ?? ''}}</td> --}}
                                                {{-- <td>{{ $data->atasan1->nama ?? '' }}</td> --}}
                                                {{-- <td>{{ $data->atasan2->nama ?? '' }}</td> --}}
                                                <td>{{ $data->keterangan }}</td>
                                                @php
                                                $statusCuti = $data->status_cuti
                                                @endphp
                                                <td>
                                                    @if ($statusCuti == '0')
                                                    <span class="badge badge-info">Process</span>
                                                    @elseif ($statusCuti == '1')
                                                    <span class="badge badge-danger">Reject</span>
                                                    @else
                                                    <span class="badge badge-success">Approve</span>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $data->pegawai->hak_cuti ?? '' }} Hari</td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                {{-- <th>Tanggal Pengajuan</th> --}}
                                                {{-- <th>Tanggal Mulai</th> --}}
                                                {{-- <th>Tanggal Selesai</th> --}}
                                                {{-- <th>Lama Cuti</th> --}}
                                                {{-- <th>Pengganti Cuti</th> --}}
                                                {{-- <th>Atasan 1</th> --}}
                                                {{-- <th>Atasan 2</th> --}}
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                {{-- <th>Hak Cuti</th> --}}
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cuti-besar" role="tabpanel" aria-labelledby="cuti-besar-tab">
                                <div class="dt-ext table-responsive custom-scrollbar">
                                    <table class="display table-striped border table-lg export-table" id="cuti-besar-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                {{-- <th>Tanggal Pengajuan</th> --}}
                                                {{-- <th>Tanggal Mulai</th> --}}
                                                {{-- <th>Tanggal Selesai</th> --}}
                                                {{-- <th>Lama Cuti</th> --}}
                                                {{-- <th>Pengganti Cuti</th> --}}
                                                {{-- <th>Atasan 1</th> --}}
                                                {{-- <th>Atasan 2</th> --}}
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                {{-- <th>Hak Cuti</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trackingCutiBesar as $data )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route('tracking-cuti-besar.detail', $data->id_cuti) }}">{{ $data->pegawai->nama ?? '' }}</a></td>
                                                {{-- <td>{{ \Carbon\Carbon::parse($data->tgl_pengajuan)->translatedFormat('d
                                                    F Y') }}
                                                </td> --}}
                                                {{-- <td>{{ \Carbon\Carbon::parse($data->tgl_mulai)->translatedFormat('d F
                                                    Y') }}</td> --}}
                                                {{-- <td>{{ \Carbon\Carbon::parse($data->tgl_selesai)->translatedFormat('d F
                                                    Y') }}</td> --}}
                                                {{-- <td>{{ $data->lama_cuti }} Hari</td> --}}
                                                {{-- <td>{{ $data->pengganti->nama ?? ''}}</td> --}}
                                                {{-- <td>{{ $data->atasan1->nama ?? '' }}</td> --}}
                                                {{-- <td>{{ $data->atasan2->nama ?? '' }}</td> --}}
                                                <td>{{ $data->keterangan }}</td>
                                                @php
                                                $statusCuti = $data->status_cuti
                                                @endphp
                                                <td>
                                                    @if ($statusCuti == '0')
                                                    <span class="badge badge-info">Process</span>
                                                    @elseif ($statusCuti == '1')
                                                    <span class="badge badge-danger">Reject</span>
                                                    @else
                                                    <span class="badge badge-success">Approve</span>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $data->pegawai->hak_cuti ?? '' }} Hari</td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                {{-- <th>Tanggal Pengajuan</th> --}}
                                                {{-- <th>Tanggal Mulai</th> --}}
                                                {{-- <th>Tanggal Selesai</th> --}}
                                                {{-- <th>Lama Cuti</th> --}}
                                                {{-- <th>Pengganti Cuti</th> --}}
                                                {{-- <th>Atasan 1</th> --}}
                                                {{-- <th>Atasan 2</th> --}}
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                {{-- <th>Hak Cuti</th> --}}
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
{{-- <script src="{{ asset('assets/js/datatable/datatable-extension/rowReorder.bootstrap5.jss') }}"></script> --}}
<script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>


<script src="{{ asset('assets/js/alert.js') }}"></script>
<script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".btn-delete").forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault();
                let deleteUrl = this.getAttribute("data-url");
                let itemName = this.getAttribute("data-name");

                Swal.fire({
                    title: "Are you sure?",
                    text: `Do you really want to delete ${itemName}?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "btn btn-primary text-white",
                        cancelButton: "btn btn-secondary"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(deleteUrl, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({ _method: "DELETE" })
                        }).then(response => {
                            if (response.ok) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your data has been deleted.",
                                    icon: "success",
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn btn-primary text-white" // Warna teks "OK" jadi putih
                                    }
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire("Error!", "Failed to delete data.", "error");
                            }
                        });
                    }
                });
            });
        });
    });
</script>

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
<script>
    $(document).ready(function() {
    const datatableConfig = {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                className: 'buttons-copy buttons-html5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                className: 'buttons-excel buttons-html5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                className: 'buttons-csv buttons-html5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                className: 'buttons-pdf buttons-html5',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        responsive: true,
    };
    $('#cuti-tahunan-table').DataTable(datatableConfig);
    $('#cuti-umum-table').DataTable(datatableConfig);
    $('#cuti-besar-table').DataTable(datatableConfig);
});
</script>
@endsection