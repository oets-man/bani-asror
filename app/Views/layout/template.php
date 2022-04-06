<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= csrf_meta() ?>
    <title> <?= isset($title) ? 'Bani Asror / ' . $title : 'Bani Asror'; ?> </title>

    <!-- aplikasi -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/fontawesome-free-6.1.1-web/css/all.min.css" type="text/css">
    <script src="<?= base_url(); ?>/assets/vendors/jquery/jquery.min.js"></script>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url() ?>/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url() ?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- header section -->
    <?= $this->renderSection('header') ?>

    <style>
        .btn-sm {
            padding: 4px 8px
        }

        .table> :not(caption)>*>* {
            padding: .6rem .4rem;
            /* background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); */
        }

        /* .table td,
        .table th {
            padding: 10px 4px;
        } */

        .card-header {
            background-color: whitesmoke;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- side bar -->
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="<?= base_url() ?>/assets/images/logo1.png" style="width: 200px; height: auto;">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Bani</li>

                        <li class="sidebar-item">
                            <a href="<?= site_url('member/1'); ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/avatars/male.svg'); ?>" alt="" style="height:18px;">
                                <span>Asyiq</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/2'); ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/avatars/male.svg'); ?>" alt="" style="height:18px;">
                                <span>Nur Khotim</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/2'); ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/avatars/male.svg'); ?>" alt="" style="height:18px;">
                                <span>Umar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/4'); ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/avatars/male.svg'); ?>" alt="" style="height:18px;">
                                <span>Muhyiddin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/5'); ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/avatars/female.svg'); ?>" alt="" style="height:18px;">
                                <span>Bintu Asror 1</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/6'); ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/avatars/female.svg'); ?>" alt="" style="height:18px;">
                                <span>Bintu Asror 2</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/7'); ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/avatars/female.svg'); ?>" alt="" style="height:18px;">
                                <span>Bintu Asror 3</span>
                            </a>
                        </li>

                        <li class='sidebar-title'>Tentang</li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('about/contact'); ?>" class='sidebar-link'>
                                <i class="fa-solid fa-phone"></i>
                                <span>Huhungi Kami</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- end side bar item -->
                <button class="sidebar-toggler btn x"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>
        <!-- end side bar -->


        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <h2 class="ms-2 my-0" style="font-variant: small-caps;">
                    Silsilah Bani Asror
                </h2>
                <h2 class="ms-3 d-none d-sm-inline-block form-inline me-auto ms-md-2 my-md-0" style="font-variant: normal; font-weight: lighter; font-style: italic;font-size:large;">
                    (Bujuk Langgundih)
                </h2>

                <!-- <h2 class="ms-3 d-none d-sm-inline-block form-inline me-auto ms-md-2 my-md-0 text-danger" style="font-variant: small-caps;">
                    Silsilah Bani Asror <span style="font-variant: normal; font-weight: lighter; font-style: italic;font-size:large;">(Bujuk Langgundih)</span>
                </h2> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">

                        <li class="nav-item mx-2">
                            <button class="btn btn-sm btn-outline-primary" onclick="showModalCari()"><i class="fa-solid fa-magnifying-glass"></i><span class="ms-1 d-none d-lg-inline"> Cari</span></button>
                        </li>

                        <li class="nav-item mx-2">
                            <a href="javascript:history.back()" class="btn btn-sm btn-outline-success"><i class="fas fa-share fa-flip-horizontal"></i><span class="ms-1 d-none d-lg-inline"> Kembali</span></a>
                        </li>

                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="user"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-item"><strong>User</strong></div>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid py-0">
                <!-- <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Radio</h3>
                            <p class="text-subtitle text-muted">Choose one from the list with checkbox</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Radio</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div> -->
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-0">
                                <div class="card-header alert alert-light-info m-0">
                                    <h4 class="card-title my-0 px-3"><?= $header ?></h4>
                                </div>
                                <div class="card-body p-3">

                                    <!-- footer section -->
                                    <?= $this->renderSection('content') ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2020 &copy; Voler</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="http://ahmadsaugi.com">Ahmad Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="<?= base_url() ?>/assets/js/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/app.js"></script>
    <script src="<?= base_url() ?>/assets/js/main.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- footer section -->
    <?= $this->renderSection('footer') ?>

    <!-- modal cari -->
    <?= view('member/modal-cari') ?>
</body>

</html>