<?php
/**
 * Resume theme Gutenberg block Contact Form with Details Block
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 * @package resume
 */

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make(__('Contact Form with Details'))
      ->add_tab( __( 'Contact Form' ), array(
			    Field::make('separator', 'form-sep', __('Form Section')),
      			Field::make( 'text', 'cf_main', __( 'Main Title' ) ),
				Field::make( 'text', 'contact_form', __( 'Contact Form 7 Shortcode ' ) ),
		) )
		->add_tab( __( 'Contact Details' ), array(
				Field::make('separator', 'cd-sep', __('Contact Details')),
				Field::make( 'text', 'cd_main', __( 'Main Title' ) ),
				Field::make( 'text', 'cd_title', __( 'Contact Info Title' ) ),
				Field::make( 'text', 'sc_title', __( 'Socials Link Title' ) ),

		) )

     ->set_icon('email')
     ->set_category('Resume blocks')
     ->set_preview_mode($preview = true)
     ->set_keywords([__('block'), __('form'), __('contact'), __('details')])

     ->set_render_callback(function ($fields, $attributes) {

	     if ($attributes) {
		     $class = $attributes['className'];
	     } else {
		     $class = '';
	     }

	     $cf_main  	  = $fields['cf_main'];
	     $cd_main  	  = $fields['cd_main'];
	     $cd_title  	  = $fields['cd_title'];
	     $sc_title  	  = $fields['sc_title'];

	     // Footer
		$admin_email = get_theme_mod('admin_email');
		$phone_info = get_theme_mod('_phone_info');

		// Socials Link
		$linkedin_link = get_theme_mod('_linkedin_link');
		$facebook_link = get_theme_mod('_facebook_link');
		$instagram_link = get_theme_mod('_instagram_link');
		$github_link = get_theme_mod('_github_link');

	     ?>
	     <!-- ================ Contact with Details Section =============== -->

	    <section class="section Overlap <?=esc_attr($class)?>" data-bg="Light-BG">
            <div class="container">
                <div class="row">
                    <div class="Contact-Area Fade-In" style="opacity: 1; transform: translate(0px, 0px);">
                        <div class="Contact-Left">
                            <h2 class="Sub-Header"><?=$cf_main?></h2>
                            <form action="/contact-form-process.php" method="POST">
                                <div class="form-group">
                                      <label for="name">Full Name<span class="required">*</span></label>
                                      <input type="text" id="name" name="name">
                                </div>
                                <div class="form-group">
                                  <label for="email">Email<span class="required">*</span></label>
                                  <input type="text" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="message">Comments</label>
                                    <textarea id="message" name="message"></textarea>
                                </div>
                                <button type="submit" value="Submit" class="btn btn1">Send</button>
                            </form>
                        </div>
                        <div class="Contact-Right">
                            <h2 class="Sub-Header "><?=$cd_main?></h2>
                            <p class="Title"><?=$cd_title?></p>
                            <ul class="icons">
                            	<?php  if($admin_email): ?>
                                <li>
                                    <em class="fa fa-envelope" aria-hidden="true"> <span class="screen-reader">Linked-In</span></em>
                                    <a href="mailto:<?=$admin_email?>"><?=$admin_email?></a>
                                </li>
                          	<?php endif; ?>
					<?php  if($phone_info): ?>
                                <li>
                                    <em class="fas fa-phone" aria-hidden="true"> <span class="screen-reader">Linked-In</span></em>
                                    <a href="tel:<?=$phone_info?>"><?=$phone_info?></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                            <p class="Title"><?=$sc_title?>/p>
                            <ul class="icons">
                            	  <?php if($linkedin_link): ?>
                                <li class="linkedin">
                                    <em class="fab fab fa-linkedin-in" aria-hidden="true"></em>
                                    <a href="<?=$linkedin_link?>" target="_blank">Linked-In</a>
                                </li>
                                <?php endif; ?>
					  <?php if($facebook_link): ?>
                                <li class="facebook">
                                    <em class="fab fab fa-facebook-f" aria-hidden="true"></em>
                                    <a href="<?=$facebook_link?>" target="_blank">Facebook</a>
                                </li>
                                <?php endif; ?>
					  <?php if($instagram_link): ?>
                                <li class="instagram">
                                    <em class="fab fab fa-instagram" aria-hidden="true"></em>
                                    <a href="<?=$instagram_link?>" target="_blank">Instagram</a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

	     <!-- ======================== Close Contact with Details Section ======================== -->
	     <?php

     });
