<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>BINOS &mdash; KEJARI MATARAM</title>

    <!-- General CSS Files (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Template CSS (Lokal) -->
    <link rel="stylesheet" href="<?= base_url('template/assets/css/style.css') ?>">
    <!-- <small>Debug CSS Style: <?= base_url('template/assets/css/style.css') ?></small> -->
    <link rel="stylesheet" href="<?= base_url('template/assets/css/components.css') ?>">
    <!-- <small>Debug CSS Components: <?= base_url('template/assets/css/components.css') ?></small> -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- NAVBAR -->
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3 mt-4">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                        </li>
                        <h3 class="text text-white"> Penyerapan Anggaran - KEJARI MATARAM </h3>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <!-- PROFILE -->
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url('profile.jpeg') ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Defi Nada</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- SIDEBAR -->
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <?= $this->include('layout/menu') ?>
                </aside>
            </div>

            <!-- CONTENT -->
            <div class="main-content">
                <?= $this->renderSection('content') ?>
            </div>

            <!-- FOOTER -->
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> Design By <a href="#">Defi Nada</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>

    <!-- Template JS File (Lokal) -->
    <script src="<?= base_url('template/assets/js/stisla.js') ?>"></script>
    <!-- <small>Debug JS Stisla: <?= base_url('template/assets/js/stisla.js') ?></small> -->
    <script src="<?= base_url('template/assets/js/scripts.js') ?>"></script>
    <!-- <small>Debug JS Scripts: <?= base_url('template/assets/js/scripts.js') ?></small> -->
    <script src="<?= base_url('template/assets/js/custom.js') ?>"></script>
    <!-- <small>Debug JS Custom: <?= base_url('template/assets/js/custom.js') ?></small> -->
</body>

</html>
