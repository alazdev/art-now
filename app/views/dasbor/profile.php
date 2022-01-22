<?php include('layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
                <h1 class="m-0">Profil</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <p><strong class="headings-color">Informasi dasar</strong></p>
                    <p class="text-muted">Edit Informasi dasar.</p>
                </div>
                <div class="col-lg-8 card-form__body card-body">
                    <form method="post" action="<?=BASEURL?>/user/update_profile" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama-lengkap">Nama Lengkap</label>
                            <input id="nama-lengkap" name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap..." value="<?= $data['nama_lengkap']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class="form-control" placeholder="Email..." value="<?= $data['email']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input id="telepon" name="telepon" type="number" class="form-control" placeholder="Telepon..." value="<?= $data['telepon']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto <sup>*optional, pilih gambar untuk mengganti</sup></label>
                            <input id="foto" name="foto[]" type="file" class="form-control"  accept="image/png, image/jpeg">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="update_profile">Ubah Profil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <?php if ($_SESSION['level'] == 1 ) { ?>
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <p><strong class="headings-color">Informasi Arsitek</strong></p>
                    <p class="text-muted">Kolom ini hanya bisa dilihat oleh arsitek. Edit informasi arsitek.</p>
                </div>
                <div class="col-lg-8 card-form__body card-body">
                    <form method="POST" action="<?=BASEURL?>/user/update_profile" id="form-update-arsitek">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat..." required><?=$data['alamat'];?></textarea>
                        </div>
                        <label>Deskripsi</label>
                        <div style="height: 150px;" data-toggle="quill" id="deskripsi" data-quill-placeholder="Deskripsi Produk..."><?=$data['deskripsi'];?></div>
                        <button type="submit" class="btn btn-primary" name="update_lanjutan">Ubah Informasi</button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <p><strong class="headings-color">Ganti Kata Sandi</strong></p>
                    <p class="text-muted">Ganti kata sandimu.</p>
                </div>
                <div class="col-lg-8 card-form__body card-body">
                    <form method="POST" action="<?=BASEURL?>/user/update_profile">
                        <div class="form-group">
                            <label for="opass">Kata Sandi Lama</label>
                            <input style="width: 270px;" id="opass" name="opass" type="password" class="form-control" placeholder="Kata Sandi Lama" required>
                        </div>
                        <div class="form-group">
                            <label for="npass">Kata Sandi Baru</label>
                            <input style="width: 270px;" id="npass" name="npass" type="password" class="form-control" placeholder="Kata Sandi Baru" required>
                        </div>
                        <div class="form-group">
                            <label for="cpass">Konfirmasi Kata Sandi</label>
                            <input style="width: 270px;" id="cpass" name="cpass" type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update_password">Ubah Kata Sandi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#form-update-arsitek").on("submit", function () {
            var hvalue = $('#form-update-arsitek .ql-editor').html();
            $(this).append("<textarea name='deskripsi' style='display:none'>"+hvalue+"</textarea>");
        });
    });
</script>
<?php include('layouts/footer.php'); ?>