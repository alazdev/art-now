<?php include('layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Profil Arsitek</li>
                    </ol>
                </nav>
                <h1 class="m-0"><?= $data['nama_lengkap'] ?></h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="row">
            <div class="col-lg-8">
                <a href="#" class="dp-preview card mb-4" align="center">
                    <?php if ($data['foto'] != null) { ?>
                        <img src="<?= BASEURL."/image/profile/".$data['foto'];?>" alt="profile" class="img-fluid">
                    <?php } else { ?>
                        <p>[Arsitek tidak memiliki foto]</p>
                    <?php } ?>
                </a>
                <div>
                    <?= $data['deskripsi']; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-body">
                    <div class="mb-4">
                        <a href="../../home/arsitek/<?= $data['id_user'];?>" class="btn btn-light btn-block">Lihat Produk</a>
                    </div>

                    <div class="mb-4 text-center">
                        <div class="d-flex flex-column align-items-center justify-content-center">

                            <span class="mb-1">
                                <?php if ($data['rating'] >= 1.0) { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star</i></a>
                                <?php } else if ($data['rating'] >= 0.1) { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star_half</i></a>
                                <?php } else { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star_outline</i></a>
                                <?php }
                                    if ($data['rating'] >= 2.0) { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star</i></a>
                                <?php } else if ($data['rating'] >= 1.1) { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star_half</i></a>
                                <?php } else { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star_outline</i></a>
                                <?php }
                                    if ($data['rating'] >= 3.0) { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star</i></a>
                                <?php } else if ($data['rating'] >= 2.1) { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star_half</i></a>
                                <?php } else { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star_outline</i></a>
                                <?php }
                                    if ($data['rating'] >= 4.0) { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star</i></a>
                                <?php } else if ($data['rating'] >= 3.1) { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star_half</i></a>
                                <?php } else { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star_outline</i></a>
                                <?php } if ($data['rating'] == 5) { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star</i></a>
                                <?php } else if ($data['rating'] >= 4.1) { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star_half</i></a>
                                <?php } else { ?>
                                <a href="#" class="rating-link active"><i class="material-icons ">star_outline</i></a>
                                <?php } ?>
                            </span>
                            <div class="d-flex align-items-center">
                                <strong><?= number_format($data['rating'], 1); ?>/5</strong>
                                <span class="text-muted ml-1">&mdash; <?= $data['total_rating']; ?> penilaian</span>
                            </div>

                        </div>
                    </div>

                    <div class="list-group list-group-flush mb-4">
                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                            <strong>Email</strong>
                            <div class="ml-auto"><?= $data['email']; ?></div>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                            <strong>Telepon</strong>
                            <div class="ml-auto"><?= $data['telepon']; ?></div>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                            <strong>Alamat</strong>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                            <div class="ml-auto"><?= $data['alamat']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('layouts/footer.php'); ?>