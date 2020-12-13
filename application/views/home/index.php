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