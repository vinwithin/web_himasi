<ul class="navbar-nav bg-primary sidebar-primary text-light sidebar accordion shadow-lg" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center text-light" href="#">
        <div class="sidebar-brand-icon ">
            <i class="fa-solid fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-2">HIMASI ADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/" style="font-family: 'Times New Roman', Times, serif;">
            <i class="fa-solid fa-house"></i>
            <span class="fs-6">Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading mb-2">
        Menu
    </div>
    <li class="nav-item  {{ Request::is('artikel*') ? 'active' : '' }}">
        <a class="nav-link " href="/artikel" style="font-family: 'Times New Roman', Times, serif;">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="fs-6">Artikel</span></a>
    </li>
    <li class="nav-item  {{ Request::is('berita*') ? 'active' : '' }}">
        <a class="nav-link" href="/berita" style="font-family: 'Times New Roman', Times, serif;">
            <i class="fa-regular fa-newspaper"></i>
            <span class="fs-6">Berita</span></a>
    </li>
    <li class="nav-item  {{ Request::is('kegiatan*') ? 'active' : '' }}">
        <a class="nav-link" href="/kegiatan" style="font-family: 'Times New Roman', Times, serif;">
            <i class="fa-regular fa-calendar-plus "></i>
            <span class="fs-6">Kegiatan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Other
    </div>
    <li class="nav-item ">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal" style="font-family: 'Times New Roman', Times, serif;">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="fs-6">Logout</span></a>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
