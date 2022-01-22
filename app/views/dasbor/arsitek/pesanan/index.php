<?php include(__DIR__ . '/../../layouts/header.php'); ?>
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
            <a href="laporan_pesanan" class="btn btn-success ml-3">Export Pesanan</a>
        </div>
    </div>
    <div class="container page__container">
        <?php foreach($data['pesanans'] as $pesanan) { if ($pesanan['status'] == 1) {?>
            <div class="alert alert-soft-warning d-flex align-items-center card-margin" role="alert">
                <i class="material-icons mr-3">error_outline</i>
                <div class="text-body"><strong> 
                    Sedang Mengerjakan Pesanan <a href="<?= BASEURL.'/user/pengguna/'.$pesanan['id_user'];?>"><?= $pesanan['nama_lengkap']; ?></a>.</strong> 
                    <?php if($pesanan['dokumen']) { ?>
                        Lihat <a class="badge badge-success" href="<?= BASEURL.'/dokumen/'.$pesanan['dokumen']; ?>" download="<?= 'IMB-'.$pesanan['nama_lengkap'].'-'.$pesanan['dokumen'];?>">IMB</a>
                    <?php } else { ?>
                        <span class="badge badge-danger">BELUM ADA IMB</span>
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
                                    <th>Pengguna</th>
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
                                    <td><a href="<?= BASEURL.'/user/profile_pengguna/'.$pesanan['id_user'];?>"><?= $pesanan['nama_lengkap']; ?></a></td>
                                    <td><a href="<?= BASEURL.'/arsitek/detail_produk/'.$pesanan['id_produk'];?>"><?= $pesanan['judul']; ?></a></td>
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
                                            <?php if($pesanan['status_pembayaran'] == NULL) { ?>
                                                <span class="badge badge-danger">DP BELUM DIBAYAR PENGGUNA</span>
                                            <?php } ?>
                                        <?php } else if($pesanan['status'] == 2 ) { ?>
                                            <span class="badge badge-warning">MENUNGGU PEMBAYARAN</span>
                                        <?php } else if($pesanan['status'] == 3 ) { ?>
                                            <span class="badge badge-success">SELESAI</span>
                                        <?php } ?>
                                    </td>
                                    <td><?= date('d F Y H:i', strtotime($pesanan['dibuat_pada']));?></td>
                                    <td><?= date('d F Y H:i', strtotime($pesanan['diperbaharui_pada']));?></td>
                                    <td align="right">
                                            <a href="../chat/index?ke=<?= $pesanan['id_user']; ?>" class="text-success"><i class="material-icons">chat</i></a>
                                        <?php if($pesanan['status'] == 0 ) { ?>
                                            <a href="terima_pesanan/<?= $pesanan['id_pesanan']; ?>" class="text-success"><i class="material-icons">check</i></a>
                                            <a href="tolak_pesanan/<?= $pesanan['id_pesanan']; ?>" class="text-danger"><i class="material-icons">block</i></a>
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
        var url = "<?= BASEURL;?>/arsitek/hapus_pesanan/"+postId;
        $('#delete-url').attr('href', url);

        $('#text-delete').html('Apakah kamu yakin ingin menghapus pesanan dengan judul: '+$(event.currentTarget).data('judul')+'?');
    }
</script>
<?php include(__DIR__ . '/../../layouts/footer.php'); ?>