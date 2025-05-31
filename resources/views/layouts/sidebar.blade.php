<div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="/"><img class="img-fluid for-light"
                    src="{{ asset('assets/images/logo/icon_trias.png') }}" alt=""><img class="img-fluid for-dark"
                    src="{{ asset('assets/images/logo/icon_trias.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa-solid fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid"
                    src="{{ asset('assets/images/logo/icon_trias.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{ route('dashboard') }}"><img class="img-fluid"
                                src="{{ asset('assets/images/logo/icon_trias.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa-solid fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>Pinned</h6>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-8">HRIS 2.0 as</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                            href="{{ route('dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span>Dashboard</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-use') }}"></use>
                            </svg><span>Karyawan </span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('employee.index') }}">Informasi Karyawan</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-project') }}"></use>
                            </svg><span>Master Data</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('divisi.index') }}">Divisi</a></li>
                            <li><a href="{{ route('department.index') }}">Departemen</a></li>
                            <li><a href="{{ route('master-jabatan.index') }}">Jabatan</a></li>
                            <li><a href="{{ route('master-eselon.index') }}">Grade</a></li>
                            <li><a href="{{ route('lokasi-kerja.index') }}">Lokasi Kerja</a></li>
                            <li><a href="{{ route('master-posisi.index') }}">Posisi</a></li>
                            <li><a href="{{ route('reset.pass.user.index') }}">Reset Pass Karyawan</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-learning') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-learning') }}"></use>
                            </svg><span>Hirarki Karyawan</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('general.index') }}">Struktur Orchart</a></li>
                            <li><a href="{{ route('approval.index') }}">Approval</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-widget') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-widget') }}"></use>
                            </svg><span>Manage Application</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="project-list.html">User AMS</a></li>
                            <li><a href="project-list.html">User IMS</a></li>
                            <li><a href="createnew.html">User AAS</a></li>
                            <li><a href="createnew.html">Summary Application</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-icons') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-icons') }}"></use>
                            </svg><span>Setup & Event</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="project-list.html">Setup Absensi</a></li>
                            <li><a href="{{ route('hari-libur-nasional.index') }}">Setup Hari Libur Nasional</a></li>
                            <li><a href="{{ route('cuti-bersama.index') }}">Setup Cuti Bersama</a></li>
                            <li><a href="{{ route('pemotongan-cuti.index') }}">Setup Pemotongan Cuti</a></li>
                            <li><a href="{{ route('kuota-cuti.index') }}">Setup Edit Cuti</a></li>
                            <li><a href="createnew.html">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a
                            class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-job-search') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-job-search') }}"></use>
                            </svg><span>Tracking Document</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('tracking-cuti.index') }}">Cuti</a></li>
                            <li><a href="{{ route('tracking-izin-personal.index') }}">Izin Personal</a></li>
                            <li><a href="{{ route('tracking-spd.index') }}">SPD</a></li>
                            <li><a href="{{ route('tracking-medical.index') }}">Medical</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-reports') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-reports') }}"></use>
                            </svg><span>Report</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="project-details.html">Cuti</a></li>
                            <li><a href="project-list.html">Izin Personal</a></li>
                            <li><a href="createnew.html">SPD</a></li>
                            <li><a href="createnew.html">Medical</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
