<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('assets/images/favicon') ?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/images/favicon') ?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('assets/images/favicon') ?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('assets/images/favicon') ?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('assets/images/favicon') ?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('assets/images/favicon') ?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/images/favicon') ?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/images/favicon') ?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicon') ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/images/favicon') ?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon') ?>/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url('assets/images/favicon') ?>/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url('assets/images/favicon') ?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title> <?= isset($title) ? 'Bani Asror / ' . $title : 'Bani Asror'; ?> </title>
    <?= csrf_meta() ?>

    <!-- Aplikasi -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.css">
    <script src="<?= base_url(); ?>/assets/vendors/jquery/jquery.min.js"></script>

    <!-- header section -->
    <?= $this->renderSection('header') ?>

</head>

<body>


    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active bg-light">
                <div class="sidebar-header pt-4">
                    <a href="<?= site_url('home/index'); ?>">
                        <img class="" src="<?= base_url(); ?>/assets/images/logo.png" style="width: 100%; height: auto;">
                    </a>
                </div>


                <div class="sidebar-menu">
                    <ul class="menu">
                        <!-- <li class="sidebar-title">Home</li>
                        <li class="sidebar-item active">
                            <a href="<?= site_url('home/index'); ?>" class="sidebar-link">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Dashboard</span>
                            </a>
                        </li> -->

                        <li class="sidebar-title">BANI</li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/1'); ?>" class="sidebar-link">
                                <i class="bi bi-person-fill"></i>
                                <span>Asyiq</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/2'); ?>" class="sidebar-link">
                                <i class="bi bi-person-fill"></i>
                                <span>Nur Khotim</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/3'); ?>" class="sidebar-link">
                                <i class="bi bi-person-fill"></i>
                                <span>Umar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/4'); ?>" class="sidebar-link">
                                <i class="bi bi-person-fill"></i>
                                <span>Muhyiddin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/5'); ?>" class="sidebar-link">
                                <i class="bi bi-person-fill"></i>
                                <span>Bintu Asror 1</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/6'); ?>" class="sidebar-link">
                                <i class="bi bi-person-fill"></i>
                                <span>Bintu Asror 2</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/7'); ?>" class="sidebar-link">
                                <i class="bi bi-person-fill"></i>
                                <span>Bintu Asror 3</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class="py-0 px-2">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h2 class="ms-3 d-none d-sm-inline-block form-inline me-auto ms-md-2 my-md-0 text-danger" style="font-variant: small-caps;">
                    Silsilah Bani Asor <span style="font-variant: normal; font-weight: lighter; font-style: italic;font-size:large;">(Bujuk Langgundih)</span></h2>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">

                        <li class="nav-item">
                            <button onclick="showModalCari()" class="btn btn-sm btn-outline-primary mx-2"><i class="bi bi-search"></i><span class="ms-1 d-none d-lg-inline"> Cari</span></button>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:history.back()" class="btn btn-sm btn-outline-success"><i class="bi bi-arrow-left-square-fill"></i><span class="ms-1 d-none d-lg-inline"> Kembali</span></a>
                        </li>

                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="<?= base_url(); ?>/assets/images/avatars/male.svg" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block text-success">Nama User</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="<?= site_url('auth/reset'); ?>"><i class="bi bi-key"></i> Ganti Password</a>
                                <a class="dropdown-item" href="<?= site_url('auth/logout'); ?>"><i class="bi bi-x-circle"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid pt-0">
                <!-- <div class="page-title">
                    <h3>Dashboard</h3>
                    <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
                </div> -->

                <!-- start flashdata -->
                <?php
                $session = session();
                $errors = $session->getFlashdata('errors');
                $success = $session->getFlashdata('success');
                if ($errors != null) : ?>
                    <div class="alert alert-light-warning color-danger alert-dismissible fade show" role="alert">
                        <h5 class="alert-heading">Terjadi Kesalahan!</h5>
                        <ul class="my-0">
                            <?php foreach ($errors as $err) : ?>
                                <li><?= $err ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php
                    unset($_SESSION['errors']);
                endif;
                if ($success != null) : ?>
                    <div class="alert alert-light-success color-primary alert-dismissible fade show text-center" role="alert">
                        <?= $success; ?>
                    </div>
                <?php
                    unset($_SESSION['success']);
                endif; ?>
                <!-- end flashdata -->

                <div class="card shadow">

                    <!-- content section content -->
                    <?= $this->renderSection('content') ?>
                </div>


            </div>

            <!-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2020 &copy; Voler</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="http://ahmadsaugi.com">Ahmad Saugi</a></p>
                    </div>
                </div>
            </footer> -->
        </div>

    </div>



    <script src="<?= base_url() ?>/assets/js/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?= base_url() ?>/assets/js/app.js"></script>
    <script src="<?= base_url() ?>/assets/js/main.js"></script>

    <!-- footer -->
    <?= $this->renderSection('footer') ?>

    <!-- modal cari -->
    <?= view('member/modal-cari') ?>
</body>

</html>