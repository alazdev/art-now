<?php include('layouts/header.php'); ?>
    <div class="blog_main_wrapper blog_toppadder60 blog_bottompadder60">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="blog_author_div wow fadeInUp">
						<div class="blog_author_img">
                            <?php if($data['foto'] != null) { ?>
							    <img src="<?= BASEURL.'/image/profile/'.$data['foto']?>" class="img-fluid" alt="Arsitek" style="width: 122px; height: 122px; object-fit: cover;">
                            <?php } else { ?>
							    <img src="https://via.placeholder.com/122x122" class="img-fluid" alt="">
                            <?php } ?>
						</div>
						<div class="blog_author_content">
							<h3><?= $data['nama_lengkap'] ?></h3>
							<p><?= $data['nama_lengkap'] ?> memiliki rating <?= number_format($data['rating'], 1, '.', ',') ?>/5 dari <?= $data['total_rating'] ?> total rating. Telah berkontribusi dan bekerja sama dengan ArtNow sejak <?= date('d F Y', strtotime($data['dibuat_pada'])) ?></p>
                            <?php if(isset($_SESSION['email'])) { ?>
                                <div class="col-md-12">
                                    <?php if($_SESSION['level'] == 0){?>
                                        <a href="<?= BASEURL.'/chat/index?ke='.$data['id_user']?>" class="btn btn-warning col-md-12">Chat Arsitek</a>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-12">
                                    <a href="<?= BASEURL?>/auth/login" class="btn btn-light col-md-12">Masuk untuk melihat kontak Arsitek</a>
                                </div>
                            <?php } ?>
						</div>
					</div>
					<div class="blog_post_style2 blog_single_div">
						<div class="blog_post_style2_content wow fadeInUp">
							<?= $data['deskripsi'] ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php if(isset($_SESSION['email'])) { ?>
        <div class="blog_main_wrapper blog_toppadder60 blog_bottompadder60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="blog_heading_style2 text-center wow fadeInUp">
                            <h3>Kontak Arsitek</h3>
                        </div>
                    </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="blog_contact_info_div wow fadeInUp">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="29px" height="29px"><path fill-rule="evenodd"  fill="rgb(255, 54, 87)" d="M26.765,13.993 C26.264,11.065 24.882,8.403 22.777,6.296 C20.556,4.081 17.745,2.674 14.644,2.240 L14.958,-0.000 C18.547,0.501 21.799,2.125 24.369,4.696 C26.807,7.141 28.406,10.220 28.991,13.613 L26.765,13.993 ZM20.333,8.626 C21.799,10.099 22.765,11.952 23.115,13.999 L20.888,14.379 C20.617,12.798 19.875,11.361 18.741,10.226 C17.540,9.025 16.019,8.270 14.348,8.035 L14.662,5.795 C16.822,6.097 18.783,7.075 20.333,8.626 ZM9.461,15.822 C11.006,17.718 12.750,19.402 14.831,20.712 C15.277,20.989 15.772,21.195 16.237,21.448 C16.472,21.581 16.635,21.539 16.828,21.339 C17.534,20.615 18.252,19.903 18.970,19.190 C19.911,18.255 21.093,18.255 22.041,19.190 C23.193,20.337 24.345,21.484 25.492,22.637 C26.451,23.603 26.445,24.786 25.480,25.764 C24.828,26.422 24.134,27.050 23.519,27.738 C22.620,28.746 21.498,29.072 20.207,29.000 C18.330,28.897 16.605,28.276 14.940,27.467 C11.241,25.668 8.080,23.175 5.431,20.023 C3.470,17.693 1.854,15.152 0.792,12.291 C0.273,10.908 -0.095,9.490 0.019,7.986 C0.092,7.063 0.436,6.272 1.118,5.626 C1.854,4.926 2.547,4.195 3.271,3.483 C4.213,2.554 5.395,2.554 6.342,3.477 C6.927,4.051 7.501,4.636 8.080,5.216 C8.641,5.783 9.202,6.338 9.763,6.906 C10.753,7.902 10.753,9.061 9.769,10.051 C9.063,10.763 8.363,11.476 7.645,12.170 C7.458,12.357 7.440,12.508 7.537,12.737 C8.014,13.872 8.695,14.880 9.461,15.822 Z"/></svg></span>
                            <h4>No. HP</h4>
                            <p><?= $data['telepon']?></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="blog_contact_info_div wow fadeInUp" data-wow-delay="0.2s">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="31px" height="24px"><path fill-rule="evenodd"  fill="rgb(255, 54, 87)" d="M30.059,19.226 C30.059,19.899 29.874,20.522 29.577,21.070 L20.105,10.236 L29.474,1.857 C29.839,2.448 30.059,3.143 30.059,3.893 L30.059,19.226 ZM15.059,12.204 L28.096,0.543 C27.561,0.243 26.959,0.060 26.309,0.060 L3.809,0.060 C3.158,0.060 2.555,0.243 2.022,0.543 L15.059,12.204 ZM18.693,11.498 L15.676,14.199 C15.499,14.356 15.279,14.435 15.059,14.435 C14.838,14.435 14.618,14.356 14.442,14.199 L11.423,11.498 L1.831,22.470 C2.406,22.839 3.080,23.060 3.809,23.060 L26.309,23.060 C27.037,23.060 27.711,22.839 28.286,22.470 L18.693,11.498 ZM0.643,1.857 C0.278,2.448 0.059,3.143 0.059,3.893 L0.059,19.226 C0.059,19.899 0.243,20.522 0.540,21.070 L10.011,10.235 L0.643,1.857 Z"/></svg></span>
                            <h4>Email</h4>
                            <p><?= $data['email']?></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="blog_contact_info_div wow fadeInUp" data-wow-delay="0.4s">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="22px" height="30px"><path fill-rule="evenodd"  fill="rgb(255, 54, 87)" d="M11.000,0.001 C4.934,0.001 0.000,4.955 0.000,11.045 C0.000,12.633 0.324,14.150 0.962,15.553 C3.712,21.595 8.985,27.974 10.536,29.785 C10.652,29.921 10.822,29.999 11.000,29.999 C11.178,29.999 11.348,29.921 11.464,29.785 C13.014,27.975 18.287,21.596 21.038,15.553 C21.676,14.150 22.000,12.633 22.000,11.045 C21.999,4.955 17.065,0.001 11.000,0.001 ZM11.000,16.781 C7.849,16.781 5.286,14.208 5.286,11.044 C5.286,7.881 7.849,5.308 11.000,5.308 C14.150,5.308 16.713,7.881 16.713,11.044 C16.713,14.208 14.150,16.781 11.000,16.781 Z"/></svg></span>
                            <h4>Alamat</h4>
                            <p><?= $data['alamat']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
	<div class="blog_fullwidth_multislide_slider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="blog_heading_style2 text-center wow fadeInUp">
                        <h3>Produk Arsitek</h3>
                    </div>
                </div>
            </div>
        </div>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php foreach($data['produks'] as $produk) { ?>
					<div class="swiper-slide">
						<div class="blog_post_slider_wrapper"> 
							<a href="<?= BASEURL.'/home/produk/'.$produk['id_produk']?>" class="blog_post_slider_img"> 
								<?php if ($produk['gambar'] != null) { ?>
									<img src="<?= BASEURL.'/image/produk/'.$produk['gambar']?>" class="img-fluid" alt="" style="height: 460px; width: 100%;">
								<?php } else { ?>
									<img src="https://via.placeholder.com/301x460" class="img-fluid" alt="">
								<?php } ?>
							</a> 
							<div class="blog_post_slider_content"> 
								<div class="blog_post_slider_content_inner">
									<h2><a href="<?= BASEURL.'/home/produk/'.$produk['id_produk']?>"><?=$produk['judul']?></a></h2>
									<div class="blog_author_data"><a href="<?= BASEURL.'/home/arsitek/'.$produk['id_user']?>"><img src="<?= ($produk['foto'] != NULL ? BASEURL.'/image/profile/'.$produk['foto']:'https://via.placeholder.com/34x34') ?>" class="img-fluid" alt="" width="34" height="34" style="width: 34px; height: 34px; object-fit: cover;"> <?= $produk['nama_lengkap'] ?></a></div> 
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
								</div>
							</div> 
						</div>
					</div>
				<?php } ?>
			</div>
		</div>				
	</div>
<?php include('layouts/footer.php'); ?>