<?php get_header(); ?>
<div role="main" class="main">

   <section 
				class="gazelle-page-header-bg-container" 
				style="--page-desktop: url('<?php echo get_stylesheet_directory_uri() ?>/assets/img/gazelle-banner.jpg');
				--page-mobile: url('<?php echo get_stylesheet_directory_uri() ?>/assets/'img/hero-mobile.jpg');
				">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-12">
                    <h1 class="text-white">Catering for every special occasion</h1>
                    <p class="text-white">
                        Parties, weddings, birthdays, corporate events 
                        and more, You celebrate, we handle the food.
                    </p>
                    
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container">
            <div class="row g-4">

                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <?php
                        $plan_id     = get_the_ID();
                        $icon        = get_post_meta($plan_id, '_gpp_icon', true);
                        $description = get_post_meta($plan_id, '_gpp_description', true);
                        $price       = get_post_meta($plan_id, '_gpp_price', true);
                        $features    = get_post_meta($plan_id, '_gpp_features', true);

                        if (!is_array($features)) {
                            $features = [];
                        }
                        ?>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                            <div class="catering-list pt-3 rounded-3 shadow-sm py-3 px-3">

                                <?php if ($icon) : ?>
                                    <i class="<?php echo esc_attr($icon); ?>"></i>
                                <?php endif; ?>

                                <h2><?php the_title(); ?></h2>

                                <?php if ($description) : ?>
                                    <p>
                                        <?php echo esc_html($description); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ($price !== '') : ?>
                                    <p class="catering-price">
                                        From <span>&euro;<?php echo esc_html($price); ?></span>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($features)) : ?>
                                    <ul class="list list-icons list-icons-style-3 list-primary">

                                        <?php foreach ($features as $feature) : ?>
                                            <li>
                                                <i class="fas fa-check"></i>
                                                <?php echo esc_html($feature); ?>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul>
                                <?php endif; ?>

                                <a href="<?php the_permalink(); ?>" class="btn btn-primary w-100">
                                    Order Now
                                </a>

                            </div>

                        </div>

                    <?php endwhile; ?>

                <?php else : ?>

                    <div class="col-12">
                        <p>No pricing plans found.</p>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </section>

  
     <?php get_template_part( "template-parts/menu-category" ) ?>
     <?php get_template_part( "template-parts/how-to-order" ) ?>
    <?php get_template_part( "template-parts/social-proof" ) ?>


    
</div>

    

<?php get_footer(); ?>