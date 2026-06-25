<?php 
  get_header(); 
?>
<div role="main" class="main shop">
    
        <section class="section bg-white">
            <div class="container">
                <?php get_template_part( "template-parts/components/product-content" ) ?>
            </div>
        </section>
        <section class="section bg-light">
			<div class="container">
				<div class="row">
					<div class="col">
						<h4 class="moving-card-title">Related Menus</h4>

                        <div class="owl-carousel owl-theme show-nav-title"
                            data-plugin-options='{
                                "items": 4,
                                "margin": 10,
                                "loop": false,
                                "nav": true,
                                "dots": false,
                                "responsive": {
                                    "0": {"items": 1},
                                    "576": {"items": 2},
                                    "768": {"items": 3},
                                    "992": {"items": 4},
                                    "1200": {"items": 4}
                                }
                            }'>

                                   <?php

                                        $product_id = get_the_ID();

                                        $related_ids = wc_get_related_products($product_id, 8);

                                        if (!empty($related_ids)) :

                                            foreach ($related_ids as $related_id) :

                                                $product = wc_get_product($related_id);

                                        ?>

                                                <div class="item">

                                                    <?php
                                                    set_query_var('product_id', $related_id);
                                                    get_template_part('template-parts/components/product-card');
                                                    ?>

                                                </div>

                                        <?php

                                            endforeach;

                                        endif;

                                        ?>

                            </div>

                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="why-order" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/img/order-man.jpg);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="text-center px-3">
                            <h2 class="mb-3 gazelle-column-hero">Why Order From <br>Gazelles Kitchen?</h2>
                            <ul class="list list-icons gazelle-list-icons">
                                <li><i class="fas fa-check"></i> Authentic Nigerian Taste </li>
                                <li><i class="fas fa-check"></i> Freshly Prepared </li>
                                <li><i class="fas fa-check"></i>  Quality Ingredients </li>
                                <li><i class="fas fa-check"></i> Delivery Across Selected Areas</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </section>

        <section class="catering-order" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/img/caterer.jpg);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-12">
                        <div class="px-3">
                            <h2 class="gazelle-column-hero">Need Catering For An Event?</h2>
                            <p class="gazellecolumn-paragraph">
                                Planning a birthday, wedding,
                                church gathering or corporate event?
                            </p>
                            <a href="<?php echo esc_url( get_post_type_archive_link('gpp_pricing_plan') ); ?>" class="btn btn-transparent-outline">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <?php get_template_part( "template-parts/how-to-order" ) ?>
        <?php get_template_part( "template-parts/social-proof" ) ?>




</div>

    






<?php get_footer(); ?>