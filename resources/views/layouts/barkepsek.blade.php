<aside class="sidebar">
    <div class="sidebar-inner">

        <!-- HEADER -->
        <div class="sidebar-header">
            <img src="{{ asset('logo.png') }}" alt="Logo Sekolah">
            <h4 class="school-name">TK ISLAM NURUSSALAM</h4>
        </div>

        <!-- MENU -->
        <nav class="sidebar-menu">

            <a href="{{ route('kepsek.dashboard') }}"
               class="{{ request()->routeIs('kepsek.dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill"></i>

                <span>Dashboard</span>
            </a>

            <a href="{{ route('rekap.index') }}"
               class="{{ request()->routeIs('rekap.*') ? 'active' : '' }}">
               <i class="bi bi-hdd-stack-fill"></i>
                <span>Rekap Data</span>
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
