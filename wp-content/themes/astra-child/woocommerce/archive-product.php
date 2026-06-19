<?php get_header(); ?>
<div role="main" class="main">

    <section 
				class="gazelle-page-header-bg-container menu-header-padding" 
				style="--page-desktop: url('<?php echo get_stylesheet_directory_uri() ?>/assets/img/gazelle-banner.jpg');
				--page-mobile: url('<?php echo get_stylesheet_directory_uri() ?>/assets/img/hero-mobile.jpg');
				">
					<div class="container">
						<div class="row justify-content-start">
							<div class="col-md-12">
								<h1 class="text-white">Bulk Orders Menu</h1>
								<p class="text-white">Browse menu categories to find meals for bulk orders, parties, events, churches, and more.</p>
								
							</div>
						</div>
					</div>
				</section>


    <section class="page-list-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 ">
                    <ul class="nav nav-list menu-filter flex-column sort-source mb-5" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
                        <li class="nav-item" data-option-value="*"><a class="nav-link active" style="--icon:'\f009';" href="#">Show All</a></li>
                            <?php

                                $categories = get_terms(array(
                                    'taxonomy'   => 'product_cat',
                                    'hide_empty' => true
                                ));

                                foreach ($categories as $category) :

                                    $icon = get_term_meta(
                                        $category->term_id,
                                        'category_icon',
                                        true
                                    );

                                    $slug = sanitize_html_class(
                                        $category->slug
                                    );

                                ?>

                            <li class="nav-item"
                                data-option-value=".<?php echo esc_attr($slug); ?>">

                                <a class="nav-link"
                                style="--icon:'\<?php echo esc_attr($icon); ?>';"
                                href="#">

                                    <?php echo esc_html($category->name); ?>

                                </a>

                            </li>

                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-lg-9 ">
                    <div class="sort-destination-loader sort-destination-loader-showing">
                        <div class="row pt-0 portfolio-list sort-destination" data-sort-id="portfolio">
                            <?php
                                if (woocommerce_product_loop()) {

                                    while (have_posts()) {

                                        the_post();

                                        // HERE
                                        $product_categories = get_the_terms(
                                            get_the_ID(),
                                            'product_cat'
                                        );

                                        $classes = array();

                                        if ($product_categories) {

                                            foreach ($product_categories as $category) {

                                                $classes[] = sanitize_html_class(
                                                    $category->slug
                                                );

                                            }

                                        }
                                        ?>

                                        <div class="col-md-6 col-lg-4 isotope-item <?php echo esc_attr(implode(' ', $classes)); ?>">

                                            <?php get_template_part('template-parts/components/product-card'); ?>

                                        </div>

                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    






<?php get_footer(); ?>