<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-water"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SSA SHL</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/pelanggan">
            <i class="fas fa-fw fa-users"></i>
            <span>Pelanggan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master
    </div>

    <!-- Nav Item - Masalah -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/masalah">
            <i class="fas fa-fw fa-exclamation-triangle"></i>
            <span>Masalah</span></a>
    </li>

    <!-- Nav Item - Wilayah -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/wilayah">
            <i class="fas fa-fw fa-map-marked-alt"></i>
            <span>Wilayah</span></a>
    </li>

    <!-- Nav Item - Tipe -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/tipe">
            <i class="fas fa-fw fa-tags"></i>
            <span>Tipe</span></a>
    </li>

    <!-- Nav Item - User Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
            <i class="fas fa-fw fa-user-shield"></i>
            <span>User Management</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Roles:</h6>
                <a class="collapse-item" href="<?= base_url(); ?>/user">All Users</a>
                <a class="collapse-item" href="<?= base_url(); ?>/user/admin">Admin</a>
                <a class="collapse-item" href="<?= base_url(); ?>/user/client">Client</a>
                <a class="collapse-item" href="<?= base_url(); ?>/user/customer">Customer</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transactions
    </div>

    <!-- Nav Item - Pulsa -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/pulsa">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Pulsa</span></a>
    </li>
    
    <!-- Nav Item - Riwayat -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/riwayat">
            <i class="fas fa-fw fa-history"></i>
            <span>Riwayat Beli</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>