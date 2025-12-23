<aside class="sidebar">
    <div class="sidebar-inner">

        <!-- HEADER -->
        <div class="sidebar-header">
            <img src="{{ asset('logo.png') }}" alt="Logo Sekolah">
            <h4 class="school-name">TK ISLAM NURUSSALAM</h4>
        </div>

        <!-- MENU -->
        <nav class="sidebar-menu">
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('siswa.index') }}"
               class="{{ request()->routeIs('siswa.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                <span>Data Siswa</span>
            </a>

            <a href="{{ route('absensi.index') }}"
               class="{{ request()->routeIs('absensi.*') ? 'active' : '' }}">
                <i class="bi bi-check2-square"></i>
                <span>Absensi</span>
            </a>

            <a href="{{ route('jurnal.index') }}"
               class="{{ request()->routeIs('jurnal.*') ? 'active' : '' }}">
                <i class="bi bi-journal-text"></i>
                <span>Jurnal Harian</span>
            </a>
        </nav>

        <!-- LOGOUT -->
        <form action="{{ route('logout') }}" method="POST" class="logout">
            @csrf
            <button type="submit">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
            </button>
        </form>

    </div>
</aside>
