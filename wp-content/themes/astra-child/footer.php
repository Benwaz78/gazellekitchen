   
<?php get_template_part("template-parts/components/product-modal") ?>
<div id="gk-toast"></div>
   <footer id="footer" class="mt-0 site-footer">
        <div class="container my-4">
            <div class="row py-5">
                <div class="col-12 col-md-5 col-lg-3 mb-5 mb-lg-0">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo-white.png" width="146" height="140">
                    <p class="text-4 mb-1">
                        bringing the taset of Nigeria
                        to homes and events across
                        Netherlands
                    </p>
                </div>
                <div class="col-12 col-md-7 col-lg-6 mb-5 mb-lg-0">
                    
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <h5>Quick Links</h5>
                            <p class="mb-1"><a href="<?php echo esc_url( home_url( "/" ))?>" class="text-4 link-hover-style-1">Home</a></p>
                            <p class="mb-1"><a href="<?php echo get_permalink( get_page_by_path("about-us")) ?>" class="text-4 link-hover-style-1">About Us</a></p>
                            <p class="mb-1"><a href="<?php echo get_permalink( get_page_by_path("meal-pre")) ?>" class="text-4 link-hover-style-1">Meal Prep</a></p>
                            <p class="mb-1"><a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" class="text-4 link-hover-style-1">Bulk Orders</a></p>
                            <p class="mb-1"><a href="<?php echo esc_url( get_post_type_archive_link('gpp_pricing_plan') ); ?>" class="text-4 link-hover-style-1">Cartering</a></p>
                            <p class="mb-1"><a href="<?php echo get_permalink( get_page_by_path("contact-us")) ?>" class="text-4 link-hover-style-1">Contact Us</a></p>
                            
                        </div>
                        <div class="col-12 col-lg-4">
                            <h5>Menu Categories</h5>
                            <?php
                            $terms = get_terms([
                                'taxonomy'   => 'product_cat',
                                'hide_empty' => true,
                                'exclude'    => [get_option('default_product_cat')] // removes "Uncategorized"
                            ]);

                            if (!empty($terms) && !is_wp_error($terms)) :

                                foreach ($terms as $term) :

                                    $link = get_term_link($term);
                                    ?>

                                    <p class="mb-1">
                                        <a href="<?php echo esc_url($link); ?>"
                                        class="text-4 link-hover-style-1">
                                            <?php echo esc_html($term->name); ?>
                                        </a>
                                    </p>

                                <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="col-12 col-lg-5">
                            <h5>Contact Us</h5>
                            <?php if (has_site_contact('sc_phone1')) : ?>
                                <?php
                                    $whatsapp_number = site_contact('sc_phone1');
                                    // Keeps digits only. Example: +31 6 1234 5678 becomes 31612345678
                                    $whatsapp_link = preg_replace('/\D+/', '', $whatsapp_number);
                                ?>
                                <p class="mb-1">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <a
                                        href="https://wa.me/<?php echo esc_attr($whatsapp_link); ?>"
                                        class="text-4 link-hover-style-1"
                                        target="_blank"
                                        rel="noopener"
                                    >
                                        <?php echo esc_html($whatsapp_number); ?>
                                    </a>
                                </p>
                            <?php endif; ?>
                            <?php if (has_site_contact('sc_phone2')) : ?>
                                <?php
                                $phone_number = site_contact('sc_phone2');

                                // Keeps + and digits for a proper tel: link
                                $phone_link = preg_replace('/[^0-9+]/', '', $phone_number);
                                ?>
                                <p class="mb-1">
                                    <i class="fa-solid fa-phone"></i>
                                    <a
                                        href="tel:<?php echo esc_attr($phone_link); ?>"
                                        class="text-4 link-hover-style-1"
                                    >
                                        <?php echo esc_html($phone_number); ?>
                                    </a>
                                </p>
                            <?php endif; ?>
                            <?php if (has_site_contact('sc_email1')) : ?>
                                <?php $email = site_contact('sc_email1'); ?>
                                <p class="mb-1">
                                    <i class="icon-envelope"></i>
                                    <a href="mailto:<?php echo esc_attr(antispambot($email)); ?>" class="text-3 link-hover-style-1"><?php echo $email; ?></a>
                                </p>
                            <?php endif; ?>
                            <?php if (has_site_contact('sc_email2')) : ?>
                                <?php $email = site_contact('sc_email2'); ?>
                                <p class="mb-1">
                                    <i class="icon-envelope"></i>
                                    <a href="mailto:<?php echo esc_attr(antispambot($email)); ?>" class="text-3 link-hover-style-1"><?php echo $email; ?></a>
                                </p>
                            <?php endif; ?>
                            <p class="mb-1">
                                <i class="icon-location-pin"></i>
                                <a href="elements-progressbars.html" class="text-4 link-hover-style-1">Netherlands</a>
                            </p>
                            <p class="mb-1">
                                <i class="icon-clock"></i>
                                <a href="elements-progressbars.html" class="text-4 link-hover-style-1">Mon - Sun: 9:00 AM - 8:00 PM</a>
                            </p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <h5>Follow Us</h5>
                    <div class="d-flex mb-3">
                        <?php if (has_site_contact('sc_instagram')) : ?>
                            <a href="<?php echo site_contact('sc_instagram'); ?>" class="footer-logo" target="_blank">
                                <img 
                                src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logos/ig-img.png" 
                                class="rounded-circle" alt="Instagram">
                            </a>
                         <?php endif; ?>
                        <?php if (has_site_contact('sc_facebook')) : ?>
                            <a href="<?php echo site_contact('sc_facebook'); ?>" class="footer-logo" target="_blank">
                                <img 
                                src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logos/fb-img.png" 
                                class="rounded-circle" alt="Facebook">
                            </a>
                        <?php endif; ?>
                        <?php if (has_site_contact('sc_facebook')) : ?>
                            <a href="<?php echo site_contact('sc_tiktok'); ?>" class="footer-logo" target="_blank">
                                <img 
                                src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logos/tiktok.png" 
                                class="rounded-circle" alt="Tiktok">
                            </a>
                         <?php endif; ?>
                    </div>
                    <?php if (has_site_contact('sc_phone1')) : ?>
                      <?php
                        $whatsapp_number = site_contact('sc_phone1');
                        // Keeps digits only. Example: +31 6 1234 5678 becomes 31612345678
                        $whatsapp_link = preg_replace('/\D+/', '', $whatsapp_number);
                     ?>
                    <a href="https://wa.me/<?php echo esc_attr($whatsapp_link); ?>" 
                      target="_blank"
                       rel="noopener"
                      class="btn btn-primary">
                        <i class="fa-brands fa-whatsapp"></i>
                        Order on WhatsApp
                    </a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
        <div class="footer-copyright footer-copyright-style-2">
            <div class="container py-2">
                <div class="row py-4">
                    <div class="col mobile-footer-info d-flex align-items-center justify-content-between mb-4 mb-lg-0">
                        <p>
                            © <?php echo date("Y") ?> Gazelles Kitchen. All Rights Reserved.
                        </p>
                        <p>
                            Made with love by 
                            <a href="#">Bonnysoft Solutions</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>