<?php
$term_id   = $args['term_id'] ?? 0;
$name      = $args['name'] ?? '';
$desc      = $args['description'] ?? '';
$link      = $args['link'] ?? '#';
$image_url = $args['image'] ?? get_stylesheet_directory_uri() . '/assets/img/menu-category-default.jpg';
?>

<article class="post">

    <div class="card rounded-3 border-0 bg-transparent box-shadow-10 box-shadow-1 box-shadow-1-hover anim-hover-translate-top-10px transition-3ms">

        <div class="rounded-3">
            <a href="<?php echo esc_url($link); ?>" class="text-decoration-none menu-img-container">
                <img 
                    src="<?php echo esc_url($image_url); ?>" 
                    alt="<?php echo esc_attr($name); ?>">
            </a>
            <div class="card-body px-0 bg-white py-0">
                <div class="px-3 py-2">
                    <h4 class="my-1">
                        <a href="<?php echo esc_url($link); ?>" class="text-decoration-none menu-title">
                            <?php echo esc_html($name); ?>
                        </a>
                    </h4>
                    <?php if ($desc) : ?>
                        <p class="card-text mb-1">
                            <?php echo esc_html($desc); ?>
                        </p>
                    <?php endif; ?>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="<?php echo esc_url($link); ?>" 
                           class="text-secondary font-weight-semibold text-2">
                            Explore Menu <i class="fas fa-angle-right position-relative top-1 ms-1"></i>
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</article>