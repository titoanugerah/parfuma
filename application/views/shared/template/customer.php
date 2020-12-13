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
									<input type="search" placeholder="Cari parfum" name="keyword" id="keyword" autofocus="">
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
		<?php
	if(file_exists('./application/views/'.$viewName.'2.php'))
	{
		$this->load->view($viewName.'2'); 
	} else {
		$this->load->view('errors/404'); 
	}
?>


</section>

<?php
	if(file_exists('./application/views/'.$viewName.'.php'))
	{
		$this->load->view($viewName); 
	} else {
		$this->load->view('errors/404'); 
	}
?>

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
//		 this.cart
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

