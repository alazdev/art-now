        <!-- drawer -->
        <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
            <div class="mdk-drawer__content js-sidebar-mini" data-responsive-width="992px">

                <div class="sidebar sidebar-mini sidebar-primary sidebar-left simplebar" data-simplebar>
                    <ul class="nav flex-column sidebar-menu mt-3" id="sidebar-mini-tabs">
                        <?php if ($_SESSION['level'] == 0) { ?>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Pesanan" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/pengguna/index">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                                    <span class="sidebar-menu-text">Pesanan</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Pesan" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/chat/index">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                    <span class="sidebar-menu-text">Pesan</span>
                                </a>
                            </li>
                        <?php } else if ($_SESSION['level'] == 2) { ?>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Dasbor" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/index">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                    <span class="sidebar-menu-text">Dasbor</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Calon Arsitek" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/calon_arsitek">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">group</i>
                                    <span class="sidebar-menu-text">Calon Arsitek</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Validasi Pembayaran Pelanggan" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/validasi_pembayaran_pengguna">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">assignment_turned_in</i>
                                    <span class="sidebar-menu-text">Validasi Pembayaran Pelanggan</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Permintaan Penarikan Saldo" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/permintaan_penarikan">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">credit_card</i>
                                    <span class="sidebar-menu-text">Permintaan Penarikan Saldo</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Pesanan Arsitek" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/pesanan_arsitek">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">playlist_add_check</i>
                                    <span class="sidebar-menu-text">Pesanan Arsitek</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Pengguna" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="#mn_pengguna" data-toggle="tab" role="tab" aria-controls="mn_pengguna">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">list</i>
                                    <span class="sidebar-menu-text">Pengguna</span>
                                </a>
                            </li>
                            <?php if($_SESSION['id_user'] == 1){ ?>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Rekening Bank" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/rekening_bank">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_balance</i>
                                    <span class="sidebar-menu-text">Rekening Bank</span>
                                </a>
                            </li>
                            <?php } ?>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Laporan" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="#mn_laporan" data-toggle="tab" role="tab" aria-controls="mn_laporan">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                                    <span class="sidebar-menu-text">Laporan</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Artikel" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/artikel/index">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">web</i>
                                    <span class="sidebar-menu-text">Artikel</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Dasbor" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/arsitek/index">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                    <span class="sidebar-menu-text">Dasbor</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Produk" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/arsitek/produk">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">list</i>
                                    <span class="sidebar-menu-text">Produk</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Pesanan" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/arsitek/pesanan">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">description</i>
                                    <span class="sidebar-menu-text">Pesanan</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item" data-toggle="tooltip" data-title="Pesan" data-placement="right" data-container="body" data-boundary="window">
                                <a class="sidebar-menu-button" href="<?= BASEURL; ?>/chat/index">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">slideshow</i>
                                    <span class="sidebar-menu-text">Pesan</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="sidebar sidebar-light sidebar-left simplebar flex sidebar-secondary" data-simplebar>
                    <div class="tab-content">
                        <div class="tab-pane" id="mn_pengguna">
                            <div class="sidebar-heading">Pengguna</div>
                            <div class="sidebar-block p-0">
                                <ul class="sidebar-menu">
                                    <?php if($_SESSION['id_user'] == 1){ ?>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/data_admin">
                                            <span class="sidebar-menu-text">Admin</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/data_arsitek">
                                            <span class="sidebar-menu-text">Arsitek</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/data_pengguna">
                                            <span class="sidebar-menu-text">Pelanggan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="mn_laporan">
                            <div class="sidebar-heading">Laporan</div>
                            <div class="sidebar-block p-0">
                                <ul class="sidebar-menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/laporan_user">
                                            <span class="sidebar-menu-text">Pengguna</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/laporan_produk">
                                            <span class="sidebar-menu-text">Produk Arsitek</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/laporan_transaksi">
                                            <span class="sidebar-menu-text">Transaksi</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?= BASEURL; ?>/admin/laporan_saldo">
                                            <span class="sidebar-menu-text">Saldo Arsitek</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // END drawer -->
    </div>
    <!-- // END drawer-layout -->

</div>
<!-- // END header-layout__content -->

</div>
<!-- // END header-layout -->

<!-- App Settings FAB -->
<div id="app-settings">
    <app-settings layout-active="mini" :layout-location="{
      'default': 'index.html',
      'fixed': 'fixed-dashboard.html',
      'fluid': 'fluid-dashboard.html',
      'mini': 'mini-dashboard.html'
    }"></app-settings>
</div>

<!-- jQuery -->
<script src="<?= BASEURL; ?>/assets-admin/vendor/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?= BASEURL; ?>/assets-admin/vendor/popper.min.js"></script>
<script src="<?= BASEURL; ?>/assets-admin/vendor/bootstrap.min.js"></script>

<!-- Simplebar -->
<script src="<?= BASEURL; ?>/assets-admin/vendor/simplebar.min.js"></script>

<!-- DOM Factory -->
<script src="<?= BASEURL; ?>/assets-admin/vendor/dom-factory.js"></script>

<!-- MDK -->
<script src="<?= BASEURL; ?>/assets-admin/vendor/material-design-kit.js"></script>

<!-- App -->
<script src="<?= BASEURL; ?>/assets-admin/js/toggle-check-all.js"></script>
<script src="<?= BASEURL; ?>/assets-admin/js/check-selected-row.js"></script>
<script src="<?= BASEURL; ?>/assets-admin/js/dropdown.js"></script>
<script src="<?= BASEURL; ?>/assets-admin/js/sidebar-mini.js"></script>
<script src="<?= BASEURL; ?>/assets-admin/js/app.js"></script>

<!-- App Settings (safe to remove) -->
<!-- <script src="<?= BASEURL; ?>/assets-admin/js/app-settings.js"></script> -->

<!-- Quill -->
<script src="<?= BASEURL; ?>/assets-admin/vendor/quill.min.js"></script>
<script src="<?= BASEURL; ?>/assets-admin/js/quill.js"></script>

<!-- Flatpickr -->
<script src="<?= BASEURL; ?>/assets-admin/vendor/flatpickr/flatpickr.min.js"></script>
<script src="<?= BASEURL; ?>/assets-admin/js/flatpickr.js"></script>

<!-- Global Settings -->
<script src="<?= BASEURL; ?>/assets-admin/js/settings.js"></script>

<!-- Chart.js -->
<script src="<?= BASEURL; ?>/assets-admin/vendor/Chart.min.js"></script>

<!-- App Charts JS -->
<script src="<?= BASEURL; ?>/assets-admin/js/charts.js"></script>

<!-- Chart Samples -->
<script src="<?= BASEURL; ?>/assets-admin/js/page.dashboard.js"></script>

<!-- Vector Maps -->
<script src="<?= BASEURL; ?>/assets-admin/vendor/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= BASEURL; ?>/assets-admin/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="<?= BASEURL; ?>/assets-admin/js/vector-maps.js"></script>
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script>
    (function() {
        // ENABLE sidebar menu tabs
        $('#sidebar-mini-tabs [data-toggle="tab"]').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        });
    })()
</script>
<script>
    function load_notification(view = '')
    {
        $.ajax({
            url:"<?=BASEURL?>/user/notifikasi",
            method:"POST",
            data:{view:view},
            dataType:"json",
            success:function(data)
            {
                $('.notifikasi-div').html(data.notifikasi);
                if(data.belum_dilihat > 0)
                {
                    $('#indikator').addClass("navbar-notifications-indicator");
                }
            }
        });
    }
    $(document).ready(function(){
        load_notification();
    });
    function lihat(view = ''){
        $.ajax({
            url:"<?=BASEURL?>/user/lihat_notifikasi",
            method:"POST",
            data:{view:view},
            dataType:"json",
            success:function(data)
            {
                $('#indikator').removeClass("navbar-notifications-indicator");
            }
        });
    }
    function bersihkan(view = ''){
        $.ajax({
            url:"<?=BASEURL?>/user/bersihkan_notifikasi",
            method:"POST",
            data:{view:view},
            dataType:"json",
            success:function(data)
            {
                load_notification();
            }
        });
    }
</script>

</body>

</html>