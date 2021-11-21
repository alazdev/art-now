<?php include(__DIR__ . '/../../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item" aria-current="page"><a href="<?= BASEURL; ?>/admin/calon_arsitek">Calon Arsitek</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $data['calon_arsitek']['nama_lengkap'] ?></li>
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
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../../layouts/footer.php'); ?>