<section class="section section section-text-light section-background section-center section-overlay-opacity section-overlay-opacity-scale-4" 
	style="background: url(<?php echo get_stylesheet_directory_uri()?>/assets/img/order-man.jpg) no-repeat center/cover;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<h2 class="section-title">What Our Customers Say</h2>
				</div>
				<div class="col-lg-12">
					<div class="social-container">
						<div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40,
						'responsive':{
								'0':{'items':1},
								'576':{'items':1},
								'768':{'items':2},
								'992':{'items':3},
								'1200':{'items':3}
							}
							}">
							<?php

							$gallery = gazelle_sg_get_gallery('whatsapp');

							if (!empty($gallery)) : ?>

								<?php foreach ($gallery as $id) :

										$img_url = wp_get_attachment_image_url($id, 'large');

										if (!$img_url) {
											continue;
										}

									?>

										<div>

											<a class="testimonial d-block img-thumbnail-hover-icon lightbox"
											href="<?php echo esc_url($img_url); ?>"
											data-plugin-options='{"type":"image"}'>

												<?php echo wp_get_attachment_image($id, 'full', false, [
													'alt' => 'WhatsApp Testimonial'
												]); ?>

											</a>

										</div>

									<?php endforeach; ?>

							<?php endif; ?>
														
							
							
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>

	<section class="section section section-text-light section-background section-center section-overlay-opacity section-overlay-opacity-scale-4" 
	style="background: url(<?php echo get_stylesheet_directory_uri() ?>/assets/img/order-man.jpg) no-repeat center/cover;">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-12">
					<div class="social-container">
						<div class="d-flex justify-content-between">
							<h4 class="social-proof">Follow us on instagram </h4>
						     <?php if (has_site_contact('sc_instagram')) : ?>
								<a href="<?php echo site_contact('sc_instagram'); ?>" class="social-handle">@gazellekitchen</a>
							 <?php endif; ?>
							
						</div>
						<div class="row gx-0 gy-0">
							<?php

							$gallery = gazelle_sg_get_gallery('instagram');
 
							if (!empty($gallery)) :

								// limit to 12 images
								$gallery = array_slice($gallery, 0, 12);

							?>

							<?php foreach ($gallery as $id) :

									$img_url = wp_get_attachment_image_url($id, 'large');

									if (!$img_url) {
										continue;
									}

								?>

									<div class="col-lg-3 col-md-3 col-sm-6 col-6">

										<a href="<?php echo esc_url($img_url); ?>"
										class="img-thumbnail-hover-icon lightbox ig-img-container"
										data-plugin-options='{"type":"image"}'>

											<?php echo wp_get_attachment_image($id, 'social-gallery', false, [
												'loading' => 'lazy',
												'alt'     => 'Instagram Image'
											]); ?>

										</a>

									</div>

								<?php endforeach; ?>

						<?php endif; ?>
													
							
							
							
							
							
							
						</div>
							
					</div>
					
				</div>
			</div>
		</div>
	</section>