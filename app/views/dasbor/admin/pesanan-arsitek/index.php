<?php include(__DIR__ . '/../../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Data Pesanan Arsitek</li>
                    </ol>
                </nav>
                <h1 class="m-0">Data Pesanan Arsitek</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-12 card-body">
                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Nama Pengguna</th>
                                    <th>Nama Arsitek</th>
                                    <th>Judul Produk</th>
                                    <th>Dipesan Pada</th>
                                    <th>Terakhir Diperbaharui</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="list" id="staff02">
                                <?php foreach($data['pesanans'] as $pesanan) { ?>
                                <tr>
                                    <td>
                                        <?php if($pesanan['status'] == -1) { ?>
                                            <span class="badge badge-danger">PERMINTAAN PESANAN DITOLAK ARSITEK</span>
                                        <?php } else if($pesanan['status'] == 0) { ?>
                                            <span class="badge badge-info">MENUNGGU KONFRIMASI PERMINTAAN OLEH ARSITEK</span>
                                        <?php } else if($pesanan['status'] == 1) { ?>
                                            <span class="badge badge-warning">PROYEK/PESANAN SEDANG DIKERJAKAN</span>
                                        <?php } else if($pesanan['status'] == 2) { ?>
                                            <span class="badge badge-warning">MENUNGGU PEMBAYARAN DARI PELANGGAN</span>
                                        <?php } else if($pesanan['status'] == 3) { ?>
                                            <span class="badge badge-success">SELESAI</span>
                                        <?php } ?>
                                    </td>
                                    <td><a href="../user/profile_pengguna/<?= $pesanan['id_pengguna']?>" target="_blank"><?= $pesanan['nama_lengkap_pengguna']; ?></td></a>
                                    <td><a href="../user/profile_arsitek/<?= $pesanan['id_arsitek']?>" target="_blank"><?= $pesanan['nama_lengkap_arsitek']; ?></td></a>
                                    <td><a href="../home/produk/<?= $pesanan['id_produk']?>" target="_blank"><?= $pesanan['judul']; ?></td></a>
                                    <td><?= date('d-m-Y H:i', strtotime($pesanan['dibuat_pada'])); ?></td>
                                    <td><?= date('d-m-Y H:i', strtotime($pesanan['diperbaharui_pada'])); ?></td>
                                    <td align="right" style="white-space: nowrap;">
                                        <a href="riwayat_pembayaran_pengguna/<?= $pesanan['id_pesanan']; ?>" class="text-muted"><i class="material-icons">assignment_turned_in</i> Riwayat Pembayaran</a>
                                    </td>
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
            "columns": [
                null,
                null,
                null,
                null,
                null,
                null,
                { "searchable": false, "orderable": false},
            ],
            'aaSorting': [],
            'order': [],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
            }
        });
    } );
</script>
<?php include(__DIR__ . '/../../layouts/footer.php'); ?>