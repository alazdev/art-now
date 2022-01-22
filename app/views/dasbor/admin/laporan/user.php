<?php include(__DIR__ . '/../../layouts/header.php'); ?>
<div class="mdk-drawer-layout__content page">
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Laporan User</li>
                    </ol>
                </nav>
                <h1 class="m-0">Laporan User</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="card card-form">
            <div class="row no-gutters">
                <div class="col-lg-12 card-body">
                    <form action="<?= BASEURL ?>/admin/export_user" method="post">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <select id="statusFilter" name="status" class="form-control">
                                        <option value="">Semua Status</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Nonaktif</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select id="levelFilter" name="level" class="form-control">
                                        <option value="">Semua Level</option>
                                        <option value="-1">Calon Arsitek</option>
                                        <option value="0">Pengguna</option>
                                        <option value="1">Arsitek</option>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info form-control col-md-12">Export Laporan</button>
                        </div>
                    </form>
                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                        <table class="table mb-0 thead-border-top-0">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th align="center">Status</th>
                                    <th align="center">Level</th>
                                    <th>Dibuat Pada</th>
                                    <th>Diperbaharui Pada</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="staff02">
                                <?php foreach($data['users'] as $user) { ?>
                                <tr>
                                    <td><?= $user['nama_lengkap']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['telepon']; ?></td>
                                    <td align="center">
                                        <?php if($user['status'] == 1 ) { ?>
                                            <span class="badge badge-success">AKTIF</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">NONAKTIF</span>
                                        <?php } ?>
                                    </td>
                                    <td align="center">
                                        <?php if($user['level'] == -1 ) { ?>
                                            <span class="badge badge-light">CALON ARSITEK</span>
                                        <?php } else if($user['level'] == 0 ) { ?>
                                            <span class="badge badge-info">PENGGUNA</span>
                                        <?php } else if($user['level'] == 1 ) { ?>
                                            <span class="badge badge-warning">ARSITEK</span>
                                        <?php } else { ?>
                                            <span class="badge badge-success">ADMIN</span>
                                        <?php } ?>
                                    </td>
                                    <td><?= date('Y-m-d H:i', strtotime($user['dibuat_pada']));?></td>
                                    <td><?= date('Y-m-d H:i', strtotime($user['diperbaharui_pada']));?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('.table').DataTable({
            "searching":false,
            'aaSorting': [],
            'order': [],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
            }
        });

        var table = $('.table').DataTable();

        $(".table_filter.dataTables_filter").append($("#statusFilter"));

        var statusIndex = 3;
        $(".table th").each(function (i) {
            if ($($(this)).html() == "Status") {
                statusIndex = i; return false;
            }
        });

        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
            var selectedItem = $('#statusFilter').val()
            var status = data[statusIndex];
            if (selectedItem === "" || status.includes(selectedItem)) {
                return true;
            }
                return false;
            }
        );
        $("#statusFilter").change(function (e) {
            table.draw();
        });
        table.draw();
    } );
</script>
<?php include(__DIR__ . '/../../layouts/footer.php'); ?>