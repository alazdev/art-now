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
            <div class="col-lg-6 col-md-6 card-group-row__col">
                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                    <div class="flex">
                        <div class="card-header__title text-muted mb-2">Pendapatan</div>
                        <div class="text-amount">Rp <?= number_format($data['total_pembayaran'], 0, ",", "."); ?></div>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">monetization_on</i></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 card-group-row__col">
                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                    <div class="flex">
                        <div class="card-header__title text-muted mb-2">Pesanan</div>
                        <div class="text-amount"><?= $data['total_pesanan']; ?></div>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">perm_identity</i></div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="card dashboard-area-tabs" id="dashboard-area-tabs">
                    <div class="card-header p-0 bg-white nav">
                        <div class="row no-gutters flex" role="tablist">
                            <div class="col" data-toggle="chart" data-target="#earningsTrafficChart" data-update='{"data":{"datasets":[{"label": "Traffic", "data":[10,2,5,15,10,12,15,25,22,30,25,40]}]}}' data-prefix="" data-suffix="k">
                                <a href="#" data-toggle="tab" role="tab" aria-selected="true" class="dashboard-area-tabs__tab card-body text-center active">
                                    <span class="card-header__title m-0">Pendapatan</span>
                                </a>
                            </div>
                            <div class="col border-left" data-toggle="chart" data-target="#earningsTrafficChart" data-update='{"data":{"datasets":[{"label": "Earnings", "data":[7,35,12,27,34,17,19,30,28,32,24,39]}]}}' data-prefix="$" data-suffix="k">
                                <a href="#" data-toggle="tab" role="tab" aria-selected="false" class="dashboard-area-tabs__tab card-body text-center">
                                    <span class="card-header__title m-0">Pesanan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-muted" style="height: 280px;">
                        <div class="chart" style="height: calc(280px - 1.25rem * 2);">
                            <canvas id="earningsTrafficChart">
                                <span style="font-size: 1rem;"><strong>Pendapatan & Pesanan</strong>.</span>
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
<?php include(__DIR__ . '/../layouts/footer.php'); ?>