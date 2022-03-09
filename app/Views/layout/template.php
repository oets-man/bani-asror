<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= isset($title) ? $title : 'Bani Asror'; ?> </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?= base_url(); ?>/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Jalur</li>

                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i> <span>Asyiq1</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i> <span>Asyiq2</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i> <span>Asyiq3</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i> <span>Asyiq4</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i> <span>Asyiq5</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i> <span>Asyiq6</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i> <span>Asyiq7</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Bani Asror</h3>
                            <p class="text-subtitle text-muted">Silsilah Bani Asror, Bujuk Langgundih</p>
                        </div>
                        <!-- <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
                                </ol>
                            </nav>
                        </div> -->
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <?= $this->renderSection('content'); ?>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p><?= date('Y'); ?> &copy; oets</p>
                    </div>
                    <div class="float-end">
                        <!-- <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p> -->
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url(); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url(); ?>/assets/js/mazer.js"></script>
</body>

</html>