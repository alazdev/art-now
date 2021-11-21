<?php include(__DIR__ . '/../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Dasbor</li>
                    </ol>
                </nav>
                <h1 class="m-0">Dasbor</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="row card-group-row">
            <div class="col-lg-12 col-md-12 card-group-row__col">
                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                    <div class="flex">
                        <div class="card-header__title text-muted mb-2">Semua User</div>
                        <div class="text-amount"><?= $data['total_user']; ?></div>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">perm_identity</i></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 card-group-row__col">
                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                    <div class="flex">
                        <div class="card-header__title text-muted mb-2">Pengguna/Pelanggan</div>
                        <div class="text-amount"><?= $data['total_pengguna']; ?></div>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">perm_identity</i></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 card-group-row__col">
                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                    <div class="flex">
                        <div class="card-header__title text-muted mb-2">Arsitek</div>
                        <div class="text-amount"><?= $data['total_arsitek']; ?></div>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">perm_identity</i></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 card-group-row__col">
                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                    <div class="flex">
                        <div class="card-header__title text-muted mb-2">Calon Arsitek</div>
                        <div class="text-amount"><?= $data['total_calon_arsitek']; ?></div>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">perm_identity</i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(__DIR__ . '/../layouts/footer.php'); ?>