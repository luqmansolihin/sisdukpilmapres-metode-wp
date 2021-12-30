<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link px-0" data-toggle="dropdown" href="#">
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'dosen' || auth()->user()->role == 'juri')
                    <strong>
                        {{ Str::upper($user->dosen->name) }}
                    </strong>
                @else 
                    <strong>
                        {{ Str::upper($user->mahasiswa->name) }}
                    </strong>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'dosen' || auth()->user()->role == 'juri')
                    <a href="{{ url('/profil/'. auth()->user()->dosen->nip) }}" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profil
                    </a>
                @else 
                    <a href="{{ url('/profil/'. auth()->user()->mahasiswa->npm) }}" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profil
                    </a>
                @endif
                <div class="dropdown-divider"></div>
                <a href="{{ url('/ubah-password') }}" class="dropdown-item">
                    <i class="fas fa-lock mr-2"></i> Ubah Password
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class=" dropdown-item bg-transparent border-0">
                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->