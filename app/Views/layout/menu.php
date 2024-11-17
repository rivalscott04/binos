<div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <h5 class="text tex mt-3">"BINOS"</h5>
            <p class="text text-warning">Pembinaan, On Your Service</p>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BIN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">BERANDA</li>
            <li class="nav-item dropdown">
                <a href="<?= site_url('/') ?>" class="nav-link"><i class="fa-solid fa-house"></i><span>Beranda</span></a>
            </li>
            <li class="menu-header">DATA MASTER</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= site_url('/akun/pembinaan/index') ?>">Akun Pembinaan</a></li>
                    <li><a class="nav-link" href="<?= site_url('/master/program/index') ?>">Program</a></li>
                    <li><a class="nav-link" href="<?= site_url('/master/kegiatan/index') ?>">Kegiatan</a></li>
                    <li><a class="nav-link" href="<?= site_url('/master/output/index') ?>">Output</a></li>
                    <li><a class="nav-link" href="<?= site_url('/master/suboutput/index') ?>">Sub Output</a></li>
                    <li><a class="nav-link" href="<?= site_url('/master/komponen/index') ?>">Komponen</a></li>
                    <li><a class="nav-link" href="<?= site_url('/master/subkomponen/index') ?>">Sub Komponen</a></li>
                    <li><a class="nav-link" href="<?= site_url('/master/akun/index') ?>">Akun</a></li>
                    <li><a class="nav-link" href="<?= site_url('/master/item/index') ?>">Item</a></li>
                </ul>
            </li>
            <li class="menu-header">PENCARIAN</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Pencairan Anggaran</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= site_url('/pencairan/pembinaan/index') ?>">Pembinaan</a></li>
                    <li><a class="nav-link" href="<?= site_url('/pencairan/intelijen/index') ?>">Intelijen</a></li>
                    <li><a class="nav-link" href="<?= site_url('/pencairan/pidanaumum/index') ?>">Pidana Umum</a></li>
                    <li><a class="nav-link" href="<?= site_url('/pencairan/pidanakhusus/index') ?>">Pidana Khusus</a></li>
                    <li><a class="nav-link" href="<?= site_url('/pencairan/datun/index') ?>">Datun</a></li>
                    <li><a class="nav-link" href="<?= site_url('/pencairan/papbb/index') ?>">PAPBB</a></li>
                </ul>
            </li>
            <li class="menu-header">TRANSAKSI</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Penyerapan Anggaran</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= site_url('/transaksi/pembinaan/index') ?>">Pembinaan</a></li>
                    <li><a class="nav-link" href="<?= site_url('/transaksi/intelijen/index') ?>">Intelijen</a></li>
                    <li><a class="nav-link" href="<?= site_url('/transaksi/pidanaumum/index') ?>">Pidana Umum</a></li>
                    <li><a class="nav-link" href="<?= site_url('/transaksi/pidanakhusus/index') ?>">Pidana Khusus</a></li>
                    <li><a class="nav-link" href="<?= site_url('/transaksi/datun/index') ?>">Datun</a></li>
                    <li><a class="nav-link" href="<?= site_url('/transaksi/papbb/index') ?>">PAPBB</a></li>
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