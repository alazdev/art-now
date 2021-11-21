<?php include(__DIR__ . '/../layouts/header.php'); ?>
<style>
    #chat-area {
        height: 400px;
        max-height: 400px;
        overflow-y: scroll;
    }
    #user-area {
        height: 400px;
        max-height: 400px;
        overflow-y: scroll;
    }
</style>
<div class="mdk-drawer-layout__content page">
    <div class="container page__container">
        <div class="app-chat-container">
            <div class="row h-100 m-0">
                <div class="col-lg-8 py-3 d-flex flex-column h-100">
                    <div class="input-group input-group-merge">
                        <form id="form-chat" class="input-group input-group-merge" action="<?=BASEURL;?>/chat/kirim_chat" method="post">
                            <input type="text" name="pesan" class="form-control form-control-appended" id="name-pesan" required="" placeholder="Masukkan Pesan...">
                            <input type="hidden" name="id_user_to" id="name-id-user-to" value="1" required>
                            <input type="hidden" name="tipe" id="name-tipe" value="1" required>
                            <div class="input-group-append">
                                <div class="input-group-text pr-2">
                                    <div class="custom-file custom-file-naked d-flex" style="width: 24px">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" style="color: inherit;" for="customFile">
                                            <i class="material-icons">attach_file</i>
                                        </label>
                                    </div>
                                </div>
                                <div class="input-group-text pl-0">
                                    <button class="btn btn-primary btn-sm" type="submit"> Kirim <i class="material-icons">send</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="flex p-3 d-flex flex-column">
                        <div data-simplebar class="h-100" id="chat-area">
                            <div class="media border-bottom py-3">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex">
                                            <a href="#" class="text-body bold"><?php if($_SESSION['level'] == 1) { ?><i>Kamu</i><?php } else { ?>Jenell D. Matney<?php } ?></a>
                                        </div>
                                        <small class="text-muted">Just Now</small>
                                    </div>
                                    <div>Oke, saya cek dulu ya.</div>
                                </div>
                            </div>
                            <div class="media border-bottom py-3">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex">
                                            <a href="#" class="text-body bold"><?php if($_SESSION['level'] == 1) { ?>Jenell D. Matney<?php } else { ?><i>Kamu</i><?php } ?></a>
                                        </div>
                                        <small class="text-muted">Just Now</small>
                                    </div>
                                    <div>Untuk IMB-nya sudah saya kirim dichat, dan juga di form IMB. Untuk wilayah bisa cek foto di bawah. Terimakasih</div>
                                </div>
                            </div>
                            <div class="media border-bottom py-3">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex">
                                            <a href="#" class="text-body bold"><?php if($_SESSION['level'] == 1) { ?>Jenell D. Matney<?php } else { ?><i>Kamu</i><?php } ?></a>
                                        </div>
                                        <small class="text-muted">2 minutes ago</small>
                                    </div>
                                    <a href="" class="avatar avatar-xxl avatar-4by3 mt-2">
                                        <img src="<?= BASEURL?>/assets-admin/images/stories/256_rsz_dex-ezekiel-761373-unsplash.jpg" alt="image" class="avatar-img rounded">
                                    </a>
                                </div>
                            </div>
                            <div class="media py-3">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex">
                                            <a href="#" class="text-body bold"><?php if($_SESSION['level'] == 1) { ?>Jenell D. Matney<?php } else { ?><i>Kamu</i><?php } ?></a>
                                        </div>
                                        <small class="text-muted">1 hours ago</small>
                                    </div>
                                    <a href="#" class="media align-items-center mt-2 text-underline-0 bg-white p-2">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle">
                                                <i class="material-icons">attach_file</i>
                                            </span>
                                        </span>
                                        <span class="media-body" style="line-height: 1.5">
                                            <span class="text-primary">imb.pdf</span><br>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 py-3 px-0 bg-white border-left d-flex flex-column">
                    <div class="form-group px-3">
                        <div class="input-group input-group-merge input-group-rounded">
                            <input type="text" class="form-control form-control-prepended" placeholder="Filter members">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="material-icons">filter_list</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex d-flex flex-column">
                        <div data-simplebar class="h-100">
                            <div class="list-group list-group-flush" style="position: relative; z-index: 0;" id="user-area">
                                <div class="list-group-item d-flex media align-items-center">
                                    <a href="#" class="avatar avatar-sm media-left mr-3">
                                        <img src="<?= BASEURL?>/assets-admin/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </a>
                                    <div class="media-body">
                                        <p class="m-0">
                                            <a href="#" class="text-body"><strong>Jenell D. Matney [sekarang]</strong></a><br>
                                            <span class="text-muted"><?php if($_SESSION['level'] == 1) { ?>Pengguna<?php } else { ?>Arsitek<?php } ?></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex media align-items-center">
                                    <a href="#" class="avatar avatar-sm media-left mr-3">
                                        <img src="<?= BASEURL?>/assets-admin/images/256_michael-dam-258165-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                    </a>
                                    <div class="media-body">
                                        <p class="m-0">
                                            <a href="#" class="text-body"><strong>Kaci M. Langston</strong></a><br>
                                            <span class="text-muted"><?php if($_SESSION['level'] == 1) { ?>Pengguna<?php } else { ?>Arsitek<?php } ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
        // $("#form-chat").on("submit", function () {
        //     var id_user_to = $("#name-id-user-to").val();
        //     var tipe = 1;
        //     var pesan = $("#name-pesan").val();
        //     $.post("<?=BASEURL;?>/chat/kirim_chat", { id_user_to: id_user_to, tipe: tipe, pesan: pesan });
        //     var pesan = $("#name-pesan").val("");
        //     return false;
        // });
    });
</script>
<?php include(__DIR__ . '/../layouts/footer.php'); ?>