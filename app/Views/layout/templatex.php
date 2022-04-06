<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= csrf_meta() ?>
    <title> <?= isset($title) ? 'Bani Asror / ' . $title : 'Bani Asror'; ?> </title>

    <!-- Aplikasi -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.css">
    <script src="<?= base_url(); ?>/assets/vendors/jquery/jquery.min.js"></script>

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

    <!-- header section -->
    <?= $this->renderSection('header') ?>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="<?= site_url(); ?>"><img src="<?= base_url(); ?>/assets/images/logo.png"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">

                    <ul class="menu">
                        <li class="sidebar-title">Home</li>

                        <li class="sidebar-item active">
                            <a href="<?= site_url(); ?>" class='sidebar-link'>
                                <i class="bi bi-house-fill"></i> <span>Dashboard</span>
                            </a>
                        </li>

                    </ul>
                    <!--  -->

                    <ul class="menu">
                        <li class="sidebar-title">Bani</li>

                        <li class="sidebar-item">
                            <a href="<?= site_url('member/1') ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/faces/male.svg'); ?>" alt="" style="height:20px;"> <span>Asyiq</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?= site_url('member/2') ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/faces/male.svg'); ?>" alt="" style="height:20px;"> <span>Nur Khotim</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?= site_url('member/3') ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/faces/male.svg'); ?>" alt="" style="height:20px;"> <span>Umar</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?= site_url('member/4') ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/faces/male.svg'); ?>" alt="" style="height:20px;"> <span>Muhyiddin</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?= site_url('member/5') ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/faces/female.svg'); ?>" alt="" style="height:20px;"> <span>Bintu Asror 1</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= site_url('member/6') ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/faces/female.svg'); ?>" alt="" style="height:20px;"> <span>Bintu Asror 2</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?= site_url('member/7') ?>" class='sidebar-link'>
                                <img src="<?= base_url('assets/images/faces/female.svg'); ?>" alt="" style="height:20px;"> <span>Bintu Asror 3</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-0">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3 class="my-0">Bani Asror</h3>
                            <p class="text-subtitle text-muted">Silsilah Bani Asror, Bujuk Langgundih</p>
                        </div>

                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><button class="btn btn-outline-primary" onclick="showModalCari()"><i class="bi bi-search"></i> Cari</button></li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
                <section class="section">
                    <div class="card shadow-sm">
                        <?= $this->renderSection('content'); ?>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p><?= date('Y'); ?> &copy; oets</p>
                    </div>
                    <!-- <div class="float-end">
                        <p>trakteer.com</p>
                    </div> -->
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url(); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/mazer.js"></script>
    <script src="<?= base_url(); ?>/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- footer section -->
    <?= $this->renderSection('footer') ?>

    <!-- modal cari -->
    <?= view('member/modal-cari') ?>
</body>

</html>