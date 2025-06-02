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
                            <h6 class="lan-8">HRIS 2.0</h6>
                        </div>
                    </li>
                    @if (auth()->user()->hasRole('Hrd Admin'))
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard HRD Admin</span></a>
                        </li>
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
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
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
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-icons') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-icons') }}"></use>
                                </svg><span>Setup & Event</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="project-list.html">Setup Absensi</a></li>
                                <li><a href="{{ route('hari-libur-nasional.index') }}">Setup Hari Libur Nasional</a>
                                </li>
                                <li><a href="{{ route('cuti-bersama.index') }}">Setup Cuti Bersama</a></li>
                                <li><a href="{{ route('pemotongan-cuti.index') }}">Setup Pemotongan Cuti</a></li>
                                <li><a href="{{ route('kuota-cuti.index') }}">Setup Edit Cuti</a></li>
                                <li><a href="createnew.html">Struktur Organisasi</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
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
                    @elseif(auth()->user()->hasRole('Pegawai'))
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard Pegawai</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-use') }}"></use>
                                </svg><span>Profile & SO </span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('employee.index') }}">Profile</a></li>
                                <li><a href="{{ route('employee.index') }}">SO</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-formT') }}"></use>
                                </svg><span>Cuti</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="project-list.html">Pengajuan</a></li>
                                <li><a href="{{ route('hari-libur-nasional.index') }}">Approval</a></li>
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                                <li><a href="{{ route('pemotongan-cuti.index') }}">Tracking (Bawahan)</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-task') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-task') }}"></use>
                                </svg><span>Izin Personal</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="project-list.html">Pengajuan</a></li>
                                <li><a href="{{ route('hari-libur-nasional.index') }}">Approval</a></li>
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                                <li><a href="{{ route('pemotongan-cuti.index') }}">Tracking (Bawahan)</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-landing-page') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-landing-page') }}"></use>
                                </svg><span>SPD</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="project-list.html">Pengajuan</a></li>
                                <li><a href="{{ route('hari-libur-nasional.index') }}">Approval</a></li>
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                                <li><a href="{{ route('pemotongan-cuti.index') }}">Tracking (Bawahan)</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-bookmark') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-bookmark') }}"></use>
                                </svg><span>Medical</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="project-list.html">Pengajuan</a></li>
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-maps') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-maps') }}"></use>
                                </svg><span>Kendaraan Operasional</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="project-list.html">Pengajuan</a></li>
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-social') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-social') }}"></use>
                                </svg><span>Meeting Room</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-knowledgebase') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-knowledgebase') }}"></use>
                                </svg><span>Absensi</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="project-list.html">Absensi Bulan June</a></li>
                                <li><a href="{{ route('cuti-bersama.index') }}">Absensi Bawahan</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-icons') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-icons') }}"></use>
                                </svg><span>Documentation</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="project-list.html">User Manual</a></li>
                                <li><a href="{{ route('cuti-bersama.index') }}">Template Schedule SPD</a></li>
                            </ul>
                        </li>
                    @elseif(auth()->user()->hasRole('Kadiv Hrd'))
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard Kadiv HRD</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-landing-page') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-landing-page') }}"></use>
                                </svg><span>SPD</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-bookmark') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-bookmark') }}"></use>
                                </svg><span>Medical</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                            </ul>
                        </li>
                    @elseif(auth()->user()->hasRole('Kadiv Hrd'))
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard Kadiv HRD</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-landing-page') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-landing-page') }}"></use>
                                </svg><span>SPD</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-bookmark') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-bookmark') }}"></use>
                                </svg><span>Medical</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                            </ul>
                        </li>
                    @elseif(auth()->user()->hasRole('Finance Verifikasi'))
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard Finance</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-landing-page') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-landing-page') }}"></use>
                                </svg><span>SPD</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-bookmark') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-bookmark') }}"></use>
                                </svg><span>Medical</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                            </ul>
                        </li>
                     @elseif(auth()->user()->hasRole('Finance Treasury'))
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard Treasury</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-landing-page') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-landing-page') }}"></use>
                                </svg><span>SPD</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-bookmark') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-bookmark') }}"></use>
                                </svg><span>Medical</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('cuti-bersama.index') }}">Tracking</a></li>
                            </ul>
                        </li>
                    @elseif(auth()->user()->hasRole('GA Meeting Room'))
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard Ga Meeting</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-landing-page') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-landing-page') }}"></use>
                                </svg><span>Master Ruangan</span></a>
                        </li>
                    @elseif(auth()->user()->hasRole('GA Kendaraan Operasional'))
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard Ga Kendaraan</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-landing-page') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-landing-page') }}"></use>
                                </svg><span>Master Kendaraan</span></a>
                        </li>
                         <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-landing-page') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-landing-page') }}"></use>
                                </svg><span>Tracking Book Kendaraan</span></a>
                        </li>
                    @endif

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
