<?php include(__DIR__ . '/../../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Laporan Transaksi</li>
                    </ol>
                </nav>
                <h1 class="m-0">Laporan Transaksi</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-12 card-body">
                    <form action="<?= BASEURL ?>/admin/export_transaksi" method="post">
                        <div class="card-body">
                            <button type="submit" class="btn btn-info form-control col-md-12">Export Laporan</button>
                        </div>
                    </form>
                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th>Nomor Transaksi</th>
                                    <th>Metode Transaksi</th>
                                    <th>Nomor Pembayaran/Rekening</th>
                                    <th>Total Dibayar</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email Pengguna</th>
                                    <th>Telepon Pengguna</th>
                                    <th>Nama Arsitek</th>
                                    <th>Email Arsitek</th>
                                    <th>Telepon Arsitek</th>
                                    <th>Judul Produk</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="staff02">
                                <?php foreach($data['transaksis'] as $transaksi) { ?>
                                <tr>
                                    <td><?= $transaksi['nomor_transaksi']; ?></td>
                                    <td><?= $transaksi['metode_pembayaran']; ?></td>
                                    <td><?= $transaksi['nomor_pembayaran']; ?></td>
                                    <td>Rp <?= number_format($transaksi['total_dibayar'], 0, ',', '.'); ?></td>
                                    <td><?= $transaksi['nama_lengkap_pengguna']; ?></td>
                                    <td><?= $transaksi['email_pengguna']; ?></td>
                                    <td><?= $transaksi['telepon_pengguna']; ?></td>
                                    <td><?= $transaksi['nama_lengkap_arsitek']; ?></td>
                                    <td><?= $transaksi['email_arsitek']; ?></td>
                                    <td><?= $transaksi['telepon_arsitek']; ?></td>
                                    <td><?= $transaksi['judul_produk']; ?></td>
                                    <td><?= date('Y-m-d H:i', strtotime($transaksi['dibuat_pada']));?></td>
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
            "searching":false
        });
    } );
</script>
<?php include(__DIR__ . '/../../layouts/footer.php'); ?>