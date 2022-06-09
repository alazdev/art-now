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
                        <div class="card-header__title text-muted mb-2">Total Pendapatan</div>
                        <div class="text-amount">Rp <?= number_format($data['total_pembayaran'], 0, ",", "."); ?></div>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">monetization_on</i></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 card-group-row__col">
                <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                    <div class="flex">
                        <div class="card-header__title text-muted mb-2">Total Pesanan</div>
                        <div class="text-amount"><?= $data['total_pesanan']; ?></div>
                    </div>
                    <div><i class="material-icons icon-muted icon-40pt ml-3">perm_identity</i></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card dashboard-area-tabs" id="dashboard-area-tabs">
                    <div class="card-header p-0 bg-white nav">
                        <div class="row no-gutters flex" role="tablist">
                            <div class="col" data-toggle="chart" data-target="#earningsTrafficChart" data-update='{"data":{"labels": ["<?php for($i = 11; $i >= 0; $i--) { echo $data['nama_bulan'][$i].' '.$data['tahun'][$i].'", "'; }?>"],"datasets":[{"label": "Traffic", "data":[<?=implode(',', $data['tahunan_pembayaran'])?>]}]}}' data-prefix="Rp. " data-suffix="">
                                <a href="#" data-toggle="tab" role="tab" aria-selected="true" onclick="show()" class="dashboard-area-tabs__tab card-body text-center active">
                                    <span class="card-header__title m-0">Pendapatan</span>
                                </a>
                            </div>
                            <div class="col border-left" data-toggle="chart" data-target="#earningsTrafficChart" data-update='{"data":{"datasets":[{"label": "Earnings", "data":[<?=implode(',', $data['tahunan_pesanan'])?>]}]}}' data-prefix="" data-suffix="">
                                <a href="#" data-toggle="tab" role="tab" aria-selected="false" onclick="show()" class="dashboard-area-tabs__tab card-body text-center">
                                    <span class="card-header__title m-0">Pesanan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-muted" style="height: 280px;">
                        <div class="chart" style="height: calc(280px - 1.25rem * 2);">
                            <canvas id="earningsTrafficChart" hidden>
                                <span style="font-size: 1rem;"><strong>Pendapatan & Pesanan</strong>.</span>
                            </canvas>
                            <h4 align="center" id="alert">Tekan Menu untuk menampilkan statistik.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function show(){
        document.getElementById('earningsTrafficChart').hidden = false;
        document.getElementById('alert').hidden = true;
    }
</script>
<?php include(__DIR__ . '/../layouts/footer.php'); ?>