<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link" href="{{ route('dashboardsiswa') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('bukusiswa') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Buku
                </a>
                <a class="nav-link" href="{{ route('peminjamansiswa') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-hand"></i></div>
                    Peminjaman
                </a>
                <a class="nav-link" href="{{ route('pengaturansiswa') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                    Pengaturan
                </a>
                <a class="nav-link" href="{{ route('action.logout') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                    Logout
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{  Auth::user()->user_username }}
        </div>
    </nav>
</div>