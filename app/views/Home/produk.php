<?php include('layouts/header.php'); ?>
    <div class="blog_main_wrapper blog_toppadder60 blog_bottompadder60">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="blog_post_style2 blog_single_div">
						<div class="blog_post_style2_img wow fadeInUp">
                            <?php if($data['gambar'] != null ) {?>
							    <img src="<?= BASEURL.'/image/produk/'.$data['gambar']?>" class="img-fluid" alt="">
                            <?php } else {?>
							    <img src="https://via.placeholder.com/1170x560/ffc0cb" class="img-fluid" alt="">
                            <?php } ?>
						</div>
						<div class="blog_post_style2_content wow fadeInUp">
							<?= $data['deskripsi'] ?>
                            <br/><p>- Rating Produk: <?= number_format($data['rating'],1,'.',',') ?>/5 dari total <?= $data['total_rating'] ?> rating.</p>
                            <div class="col-md-12">
                                <?php if (isset($_SESSION['email'])) { if($_SESSION['level'] == 0 && $data['status'] == 1) { ?>
                                    <a href="<?= BASEURL.'/pengguna/pesan/'.$data['id_produk']?>" class="btn btn-primary col-md-12">Pesan Sekarang</a>
                                <?php } } if($data['status'] == 0) { ?>
                                    <a href="#" class="btn btn-danger col-md-12">Produk Tidak AKtif</a>
                                <?php } ?>
                            </div>
                        </div>
					</div>
					<div class="blog_author_div wow fadeInUp">
						<div class="blog_author_img">
                            <?php if($data['foto'] != null) { ?>
							    <img src="<?= BASEURL.'/image/profile/'.$data['foto']?>" class="img-fluid" alt="Arsitek">
                            <?php } else { ?>
							    <img src="https://via.placeholder.com/122x122" class="img-fluid" alt="">
                            <?php } ?>
						</div>
						<div class="blog_author_content">
							<a href="<?=BASEURL.'/home/arsitek/'.$data['id_user']?>"><h3><?= $data['nama_lengkap'] ?></h3></a>
							<p><?= $data['nama_lengkap'] ?> telah berkontribusi dan bekerja sama dengan ArtNow sejak <?= date('d F Y', strtotime($data['user_dibuat_pada'])) ?></p>
                            <?php if(isset($_SESSION['email'])) { ?>
                                <div class="col-md-12">
                                    <table border='0'>
                                        <tr>
                                            <td>No Hp</td>
                                            <td>: <?= $data['telepon'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>: <?= $data['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>: <?= $data['alamat'] ?></td>
                                        </tr>
                                    </table>
                                    <?php if($_SESSION['level'] == 0){?>
                                        <a href="<?= BASEURL.'/chat/index?ke='.$data['id_user']?>" class="btn btn-warning col-md-12">Chat Arsitek</a>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-12">
                                    <a href="<?= BASEURL?>/auth/login" class="btn btn-light col-md-12">Login untuk melihat kontak Arsitek</a>
                                </div>
                            <?php } ?>
                        </div>
					</div>
					<div class="blog_comment_div">
						<h3 class="wow fadeInUp">Komentar <span>(4)</span></h3>
						<ol class="comment-list">
							<li class="wow fadeInUp">
								<div class="blog_comment">
									<div class="blog_comment_img">
										<img src="https://via.placeholder.com/70x70" class="img-fluid" alt="">
									</div>
									<div class="blog_comment_data">
										<h3>John Doe <span>- 29 july 2018</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusd tempor incidiunt utorekse eet dolore magna aliqua. Ut enim ad minim veniam,</p>
									</div>
								</div>
								<div class="blog_comment_meta">
									<ul>
										<li>
											<a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="21px" height="13px"><path fill-rule="evenodd"  fill="rgb(255, 54, 87)" d="M6.125,2.599 L6.125,-0.000 L-0.000,6.066 L6.125,12.132 L6.125,9.533 L2.625,6.066 L6.125,2.599 ZM11.375,3.466 L11.375,-0.000 L5.250,6.066 L11.375,12.132 L11.375,8.579 C15.750,8.579 18.812,9.966 21.000,12.999 C20.125,8.666 17.500,4.332 11.375,3.466 Z"/></svg></a>
										</li>
									</ul>
									<div class="blog_comment_action">
										<span><i class="fa fa-ellipsis-v"></i></span>
									</div>
									<ul class="comment_action">
										<li><a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px"><path fill-rule="evenodd"  fill="rgb(112, 112, 112)" d="M13.487,4.224 L12.869,4.844 L9.156,1.131 L9.775,0.512 C10.458,-0.171 11.567,-0.171 12.250,0.512 L13.487,1.750 C14.170,2.433 14.170,3.541 13.487,4.224 ZM4.825,11.649 C4.654,11.820 4.654,12.097 4.825,12.267 C4.996,12.439 5.273,12.439 5.444,12.267 L12.250,5.462 L11.631,4.843 L4.825,11.649 ZM1.731,8.555 C1.560,8.726 1.560,9.003 1.731,9.174 C1.902,9.345 2.179,9.345 2.350,9.174 L9.156,2.368 L8.538,1.750 L1.731,8.555 ZM9.774,2.987 L2.968,9.793 C2.626,10.134 2.627,10.688 2.968,11.030 C3.310,11.372 3.864,11.373 4.206,11.029 L11.012,4.224 L9.774,2.987 ZM4.205,12.884 C3.995,12.675 3.894,12.409 3.857,12.136 C3.768,12.150 3.678,12.162 3.587,12.162 C3.119,12.162 2.680,11.980 2.350,11.649 C2.019,11.317 1.837,10.879 1.837,10.411 C1.837,10.326 1.850,10.243 1.862,10.160 C1.579,10.122 1.317,9.998 1.112,9.793 C1.093,9.773 1.086,9.746 1.068,9.725 L-0.000,14.000 L4.263,12.932 C4.244,12.915 4.223,12.902 4.205,12.884 Z"/></svg> Edit Post</a></li>
										<li><a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="11px" height="16px"><path fill-rule="evenodd"  fill="rgb(112, 112, 112)" d="M9.485,4.765 L1.578,4.765 C0.746,4.765 0.072,5.413 0.072,6.214 L0.888,14.551 C0.888,15.351 1.563,16.000 2.395,16.000 L8.795,16.000 C9.627,16.000 10.302,15.351 10.302,14.551 L10.992,6.214 C10.991,5.413 10.317,4.765 9.485,4.765 ZM3.523,13.463 C3.523,13.863 3.186,14.186 2.771,14.186 C2.355,14.186 2.018,13.862 2.018,13.463 L2.018,6.939 C2.018,6.539 2.355,6.214 2.771,6.214 C3.186,6.214 3.523,6.539 3.523,6.939 L3.523,13.463 L3.523,13.463 ZM6.159,13.463 C6.159,13.863 5.822,14.186 5.406,14.186 C4.990,14.186 4.653,13.862 4.653,13.463 L4.653,6.939 C4.653,6.539 4.990,6.214 5.406,6.214 C5.822,6.214 6.159,6.539 6.159,6.939 L6.159,13.463 ZM8.795,13.463 C8.795,13.863 8.458,14.186 8.042,14.186 C7.626,14.186 7.289,13.862 7.289,13.463 L7.289,6.939 C7.289,6.539 7.626,6.214 8.042,6.214 C8.458,6.214 8.795,6.539 8.795,6.939 L8.795,13.463 ZM1.176,4.041 L10.292,1.784 C10.796,1.659 11.099,1.166 10.970,0.681 C10.840,0.197 10.327,-0.095 9.823,0.028 L7.021,0.722 C6.761,0.351 6.282,0.157 5.807,0.274 L4.713,0.546 C4.238,0.663 3.916,1.056 3.874,1.501 L0.707,2.286 C0.203,2.410 -0.099,2.904 0.030,3.389 C0.159,3.873 0.673,4.164 1.176,4.041 Z"/></svg> Delete Post</a></li>
									</ul>
								</div>
								<ul class="children">
									<li>
										<div class="blog_comment">
											<div class="blog_comment_img">
												<img src="https://via.placeholder.com/70x70" class="img-fluid" alt="">
											</div>
											<div class="blog_comment_data">
												<h3>John Doe <span>- 29 july 2018</span></h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusd tempor incidiunt utorekse eet dolore magna aliqua. Ut enim ad minim veniam,</p>
											</div>
										</div>
										<div class="blog_comment_meta">
											<ul>
												<li>
													<a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="21px" height="13px"><path fill-rule="evenodd"  fill="rgb(255, 54, 87)" d="M6.125,2.599 L6.125,-0.000 L-0.000,6.066 L6.125,12.132 L6.125,9.533 L2.625,6.066 L6.125,2.599 ZM11.375,3.466 L11.375,-0.000 L5.250,6.066 L11.375,12.132 L11.375,8.579 C15.750,8.579 18.812,9.966 21.000,12.999 C20.125,8.666 17.500,4.332 11.375,3.466 Z"/></svg></a>
												</li>
											</ul>
											<div class="blog_comment_action">
												<span><i class="fa fa-ellipsis-v"></i></span>
											</div>
											<ul class="comment_action">
												<li><a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px"><path fill-rule="evenodd"  fill="rgb(112, 112, 112)" d="M13.487,4.224 L12.869,4.844 L9.156,1.131 L9.775,0.512 C10.458,-0.171 11.567,-0.171 12.250,0.512 L13.487,1.750 C14.170,2.433 14.170,3.541 13.487,4.224 ZM4.825,11.649 C4.654,11.820 4.654,12.097 4.825,12.267 C4.996,12.439 5.273,12.439 5.444,12.267 L12.250,5.462 L11.631,4.843 L4.825,11.649 ZM1.731,8.555 C1.560,8.726 1.560,9.003 1.731,9.174 C1.902,9.345 2.179,9.345 2.350,9.174 L9.156,2.368 L8.538,1.750 L1.731,8.555 ZM9.774,2.987 L2.968,9.793 C2.626,10.134 2.627,10.688 2.968,11.030 C3.310,11.372 3.864,11.373 4.206,11.029 L11.012,4.224 L9.774,2.987 ZM4.205,12.884 C3.995,12.675 3.894,12.409 3.857,12.136 C3.768,12.150 3.678,12.162 3.587,12.162 C3.119,12.162 2.680,11.980 2.350,11.649 C2.019,11.317 1.837,10.879 1.837,10.411 C1.837,10.326 1.850,10.243 1.862,10.160 C1.579,10.122 1.317,9.998 1.112,9.793 C1.093,9.773 1.086,9.746 1.068,9.725 L-0.000,14.000 L4.263,12.932 C4.244,12.915 4.223,12.902 4.205,12.884 Z"/></svg> Edit Post</a></li>
												<li><a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="11px" height="16px"><path fill-rule="evenodd"  fill="rgb(112, 112, 112)" d="M9.485,4.765 L1.578,4.765 C0.746,4.765 0.072,5.413 0.072,6.214 L0.888,14.551 C0.888,15.351 1.563,16.000 2.395,16.000 L8.795,16.000 C9.627,16.000 10.302,15.351 10.302,14.551 L10.992,6.214 C10.991,5.413 10.317,4.765 9.485,4.765 ZM3.523,13.463 C3.523,13.863 3.186,14.186 2.771,14.186 C2.355,14.186 2.018,13.862 2.018,13.463 L2.018,6.939 C2.018,6.539 2.355,6.214 2.771,6.214 C3.186,6.214 3.523,6.539 3.523,6.939 L3.523,13.463 L3.523,13.463 ZM6.159,13.463 C6.159,13.863 5.822,14.186 5.406,14.186 C4.990,14.186 4.653,13.862 4.653,13.463 L4.653,6.939 C4.653,6.539 4.990,6.214 5.406,6.214 C5.822,6.214 6.159,6.539 6.159,6.939 L6.159,13.463 ZM8.795,13.463 C8.795,13.863 8.458,14.186 8.042,14.186 C7.626,14.186 7.289,13.862 7.289,13.463 L7.289,6.939 C7.289,6.539 7.626,6.214 8.042,6.214 C8.458,6.214 8.795,6.539 8.795,6.939 L8.795,13.463 ZM1.176,4.041 L10.292,1.784 C10.796,1.659 11.099,1.166 10.970,0.681 C10.840,0.197 10.327,-0.095 9.823,0.028 L7.021,0.722 C6.761,0.351 6.282,0.157 5.807,0.274 L4.713,0.546 C4.238,0.663 3.916,1.056 3.874,1.501 L0.707,2.286 C0.203,2.410 -0.099,2.904 0.030,3.389 C0.159,3.873 0.673,4.164 1.176,4.041 Z"/></svg> Delete Post</a></li>
											</ul>
										</div>
									</li>
								</ul>
							</li>
							<li class="wow fadeInUp">
								<div class="blog_comment">
									<div class="blog_comment_img">
										<img src="https://via.placeholder.com/70x70" class="img-fluid" alt="">
									</div>
									<div class="blog_comment_data">
										<h3>John Doe <span>- 29 july 2018</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusd tempor incidiunt utorekse eet dolore magna aliqua. Ut enim ad minim veniam,</p>
									</div>
								</div>
								<div class="blog_comment_meta">
									<ul>
										<li>
											<a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="21px" height="13px"><path fill-rule="evenodd"  fill="rgb(255, 54, 87)" d="M6.125,2.599 L6.125,-0.000 L-0.000,6.066 L6.125,12.132 L6.125,9.533 L2.625,6.066 L6.125,2.599 ZM11.375,3.466 L11.375,-0.000 L5.250,6.066 L11.375,12.132 L11.375,8.579 C15.750,8.579 18.812,9.966 21.000,12.999 C20.125,8.666 17.500,4.332 11.375,3.466 Z"/></svg></a>
										</li>
									</ul>
									<div class="blog_comment_action">
										<span><i class="fa fa-ellipsis-v"></i></span>
									</div>
									<ul class="comment_action">
										<li><a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px"><path fill-rule="evenodd"  fill="rgb(112, 112, 112)" d="M13.487,4.224 L12.869,4.844 L9.156,1.131 L9.775,0.512 C10.458,-0.171 11.567,-0.171 12.250,0.512 L13.487,1.750 C14.170,2.433 14.170,3.541 13.487,4.224 ZM4.825,11.649 C4.654,11.820 4.654,12.097 4.825,12.267 C4.996,12.439 5.273,12.439 5.444,12.267 L12.250,5.462 L11.631,4.843 L4.825,11.649 ZM1.731,8.555 C1.560,8.726 1.560,9.003 1.731,9.174 C1.902,9.345 2.179,9.345 2.350,9.174 L9.156,2.368 L8.538,1.750 L1.731,8.555 ZM9.774,2.987 L2.968,9.793 C2.626,10.134 2.627,10.688 2.968,11.030 C3.310,11.372 3.864,11.373 4.206,11.029 L11.012,4.224 L9.774,2.987 ZM4.205,12.884 C3.995,12.675 3.894,12.409 3.857,12.136 C3.768,12.150 3.678,12.162 3.587,12.162 C3.119,12.162 2.680,11.980 2.350,11.649 C2.019,11.317 1.837,10.879 1.837,10.411 C1.837,10.326 1.850,10.243 1.862,10.160 C1.579,10.122 1.317,9.998 1.112,9.793 C1.093,9.773 1.086,9.746 1.068,9.725 L-0.000,14.000 L4.263,12.932 C4.244,12.915 4.223,12.902 4.205,12.884 Z"/></svg> Edit Post</a></li>
										<li><a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="11px" height="16px"><path fill-rule="evenodd"  fill="rgb(112, 112, 112)" d="M9.485,4.765 L1.578,4.765 C0.746,4.765 0.072,5.413 0.072,6.214 L0.888,14.551 C0.888,15.351 1.563,16.000 2.395,16.000 L8.795,16.000 C9.627,16.000 10.302,15.351 10.302,14.551 L10.992,6.214 C10.991,5.413 10.317,4.765 9.485,4.765 ZM3.523,13.463 C3.523,13.863 3.186,14.186 2.771,14.186 C2.355,14.186 2.018,13.862 2.018,13.463 L2.018,6.939 C2.018,6.539 2.355,6.214 2.771,6.214 C3.186,6.214 3.523,6.539 3.523,6.939 L3.523,13.463 L3.523,13.463 ZM6.159,13.463 C6.159,13.863 5.822,14.186 5.406,14.186 C4.990,14.186 4.653,13.862 4.653,13.463 L4.653,6.939 C4.653,6.539 4.990,6.214 5.406,6.214 C5.822,6.214 6.159,6.539 6.159,6.939 L6.159,13.463 ZM8.795,13.463 C8.795,13.863 8.458,14.186 8.042,14.186 C7.626,14.186 7.289,13.862 7.289,13.463 L7.289,6.939 C7.289,6.539 7.626,6.214 8.042,6.214 C8.458,6.214 8.795,6.539 8.795,6.939 L8.795,13.463 ZM1.176,4.041 L10.292,1.784 C10.796,1.659 11.099,1.166 10.970,0.681 C10.840,0.197 10.327,-0.095 9.823,0.028 L7.021,0.722 C6.761,0.351 6.282,0.157 5.807,0.274 L4.713,0.546 C4.238,0.663 3.916,1.056 3.874,1.501 L0.707,2.286 C0.203,2.410 -0.099,2.904 0.030,3.389 C0.159,3.873 0.673,4.164 1.176,4.041 Z"/></svg> Delete Post</a></li>
									</ul>
								</div>
							</li>
							<li class="wow fadeInUp">
								<div class="blog_comment">
									<div class="blog_comment_img">
										<img src="https://via.placeholder.com/70x70" class="img-fluid" alt="">
									</div>
									<div class="blog_comment_data">
										<h3>John Doe <span>- 29 july 2018</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusd tempor incidiunt utorekse eet dolore magna aliqua. Ut enim ad minim veniam,</p>
									</div>
								</div>
								<div class="blog_comment_meta">
									<ul>
										<li>
											<a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="21px" height="13px"><path fill-rule="evenodd"  fill="rgb(255, 54, 87)" d="M6.125,2.599 L6.125,-0.000 L-0.000,6.066 L6.125,12.132 L6.125,9.533 L2.625,6.066 L6.125,2.599 ZM11.375,3.466 L11.375,-0.000 L5.250,6.066 L11.375,12.132 L11.375,8.579 C15.750,8.579 18.812,9.966 21.000,12.999 C20.125,8.666 17.500,4.332 11.375,3.466 Z"/></svg></a>
										</li>
									</ul>
									<div class="blog_comment_action">
										<span><i class="fa fa-ellipsis-v"></i></span>
									</div>
									<ul class="comment_action">
										<li><a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px"><path fill-rule="evenodd"  fill="rgb(112, 112, 112)" d="M13.487,4.224 L12.869,4.844 L9.156,1.131 L9.775,0.512 C10.458,-0.171 11.567,-0.171 12.250,0.512 L13.487,1.750 C14.170,2.433 14.170,3.541 13.487,4.224 ZM4.825,11.649 C4.654,11.820 4.654,12.097 4.825,12.267 C4.996,12.439 5.273,12.439 5.444,12.267 L12.250,5.462 L11.631,4.843 L4.825,11.649 ZM1.731,8.555 C1.560,8.726 1.560,9.003 1.731,9.174 C1.902,9.345 2.179,9.345 2.350,9.174 L9.156,2.368 L8.538,1.750 L1.731,8.555 ZM9.774,2.987 L2.968,9.793 C2.626,10.134 2.627,10.688 2.968,11.030 C3.310,11.372 3.864,11.373 4.206,11.029 L11.012,4.224 L9.774,2.987 ZM4.205,12.884 C3.995,12.675 3.894,12.409 3.857,12.136 C3.768,12.150 3.678,12.162 3.587,12.162 C3.119,12.162 2.680,11.980 2.350,11.649 C2.019,11.317 1.837,10.879 1.837,10.411 C1.837,10.326 1.850,10.243 1.862,10.160 C1.579,10.122 1.317,9.998 1.112,9.793 C1.093,9.773 1.086,9.746 1.068,9.725 L-0.000,14.000 L4.263,12.932 C4.244,12.915 4.223,12.902 4.205,12.884 Z"/></svg> Edit Post</a></li>
										<li><a href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="11px" height="16px"><path fill-rule="evenodd"  fill="rgb(112, 112, 112)" d="M9.485,4.765 L1.578,4.765 C0.746,4.765 0.072,5.413 0.072,6.214 L0.888,14.551 C0.888,15.351 1.563,16.000 2.395,16.000 L8.795,16.000 C9.627,16.000 10.302,15.351 10.302,14.551 L10.992,6.214 C10.991,5.413 10.317,4.765 9.485,4.765 ZM3.523,13.463 C3.523,13.863 3.186,14.186 2.771,14.186 C2.355,14.186 2.018,13.862 2.018,13.463 L2.018,6.939 C2.018,6.539 2.355,6.214 2.771,6.214 C3.186,6.214 3.523,6.539 3.523,6.939 L3.523,13.463 L3.523,13.463 ZM6.159,13.463 C6.159,13.863 5.822,14.186 5.406,14.186 C4.990,14.186 4.653,13.862 4.653,13.463 L4.653,6.939 C4.653,6.539 4.990,6.214 5.406,6.214 C5.822,6.214 6.159,6.539 6.159,6.939 L6.159,13.463 ZM8.795,13.463 C8.795,13.863 8.458,14.186 8.042,14.186 C7.626,14.186 7.289,13.862 7.289,13.463 L7.289,6.939 C7.289,6.539 7.626,6.214 8.042,6.214 C8.458,6.214 8.795,6.539 8.795,6.939 L8.795,13.463 ZM1.176,4.041 L10.292,1.784 C10.796,1.659 11.099,1.166 10.970,0.681 C10.840,0.197 10.327,-0.095 9.823,0.028 L7.021,0.722 C6.761,0.351 6.282,0.157 5.807,0.274 L4.713,0.546 C4.238,0.663 3.916,1.056 3.874,1.501 L0.707,2.286 C0.203,2.410 -0.099,2.904 0.030,3.389 C0.159,3.873 0.673,4.164 1.176,4.041 Z"/></svg> Delete Post</a></li>
									</ul>
								</div>
							</li>
						</ol>
					</div>
					<div class="blog_comment_formdiv wow fadeInUp">
						<h3>Tinggalkan Komentar</h3>
						<form class="comment-form">
                            <?php if(isset($_SESSION['email'])) { ?>
                                <div class="blog_row">
                                    <div class="blog_form_group">
                                        <textarea class="form-control" placeholder="Komentar" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="blog_row">
                                    <button class="blog_btn blog_bg_pink col-md-12">Kirim</button>
                                </div>
                            <?php } else {?>
                                <div class="blog_row">
                                    <a href="<?= BASEURL?>/auth/login" class="blog_btn blog_bg_pink col-md-12">Login Untuk Meninggalkan Komentar</a>
                                </div>
                            <?php } ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('layouts/footer.php'); ?>