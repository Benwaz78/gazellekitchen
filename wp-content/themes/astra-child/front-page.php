<?php 
get_header(); 
$page_id = get_option('page_on_front');
$hero     = get_post_meta($page_id, 'gau_home_hero_text', true);
$support = get_post_meta($page_id, 'gcm_home_support', true);
$desktop_id = get_post_meta($page_id, 'gcm_home_desktop', true);
$mobile_id  = get_post_meta($page_id, 'gcm_home_mobile', true);
$default = get_stylesheet_directory_uri() . '/assets/img/gazelle-banner.jpg';
$desktop = $desktop_id ? wp_get_attachment_image_url($desktop_id, 'general-banner-desktop') : $default;
$mobile_default = get_stylesheet_directory_uri() . '/assets/img/mobile_desktop.jpg';
$mobile_desktop = $mobile_id ? wp_get_attachment_image_url($mobile_id, 'general-banner-mobile') : $mobile_default;


?>

<div role="main" class="main shop">
	<section 
	class="hero-banner" 
	style="--hero-desktop: url('<?php echo esc_url($desktop); ?>');
					--hero-mobile: url('<?php echo esc_url($mobile_desktop); ?>');">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12">
					<span class="badge border bg-secondary badge-banner border-secondary text-white  mb-2">AUTHENTIC NIGERIAN FOOD</span>
					<h1 class="banner-heading">
						<?php echo esc_html($hero); ?>
					</h1>
					<p class="banner-para">
						<?php echo esc_html($support); ?>
					</p>
					<a href="<?php echo esc_url( get_post_type_archive_link('gpp_pricing_plan') ); ?>" class="btn banner-btn  rounded-4" target="_blank">
						<i class="icon-briefcase fs-5"></i>
						View Catering
					</a>
					<a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" target="_blank" class="btn banner-secondary-btn banner-secondary-btn-outline mobile-menu-btn rounded-4">
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
							<img   src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/menus/meal-prep.jpg" alt="Meal Prep">
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
								<a href="<?php echo get_permalink( get_page_by_path("meal-pre")) ?>" class="read-more text-color-primary font-weight-semibold text-2">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
					<div class="card service-container rounded-3">
						<div class="service-container-img">
							<img   src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/menus/bulk-order.jpg" alt="Bulk Order">
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
								<a 
								href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" 
								class="read-more text-color-primary font-weight-semibold text-2">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
					<div class="card service-container rounded-3">
						<div class="service-container-img">
							<img   src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/menus/catering.jpg" alt="Catering">
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
								<a href="<?php echo esc_url( get_post_type_archive_link('gpp_pricing_plan') ); ?>" class="read-more text-color-primary font-weight-semibold text-2">Read More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
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

	

	<?php get_template_part( "template-parts/how-to-order" ) ?>
	<?php get_template_part( "template-parts/social-proof" ) ?>
		
</div>


<?php get_footer(); ?>