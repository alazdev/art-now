<?php include(__DIR__ . '/../../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item" aria-current="page"><a href="<?= BASEURL; ?>/admin/calon_arsitek">Calon Arsitek</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Calon Arsitek dan Produk</li>
                    </ol>
                </nav>
                <h1 class="m-0"><?= $data['calon_arsitek']['nama_lengkap'] ?></h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="row">
            <div class="col-lg-8">
                <a href="#" class="dp-preview card mb-4">
                    <img src="<?= BASEURL."/image/produk/".$data['produk']['gambar'];?>" alt="digital product" class="img-fluid">
                </a>
                <div>
                    <?= $data['produk']['deskripsi']; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-body">
                    <div class="list-group list-group-flush mb-4">
                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                            <strong>Tanggal Produk Dibuat</strong>
                            <div class="ml-auto"><?= date('d F Y', strtotime($data['produk']['dibuat_pada'])); ?></div>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                            <strong>Tanggal Produk Diperbaharui</strong>
                            <div class="ml-auto"><?= date('d F Y', strtotime($data['produk']['diperbaharui_pada'])); ?></div>
                        </div>
                    </div>
                    <div class="list-group list-group-flush mb-4">
                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                            <h5>Informasi Dasar</h5>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                            <strong>Email</strong>
                            <div class="ml-auto"><?= $data['calon_arsitek']['email']; ?></div>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                            <strong>Telepon</strong>
                            <div class="ml-auto"><?= $data['calon_arsitek']['telepon']; ?></div>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                            <strong>Alamat</strong>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                            <div class="ml-auto"><?= $data['calon_arsitek']['alamat']; ?></div>
                        </div>
                    </div>
                    <?php if ($_SESSION['level'] == 2) { ?>
                        <br><br>
                        <div class="list-group list-group-flush mb-4">
                            <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                <h5>Dokumen</h5>
                            </div>
                            <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                <strong>KTP</strong>
                                <div class="ml-auto">
                                    <?php if ($data['calon_arsitek']['ktp'] != null) {?>
                                        <a class="badge badge-success" href="<?= BASEURL.'/dokumen/'.$data['calon_arsitek']['ktp']; ?>" download="<?= 'CALON ARSITEK-'.$data['calon_arsitek']['nama_lengkap'].'-KTP-'.$data['calon_arsitek']['ktp'];?>">ADA</a>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">BELUM ADA</span>
                                    <?php } ?>    
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                <strong>Ijazah Terakhir</strong>
                                <div class="ml-auto">
                                    <?php if ($data['calon_arsitek']['ijazah'] != null) {?>
                                        <a class="badge badge-success" href="<?= BASEURL.'/dokumen/'.$data['calon_arsitek']['ijazah']; ?>" download="<?= 'CALON ARSITEK-'.$data['calon_arsitek']['nama_lengkap'].'-Ijazah-'.$data['calon_arsitek']['ijazah'];?>">ADA</a>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">BELUM ADA</span>
                                    <?php } ?>  
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                <strong>Sertifikasi Arsitek</strong>
                                <div class="ml-auto">
                                    <?php if ($data['calon_arsitek']['sertifikasi_arsitek'] != null) {?>
                                        <a class="badge badge-success" href="<?= BASEURL.'/dokumen/'.$data['calon_arsitek']['sertifikasi_arsitek']; ?>" download="<?= 'CALON ARSITEK-'.$data['calon_arsitek']['nama_lengkap'].'-Sertifikasi Arsitek-'.$data['calon_arsitek']['sertifikasi_arsitek'];?>">ADA</a>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">BELUM ADA</span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../../layouts/footer.php'); ?>