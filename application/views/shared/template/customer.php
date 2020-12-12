<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PARFUMA</title>
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/sprystore/'); ?>assets/css/style-starter.css">
  <!-- Template CSS -->
  <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet">
  <!-- Template CSS -->

</head>
<body>
<!--w3l-banner-slider-main-->
<section class="w3l-banner-slider-main">
	<div class="top-header-content">
		<header class="tophny-header">
			<div class="container-fluid">
				<div class="top-right-strip row">
					<!--/left-->
					<div class="top-hny-left-content col-lg-6 pl-lg-0">
						<h6>Selamat datang di </h6>
					</div>
					<!--//left-->
					<!--/right-->
					<ul class="top-hnt-right-content col-lg-6">

						<li class="button-log usernhy">
							<a class="btn-open" href="#">
								<span class="fa fa-user" aria-hidden="true"></span>
							</a>
						</li>
						<li class="transmitvcart galssescart2 cart cart box_1" <?php if(!$this->session->userdata('isLogin')){echo 'hidden';} ?>>
							<form  class="last">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="display" value="1">
								<button class="top_transmitv_cart" type="submit" name="submit" value="">
									Keranjang
									<span class="fa fa-shopping-cart"></span>
								</button>
							</form>
						</li>
					</ul>
					<!--//right-->
					<div class="overlay-login text-left">
						<button type="button" class="overlay-close1">
							<i class="fa fa-times" aria-hidden="true"></i>
						</button>
						<div class="wrap">
							<h5 class="text-center mb-4">Akun</h5>
							<div class="login-bghny p-md-5 p-4 mx-auto mw-100">
								<a href="<?php echo $this->session->flashdata('link'); ?>" <?php if($this->session->userdata('isLogin')){echo 'hidden';} ?>>
									<img src="<?php echo base_url('assets/picture/googlelogin.png'); ?>"  style="width:200px">
								</a>
								<div class="form-group" <?php if(!$this->session->userdata('isLogin')){echo 'hidden';} ?>>
									<img src="<?php echo $this->session->userdata('image'); ?>"  style="width:200px">
									<p class="login-texthny mb-2"><?php echo $this->session->userdata('name'); ?></p>
								</div>
								<a href="<?php echo base_url('logout'); ?>" <?php if(!$this->session->userdata('isLogin')){echo 'hidden';} ?>>
									<button type="submit" class="submit-login btn mb-4">Logout</button>
								</a>
							</div>
							<!---->
						</div>
					</div>
				</div>
			</div>
			<!--/nav-->
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid serarc-fluid">
					<a class="navbar-brand" href="index.html">
						Parfum<span class="lohny">Mania</span></a>
					<!-- if logo is image enable this   
							<a class="navbar-brand" href="#index.html">
								<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
							</a> -->
					<!--/search-right-->
					<div class="search-right">

						<a href="#search" title="Pencarian"><span class="fa fa-search mr-2" aria-hidden="true"></span>
							<span class="search-text">Pencarian</span></a>
						<!-- search popup -->
						<div id="search" class="pop-overlay">
							<div class="popup">

								<form method="post" class="search-box">
									<input type="search" placeholder="Cari parfum" name="search" required="required"
										autofocus="">
									<button type="submit" class="btn">Cari</button>
								</form>

							</div>
							<a class="close" href="#">×</a>
						</div>
						<!-- /search popup -->
					</div>
					<!--//search-right-->
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon fa fa-bars"> </span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active">
								<a class="nav-link" href="<?php echo base_url('home'); ?>">Beranda</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('dashboard'); ?>"<?php if((!$this->session->userdata('isLogin')) || ($this->session->userdata('roleId')==$this->config->item('customer_role_id'))){echo 'hidden'; }?>>Dashboard</a>
							</li>
						</ul>

					</div>
				</div>
			</nav>
			<!--//nav-->
		</header>
		<div class="bannerhny-content">

			<!--/banner-slider-->
			<div class="content-baner-inf">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="container">
								<div class="carousel-caption">
									<h3>Women's
										Fashion
										<br>50% Off</h3>
									<a href="#" class="shop-button btn">
										Shop Now
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item2">
							<div class="container">
								<div class="carousel-caption">
									<h3>Men's
										Fashion
										<br>60% Off</h3>
									<a href="#" class="shop-button btn">
										Shop Now
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item3">
							<div class="container">
								<div class="carousel-caption">
									<h3>Women's
										Fashion
										<br>50% Off</h3>
									<a href="#" class="shop-button btn">
										Shop Now
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item4">
							<div class="container">
								<div class="carousel-caption">
									<h3>Men's
										Fashion
										<br>60% Off</h3>
									<a href="#" class="shop-button btn">
										Shop Now
									</a>
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<!--//banner-slider-->
			<!--//banner-slider-->
			<div class="right-banner">
				<div class="right-1">
					<h4>
						Men's
						Fashion
						<br>50% Off</h4>
				</div>
			</div>

		</div>

