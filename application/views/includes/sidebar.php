<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('admin')?>">
        <div class="sidebar-brand-text mx-3">INVENTORY</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= uri_string() == 'admin' ? 'active' : ''?>">
        <a class="nav-link" href="<?= site_url('admin')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Features
    </div>

    <li class="nav-item <?= uri_string() == 'admin/barang' ? 'active' : ''?>">
        <a class="nav-link collapsed" href="<?= site_url('admin/barang') ?>">
            <i class="fas fa-toolbox"></i>
            <span>Barang</span>
        </a>
    </li>

    <li class="nav-item <?= uri_string() == 'admin/peminjaman' ? 'active' : ''?>">
        <a class="nav-link collapsed" href="<?= site_url('admin/peminjaman') ?>">
            <i class="fas fa-warehouse"></i>
            <span>Peminjaman Barang</span>
        </a>
    </li>
    <?php if($this->session->userdata('login_session')['role'] == 'admin') :?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Accounts
    </div>


    <li class="nav-item <?= uri_string() == 'admin/user' ? 'active' : ''?>">
        <a class="nav-link collapsed" href="<?= site_url('admin/user') ?>">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
    </li>
    <?php endif ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>