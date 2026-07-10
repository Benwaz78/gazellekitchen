<?php
/*
Template Name: Meal Prep
*/
get_header();

$meal_prep_data = get_option('gazelle_meal_prep_page', []);

$header  = $meal_prep_data['header'] ?? [];
$content = $meal_prep_data['content'] ?? [];

$title             = $header['title'] ?? get_the_title();
$tagline       = $header['tagline'] ?? '';
$description       = $header['description'] ?? '';
$desktop_banner_id = !empty($header['desktop_banner_id']) ? absint($header['desktop_banner_id']) : 0;
$mobile_banner_id  = !empty($header['mobile_banner_id']) ? absint($header['mobile_banner_id']) : 0;

$content_text     = $content['text'] ?? '';
$content_image_id = !empty($content['image_id']) ? absint($content['image_id']) : 0;
$price            = $content['price'] ?? '';

$default_desktop_banner = get_template_directory_uri() . '/assets/img/gazelle-banner.jpg';
$default_mobile_banner  = get_template_directory_uri() . '/assets/img/hero-mobile.jpg';

$desktop_banner = $desktop_banner_id
    ? wp_get_attachment_image_url($desktop_banner_id, 'general-banner-desktop')
    : $default_desktop_banner;

$mobile_banner = $mobile_banner_id
    ? wp_get_attachment_image_url($mobile_banner_id, 'general-banner-mobile')
    : $default_mobile_banner;

$meal_prep_img = $desktop_banner_id
    ? wp_get_attachment_image_url($content_image_id, 'menu-detail')
    : $default_desktop_banner;

?>
<div role="main" class="main">
      <section
        class="gazelle-page-header-bg-container menu-header-padding"
        style="
            --page-desktop: url('<?php echo esc_url($desktop_banner); ?>');
            --page-mobile: url('<?php echo esc_url($mobile_banner); ?>');
        "
    >
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-12">

                    <h1 class="text-white">
                        <?php echo esc_html($title); ?>
                    </h1>
                     <?php if ($tagline) : ?>
                        <h2 class="text-white">
                            <?php echo esc_html($tagline); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($description) : ?>
                        <div class="text-white meal-prep-header-description">
                            <?php echo wp_kses_post($description); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
    <section class="section bg-light menus-prep-section">
        <div class="container-fluid gx-0">
            <div class="row gx-0">
                <div 
                class="col-lg-6 meal-prep-img" 
                style="
            --page-desktop: url('<?php echo esc_url($meal_prep_img); ?>');
            --page-mobile: url('<?php echo esc_url($mobile_banner); ?>');
            ">
                   
                </div>
                <div class="col-lg-6 p-3 bg-white">
                    
                    <?php echo wp_kses_post(wpautop($content_text))  ?>

                    <hr>
                    <h3 class="menu-detail-price my-1 py-1">
                        <span class="text-color-dark">Price: </span> &euro; <?php echo esc_html($price); ?>
                    </h3>
                    <hr>

                    <form method="POST" class="order-form mt-4" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <?php
                        wp_nonce_field(
                            'gk_meal_prep_order',
                            'gk_meal_prep_nonce'
                        );
                        ?>
                        <input type="hidden" name="action" value="gk_meal_prep_order">
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <label for="fullName">Fullname*</label>
                                <input 
                                id="fullName" 
                                type="text" 
                                placeholder="Firstname Lastname*" 
                                class="form-control" 
                                name="fullName">
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label for="email">Email</label>
                                <input 
                                id="email" 
                                type="email" 
                                placeholder="Email*" 
                                class="form-control" 
                                name="email">
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <label for="phoneNumber">Phone Number*</label>
                                <input 
                                id="phoneNumber" 
                                type="text" 
                                placeholder="Phone Number" 
                                class="form-control" 
                                name="phoneNumber">
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label for="phoneNumber">Delivery City*</label>
                                <input 
                                id="deliveryCity" 
                                type="text" 
                                placeholder="Delivery City" 
                                class="form-control" 
                                name="deliveryCity">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <label for="deliveryDate">Preferred Delivery Date</label>
                                <input 
                                id="deliveryDate" 
                                type="date" 
                                placeholder="Preferred Delivery Date" 
                                class="form-control" 
                                name="deliveryDate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Special Instruction</label>
                                <textarea rows="10" class="form-control" name="specialInstruction"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-3 btn-lg mt-3 w-100">
                            Place Order
                        </button>
                        
                        
                    </form>
                    

                </div>
            </div>
        </div>
    </section>
    <?php get_template_part( "template-parts/how-to-order" ) ?>
	<?php get_template_part( "template-parts/social-proof" ) ?>

</div>
<?php get_footer(); ?>