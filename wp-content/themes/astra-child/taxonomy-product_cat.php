<?php get_header(); ?>
<?php
$term = get_queried_object();

$desktop_id = get_term_meta($term->term_id, 'category_banner', true);
$mobile_id  = get_term_meta($term->term_id, 'mobile_banner_id', true);

// Default fallback images
$default_desktop = get_stylesheet_directory_uri() . '/assets/img/gazelle-banner.jpg';
$default_mobile   = get_stylesheet_directory_uri() . '/assets/img/hero-mobile.jpg';

// Convert IDs to URLs
$desktop_url = $desktop_id
    ? wp_get_attachment_image_url($desktop_id, 'category-banner-desktop')
    : $default_desktop;

$mobile_url = $mobile_id
    ? wp_get_attachment_image_url($mobile_id, 'category-banner-mobile')
    : $default_mobile;
   
?>
<div role="main" class="main shop">
    <section 
        class="gazelle-page-header-bg-container menu-header-padding" 
        style="--page-desktop: url('<?php echo esc_url($desktop_url); ?>');
        --page-mobile: url('<?php echo esc_url($mobile_url); ?>');
        ">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-md-12">
                        <h1 class="text-white"><?php echo single_term_title('', false); ?></h1>
                        <p class="text-white">
                            <?php echo esc_html( wp_strip_all_tags(term_description()) ); ?>
                        </p>
                        
                    </div>
                </div>
            </div>
    </section>


   <section class="page-list-section bg-light">
    <div class="container">
        <div class="row">

            <?php

            $category = get_queried_object();
            $category_slug = $category->slug ?? '';

            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 12,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $category_slug,
                    ),
                ),
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :

                while ($query->have_posts()) : $query->the_post();

            ?>

                    <div class="col-md-6 col-lg-4">

                        <?php get_template_part('template-parts/components/product-card'); ?>

                    </div>

            <?php

                endwhile;

                wp_reset_postdata();

            else :

            ?>

                <div class="col-12">
                    <p>No products found in this category.</p>
                </div>

            <?php endif; ?>

        </div>
    </div>
</section>

</div>


<?php get_footer(); ?>