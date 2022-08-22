<?php
/**
 * resume theme Gutenberg block resume Banner Block
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 * @package resume
 */

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make(__('Resume Section'))
     ->add_fields(array(
		 Field::make('separator', 'resume-sep', __('Resume Section')),
	     Field::make('text', 'resume_main', __('Main'))
	          ->set_help_text(' add main title of this section'),
	     Field::make('text', 'resume_heading', __('Heading'))
	          ->set_help_text('add heading of this section'),
	     Field::make('file', 'resume_uploader', __('Upload your resume'))
		     ->set_type( array( 'image', 'pdf' ) )
		     ->set_value_type( 'url' )
		     ->set_help_text('upload your resume in pdf file'),
		Field::make('image', 'resume_img', __('Upload Image'))
		->set_value_type( 'url' )
		->set_help_text('upload image of your resume'),

     ))
     ->set_icon('media-document')
     ->set_category('Resume blocks')
     ->set_preview_mode($preview = true)
     ->set_keywords([__('block'), __('resume')])

     ->set_render_callback(function ($fields, $attributes) {

	     if ($attributes) {
		     $class = $attributes['className'];
	     } else {
		     $class = '';
	     }

	     $resume_main = $fields['resume_main'];
	     $resume_heading = $fields['resume_heading'];
	     $resume_link = $fields['resume_uploader'];
	     $resume_img = $fields['resume_img'];
	     ?>
	     <!-- ================ Hero Section =============== -->

          <section id="resume" class="section Green <?=esc_attr($class)?>" data-bg="Dark-BG">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 Text-Center Fade-In">
                            <h2 class="Sub-Header Add-Flourish "><?=esc_html( $resume_main )?></h2>
                            <h3><?=esc_html( $resume_heading )?></h3>
                            <?php if($resume_link): ?>
                            <a href="<?=esc_url( $resume_link )?>" download="" class="btn btn1 no-arrow"><em
                                    class="fa-solid fa-file-pdf" aria-hidden="true" style="margin-right:5px;"> <span
                                        class="screen-reader">Linked-In</span></em> Download Resume</a>
                            <?php endif; ?>
                        </div>
                        <div class="col-xl-12 Text-Center Resume">
                            <img src="<?=esc_url($resume_img)?>" alt="Resume">
                        </div>
                    </div>
                </div>
            </section>

	     <!-- ======================== Close Hero Section ======================== -->
	     <?php

     });
