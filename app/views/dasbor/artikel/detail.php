<?php include(__DIR__ . '/../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item" aria-current="page"><a href="<?= BASEURL; ?>/artikel/index">Artikel</a></li>
                    </ol>
                </nav>
                <h1 class="m-0"><?= $data['judul'] ?></h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="row">
            <div class="col-lg-12">
                <a href="#" class="dp-preview card mb-4">
                    <img src="<?= BASEURL."/image/artikel/".$data['gambar'];?>" alt="digital product" class="img-fluid">
                </a>
                <div>
                    <?= $data['isi']; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../layouts/footer.php'); ?>