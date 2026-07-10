<?php

$category = get_query_var('category');

if (!$category) {
    return;
}

$query = new WP_Query([
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'tax_query'      => [
        [
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $category->term_id,
        ],
    ],
]);

if (!$query->have_posts()) {
    return;
}
?>

<div class="col-lg-6">

    <h4 class="text-color-dark font-weight-bold positive-ls-3 mb-0">
        <?php echo esc_html(strtoupper($category->name)); ?>
    </h4>

    <hr class="bg-color-grey-200 mt-2 mb-4">

    <div class="pt-2">

        <?php while ($query->have_posts()) : $query->the_post();

            $product     = wc_get_product(get_the_ID());

            if (!$product) {
                continue;
            }

            $product_id = get_the_ID();

            $product_url = get_permalink();

            $image = get_the_post_thumbnail_url(
                get_the_ID(),
                'menu-list'
            );

            if (!$image) {
                $image = wc_placeholder_img_src();
            }

        ?>

        <div class="price-menu-item d-flex mb-4">

            <div class="price-menu-item-img">

                <a href="<?php echo esc_url($product_url); ?>">

                    <img
                        src="<?php echo esc_url($image); ?>"
                        alt="<?php the_title_attribute(); ?>">

                </a>

            </div>

            <div class="price-menu-item-content w-100 ms-3 mt-2">

                <div class="price-menu-item-details">

                    <div class="price-menu-item-title">

                        <h5 class="custom-secondary-font text-transform-none font-weight-semibold text-4 mb-0">

                            <a
                                href="<?php echo esc_url($product_url); ?>"
                                class="text-decoration-none text-color-dark">

                                <?php the_title(); ?>

                            </a>

                        </h5>

                    </div>

                    <div class="price-menu-item-line opacity-4"></div>

                    <div class="price-menu-item-price">

                        <strong class="custom-font-secondary text-color-dark text-4 positive-ls-3">

                             &euro;<?php echo gazelle_get_price($product_id, false) ?>

                        </strong>

                    </div>

                </div>

                <div class="price-menu-item-desc">

                    <p class="text-2-5 line-height-4">

                        <?php
                        echo esc_html(
                            gk_get_product_card_description(
                                get_the_ID(),
                                110
                            )
                        );
                        ?>

                    </p>

                </div>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

</div>

<?php wp_reset_postdata(); ?>