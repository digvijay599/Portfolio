<?php
/**
 * resume theme Gutenberg block resume About Block
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package resume
 */
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make(__('About'))
    ->add_fields(array(
		Field::make('separator', 'abut-sep', __('About Section')),

        Field::make('text', 'about_main_title', __('Main Title'))
            ->set_help_text('add main title'),

        Field::make('textarea', 'about_content', __('Content'))
            ->set_help_text('add Content of About'),

    ))

    ->set_icon('admin-users')
    ->set_category('Resume blocks')
    ->set_preview_mode($preview = true)
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

        $about_main_title = $fields['about_main_title'];

        $about_content = $fields['about_content'];

        if ($attributes) {
            $class = $attributes['className'];
        } else {
            $class = '';
        }
        ?>

	<!-- ======== Abouot Block =========== -->

    <div class="main-content <?php echo esc_attr($class); ?>" id="section-about-us">
        <div class="container">
            <div class="row">
                <div class="content-about-us <?php echo esc_attr($class); ?> ">
                <?php if ($about_main_title) {?>
                    <h6 class="about-heading"><?php echo esc_html($about_main_title, 'resume'); ?></h6>
                    <div class="spacer30"></div>
                <?php }?>

                    <h3 class="about-text">
                       <?php echo esc_textarea($about_content, 'resume'); ?>
                    </h3>
                </div>
            </div>
		 </div>
	</div>

   <!-- ======== Close About Block =========== -->

  <?php });?>
