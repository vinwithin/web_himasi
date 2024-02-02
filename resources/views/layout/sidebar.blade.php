<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-2">HIMASI ADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  {{ Request::is('/') ? 'active' : ''}}">
        <a class="nav-link " href="/">
            <i class="fa-solid fa-user-tie"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <li class="nav-item  {{ Request::is('artikel*') ? 'active' : ''}}">
        <a class="nav-link" href="/artikel">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Artikel</span></a>
    </li>
    <li class="nav-item  {{ Request::is('berita*') ? 'active' : ''}}">
        <a class="nav-link" href="/berita">
            <i class="fa-regular fa-newspaper"></i>
            <span>Berita</span></a>
    </li>
    <li class="nav-item  {{ Request::is('kegiatan*') ? 'active' : ''}}">
        <a class="nav-link" href="/kegiatan">
            <i class="fa-regular fa-calendar-plus"></i>
            <span>Kegiatan</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    
    <!-- Nav Item - Utilities Collapse Menu -->
   

   

  

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
       Other
    </div>
    <li class="nav-item ">
        <a class="nav-link" href="/logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span></a>
    </li>
    



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
