<?php get_header(); ?>

<div role="main" class="main">
	<section 
	class="hero-banner" 
	style="--hero-desktop: url('../img/gazelle-banner.jpg');
					--hero-mobile: url('../img/hero-mobile.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12">
					<span class="badge border bg-secondary badge-banner border-secondary text-white  mb-2">AUTHENTIC NIGERIAN FOOD</span>
					<h1 class="banner-heading">
						Fresh Nigerian Meals in 
						the Netherlands
					</h1>
					<p class="banner-para">
						Enjoy delicious, homemade Nigerian meals<br>
						made with love. Meal prep, bulk orders and<br>
						catering for all occasions.
					</p>
					<a href="#" class="btn banner-btn  rounded-4">
						<i class="fa-brands fa-whatsapp fs-5"></i>
						Order on WhatsApp
					</a>
					<a href="#" class="btn banner-secondary-btn banner-secondary-btn-outline mobile-menu-btn rounded-4">
						<i class="icon-book-open fs-6"></i>
						View Menu
					</a>
					<div class="my-2 country-banner-text d-flex align-items-center">
						<i class="icon-location-pin me-1"></i>
						<span class="me-1">
							Proudly serving Nigerians across the Netherlands
						</span>
						<img src="https://flagcdn.com/nl.svg" alt="Netherlands Flag" width="20">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section bg-white">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="heading heading-border heading-middle-border heading-middle-border-center text-center">
						<h2>What We Offer</h2>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
					<div class="card service-container rounded-3">
						<div class="service-container-img">
							<img   src="img/menus/meal-prep.jpg" alt="Card Image">
						</div>
						<div class="card-body px-3 pt-3 service-content shadow-sm">
							<div class="service-icon me-2 bg-primary">
								<i class="icon-calendar"></i>
							</div>
							<div class="service-main-content">
								<h4 class="card-title mb-1 text-4 font-weight-bold">Meal Prep</h4>
								<p class="card-text mb-2 pb-1">
								Weekly meal prep for busy
								individuals and families
								</p>
								<a href="/" class="read-more text-color-primary font-weight-semibold text-2">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
					<div class="card service-container rounded-3">
						<div class="service-container-img">
							<img   src="img/menus/bulk-order.jpg" alt="Card Image">
						</div>
						<div class="card-body px-3 pt-3 service-content shadow-sm">
							<div class="service-icon me-2 bg-lightred">
								<i class="icon-briefcase"></i>
							</div>
							<div class="service-main-content">
								<h4 class="card-title mb-1 text-4 font-weight-bold">Bulk Order</h4>
								<p class="card-text mb-2 pb-1">
								Order in bulk for parties,
								events, churches and more.
								</p>
								<a href="/" class="read-more text-color-primary font-weight-semibold text-2">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
					<div class="card service-container rounded-3">
						<div class="service-container-img">
							<img   src="img/menus/catering.jpg" alt="Card Image">
						</div>
						<div class="card-body px-3 pt-3 service-content shadow-sm">
							<div class="service-icon me-2 bg-secondary">
								<i class="icon-briefcase"></i>
							</div>
							<div class="service-main-content">
								<h4 class="card-title mb-1 text-4 font-weight-bold">Catering</h4>
								<p class="card-text mb-2 pb-1">
									Catering for parties,weddings,
									corporate events & more.
								</p>
								<a href="/" class="read-more text-color-primary font-weight-semibold text-2">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>

	<section class="section bg-light">
		<div class="container">
			<div class="row">
				<div class="col">
					<h4 class="moving-card-title">Popular Choices</h4>
					<div class="owl-carousel owl-theme show-nav-title" data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false,
					'responsive':{
							'0':{'items':1},
							'576':{'items':2},
							'768':{'items':3},
							'992':{'items':4},
							'1200':{'items':4}
						}
					}">

					<?php
					$args = [
						'post_type'      => 'product',
						'posts_per_page' => 8,
						'meta_query'     => [
							[
								'key'     => '_popular_menu',
								'value'   => 'yes',
								'compare' => '='
							]
						]
					];

					$popular = new WP_Query($args);

					if ($popular->have_posts()) :
						while ($popular->have_posts()) :
							$popular->the_post();
					?>

						<div>
							<?php echo get_template_part("template-parts/components/product-card") ?>
						</div>

					<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
						
						
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="py-4 bg-primary">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-2 d-flex align-items-center justify-content-center">
					<h2 class="how-to-order">How to <br>
						Order
					</h2>
				</div>
				<div class="col-lg-10">
					<div class="row">
						<div class="col-lg-3 col-md-6 d-flex align-items-center">
							<div class="how-step-box">
								<div class="how-step-icon">
									<i class="icon-notebook"></i>
								</div>
								<div class="how-step-content">
									<p class="how-step-number">1</p>
									<h4>Browse Menu</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing metus elit.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 d-flex align-items-center">
							<div class="how-step-box">
								<div class="how-step-icon">
									<i class="icon-cup"></i>
								</div>
								<div class="how-step-content">
									<p class="how-step-number">2</p>
									<h4>Choose Your Meal</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing metus elit.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 d-flex align-items-center">
							<div class="how-step-box">
								<div class="how-step-icon">
									<i class="fa-brands fa-whatsapp"></i>
								</div>
								<div class="how-step-content">
									<p class="how-step-number">3</p>
									<h4>Order on WhatsApp</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing metus elit.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 d-flex align-items-center">
							<div class="how-step-box">
								<div class="how-step-icon">
									<i class="icon-emotsmile"></i>
								</div>
								<div class="how-step-content">
									<p class="how-step-number">4</p>
									<h4>Confirm & Enjoy</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing metus elit.</p>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
	</section>

	<section class="section section section-text-light section-background section-center section-overlay-opacity section-overlay-opacity-scale-4" 
	style="background: url(img/order-man.jpg) no-repeat center/cover;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<h2 class="section-title">What Our Customers Say</h2>
				</div>
				<div class="col-lg-12">
					<div class="social-container">
						<div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40,
						'responsive':{
								'0':{'items':1},
								'576':{'items':2},
								'768':{'items':2},
								'992':{'items':3},
								'1200':{'items':3}
							}
							}">
							<div>
								<a class="testimonial d-block img-thumbnail-hover-icon lightbox" href="img/reviews/review1.jpg" data-plugin-options="{'type':'image'}">
									<img src="img/reviews/review1.jpg" alt="Project Image">
								</a>
								
							</div>
							<div>
								<a class="testimonial d-block img-thumbnail-hover-icon lightbox" href="img/reviews/review1.jpg" data-plugin-options="{'type':'image'}">
									<img src="img/reviews/review2.jpg" alt="Project Image">
								</a>
							</div>
							<div>
								<a class="testimonial d-block img-thumbnail-hover-icon lightbox" href="img/reviews/review1.jpg" data-plugin-options="{'type':'image'}">
									<img src="img/reviews/review3.jpg" alt="Project Image">
								</a>
							</div>
							<div>
								<a class="testimonial d-block img-thumbnail-hover-icon lightbox" href="img/reviews/review1.jpg" data-plugin-options="{'type':'image'}">
									<img src="img/reviews/review4.jpg" alt="Project Image">
								</a>
							</div>
							<div>
								<a class="testimonial d-block img-thumbnail-hover-icon lightbox" href="img/reviews/review1.jpg" data-plugin-options="{'type':'image'}">
									<img src="img/reviews/review5.jpg" alt="Project Image">
								</a>
							</div>
							<div>
								<a class="testimonial d-block img-thumbnail-hover-icon lightbox" href="img/reviews/review1.jpg" data-plugin-options="{'type':'image'}">
									<img src="img/reviews/review5.jpg" alt="Project Image">
								</a>
							</div>
							<div>
								<a class="testimonial d-block img-thumbnail-hover-icon lightbox" href="img/reviews/review1.jpg" data-plugin-options="{'type':'image'}">
									<img src="img/reviews/review6.jpg" alt="Project Image">
								</a>
							</div>
							<div>
								<a class="testimonial d-block img-thumbnail-hover-icon lightbox" href="img/reviews/review1.jpg" data-plugin-options="{'type':'image'}">
									<img src="img/reviews/review7.jpg" alt="Project Image">
								</a>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>

	<section class="section section section-text-light section-background section-center section-overlay-opacity section-overlay-opacity-scale-4" 
	style="background: url(img/order-man.jpg) no-repeat center/cover;">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-12">
					<div class="social-container">
						<div class="d-flex justify-content-between">
							<h4 class="social-proof">Follow us on instagram </h4>

							<a href="#" class="social-handle">@gazellekitchen</a>
							
						</div>
						<div class="row gx-0 gy-0">
							<div class="col-lg-3 col-md-3 col-sm-6 col-6">
								<a href="img/menus/catering.jpg" class="img-thumbnail-hover-icon lightbox ig-img-container" data-plugin-options="{'type':'image'}">
									<img src="img/menus/catering.jpg">
								</a>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-6">
								<a href="img/menus/meal-prep.jpg" class="img-thumbnail-hover-icon lightbox ig-img-container" data-plugin-options="{'type':'image'}">
									<img src="img/menus/meal-prep.jpg">
								</a>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-6">
								<a href="img/menus/bulk-order.jpg" class="img-thumbnail-hover-icon lightbox ig-img-container" data-plugin-options="{'type':'image'}">
									<img src="img/menus/bulk-order.jpg">
								</a>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-6">
								<a href="img/menus/catering.jpg" class="img-thumbnail-hover-icon lightbox ig-img-container" data-plugin-options="{'type':'image'}">
									<img src="img/menus/catering.jpg">
								</a>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-6">
								<a href="img/menus/catering.jpg" class="img-thumbnail-hover-icon lightbox ig-img-container" data-plugin-options="{'type':'image'}">
									<img src="img/menus/catering.jpg">
								</a>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-6">
								<a href="img/menus/meal-prep.jpg" class="img-thumbnail-hover-icon lightbox ig-img-container" data-plugin-options="{'type':'image'}">
									<img src="img/menus/meal-prep.jpg">
								</a>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-6">
								<a href="img/menus/bulk-order.jpg" class="img-thumbnail-hover-icon lightbox ig-img-container" data-plugin-options="{'type':'image'}">
									<img src="img/menus/bulk-order.jpg">
								</a>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-6">
								<a href="img/menus/catering.jpg" class="img-thumbnail-hover-icon lightbox ig-img-container" data-plugin-options="{'type':'image'}">
									<img src="img/menus/catering.jpg">
								</a>
							</div>
							
						</div>
							
					</div>
					
				</div>
			</div>
		</div>
	</section>
		
</div>


<?php get_footer(); ?>