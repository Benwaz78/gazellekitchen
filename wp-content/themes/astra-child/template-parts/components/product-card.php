<?php
$product_id = get_the_ID();
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
                            &euro;<?php echo gazelle_get_price($product_id, false) ?>
                        </span>
                        <a href="<?php echo esc_url($product_url); ?>" 
                        class="text-secondary font-weight-semibold text-2">View Details <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
                    </div>
                    
                </div>	
                
                 <a href="#menuProduct<?php echo esc_html($product_id) ?>" data-product_id="<?php echo esc_attr($product_id); ?>" data-bs-toggle="modal" class="btn rounded-0 cart-fs ajax-add-to-cart  py-2 w-100 btn-primary">
                    <i class="icon-basket"></i>
                    Choose
                </a>
            </div>

        </div>
    </div>
</article>

<div class="modal fade" id="menuProduct<?php echo esc_html($product_id) ?>" tabindex="-1" aria-labelledby="menuProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 overflow-hidden">

            <!-- Header -->
            <div class="modal-header border-0 pb-0">
                <button
                    type="button"
                    class="btn-close ms-auto"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>

            <!-- Body -->
            <div class="modal-body pt-2 px-1 px-lg-2 pb-2 pb-lg-2">
                <?php get_template_part( "template-parts/components/product-content" ) ?>
            </div>

        </div>
    </div>
</div>