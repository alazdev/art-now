<?php include(__DIR__ . '/../../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Laporan Keuangan</li>
                    </ol>
                </nav>
                <h1 class="m-0">Laporan Keuangan</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-12 card-body">
                    <form action="<?= BASEURL ?>/admin/export_keuangan" method="post">
                        <div class="card-body">
                            <button type="submit" class="btn btn-info form-control col-md-12">Ekspor Laporan</button>
                        </div>
                    </form>
                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th>Arsitek</th>
                                    <th>Keterangan</th>
                                    <th>Nominal</th>
                                    <th>status</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="staff02">
                                <?php foreach($data['keuangans'] as $keuangan) { ?>
                                <tr>
                                    <td><a href="<?= BASEURL ?>/user/profile_arsitek/<?= $keuangan['id_user']; ?>" target="_BLANk"><?= $keuangan['nama_lengkap']; ?></a></td>
                                    <td><?= $keuangan['keterangan']; ?></td>
                                    <td>
                                        <?php if($keuangan['nominal'] > 0) {?>
                                            <p class="text-success">+<?= number_format($keuangan['nominal'], 0, ',', '.'); ?></p>
                                        <?php } else { ?>
                                            <?php if($keuangan['keterangan'] == "Biaya admin penarikan saldo") {?>
                                                <p class="text-muted">=<?= number_format($keuangan['nominal']*-1, 0, ',', '.'); ?></p>
                                            <?php } else { ?>
                                                <p class="text-danger"><?= number_format($keuangan['nominal'], 0, ',', '.'); ?></p>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($keuangan['nominal'] > 0) {?>
                                            Uang Masuk
                                        <?php } else { ?>
                                            <?php if($keuangan['keterangan'] == "Biaya admin penarikan saldo") {?>
                                                Uang Tetap
                                            <?php } else { ?>
                                                Uang Keluar
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                    <td><?= date('Y-m-d H:i', strtotime($keuangan['dibuat_pada']));?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('.table').DataTable({
            "searching":false,
            'aaSorting': [],
            'order': [],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
            }
        });
    } );
</script>
<?php include(__DIR__ . '/../../layouts/footer.php'); ?>