</section>


<section class="w3l-ecommerce-main">
	<!-- /products-->
	<div class="ecom-contenthny py-5">
		<div class="container py-lg-5">
			<h3 class="hny-title mb-0 text-center">Belanja parfum <span>Disini</span></h3>
			<!-- /row-->
			<div class="ecom-products-grids row mt-lg-5 mt-3">
				<?php foreach($products as $product){ ?>
				
				<div class="col-lg-3 col-6 product-incfhny mt-4">
					<div class="product-grid2 transmitv">
						<div class="product-image2">
							<a href="#">
								<img class="pic-1 img-fluid" src="<?php echo base_url('assets/picture/'.$product->image); ?>">
								<img class="pic-2 img-fluid" src="<?php echo base_url('assets/picture/'.$product->image); ?>">
							</a>
							<ul class="social">
									<li><a href="#" data-tip="Add to Cart"><span class="fa fa-shopping-bag"></span></a>
									</li>
							</ul>
							<div class="transmitv single-item">
							<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="transmitv_item" value="<?php echo $product->name; ?>">
									<input type="hidden" name="amount" value="<?php echo $product->price; ?>">
									<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
										Tambah ke keranjang
									</button>
								</form>
							</div>
						</div>
						<div class="product-content">
							<h3 class="title"><a href="#"><?php echo $product->name; ?></a></h3>
							<span class="price">RP. <?php echo $product->price; ?></span>
						</div>
					</div>
				</div>
				<?php } ?>


			</div>
			<!-- //row-->
		</div>
	</div>
</section>
<!-- //products-->

<!-- //content-6-section -->

<!-- //post-grids-->


  <section class="w3l-footer-22">
      <!-- footer-22 -->
      <div class="footer-hny py-5">
          <div class="container py-lg-5">
              <div class="text-txt row">
                  <div class="left-side col-lg-4">
                      <h3><a class="logo-footer" href="index.html">
                            Parfum<span class="lohny"></span>mania</a></h3>
                      <!-- if logo is image enable this   
                                    <a class="navbar-brand" href="#index.html">
                                        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                                    </a> -->
                      <p><?php echo $this->config->item('slogan'); ?></p>
                      <ul class="social-footerhny mt-lg-5 mt-4">

                          <li><a class="facebook" href="#"><span class="fa fa-facebook" aria-hidden="true" href='<?php echo $this->config->item('facebook'); ?>'></span></a>
                          </li>
                          <li><a class="twitter" href="#"><span class="fa fa-twitter" aria-hidden="true" href="<?php echo $this->config->item('twitter'); ?>"></span></a>
                          </li>
                          <li><a class="instagram" href="#"><span class="fa fa-instagram" aria-hidden="true" href="<?php echo $this->config->item('instagram'); ?>"></span></a>
                          </li>
                      </ul>
                  </div>

                  <div class="right-side col-lg-8 pl-lg-5">
                          <div class="sub-two-right">
                              <h6>Our Store</h6>
                              <p class="mb-5"><?php echo $this->config->item('address'); ?></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- //titels-5 -->
      <!-- move top -->

      <script>
          // When the user scrolls down 20px from the top of the document, show the button
          window.onscroll = function () {
              scrollFunction()
          };

          function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                  document.getElementById("movetop").style.display = "block";
              } else {
                  document.getElementById("movetop").style.display = "none";
              }
          }

          // When the user clicks on the button, scroll to the top of the document
          function topFunction() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
          }
      </script>
      <!-- /move top -->
  </section>


  </body>

  </html>

<script src="<?php echo base_url('assets/template/sprystore/'); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url('assets/template/sprystore/'); ?>assets/js/jquery-2.1.4.min.js"></script>
<!--/login-->
<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
  </script>
<!--//login-->
<script>
// optional
    // $('#customerhnyCarousel').carousel({
	// 			interval: 5000
    // });
  </script>
 <!-- cart-js -->
 <script src="<?php echo base_url('assets/template/sprystore/'); ?>assets/js/minicart.js"></script>
 <script>
     transmitv.render();

     transmitv.cart.on('transmitv_checkout', function (evt) {
         var items, len, i;

         if (this.subtotal() > 0) {
             items = this.items();

             for (i = 0, len = items.length; i < len; i++) {}
         }
     });
 </script>
 <!-- //cart-js -->
<!--pop-up-box-->
<script src="<?php echo base_url('assets/template/sprystore/'); ?>assets/js/jquery.magnific-popup.js"></script>
<!--//pop-up-box-->
<script>
  $(document).ready(function () {
    $('.popup-with-zoom-anim').magnificPopup({
      type: 'inline',
      fixedContentPos: false,
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });

  });
</script>
<!--//search-bar-->
<!-- disable body scroll which navbar is in active -->

<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll which navbar is in active -->
<script src="<?php echo base_url('assets/template/sprystore/'); ?>assets/js/bootstrap.min.js"></script>

