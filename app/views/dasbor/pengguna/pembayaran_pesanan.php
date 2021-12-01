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
                <div class="col-lg-12 card-form__body card-body">
                    <form method="POST" id="form" action="<?= BASEURL . '/pengguna/kirim_pembayaran_pesanan/' . $data['id_pesanan']; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="total_dibayar">Total Pembayaran:</label>
                            <input type="text" id="total_dibayar" value="Rp <?= number_format($data['harga']*80/100, 0, ",", ".") ?>" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="metode_pembayaran">Metode Pembayaran:</label>
                            <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required>
                                <option value="">-- Pilih Metode Pembayaran --</option>
                                <option value="gopay">GoPay</option>
                                <option value="ovo">OVO</option>
                                <option value="dana">Dana</option>
                                <option value="BCA">Bank BCA</option>
                                <option value="BRI">Bank BRI</option>
                                <option value="BNI">Bank BNI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nomor_pembayaran">Nomor/No. Rekening:</label>
                            <input type="text" name="nomor_pembayaran" id="nomor_pembayaran" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating Layanan/Produk:</label>
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
                        <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../layouts/footer.php'); ?>