<?php get_header(); ?>
<div role="main" class="main shop">
    
        <section class="section bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="thumb-gallery-wrapper">
                           <?php

                            global $product;

                            $product_id = get_the_ID();

                                $product = wc_get_product($product_id);

                                if (!$product) {
                                    return;
                                }

                                $featured_image_id = get_post_thumbnail_id($product_id);

                                $gallery_image_ids = $product->get_gallery_image_ids();

                            ?>

                            <div class="thumb-gallery-wrapper">

                                <!-- Main Gallery -->
                                <div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">

                                    <?php if ($featured_image_id) : ?>

                                        <div>
                                            <div class="big-img-gallery-container">
                                                <img
                                                    src="<?php echo esc_url(
                                                        wp_get_attachment_image_url(
                                                            $featured_image_id,
                                                            'menu-detail'
                                                        )
                                                    ); ?>"
                                                    alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
                                            </div>
                                        </div>

                                    <?php endif; ?>

                                    <?php foreach ($gallery_image_ids as $image_id) : ?>

                                        <div>
                                            <div class="big-img-gallery-container">
                                                <img
                                                    src="<?php echo esc_url(
                                                        wp_get_attachment_image_url(
                                                            $image_id,
                                                            'menu-detail'
                                                        )
                                                    ); ?>"
                                                    alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
                                            </div>
                                        </div>

                                    <?php endforeach; ?>

                                </div>

                                <!-- Thumbnail Gallery -->
                                <div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">

                                    <?php if ($featured_image_id) : ?>

                                        <div>
                                            <span class="d-block thumb-container cur-pointer">
                                                <img
                                                    src="<?php echo esc_url(
                                                        wp_get_attachment_image_url(
                                                            $featured_image_id,
                                                            'thumbnail'
                                                        )
                                                    ); ?>"
                                                    alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
                                            </span>
                                        </div>

                                    <?php endif; ?>

                                    <?php foreach ($gallery_image_ids as $image_id) : ?>

                                        <div>
                                            <span class="d-block thumb-container cur-pointer">
                                                <img
                                                    src="<?php echo esc_url(
                                                        wp_get_attachment_image_url(
                                                            $image_id,
                                                            'thumbnail'
                                                        )
                                                    ); ?>"
                                                    alt="<?php echo esc_attr(get_the_title($product_id)); ?>">
                                            </span>
                                        </div>

                                    <?php endforeach; ?>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <h1 class="menu-title-detail"><?php the_title() ?></h1>
                        <div class="menu-detail-content">
                            <?php

                                the_content()

                            ?>
                            
                        </div>

                        <h3 class="menu-detail-price">&euro; <?php echo $product->get_price(); ?> </h3>
                        <p class="availabilty-container">Availability: <span class="availabilty-status">AVAILABLE</span></p>
                        
                        <p class="mb-1">Portion Size</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="#" class="btn portion-border w-100">3L</a>
                            </div>
                            <div class="col-lg-6">
                                <a href="#" class="btn bg-white portion-border w-100">5L</a>
                            </div>
                        </div>
                        
                        
                        <hr>
                        

                        <form enctype="multipart/form-data" method="post" class="cart" action="shop-cart.html">
                            
                            <div class="quantity quantity-lg">
                                <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                                <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
                            </div>
                            <button type="submit" class="btn btn-dark btn-modern text-uppercase bg-color-hover-primary border-color-hover-primary">Add to cart</button>
                            <hr>
                    </form>
                    </div>
                </div>
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


</div>

    






<?php get_footer(); ?>