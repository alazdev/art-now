<?php include(__DIR__ . '/../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                    </ol>
                </nav>
                <h1 class="m-0">Pesanan</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <?php foreach($data['pesanans'] as $pesanan) { if ($pesanan['status'] >= 1 && $pesanan['status'] <= 2) {?>
            <div class="alert alert-soft-warning d-flex align-items-center card-margin" role="alert">
                <i class="material-icons mr-3">error_outline</i>
                <div class="text-body"><strong> 
                    Sedang Mengerjakan Proyek bersama <a href="<?= BASEURL.'/user/profile_arsitek/'.$pesanan['id_arsitek'];?>"><?= $pesanan['nama_lengkap_arsitek']; ?></a>.</strong> 
                    <?php if ($pesanan['status'] == 1) { if($pesanan['dokumen']) { ?>
                        Lihat <a class="badge badge-success" href="<?= BASEURL.'/dokumen/'.$pesanan['dokumen']; ?>" download="<?= 'IMB-'.$_SESSION['nama_lengkap'].'-'.$pesanan['dokumen'];?>">IMB</a>. 
                    <?php } else { ?>
                        <span class="badge badge-danger">BELUM ADA IMB</span> <a href="<?= BASEURL.'/pengguna/imb_pesanan/'.$pesanan['id_pesanan'];?>">Klik di sini untuk memasukkan IMB.</a>
                    <?php } } else if ($pesanan['status'] == 2) { ?>
                        <?php if($pesanan['status_pembayaran'] == NULL ) { ?>
                            <a href="pembayaran_pesanan/<?= $pesanan['id_pesanan']; ?>"><span class="badge badge-danger">MENUNGGU PEMBAYARAN</span> Klik di sini untuk membayar.</a>
                        <?php } else if($pesanan['status_pembayaran'] == -1 ) { ?>
                            <a href="pembayaran_pesanan/<?= $pesanan['id_pesanan']; ?>"><span class="badge badge-danger">BUKTI PEMBAYARAN SEBELUMNYA DITOLAK</span></a> Silakan masukkan kembali bukti pembayaran yang benar.
                        <?php } else if($pesanan['status_pembayaran'] == 0 ) { ?>
                            <a href="pembayaran_pesanan/<?= $pesanan['id_pesanan']; ?>"><span class="badge badge-warning">PEMBAYARAN SEDANG DIVALIDASI</span></a>
                        <?php } else if($pesanan['status'] == 3 && $pesanan['status_pembayaran'] == 1) { ?>
                            <span class="badge badge-success">SELESAI</span>
                        <?php } ?>
                    <?php } ?>
                    <?php if($pesanan['status_pembayaran_dp'] == NULL) { ?>
                        <a class="badge badge-danger" href="<?= BASEURL.'/pengguna/pembayaran_dp/'.$pesanan['id_pesanan']; ?>">DP BELUM DIBAYAR</a>
                    <?php } else if($pesanan['status_pembayaran_dp'] == -1) { ?>
                        <a class="badge badge-danger" href="<?= BASEURL.'/pengguna/pembayaran_dp/'.$pesanan['id_pesanan']; ?>">BUKTI PEMBAYARAN SEBELUMNYA DITOLAK</a> Silakan masukkan kembali bukti pembayaran yang benar.
                    <?php } else if($pesanan['status_pembayaran_dp'] == 0) { ?>
                        <a class="badge badge-warning" href="<?= BASEURL.'/pengguna/pembayaran_dp/'.$pesanan['id_pesanan']; ?>">DP SEDANG DIVALIDASI</a>
                    <?php } ?>
                </div>
            </div>
        <?php } } ?>
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-12 card-body">

                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th>Arsitek</th>
                                    <th>Produk</th>
                                    <th align="center">Status</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Diperbaharui</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="list" id="staff02">
                                <?php foreach($data['pesanans'] as $pesanan) { ?>
                                <tr>
                                    <td><a href="<?= BASEURL.'/user/profile_arsitek/'.$pesanan['id_arsitek'];?>"><?= $pesanan['nama_lengkap_arsitek']; ?></a></td>
                                    <td><a href="<?= BASEURL.'/home/produk/'.$pesanan['id_produk'];?>"><?= $pesanan['judul']; ?></a></td>
                                    <td align="center">
                                        <?php if($pesanan['status'] == -1 ) { ?>
                                            <span class="badge badge-danger">DITOLAK</span>
                                        <?php } else if($pesanan['status'] == 0 ) { ?>
                                            <span class="badge badge-info">MENUNGGU</span>
                                        <?php } else if($pesanan['status'] == 1 ) { ?>
                                            <span class="badge badge-warning">SEDANG</span>
                                            <?php if($pesanan['dokumen']) { ?>
                                                <a class="badge badge-success" href="<?= BASEURL.'/dokumen/'.$pesanan['dokumen']; ?>" download="<?= 'IMB-'.$pesanan['nama_lengkap'].'-'.$pesanan['dokumen'];?>">IMB</a>
                                            <?php } else { ?>
                                                <span class="badge badge-danger">BELUM ADA IMB</span>
                                            <?php } ?>
                                            <?php if($pesanan['status_pembayaran_dp'] == NULL) { ?>
                                                <a class="badge badge-danger" href="<?= BASEURL.'/pengguna/pembayaran_dp/'.$pesanan['id_pesanan']; ?>">DP BELUM DIBAYAR</a>
                                            <?php } else if($pesanan['status_pembayaran_dp'] == -1) { ?>
                                                <a class="badge badge-danger" href="<?= BASEURL.'/pengguna/pembayaran_dp/'.$pesanan['id_pesanan']; ?>">BUKTI PEMBAYARAN DP SEBELUMNYA DITOLAK</a>
                                            <?php } else if($pesanan['status_pembayaran_dp'] == 0) { ?>
                                                <a class="badge badge-warning" href="<?= BASEURL.'/pengguna/pembayaran_dp/'.$pesanan['id_pesanan']; ?>">DP SEDANG DIVALIDASI</a>
                                            <?php } else if($pesanan['status_pembayaran_dp'] == 1) { ?>
                                                <a class="badge badge-success" href="javascript:void(0)">DP TELAH DIBAYAR</a>
                                            <?php } ?>
                                        <?php } else if($pesanan['status_pembayaran'] == NULL ) { ?>
                                            <a href="pembayaran_pesanan/<?= $pesanan['id_pesanan']; ?>"><span class="badge badge-danger">MENUNGGU PEMBAYARAN</span></a>
                                        <?php } else if($pesanan['status_pembayaran'] == -1 ) { ?>
                                            <a href="pembayaran_pesanan/<?= $pesanan['id_pesanan']; ?>"><span class="badge badge-danger">BUKTI PEMBAYARAN SEBELUMNYA DITOLAK</span></a>
                                        <?php } else if($pesanan['status_pembayaran'] == 0 ) { ?>
                                            <a href="pembayaran_pesanan/<?= $pesanan['id_pesanan']; ?>"><span class="badge badge-warning">PEMBAYARAN SEDANG DIVALIDASI</span></a>
                                        <?php } else if($pesanan['status'] == 3 && $pesanan['status_pembayaran'] == 1) { ?>
                                            <span class="badge badge-success">SELESAI</span>
                                        <?php } ?>
                                    </td>
                                    <td><?= date('d F Y H:i', strtotime($pesanan['dibuat_pada']));?></td>
                                    <td><?= date('d F Y H:i', strtotime($pesanan['diperbaharui_pada']));?></td>
                                    <td align="right" style="white-space: nowrap;">
                                        <a href="../chat/index?ke=<?= $pesanan['id_arsitek']; ?>" class="text-success"><i class="material-icons">chat</i></a>
                                        <?php if($pesanan['status'] == 1 && ($pesanan['status_pembayaran_dp'] == NULL OR $pesanan['status_pembayaran_dp'] < 1) ) { ?>
                                            <a href="imb_pesanan/<?= $pesanan['id_pesanan']; ?>" class="text-success"><i class="material-icons">receipt</i></a>
                                            <a href="pembayaran_dp/<?= $pesanan['id_pesanan']; ?>" class="text-warning"><i class="material-icons">payment</i></a>
                                        <?php } else if($pesanan['status'] == 1 && $pesanan['status_pembayaran_dp'] != NULL ) { ?>
                                            <a href="imb_pesanan/<?= $pesanan['id_pesanan']; ?>" class="text-success"><i class="material-icons">receipt</i></a>
                                            <a href="selesaikan_pesanan/<?= $pesanan['id_pesanan']; ?>" class="text-success"><i class="material-icons">check</i></a>
                                        <?php } else if($pesanan['status'] == 2 ) { ?>
                                            <a href="pembayaran_pesanan/<?= $pesanan['id_pesanan']; ?>" class="text-warning"><i class="material-icons">payment</i></a>
                                        <?php } else if($pesanan['status'] == 0 ) { ?>
                                            <a onclick="deleteData()" href="#"
                                                data-value="<?= $pesanan['id_pesanan']; ?>" data-judul="<?= $pesanan['judul']; ?>"
                                                data-toggle="modal" data-target="#modal-delete" class="text-danger">
                                                    <i class="material-icons">delete</i>
                                            </a>
                                        <?php } ?>
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
                { "searchable": false, "orderable": false},
            ],
            'aaSorting': [],
            'order': [],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
            }
        });
    } );
    function deleteData(){
        var postId = $(event.currentTarget).data('value');
        var url = "<?= BASEURL;?>/pengguna/hapus_pesanan/"+postId;
        $('#delete-url').attr('href', url);

        $('#text-delete').html('Apakah kamu yakin ingin menghapus pesanan ini?');
    }
</script>
<?php include(__DIR__ . '/../layouts/footer.php'); ?>