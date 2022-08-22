<?php
/**
 * resume theme Gutenberg block resume Banner Block
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 * @package resume
 */

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make(__('Top Banner Block'))
    ->add_fields(array(
		Field::make('separator', 'bn-sep', __('Banner Section')),
        Field::make('image', 'hero_img', __('Banner Image'))
            ->set_help_text(' upload Hero image '),
        Field::make('text', 'hero_heading', __('Heading'))
            ->set_help_text(' add hero heading '),
        Field::make('rich_text', 'hero_content', __('Description'))
            ->set_help_text(' add short description '),
        Field::make('urlpicker', 'hero_link', 'Link1')
            ->set_help_text("Add link of the URL picker."),
        Field::make('urlpicker', 'hero_link1', 'Link2')
            ->set_help_text("add link of the URL picker."),

    ))
    ->set_icon('editor-alignright')
    ->set_category('Resume blocks')
    ->set_preview_mode($preview = true)
    ->set_keywords([__('block'), __('image'), __('content'), __('hero')])

    ->set_render_callback(function ($fields, $attributes) {

        if ($attributes) {
            $class = $attributes['className'];
        } else {
            $class = '';
        }

        $hero_img = $fields['hero_img'];
        $hero_img = wp_get_attachment_url($hero_img);
        //$slider_img = aq_resize($slider_img, 900, 567, true, true);
        $hero_title = $fields['hero_heading'];
        $hero_content = $fields['hero_content'];
        $hero_link = $fields['hero_link'];
        $hero_link1 = $fields['hero_link1'];

        ?>
<!-- ================ Hero Section =============== -->

            <div class="Module-Slider">
				<div class="Scroll-Down">
					<div class="Scroll-Down-Inner"></div>
				</div>
				<div class="Feature-Text">
					<div class="Feature-Text-Inner Fade-In">
						<h1><?php echo $hero_title ?></h1>
                        <?php echo apply_filters('the_content', $hero_content); ?>
						<div>
							<a class="btn btn2 no-arrow" href="#work" data-scroll-to>View Work</a>
                             <?php if ($hero_link1['url'] != null): ?>
							<a class="btn btn1" href="<?=$hero_link1['url']?>" <?php $hero_link1['blank'] = 1 ? 'target="_blank' : "";?>><?=$hero_link1['anchor']?></a>
                            <?php endif;?>
						</div>
					</div>
				</div>
				<div class="Slider-Wrapper">
					<div class="slider">
						<div class="Feature-Image">
							<img src="<?php echo esc_url($hero_img); ?>" alt="Jason Frelich" />
						</div>
					</div>
				</div>
			</div>

  <!-- ======================== Close Hero Section ======================== -->
  <?php

    });
