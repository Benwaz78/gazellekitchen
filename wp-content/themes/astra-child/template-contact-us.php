<?php
/*
Template Name: Contact Us
*/
get_header();


?>
<div role="main" class="main">
    <section class="section bg-white">
        <div class="container">
           <div class="row py-4">
                <div class="col-lg-6">

                    <h2 class="font-weight-bold text-8 mt-2 mb-0">Contact Us</h2>
                    <p class="mb-4">Feel free to ask for details, don't save any questions!</p>

                    <form class="contact-form" action="php/contact-form.php" method="POST" novalidate="novalidate">
                        <div class="contact-form-success alert alert-success d-none mt-4">
                            <strong>Success!</strong> Your message has been sent to us.
                        </div>

                        <div class="contact-form-error alert alert-danger d-none mt-4">
                            <strong>Error!</strong> There was an error sending your message.
                            <span class="mail-error-message text-1 d-block"></span>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label mb-1 text-2">Full Name</label>
                                <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 h-auto py-2" name="name" required="">
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label mb-1 text-2">Email Address</label>
                                <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="email" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label mb-1 text-2">Subject</label>
                                <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="subject" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label mb-1 text-2">Message</label>
                                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control text-3 h-auto py-2" name="message" required=""></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-lg-6">

                    <div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="800" style="animation-delay: 800ms;">
                        <h4 class="mt-2 mb-1">Our <strong>Office</strong></h4>
                        <ul class="list contact-list list-icons list-icons-style-2 mt-2">
                             <?php if (has_site_contact('sc_address')) : ?>
                            <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Address:</strong> <?php echo site_contact('sc_address'); ?></li>
                             <?php endif; ?>
                             <?php if (has_site_contact('sc_phone1')) : ?>
                                 <?php
                                    $whatsapp_number = site_contact('sc_phone1');
                                    // Keeps digits only. Example: +31 6 1234 5678 becomes 31612345678
                                    $whatsapp_link = preg_replace('/\D+/', '', $whatsapp_number);
                                ?>
                                <li><i class="fa-brands fa-whatsapp top-6"></i> <strong class="text-dark">WhatsApp:</strong>  
                                  <a href="https://wa.me/<?php echo esc_attr($whatsapp_link); ?>"  target="_blank"  rel="noopener"><?php echo esc_html($whatsapp_number); ?></a>
                                </li>
                              <?php endif; ?>
                              <?php if (has_site_contact('sc_phone2')) : ?>
                                 <?php
                                    $phone_number = site_contact('sc_phone2');
                                    $phone_link = preg_replace('/[^0-9+]/', '', $phone_number);
                                ?>
                                <li><i class="fa-solid fa-phone top-6"></i> <strong class="text-dark">Phone:</strong>  
                                  <a href="tel:<?php echo esc_attr($phone_link); ?>"  target="_blank"  rel="noopener"><?php echo esc_html($phone_number); ?></a>
                                </li>
                              <?php endif; ?>
                             <?php if (has_site_contact('sc_email1')) : ?>
                                <?php $email = site_contact('sc_email1'); ?>
                                <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email1:</strong>   
                                    <a href="mailto:<?php echo esc_attr(antispambot($email)); ?>"><?php echo $email; ?></a>
                                </li>
                             <?php endif; ?>
                             <?php if (has_site_contact('sc_email2')) : ?>
                                <?php $email = site_contact('sc_email2'); ?>
                                <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email2:</strong>   
                                    <a href="mailto:<?php echo esc_attr(antispambot($email)); ?>"><?php echo $email; ?></a>
                                </li>
                             <?php endif; ?>
                        </ul>

                         <h4 class="mt-2 mb-1">Our <strong>Social Media</strong></h4>
                        <ul class="list contact-list list-icons list-icons-style-2 mt-2">
                             <?php if (has_site_contact('sc_instagram')) : ?>
                            <li><i class="fa-brands fa-instagram top-6"></i> <strong class="text-dark">Instagram:</strong> <?php echo site_contact('sc_instagram'); ?></li>
                             <?php endif; ?>
                               <?php if (has_site_contact('sc_facebook')) : ?>
                                <li><i class="fa-brands fa-facebook-f top-6"></i> <strong class="text-dark">Facebook:</strong>  
                                  <a href="<?php echo site_contact('sc_facebook'); ?>"  target="_blank"  rel="noopener"><?php echo site_contact('sc_facebook'); ?></a>
                                </li>
                              <?php endif; ?>
                               <?php if (has_site_contact('sc_tiktok')) : ?>
                                <li><i class="fa-brands fa-tiktok top-6"></i> <strong class="text-dark">Tiktok:</strong>  
                                  <a href="<?php echo site_contact('sc_tiktok'); ?>"  target="_blank"  rel="noopener"><?php echo site_contact('sc_tiktok'); ?></a>
                                </li>
                              <?php endif; ?>
                             
                            
                        </ul>
                    </div>

                   

                    <h4 class="pt-5">Get in <strong>Touch</strong></h4>
                    <p class="lead mb-0 text-4">
                        Have a question, need help with an order, or planning an event? We’d love to hear from you. 
                        Contact us by phone, WhatsApp, or email and we’ll get back to you as soon as possible.
                    </p>

                </div>

            </div>
          
        </div>
    </section>

     <?php get_template_part( "template-parts/menu-category" ) ?>
     <?php get_template_part( "template-parts/how-to-order" ) ?>
    <?php get_template_part( "template-parts/social-proof" ) ?>
     
  

</div>
<?php get_footer(); ?>