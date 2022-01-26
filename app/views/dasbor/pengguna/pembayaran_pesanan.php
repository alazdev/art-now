<?php include(__DIR__ . '/../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Pembayaran Pesanan</li>
                    </ol>
                </nav>
                <h1 class="m-0"><?= $data['judul'] ?></h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-4 card-body">
                    <p><strong class="headings-color">Transfer Ke</strong></p>
                    <p class="text-muted mb-0">Silakan lakukan pembayaran ke salah satu rekening bank berikut dengan nominal yang tertera dan unggah bukti pembayaran.</p>
                </div>
                <div class="col-lg-8 card-form__body card-body">
                    <?php foreach($data['rekening'] as $rekening) { ?>
                    <div class="form-group d-flex flex-column">
                        <img alt="PayPal Logo" src="<?= BASEURL."/image/logo-rekening/".$rekening['logo'];?>" style="display: block; margin-left: auto; margin-right: auto;" width="140">
                        <div>
                            <?=$rekening['nama']?>, <?=$rekening['nomor']?> A/N <?=$rekening['pemegang']?>
                        </div>
                    </div><hr>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-12 card-form__body card-body">
                    <h3>
                        Bukti Pembayaran <?= ($data['pembayaran'] == NULL) ? 'dan Ulasan':'' ?>
                    </h3>
                    <form method="POST" id="form" action="<?= BASEURL . '/pengguna/kirim_pembayaran_pesanan/' . $data['id_pesanan']; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="total_dibayar">Total Pembayaran:</label>
                            <input type="text" id="total_dibayar" value="Rp <?= number_format($data['harga']*80/100, 0, ",", ".") ?>" class="form-control" disabled/>
                        </div>
                        <div class="form-group">
                            <label for="bukti_pembayaran">Bukti Pembayaran:</label>
                            <input type="file" name="bukti_pembayaran[]" id="bukti_pembayaran" class="form-control" accept="image/png, image/jpeg" required />
                        </div>
                        <?php if($data['pembayaran'] == NULL){ ?>
                        <div class="form-group">
                            <label for="rating">Ulasan Layanan/Produk:</label>
                            <select name="rating" id="rating" class="form-control" required>
                                <option value="5">5 Bintang - Bagus Sekali</option>
                                <option value="4">4 Bintang - Bagus</option>
                                <option value="3">3 Bintang - Cukup</option>
                                <option value="2">2 Bintang - Jelek</option>
                                <option value="1">1 Bintang - Jelek Sekali</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="komen">Komentari Layanan:</label>
                            <textarea type="text" name="komen" id="komen" class="form-control" required></textarea>
                        </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../layouts/footer.php'); ?>