<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Guru</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex" style="min-height: 100vh">

    <!-- SIDEBAR -->
    <div class="bg-success text-white p-3" style="width: 250px">
        <h5 class="mb-4">📘 Sistem TK</h5>

        <ul class="nav flex-column gap-2">

            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                   class="nav-link text-white {{ request()->routeIs('dashboard') ? 'fw-bold' : '' }}">
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('siswa.index') }}"
                   class="nav-link text-white {{ request()->routeIs('siswa.*') ? 'fw-bold' : '' }}">
                    Data Siswa
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('absensi.index') }}"
                   class="nav-link text-white {{ request()->routeIs('absensi.*') ? 'fw-bold' : '' }}">
                    Absensi
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('jurnal.index') }}"
                   class="nav-link text-white {{ request()->routeIs('jurnal.*') ? 'fw-bold' : '' }}">
                    Jurnal Harian
                </a>
            </li>

            <hr>

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-light w-100">Logout</button>
                </form>
            </li>

        </ul>
    </div>

    <!-- CONTENT -->
    <div class="flex-fill p-4 bg-light">
        @yield('content')
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
