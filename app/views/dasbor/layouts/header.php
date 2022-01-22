<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ArtNow</title>

    <!-- Favicon Link -->
    <link rel="shortcut icon" type="image/png" href="<?= BASEURL; ?>/assets-user/images/favicon.png">

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Simplebar -->
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/vendor/simplebar.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/app.css" rel="stylesheet">
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133433427-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-133433427-1');
    </script>


    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '327167911228268');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=327167911228268&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Quill Theme -->
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/vendor-quill.css" rel="stylesheet">
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/vendor-quill.rtl.css" rel="stylesheet">

    <!-- Flatpickr -->
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/vendor-flatpickr.css" rel="stylesheet">
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/vendor-flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

    <!-- Vector Maps -->
    <link type="text/css" href="<?= BASEURL; ?>/assets-admin/vendor/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?= BASEURL; ?>/assets-admin/vendor/jquery.min.js"></script>
  
</head>

<body class="layout-mini">
    <div id="modal-large" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-large-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-large-title">Form Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= BASEURL.'/arsitek/tambah_produk'?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-12 card-form__body card-body">
                                    <div class="form-group">
                                        <label for="judul">Judul:</label>
                                        <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan Judul..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar:</label>
                                        <input type="file" name="gambar[]" class="form-control" id="gambar" accept="image/png, image/jpeg" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga:</label>
                                        <input type="number" name="harga" class="form-control" id="harga" min="1000" placeholder="Masukkan Harga..." required>
                                    </div>
                                    <label>Deskripsi</label>
                                    <div style="height: 150px;" data-toggle="quill" id="deskripsi" data-quill-placeholder="Deskripsi Produk..."></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="tambah">Tambahkan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modal-tambah-admin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-large-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-large-title">Form Tambah Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= BASEURL.'/admin/tambah_admin'?>">
                    <div class="modal-body">
                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-12 card-form__body card-body">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap:</label>
                                        <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Masukkan Nama Lengkap..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="text" name="password" class="form-control" id="password" placeholder="Masukkan Password..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">Telepon:</label>
                                        <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Masukkan Telepon..." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="tambah">Tambahkan Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="modal-delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content bg-danger">
                <div class="modal-body text-center p-4">
                    <i class="material-icons icon-40pt text-white mb-2">report_problem</i>
                    <p class="text-white mt-3" id="text-delete">[data tidak ditemukan]?</p>
                    <a id="delete-url" href="#" class="btn btn-light my-2">Continue</a>
                </div> <!-- // END .modal-body -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->
    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark  pr-0" id="navbar" data-primary>
                    <div class="container-fluid p-0">

                        <!-- Navbar toggler -->

                        <button class="navbar-toggler navbar-toggler-custom navbar-toggler-right d-block" type="button" data-toggle="sidebar">
                            <span class="material-icons">apps</span>
                        </button>


                        <!-- Navbar Brand -->
                        <a href="<?= BASEURL; ?>/index" class="navbar-brand ">
                            <img class="navbar-brand-icon" src="<?= BASEURL; ?>/assets-user/images/favicon.png" width="22" alt="Stack">
                            <span>Stack</span>
                        </a>
                        <ul class="nav navbar-nav ml-auto d-none d-md-flex">
                            <li class="nav-item dropdown">
                                <a onclick="lihat()" href="#notifications_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                    <i class="material-icons nav-icon" id="indikator">notifications</i>
                                </a>
                                <div id="notifications_menu" class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
                                    <div class="dropdown-item d-flex align-items-center py-2">
                                        <span class="flex navbar-notifications-menu__title m-0">Notifikasi</span>
                                        <a onclick="bersihkan()" href="javascript:void(0)" class="text-muted"><small>Bersihkan</small></a>
                                    </div>
                                    <div class="navbar-notifications-menu__content" data-simplebar>
                                        <div class="py-2 notifikasi-div">
                                            
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                            <li class="nav-item dropdown">
                                <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                    <?php if($_SESSION['foto'] == null) { ?>
                                        <img src="https://via.placeholder.com/32x32" class="rounded-circle" width="32" height="34px" alt="Frontted">
                                    <?php } else { ?>
                                        <img src="<?= BASEURL.'/image/profile/'.$_SESSION['foto'];?>" class="rounded-circle" width="32" height="34px" alt="img">
                                    <?php }?>
                                    <span class="ml-1 d-flex-inline">
                                        <span class="text-light"><?= $_SESSION['nama_lengkap']; ?></span>
                                    </span>
                                </a>
                                <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-item-text dropdown-item-text--lh">
                                        <div><strong><?= $_SESSION['nama_lengkap']; ?></strong></div>
                                        <div><?= $_SESSION['email']; ?></div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= BASEURL; ?>/user/profile">Profil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= BASEURL; ?>/user/logout">Keluar</a>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
        <!-- // END Header -->
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">
            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">