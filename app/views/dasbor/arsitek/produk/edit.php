<?php include(__DIR__ . '/../../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item" aria-current="page"><a href="<?= BASEURL; ?>/arsitek/produk">Produk</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $data['judul'] ?></li>
                    </ol>
                </nav>
                <h1 class="m-0">Edit - <?= $data['judul'] ?></h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-12 card-form__body card-body">
                    <form method="POST" id="form" action="<?= BASEURL.'/arsitek/update_produk/'.$data['id_produk']; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan Judul..." value="<?= $data['judul']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar<sup>(optional)</sup>:</label>
                            <input type="file" name="gambar[]" class="form-control" id="gambar" accept="image/png, image/jpeg">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga:</label>
                            <input type="number" name="harga" class="form-control" id="harga" min="1000" value="<?= $data['harga']; ?>" placeholder="Masukkan Harga..." required>
                        </div>
                        <label>Deskripsi</label>
                        <div style="height: 150px;" data-toggle="quill" id="deskripsi" data-quill-placeholder="Deskripsi Produk...">
                            
                        </div>
                        <button type="submit" class="btn btn-primary" name="update">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.ql-editor').html("<?= $data['deskripsi']; ?>");
        $("#form").on("submit", function () {
            var hvalue = $('#form .ql-editor').html();
            $(this).append("<textarea name='deskripsi' style='display:none'>"+hvalue+"</textarea>");
        });
    });
</script>
<?php include(__DIR__ . '/../../layouts/footer.php'); ?>