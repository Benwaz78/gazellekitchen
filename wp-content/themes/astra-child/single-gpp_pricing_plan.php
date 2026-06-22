<?php get_header(); ?>
<div role="main" class="main">

<?php
get_header();

$plan_id     = get_the_ID();
$description = get_post_meta($plan_id, '_gpp_description', true);
?>

<section 
    class="gazelle-page-header-bg-container" 
    style="
        --page-desktop: url('<?php echo esc_url(get_stylesheet_directory_uri() . "/assets/img/gazelle-banner.jpg"); ?>');
        --page-mobile: url('<?php echo esc_url(get_stylesheet_directory_uri() . "/assets/img/hero-mobile.jpg"); ?>');
    ">

    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-12">

                <h1 class="text-white">
                    <?php the_title(); ?>
                </h1>

                <?php if ($description) : ?>
                    <p class="text-white">
                        <?php echo esc_html($description); ?>
                    </p>
                <?php endif; ?>

            </div>
        </div>
    </div>

</section>

<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <p class="fs-5 text-primary">
                    Please note All packages exclude travel & delivery cost
                    These packages are available for 45 guests & over

                </p>
                <form class="order-form">
                    <div class="mb-2">
                        <label for="fullName">Fullname*</label>
                        <input 
                        id="fullName" 
                        type="text" 
                        placeholder="Firstname Lastname*" 
                        class="form-control" 
                        name="fullName">
                    </div>
                    <div class="mb-2">
                        <label for="phone">Phone*</label>
                        <input 
                        id="phone" 
                        type="text" 
                        placeholder="Phone*" 
                        class="form-control" 
                        name="phone">
                    </div>
                    <div class="mb-2">
                        <label for="phone">Email*</label>
                        <input 
                        id="email" 
                        type="email" 
                        placeholder="Email*" 
                        class="form-control" 
                        name="email">
                    </div>
                    <div class="mb-2">
                        <label for="phone">Date*</label>
                        <input 
                        id="date" 
                        type="date" 
                        class="form-control" 
                        name="date">
                    </div>

                    <div class="mb-2">
                        <label for="phone">Delivery Location*</label>
                        <input 
                        id="email" 
                        type="email" 
                        placeholder="Email*" 
                        class="form-control" 
                        name="email">
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Special Instruction</label>
                            <textarea rows="10" class="form-control" name="specialInstruction"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 w-100">
                        Order 
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