<?php
/**
 * resume theme Gutenberg block resume button  Block
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package resume
 */

 use Carbon_Fields\Block;
 use Carbon_Fields\Field;

 Block::make( __( 'Button Block' ) )
    ->add_fields( array(

        Field::make('text', 'resume_button_text', 'Button text')
        ->set_help_text('add button text'),

        Field::make('text', 'resume_button_link', 'Button text')
        ->set_help_text('add button text'),

	))

  ->set_category( 'Resume blocks' )
  ->set_preview_mode( $preview = true )
  ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

        $resume_button_text = $fields['resume_button_text'];
        $resume_button_link = $fields['resume_button_link'];

        if($attributes){
            $class = $attributes['className'];
        } else {
            $class = '';
        }

     if( $resume_button_text && $resume_button_link ) {

    ?>

    <div class="project-button <?php echo esc_attr($class ); ?>" id="resume_button_block">
        <div class="button">
            <a href="<?php echo esc_url($resume_button_link); ?>" class="project-more-btn"><?php echo esc_html($resume_button_text); ?></a>
        </div>
    </div>

    <?php
        }

	});
