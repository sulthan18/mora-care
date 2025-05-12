<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">@yield('title')</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-th-large"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Data Masyarakat -->
    <li class="nav-item {{ request()->is('admin/resident*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.resident.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Masyarakat</span>
        </a>
    </li>

    {{-- <!-- Nav Item - Data Kategori -->
    <li class="nav-item {{ request()->is('admin/report-category*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.report-category.index') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Data Kategori</span>
        </a>
    </li>

    <!-- Nav Item - Data Laporan -->
    <li class="nav-item {{ request()->is('admin/report*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.report.index') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Data Laporan</span>
        </a>
    </li> --}}

    <!-- Nav Item - Data Kategori -->
    <li
        class="nav-item {{ request()->is('admin/report-category') || request()->is('admin/report-category/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.report-category.index') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Data Kategori</span>
        </a>
    </li>

    <!-- Nav Item - Data Laporan -->
    <li class="nav-item {{ request()->is('admin/report') || request()->is('admin/report/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.report.index') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Data Laporan</span>
        </a>
    </li>
</ul>
