<?php include('layouts/header.php'); ?>
    
	<div class="blog_main_wrapper blog_toppadder60 blog_bottompadder40">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="blog_food_health blog_topheading_slider_nav blog_topheading_style2 blog_innerpages">
						<div class="blog_technology_slider">
                            <?php foreach($data as $produk) { ?>
                                <div class="blog_post_style2 wow fadeInUp">
                                    <div class="blog_post_style2_img">
                                        <?php if ($produk['gambar'] != null) { ?>
                                            <img src="<?= BASEURL.'/image/produk/'.$produk['gambar']?>" class="img-fluid" alt="">
                                        <?php } else { ?>
                                            <img src="https://via.placeholder.com/180x200" class="img-fluid" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="blog_post_style2_content">
                                        <h3><a href="<?= BASEURL.'/home/produk/'.$produk['id_produk']?>"><?=$produk['judul']?></a></h3>
									    <div class="blog_author_data"><a href="<?= BASEURL.'/home/arsitek/'.$produk['id_user']?>"><img src="<?= BASEURL.'/image/profile/'.$produk['foto']?>" class="img-fluid" alt="" width="34" height="34"> <?= $produk['nama_lengkap'] ?></a></div> 
                                            <ul class="blog_meta_tags">
                                                <li>
                                                    <span class="blog_bg_blue" height="25px">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21px" height="21px">
                                                            <path fill-rule="evenodd"  fill="rgb(255, 255, 255)" d="M0,0.054V20h21V0.054H0z M15.422,18.129l-5.264-2.768l-5.265,2.768l1.006-5.863L1.64,8.114l5.887-0.855
                                                                l2.632-5.334l2.633,5.334l5.885,0.855l-4.258,4.152L15.422,18.129z"/>
                                                        </svg>
                                                        <?= number_format($produk['rating'], 1).'/5'?>
                                                    </span>
                                                </li>
                                            </ul>
                                            <p><?= substr($produk['deskripsi'],0,100)?>...</p>
                                    </div>
                                </div>
                            <?php } if (count($data) == 0) { ?>
                                <div class="blog_post_style2 wow fadeInUp" style="margin-bottom: 190px;">
                                    <div class="blog_post_style2_content">
                                        <h3 align="center">Tidak menemukan pencarian yang cocok</h3>
                                    </div>
                                </div>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('layouts/footer.php'); ?>