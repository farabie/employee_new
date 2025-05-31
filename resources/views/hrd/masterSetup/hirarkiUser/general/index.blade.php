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
                <h3>Strutur Orchart</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Hirarki Karyawan</li>
                    <li class="breadcrumb-item active">Struktur Orchart</li>
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
<div class="container-fluid datatable-init">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">
                    <h1>Data Struktur Orchart</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                        <table class="display table-striped border table-lg" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Unit (Staff)</th>
                                    <th>Subsi (SPV)</th>
                                    <th>Kasie (Manager)</th>
                                    <th>Kadept (Senior Manager)</th>
                                    <th>Kadiv (GM)</th>
                                    <th>Direktorat (Direktur)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hirarkiUsers as $hirarki)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hirarki->nama }}</td>
                                    <td>{{ $hirarki->unit_approval_name }}</td>
                                    <td>{{ $hirarki->subsi_approval_name }}</td>
                                    <td>{{ $hirarki->kasie_approval_name }}</td>
                                    <td>{{ $hirarki->kadept_approval_name }}</td>
                                    <td>{{ $hirarki->kadiv_approval_name }}</td>
                                    <td>{{ $hirarki->direktorat_approval_name }}</td>
                                    <td>
                                        <a type="button" class="btn btn-success"
                                            href="{{ route('general.edit', $hirarki->nik) }}" title="edit">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </td>
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
@endsection