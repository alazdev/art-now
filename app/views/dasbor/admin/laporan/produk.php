<?php include(__DIR__ . '/../../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Laporan Produk Arsitek</li>
                    </ol>
                </nav>
                <h1 class="m-0">Laporan Produk Arsitek</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-12 card-body">
                    <form action="<?= BASEURL ?>/admin/export_produk" method="post">
                        <div class="card-body">
                            <button type="submit" class="btn btn-info form-control col-md-12">Ekspor Laporan</button>
                        </div>
                    </form>
                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th>Judul Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Rating</th>
                                    <th align="center">Status</th>
                                    <th>Nama Arsitek</th>
                                    <th>Email Arsitek</th>
                                    <th>Telepon Arsitek</th>
                                    <th>Dibuat Pada</th>
                                    <th>Diperbaharui Pada</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="staff02">
                                <?php foreach($data['produks'] as $produk) { ?>
                                <tr>
                                    <td><?= $produk['judul']; ?></td>
                                    <td>Rp <?= number_format($produk['harga'], 0, ',', '.'); ?></td>
                                    <td><span class="badge badge-warning"><?= number_format($produk['rating'], 1); ?></span></td>
                                    <td align="center">
                                        <?php if($produk['status'] == 1 ) { ?>
                                            <span class="badge badge-success">AKTIF</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">NONAKTIF</span>
                                        <?php } ?>
                                    </td>
                                    <td><?= $produk['nama_lengkap']; ?></td>
                                    <td><?= $produk['email']; ?></td>
                                    <td><?= $produk['telepon']; ?></td>
                                    <td><?= date('Y-m-d H:i', strtotime($produk['dibuat_pada']));?></td>
                                    <td><?= date('Y-m-d H:i', strtotime($produk['diperbaharui_pada']));?></td>
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