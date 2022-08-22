<?php
/**
 * Resume theme Gutenberg Skills  Block
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 * @package resume
 */

use Carbon_Fields\Block;
use Carbon_Fields\Field;


Block::make(__('Skill Block'))
     ->add_fields( array(
		 Field::make('separator', 'skill-sep', __('Skills Section')),
	     Field::make('complex', 'skills', __('Your Skilles'))
		     ->add_fields( array(
				 Field::make('image', 'tech_img', __('Tech Img'))
			          ->set_help_text(' upload image of tech '),
				 Field::make('text', 'tech_heading', __('Heading'))
			          ->set_help_text(' add title of tech category '),
			     Field::make('textarea', 'tech_content', __('Description'))
			          ->set_help_text(' add short description '),
			     Field::make('complex', 'skills_tools', __('Your Tech Tools'))
			          ->add_fields( array(
				          Field::make('text', 'tech_tools', __('Tools'))
				               ->set_help_text(' add your skills tools '),
			          ))
			))

     ))
     ->set_icon('admin-generic')
     ->set_category('Resume blocks')
     ->set_preview_mode($preview = true)
     ->set_keywords([__('block'), __('skill')])

     ->set_render_callback(function ($fields, $attributes) {

	     if ($attributes) {
		     $class = $attributes['className'];
	     } else {
		     $class = '';
	     }

	     $skills = $fields['skills'];


	     ?>
	     <!-- ================ Skills Section =============== -->

	     <section id="skills" class="section Overlap <?=esc_attr($class)?>" data-bg="Light-BG">
		     <div class="container">
			     <div class="row Justify-Center">
				     <div class="col-xl-12 Fade-In About-Area">
					     <?php
					      if($skills):
						      foreach($skills as $key => $skill):
							      $img = $skill['tech_img'];
							      $img = wp_get_attachment_url($img);
							      $tech_heading = $skill['tech_heading'];
							      $tech_content = $skill['tech_content'];
							      $skills_tools = $skill['skills_tools']; // complex

					     ?>
					     <div class="item">
						     <div class="image">
							     <img src="<?=esc_url($img)?>" alt="Icon">
						     </div>
						     <h4><?=$tech_heading?></h4>
						     <p><?=$tech_content?></p>
						     <p class="title"><?=$tech_heading.' Tools'?></p>
						     <ul>
							     <?php
							        if($skills_tools):
							        foreach($skills_tools as $key => $tool):
								        $tech_tools = $tool['tech_tools'];
							     ?>
							     <li><?=$tech_tools?></li>
							     <?php endforeach; ?>
							     <?php endif; ?>
						     </ul>
					     </div>
						  <?php endforeach; ?>
					      <?php endif; ?>
					</div>
			     </div>
		     </div>
	     </section>

	     <!-- ======================== Close Skills Section ======================== -->
	     <?php

     });
