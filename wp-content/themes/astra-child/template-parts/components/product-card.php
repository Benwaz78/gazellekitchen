<?php
$product_id = get_query_var('product_id') ?: get_the_ID();
$product = wc_get_product($product_id);
$image_url = get_the_post_thumbnail_url(
    $product_id,
    'menu-card'
);
if (!$image_url) {
    $image_url = wc_placeholder_img_src();
}
$product_url = get_permalink($product_id);
$card_desc = gk_get_product_card_description($product_id, 90 );
$price = $product->get_price();
$title = get_the_title($product_id);
?>


<article class="post">
    <div class="card rounded-3 border-0 bg-transparent box-shadow-10 box-shadow-1 box-shadow-1-hover anim-hover-translate-top-10px transition-3ms">
        <div class="rounded-3">
            <a href="<?php echo esc_url($product_url); ?>" class="text-decoration-none menu-img-container">
                <img  src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
            </a>
            <div class="card-body px-0 bg-white py-0">
                <div class="px-3 py-2">	
                    <h4 class="my-1"><a href="<?php echo esc_url($product_url); ?>" class="text-decoration-none menu-title">
                        <?php echo esc_attr($title); ?>
                    </a></h4>
                    <p class="card-text mb-1">
                       <?php echo esc_html($card_desc) ?>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="menu-price">
                            &euro;<?php echo esc_html($price) ?>
                        </span>
                        <a href="<?php echo esc_url($product_url); ?>" 
                        class="text-secondary font-weight-semibold text-2">View Details <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                    </div>
                    
                </div>	
                
                <a href="#" class="btn rounded-0 cart-fs  py-2 w-100 btn-primary">
                <i class="icon-basket"></i>
                    Add To Cart
                </a>
            </div>

        </div>
    </div>
</article>