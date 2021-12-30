<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('/img/untidar.png') }}" alt="UNIVERSITAS TIDAR" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">SISDUKPILMAPRES</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if (Auth::user()->role == 'admin')    
                    <li class="nav-item {{ Request::is('dashboard/manajemen*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('dashboard/manajemen*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Manajemen Akun
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/manajemen-admin') }}" class="nav-link {{ Request::is('dashboard/manajemen-admin*') ? 'active' : '' }}">
                                    <i class="fas fa-user-friends nav-icon"></i>
                                    <p>Administrator</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/manajemen-dosen') }}" class="nav-link {{ Request::is('dashboard/manajemen-dosen*') ? 'active' : '' }}">
                                    <i class="fas fa-user-friends nav-icon"></i>
                                    <p>Dosen/Juri</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/manajemen-mahasiswa') }}" class="nav-link {{ Request::is('dashboard/manajemen-mahasiswa*') ? 'active' : '' }}">
                                    <i class="fas fa-user-friends nav-icon"></i>
                                    <p>Mahasiswa</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/tahun-seleksi') }}" class="nav-link {{ Request::is('dashboard/tahun-seleksi*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Pelaksanaan Seleksi</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ url('/dashboard/kriteria') }}" class="nav-link {{ Request::is('dashboard/kriteria*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-balance-scale"></i>
                            <p>Bobot Kriteria</p>
                        </a>
                    </li>
                    
                    <li class="nav-item {{ Request::is('dashboard/data-prestasi/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('dashboard/data-prestasi/*') ? 'active' : '' }}">
                            <i class="nav-icon fad fa-trophy"></i>
                            <p>
                                Data Prestasi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/data-prestasi/capaian-unggulan') }}" class="nav-link {{ Request::is('dashboard/data-prestasi/capaian-unggulan*') ? 'active' : '' }}">
                                    <i class="fad fa-trophy-alt nav-icon"></i>
                                    <p>Capaian Unggulan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/data-prestasi/gagasan-kreatif') }}" class="nav-link {{ Request::is('dashboard/data-prestasi/gagasan-kreatif*') ? 'active' : '' }}">
                                    <i class="fad fa-lightbulb-on nav-icon"></i>
                                    <p>Gagasan Kreatif</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/data-prestasi/produk-inovatif') }}" class="nav-link {{ Request::is('dashboard/data-prestasi/produk-inovatif*') ? 'active' : '' }}">
                                    <i class="fad fa-lightbulb-on nav-icon"></i>
                                    <p>Produk Inovatif</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ url('/dashboard/hitung-seleksi') }}" class="nav-link {{ Request::is('dashboard/hitung-seleksi*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>Hitung Seleksi</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ url('/dashboard/hasil-seleksi') }}" class="nav-link {{ Request::is('dashboard/hasil-seleksi*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-poll"></i>
                            <p>Hasil Seleksi</p>
                        </a>
                    </li>

                @elseif(Auth::user()->role == 'juri')
                    <li class="nav-item {{ Request::is('dashboard/prestasi/penilaian/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('dashboard/prestasi/penilaian/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-trophy"></i>
                            <p>
                                Penilaian Prestasi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/prestasi/penilaian/capaian-unggulan') }}" class="nav-link {{ Request::is('dashboard/prestasi/penilaian/capaian-unggulan*') ? 'active' : '' }}">
                                    <i class="fad fa-trophy-alt nav-icon"></i>
                                    <p>Capaian Unggulan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/prestasi/penilaian/gagasan-kreatif') }}" class="nav-link {{ Request::is('dashboard/prestasi/penilaian/gagasan-kreatif*') ? 'active' : '' }}">
                                    <i class="fad fa-lightbulb-on nav-icon"></i>
                                    <p>Gagasan Kreatif</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/prestasi/penilaian/produk-inovatif') }}" class="nav-link {{ Request::is('dashboard/prestasi/penilaian/produk-inovatif*') ? 'active' : '' }}">
                                    <i class="fad fa-lightbulb-on nav-icon"></i>
                                    <p>Produk Inovatif</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                @elseif(Auth::user()->role == 'dosen')
                    <li class="nav-item {{ Request::is('dashboard/data-prestasi/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('dashboard/data-prestasi/*') ? 'active' : '' }}">
                            <i class="nav-icon fad fa-trophy"></i>
                            <p>
                                Data Prestasi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/data-prestasi/capaian-unggulan') }}" class="nav-link {{ Request::is('dashboard/data-prestasi/capaian-unggulan*') ? 'active' : '' }}">
                                    <i class="fad fa-trophy-alt nav-icon"></i>
                                    <p>Capaian Unggulan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/data-prestasi/gagasan-kreatif') }}" class="nav-link {{ Request::is('dashboard/data-prestasi/gagasan-kreatif*') ? 'active' : '' }}">
                                    <i class="fad fa-lightbulb-on nav-icon"></i>
                                    <p>Gagasan Kreatif</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/data-prestasi/produk-inovatif') }}" class="nav-link {{ Request::is('dashboard/data-prestasi/produk-inovatif*') ? 'active' : '' }}">
                                    <i class="fad fa-lightbulb-on nav-icon"></i>
                                    <p>Produk Inovatif</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/hasil-seleksi') }}" class="nav-link {{ Request::is('dashboard/hasil-seleksi*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-poll"></i>
                            <p>Hasil Seleksi</p>
                        </a>
                    </li>

                @elseif(Auth::user()->role == 'mahasiswa')
                    <li class="nav-item {{ Request::is('dashboard/prestasi/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('dashboard/prestasi/*') ? 'active' : '' }}">
                            <i class="nav-icon fad fa-trophy"></i>
                            <p>
                                Data Prestasi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('/dashboard/prestasi/capaian-unggulan') }}" class="nav-link {{ Request::is('dashboard/prestasi/capaian-unggulan*') ? 'active' : '' }}">
                                    <i class="fad fa-trophy-alt nav-icon"></i>
                                    <p>Capaian Unggulan</p>
                                </a>
                            </li>
                            @if (Auth::user()->mahasiswa->program_pendidikan == "Sarjana")
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard/prestasi/gagasan-kreatif') }}" class="nav-link {{ Request::is('dashboard/prestasi/gagasan-kreatif*') ? 'active' : '' }}">
                                        <i class="fad fa-lightbulb-on nav-icon"></i>
                                        <p>Gagasan Kreatif</p>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard/prestasi/produk-inovatif') }}" class="nav-link {{ Request::is('dashboard/prestasi/produk-inovatif*') ? 'active' : '' }}">
                                        <i class="fad fa-lightbulb-on nav-icon"></i>
                                        <p>Produk Inovatif</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/dashboard/hasil-seleksi') }}" class="nav-link {{ Request::is('dashboard/hasil-seleksi*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-poll"></i>
                            <p>Hasil Seleksi</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>