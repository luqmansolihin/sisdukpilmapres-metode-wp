{{-- navbar --}}
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('/img/untidar.png') }}" alt="UNIVERSITAS TIDAR" width="40" height="40">
        </a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-menu-button-wide text-dark"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}"><b>Beranda</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('alur') ? 'active' : '' }}" href="{{ url('/alur') }}"><b>Alur</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tentang') ? 'active' : '' }}" href="{{ url('/tentang') }}"><b>Tentang</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('hasil') ? 'active' : '' }}" href="{{ url('/hasil') }}"><b>Hasil Seleksi</b></a>
                </li>
            </ul>
            @auth
                <ul class="navbar-nav nav-pills ms-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button"> 
                            <b>
                                @if (auth()->user()->role == 'admin'|| auth()->user()->role == 'dosen' || auth()->user()->role == 'juri')
                                    {{ Str::upper($user->dosen->name) }}
                                @else
                                    {{ $user->mahasiswa->name }}
                                @endif
                            </b>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-lg-end">
                            @if (auth()->user()->email_verified_at)
                                <li>
                                    <a class="dropdown-item" href="{{ url('/dashboard') }}"><i class="bi bi-layout-text-window-reverse"></i> <b>My Dashboard</b></a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                            @endif
                            <li>
                                <form action="{{ url('/logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> <b>Keluar</b></button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav nav-pills ms-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link {{ Request::is('register*') ? 'active' : '' }} dropdown-toggle" data-bs-toggle="dropdown" role="button"><i class="bi bi-person-plus"></i> <b>Daftar</b></a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-lg-end">
                            <li>
                                <a class="dropdown-item" href="{{ url('/register-dosen') }}"><i class="bi bi-person-plus"></i> <b>Dosen</b></a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/register-mahasiswa') }}"><i class="bi bi-person-plus"></i> <b>Mahasiswa</b></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/login') }}" class="nav-link {{ Request::is('login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> <b>Masuk</b></a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>