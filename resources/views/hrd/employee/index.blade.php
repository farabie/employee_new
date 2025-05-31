@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flatpickr/flatpickr.min.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/intltelinput.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/tagify.css') }}">
    <style>
        .uniform-img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
        }

        .text-truncate {
            max-width: 200px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .card-body p {
            margin-bottom: 4px;
        }
        
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Informasi Karyawan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item active">Informasi Karyawan</li>
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
    <div class="container-fluid datatable-init">
        <div class="row">
            <div class="card-header card-no-border text-end">
                <div class="card-header-right-icon"><a class="btn btn-primary f-w-500 mb-4"
                        href="{{ route('employee.create') }}"><i class="fa-solid fa-plus pe-2"></i>Tambah Data Pegawai</a></div>
            </div>

            <div class="col-12">
                <div class = "card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col">
                                <h6>Status</h6>
                                @php
                                    $selectedStatus = request('status', 'Active'); // Ambil status dari URL atau default Active
                                @endphp
                                <div class="btn-group" role="group" aria-label="Default button group">
                                    <input type="radio" class="btn-check status-filter" name="status" id="active"
                                        autocomplete="off" value="Active"
                                        {{ $selectedStatus == 'Active' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="active">Active</label>

                                    <input type="radio" class="btn-check status-filter" name="status" id="inactive"
                                        autocomplete="off" value="Inactive"
                                        {{ $selectedStatus == 'Inactive' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="inactive">Inactive</label>

                                    <input type="radio" class="btn-check status-filter" name="status" id="all"
                                        autocomplete="off" value="All" {{ $selectedStatus == 'All' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="all">All</label>
                                </div>
                            </div>
                            <div class="col">
                                <h6>Divisi</h6>
                                <select id="divisi-filter" class="form-select">
                                    <option value="">Semua Divisi</option>
                                    @foreach ($divisi as $d)
                                        <option value="{{ $d->id_unit }}"
                                            {{ request('divisi') == $d->id_unit ? 'selected' : '' }}>
                                            {{ $d->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <h6>Tanggal Bergabung</h6>
                                {{-- <label class="form-label">Join Date</label> --}}
                                <div class="input-group flatpicker-calender">
                                    <input class="form-control" id="range-date" type="text"
                                        placeholder="Select date range" value="{{ request('date') }}">
                                </div>
                            </div>
                            <div class="col">
                                <h6>Search</h6>
                                <input class="form-control" type="text" id="search-input" placeholder="Search..."
                                    value="{{ request('search') }}">
                            </div>
                            {{-- <div class="col">
                                <h6>Clear Filter</h6>
                                <a href="#" id="clear-filter"
                                    class="btn btn-success" type="button"><i
                                        class="icofont icofont-brush"></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div id="loading-indicator" class="text-center my-4 d-none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="card p-4 bg-light">
                    <div class="row">
                        @include('hrd.employee.pegawai_list')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('script')
    <script src="{{ asset('assets/js/flat-pickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/flat-pickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/js/select2/tagify.js') }}"></script>
    <script src="{{ asset('assets/js/select2/tagify.polyfills.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/intltelinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/telephone-input.js') }}"></script>
    <script src="{{ asset('assets/js/select2/custom-inputsearch.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select3-custom.js') }}"></script>
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

            flatpickr("#range-date", {
                mode: "range",
                dateFormat: "d-m-Y",
                onClose: function(selectedDates, dateStr, instance) {
                    fetchEmployees(); // Panggil fungsi filter saat tanggal dipilih
                }
            });

            // Function to fetch and update employee list
            function fetchEmployees() {
                let status = document.querySelector('input[name="status"]:checked').value;
                let searchValue = document.getElementById('search-input').value;
                let dateRange = document.getElementById('range-date').value; // Ambil rentang tanggal
                let divisi = document.getElementById('divisi-filter').value;

                // Tampilkan loading indicator
                const loadingIndicator = document.getElementById('loading-indicator');
                if (loadingIndicator) {
                    loadingIndicator.classList.remove('d-none');
                }

                fetch(`?status=${status}&search=${searchValue}&date=${dateRange}&divisi=${divisi}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const container = document.querySelector('.col-sm-12 .card.p-4 .row');
                        if (container) {
                            // Pastikan loadingIndicator tetap ada dengan menyimpannya terlebih dahulu
                            const loadingElement = document.getElementById('loading-indicator');

                            // Update konten
                            container.innerHTML = data.pegawai;

                            // Jika loading indicator ada di dalam konten yang diupdate,
                            // kita perlu menambahkannya kembali dan menyembunyikannya
                            if (loadingElement && !document.getElementById('loading-indicator')) {
                                container.prepend(loadingElement);
                            }
                        }

                        // Update URL for browser history without refreshing page
                        let url = new URL(window.location.href);
                        url.searchParams.set('status', status);
                        url.searchParams.set('search', searchValue);
                        url.searchParams.set('date', dateRange);
                        url.searchParams.set('divisi', divisi);
                        history.pushState({}, '', url);

                        // Sembunyikan loading indicator setelah data dimuat
                        const updatedLoadingIndicator = document.getElementById('loading-indicator');
                        if (updatedLoadingIndicator) {
                            updatedLoadingIndicator.classList.add('d-none');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Sembunyikan loading indicator jika terjadi error
                        const errorLoadingIndicator = document.getElementById('loading-indicator');
                        if (errorLoadingIndicator) {
                            errorLoadingIndicator.classList.add('d-none');
                        }

                        // Tampilkan pesan error jika perlu
                        // Swal.fire('Error', 'Terjadi kesalahan saat memuat data', 'error');
                    });
            }
            // Add event listener for real-time search
            const searchInput = document.getElementById('search-input');
            let searchTimeout;

            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(fetchEmployees, 500); // Delay to prevent too many requests
            });

            // Add event listeners for status filter
            document.querySelectorAll('.status-filter').forEach(item => {
                item.addEventListener('change', fetchEmployees);
            });

            document.getElementById('divisi-filter').addEventListener('change', fetchEmployees);

            document.getElementById('clear-filter').addEventListener('click', function() {
                document.getElementById('search-input').value = ''; // Reset search input
                document.getElementById('range-date').value = '';
                document.getElementById('divisi-filter').value = ''; // Reset date range input

                // Reset status ke "Active"
                document.getElementById('active').checked = true;

                // Update URL parameters untuk menghapus filter
                let url = new URL(window.location.href);
                url.searchParams.delete('status');
                url.searchParams.delete('search');
                url.searchParams.delete('date');
                url.searchParams.delete('divisi');
                history.pushState({}, '', url);

                fetchEmployees(); // Refresh data
            });
        });
    </script>
@endsection
