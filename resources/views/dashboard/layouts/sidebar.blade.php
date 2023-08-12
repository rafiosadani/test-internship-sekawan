<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{-- <div class="sidebar-brand-text">Sekawan Media</div> --}}
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sekawans</div>
    </a>
    
    @can('admin')
    <!-- Divider -->
    <hr class="sidebar-divider mt-0">

     <!-- Heading -->
     <div class="sidebar-heading">
        Administrator
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('dashboard/users*') ? 'active' : '' }}">
        <a class="nav-link pb" href="/dashboard/users">
            <i class="fas fa-fw fa fa-users"></i>
            <span>Pengaturan User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <li class="nav-item {{ Request::is('dashboard/kendaraans*') ? 'active' : '' }}">
        <a class="nav-link pb-0" href="/dashboard/kendaraans">
            <i class="fas fa-fw fa-car"></i>
            <span>Kendaraan</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('dashboard/regions*') ? 'active' : '' }}">
        <a class="nav-link pb-0" href="/dashboard/regions">
            <i class="fas fa-fw fa-city"></i>
            <span>Region</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('dashboard/perusahaan-persewaans*') ? 'active' : '' }}">
        <a class="nav-link pb-0" href="/dashboard/perusahaan-persewaans">
            <i class="fas fa-fw fa-building"></i>
            <span>Perusahaan Persewaan</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('dashboard/roles*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/roles">
            <i class="fas fa-fw fa-cog mr-1"></i>
            <span>Role</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Aproved
    </div>

    <li class="nav-item" {{ Request::is('/dashboard/approve-peminjamans') ? 'active' : '' }}>
        <a class="nav-link pb-3" href="/dashboard/approve-peminjamans">
            <i class="fas fa-fw fa-check"></i>
            <span>Aproved Peminjaman</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi Peminjaman
    </div>

    <li class="nav-item" {{ Request::is('/dashboard/transaksi-peminjamans') ? 'active' : '' }}>
        <a class="nav-link pb-0" href="/dashboard/transaksi-peminjamans">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Peminjaman</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('/dashboard/transaksi-peminjamans/create') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/transaksi-peminjamans/create">
            <i class="fas fa-fw fa-landmark"></i>
            <span>Peminjaman Kendaraan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
       Laporan
    </div>

    <li class="nav-item {{ Request::is('/dashboard/laporan-peminjamans') ? 'active' : '' }}">
        <a class="nav-link pb-3" href="/dashboard/laporan-peminjamans">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan Peminjaman</span>
        </a>
    </li>
    @endcan

    @can('verifikator')
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pt-0 pb-3" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Aproved
    </div>

    <li class="nav-item" {{ Request::is('/dashboard/approve-peminjamans') ? 'active' : '' }}>
        <a class="nav-link pb-3" href="/dashboard/approve-peminjamans">
            <i class="fas fa-fw fa-check"></i>
            <span>Aproved Peminjaman</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
       Laporan
    </div>

    <li class="nav-item {{ Request::is('/dashboard/laporan-peminjamans') ? 'active' : '' }}">
        <a class="nav-link pb-3" href="/dashboard/laporan-peminjamans">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan Peminjaman</span>
        </a>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item {{ Request::is('/dashboard/profile') ? 'active' : '' }}">
        <a class="nav-link pb-3" href="/dashboard/profile">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span>
        </a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-solid fa-key"></i>
            <span>Ubah Password</span>
        </a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link pt-0" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->