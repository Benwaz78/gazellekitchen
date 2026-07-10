<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body data-plugin-page-transition>

	<div class="body">
		<header 
		  id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': false, 'stickyStartAt': 0}">
			<div class="header-body header-bg border-top-0">
				<!-- <div id="newLogoContainer"> -->
					<!-- <div id="flag"> -->
						<!-- <img src="img/logos/main-logo.png" alt="Gazelles Kitchen"> -->
					<!-- </div> -->
				<!-- </div> -->
				<div class="header-container container">
					<div class="header-row">
						<div class="header-column justify-content-end">
							<div class="header-row">
								<a href="#" id="newLogoContainer">
									<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logos/main-logo.png" alt="Gazelles Kitchen">
								</a>
								<div class="header-nav  order-2 order-lg-1">
									<div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
										<nav class="collapse">
											<?php
												wp_nav_menu([
													'theme_location' => 'primary',
													'container'      => false,
													'menu_class'     => 'nav nav-pills',
													'menu_id'        => 'mainNav',
													'fallback_cb'    => false
												]);

											?>
										</nav>
									</div>
									<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
										<i class="fas fa-bars"></i>
										Menu
									</button>
								</div>
								<div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
									
									<div class="header-nav-feature header-nav-features-cart d-inline-flex">
										<a href="#" class="header-nav-features-toggle" aria-label="">
											<i class="fa-solid fa-cart-shopping text-white"></i>
											<span class="cart-info">
												<span class="cart-qty"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
											</span>
										</a>
										<?php gazelle_header_mini_cart(); ?>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>