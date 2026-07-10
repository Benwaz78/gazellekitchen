<?php
/*
Template Name: About Us
*/
get_header();
$page_id = get_the_ID();
$header_title       = get_the_title($page_id);
$about_content      = get_the_content();
// Featured image
$featured_image = get_the_post_thumbnail_url($page_id, 'about-image');
$default_image = get_stylesheet_directory_uri() . '/assets/img/default-about.jpg';
$image_url = $featured_image ? $featured_image : $default_image;


?>
<div role="main" class="main">
    <section class="section bg-grey" id="abt">
        <div class="container bg-white">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <section class="section-background m-0" style="background-image: url(<?php echo esc_url($image_url); ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="h-400px m-0">
                        <div class="row m-0">
                            <div class="col-half-section col-half-section-left py-5">
                                <h1><?php echo esc_html($header_title); ?></h1>
                                <?php echo apply_filters('the_content', $about_content); ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </section>

     <?php get_template_part( "template-parts/menu-category" ) ?>
     <?php get_template_part( "template-parts/how-to-order" ) ?>
    <?php get_template_part( "template-parts/social-proof" ) ?>
     
  

</div>
<?php get_footer(); ?>