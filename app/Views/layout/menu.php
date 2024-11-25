<style>
    .logo {
        width: 25%;
        height: 10vh;
        margin-top: 15px;
    }
</style>

<div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="<?= base_url('template/assets/img/logo.png') ?>" alt="Selamat Datang di Sistem Informasi Penyerapan Anggaran" class="logo">
            <h5 class="text tex mt-2 mb-0">"BINOS"</h5>
            <p class="text text-warning">Pembinaan, At Your Service</p>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('/') ?>">BIN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header mt-2">BERANDA</li>
            <li class="nav-item dropdown">
                <a href="<?= base_url('/') ?>" class="nav-link"><i class="fa-solid fa-house"></i><span>Beranda</span></a>
            </li>
            <li class="menu-header">DATA MASTER</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('akun/pembinaan/index') ?>">Akun Pembinaan</a></li>
                    <li><a class="nav-link" href="<?= base_url('master/pagu/index') ?>">Pagu Anggaran</a></li>
                </ul>
            </li>
            <li class="menu-header">PENCAIRAN</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Pencairan Anggaran</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('pencairan/pembinaan/index') ?>">Pembinaan</a></li>
                    <li><a class="nav-link" href=#>Intelijen</a></li>
                    <li><a class="nav-link" href=#>Pidana Umum</a></li>
                    <li><a class="nav-link" href=#>Pidana Khusus</a></li>
                    <li><a class="nav-link" href=#">Datun</a></li>
                    <li><a class="nav-link" href=#>PAPBB</a></li>
                </ul>
            </li>
            <li class="menu-header">TRANSAKSI</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Penyerapan Anggaran</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url('transaksi/realisasi/index') ?>">Realisasi</a></li>
                </ul>
            </li>
            <li class="menu-header">Account</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link"><i class="far fa-user"></i> <span>Akun Pengguna</span></a>
            </li>
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Documentation
                </a>
            </div>
    </aside>
</div>