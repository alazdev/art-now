<?php include(__DIR__ . '/../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Form Produk</li>
                    </ol>
                </nav>
                <h1 class="m-0">Produk Pertama</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <?php if ($data['status'] == 'belum') { ?>
            <div class="alert alert-soft-info d-flex align-items-center card-margin" role="alert">
                <i class="material-icons mr-3">error_outline</i>
                <div class="text-body"><strong>Masukkan produk pertamamu.</strong> Ini merupakan langkah penting yang harus dilakuakan, untuk memverfikasi akunmu.</div>
            </div>
        <?php } ?>
        <?php if ($data['status'] == 'diproses') { ?>
            <div class="alert alert-soft-info d-flex align-items-center card-margin" role="alert">
                <i class="material-icons mr-3">error_outline</i>
                <div class="text-body"><strong>Produk pertamamu sedang diproses.</strong> Setidaknya membutuhkan 2x24 jam. Terimakasih</div>
            </div>
        <?php } ?>
        <?php if ($data['status'] == 'ditolak') { ?>
            <div class="alert alert-soft-warning d-flex align-items-center card-margin" role="alert">
                <i class="material-icons mr-3">error_outline</i>
                <div class="text-body"><strong>Produk pertamamu ditolak.</strong> Masukkan produk yang lebih sesuai, untuk memverifikasi akunmu.</div>
            </div>
        <?php } ?>


        <?php if ($data['status'] != 'diproses') { ?>
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-12 card-form__body card-body">
                    <form id="form-verifikasi" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan Judul..." required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar:</label>
                            <input type="file" name="gambar[]" class="form-control" id="gambar" accept="image/png, image/jpeg" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Jasa:</label>
                            <input type="number" name="harga" class="form-control" id="harga" min="1000" placeholder="Masukkan Harga Jasa..." required>
                        </div>
                        <label>Deskripsi</label>
                        <div style="height: 150px;" data-toggle="quill" id="deskripsi" data-quill-placeholder="Deskripsi Produk..."></div>
                        <button type="submit" class="btn btn-primary" name="verifikasi">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("form").on("submit", function () {
            var hvalue = $('#form-verifikasi .ql-editor').html();
            $(this).append("<textarea name='deskripsi' style='display:none'>"+hvalue+"</textarea>");
        });
    });
</script>
<?php include(__DIR__ . '/../layouts/footer.php'); ?>