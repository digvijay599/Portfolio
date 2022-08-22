<?php
/**
 * resume theme Gutenberg block Fairplay Contact Form Block
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package resume
 */

 use Carbon_Fields\Block;
 use Carbon_Fields\Field;

 Block::make( __( 'Contact-me Block' ) )
    ->add_fields( array(
	Field::make('separator', 'cm-sep', __('Contact-me Section')),
    Field::make( 'text', 'contact_main_title', __( 'Main Title' ) )
        ->set_help_text('add main Title of Contact form'),

    Field::make( 'text', 'contact_title', __( ' Title' ) )
        ->set_help_text('add  Title of Contact form'),

  Field::make('urlpicker','contact_link',__('Button Link'))
    ->set_help_text(' add your contact link'),

    ))
  ->set_icon( 'email' )
  ->set_category( 'Resume blocks' )
  ->set_preview_mode( $preview = true )
  ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

	    $contact_main_title = $fields['contact_main_title'];
        $contact_title      = $fields['contact_title'];
	    $contact_link = $fields['contact_link'];

		if($attributes){
            $class = $attributes['className'];
        } else {
            $class = '';
        }

    ?>

    <!-- =========  Contact me =========== -->

	  <section id="Text-Scroller" class="section Grey <?=esc_attr($class)?>" data-bg="Light-BG">
		  <div class="container">
			  <div class="row">
				  <div class="col-xl-9 Text-Center Fade-In" style="opacity: 1; transform: translate(0px);">
					  <h2 class="Sub-Header Add-Flourish "><?=esc_html($contact_main_title,'resume')?></h2>
					  <h3><?=esc_html($contact_title,'resume')?></h3>
					  <?php if($contact_link): ?>
					   <a href="<?=esc_url($contact_link['url'])?>" class="btn btn1" <?= ( $contact_link['blank'] = 1 ? ' target="_blank"' : '') ?>><?= $contact_link['anchor'] ?></a>
	  				 <?php endif; ?>
				  </div>
			  </div>
		  </div>
		  <div class="js-ticker">
			  <ul class="wrapper">
				  <li></li>
				  <li></li>
				  <li></li>
				  <li></li>
				  <li></li>
				  <li></li>
				  <li></li>
				  <li></li>
			  </ul>
		  </div>
	  </section>

    <!-- =========== Close Form ============= -->

    <?php

    });
