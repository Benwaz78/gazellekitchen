<div class="row">
    <div class="col-lg-7">
        <div class="thumb-gallery-wrapper">
            <?php

            
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
        <?php

            if (! $product instanceof WC_Product) {
                $product = wc_get_product(get_the_ID());
            }

            $available_variations = [];
            $attributes           = [];
            $sizes                = [];

            if ($product && $product->is_type('variable')) {
                $available_variations = $product->get_available_variations();
                $attributes           = $product->get_variation_attributes();
                $attribute_key = array_key_first($attributes);

                $sizes = $attributes['pa_portion-size'] ?? [];
                usort($sizes, function ($a, $b) {
                    return (int) $a <=> (int) $b;
                });
            }

            
            ?>

            <h3 class="menu-detail-price">
                &euro;<span id="productPrice">
                    <?php echo gazelle_get_price($product_id, false) ?>
                </span>
            </h3>

            <p class="availabilty-container">
                Availability:
                <span class="availabilty-status">
                    <?php echo $product->is_in_stock() ? 'AVAILABLE' : 'OUT OF STOCK'; ?>
                </span>
            </p>

            <?php if ($product && $product->is_type('variable') && ! empty($sizes)) : ?>

               <script>
                window.gazelleVariations = window.gazelleVariations || {};
                window.gazelleVariations[<?php echo esc_js($product_id); ?>] =
                    <?php echo wp_json_encode($product->get_available_variations()); ?>;
                </script>

                <p class="mb-1">Portion Size</p>

                <div class="row g-2">
                    <?php foreach ($sizes as $index => $size) : ?>
                        <div class="col-lg-6">
                            <button
                                type="button"
                                class="btn bg-white portion-border w-100  variation-option <?php echo $index === 0 ? 'active' : ''; ?>"
                                data-size="<?php echo esc_attr($size); ?>"
                                
                            >
                                <?php echo esc_html($size); ?>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>
        
        
        
        <hr>
        

        <form enctype="multipart/form-data" method="post" class="cart" action="shop-cart.html">
            
            <div class="quantity quantity-lg">
                <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
            </div>
            <a href="#" 
            data-product_id="<?php echo esc_attr($product_id); ?>"
            class="btn btn-dark btn-modern text-uppercase bg-color-hover-primary gazelle-add-to-cart border-color-hover-primary">Add to cart</a>
            <hr>
    </form>
    </div>
</div>