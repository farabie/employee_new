@extends('layouts.master')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dataTables.bootstrap5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Divisi</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">Divisi</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div id="success-alert" class="alert alert-bg-success light alert-dismissible fade show txt-success border-left-success mx-auto" 
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
                    <h1>Data Divisi</h1>
                </div>
                <div class="card-header card-no-border text-start">
                    <div class="card-header-right-icon"><a class="btn btn-primary f-w-500"
                            href="{{ route('divisi.create') }}"><i class="fa-solid fa-plus pe-2"></i>Tambah Data</a></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                        <table class="display table-striped border table-lg" id="basic-1">
                            <thead>
                                <tr>
                                    {{-- <th class="text-center"><span class="c-o-light f-w-600">No</span></th>
                                    <th class="text-center"><span class="c-o-light f-w-600">Nama Divisi</span></th>
                                    <th class="text-center"><span class="c-o-light f-w-600">Action</span></th> --}}
                                    <th>No</th>
                                    <th>Nama Divisi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($divisi as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>
                                        <a type="button" class="btn btn-success"
                                            href="{{ route('divisi.edit', $data->id) }}" title="edit">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a type="button" class="btn btn-danger btn-delete"
                                            data-url="{{ route('divisi.destroy', $data->id) }}"
                                            data-name="{{ $data->nama }}" title="hapus">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>

                                {{-- <div class="modal fade" id="Del{{ $data->id_unit }}" tabindex="-1" role="dialog"
                                    aria-labelledby="Del{{ $data->id_unit }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Data Divisi</h5>
                                                <button class="btn-close py-0" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Do you really want to delete {{ $data->nama }}?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('divisi-delete', $data->id_unit) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="list-product user-list-table">
                        <div class="table-responsive custom-scrollbar">
                            <table class="table" id="roles-permission">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th><span class="c-o-light f-w-600">No</span></th>
                                        <th><span class="c-o-light f-w-600">Nama Divisi</span></th>
                                        <th><span class="c-o-light f-w-600">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($divisi as $no=>$data)
                                    <tr>
                                        <td></td>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>
                                            <div class="common-align gap-2 justify-content-start">
                                                <a class="square-white"
                                                    href="{{ route('divisi-edit', $data->id_unit) }}">
                                                    <svg>
                                                        <use
                                                            href="{{ asset('/assets/svg/icon-sprite.svg#edit-content') }}">
                                                        </use>
                                                    </svg>
                                                </a>
                                                <a class="square-white trash-3"
                                                    href="{{ route('divisi-delete', $data->id_unit) }}">
                                                    <svg>
                                                        <use href="{{ asset('assets/svg/icon-sprite.svg#trash1') }}">
                                                        </use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection

@section('script')
{{-- <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/trash_popup.js') }}"></script>
<script src="{{ asset('assets/js/common-check.js') }}"></script> --}}
<script src="{{ asset('assets/js/datatable/datatables/dataTables1.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom2.js') }}"></script>
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
                    title: "Apakah Anda yakin?",
                    text: `Apakah anda yakin ingin menghapus data ${itemName}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
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
@endsection