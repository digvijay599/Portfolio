<?php
/**
 * resume theme Gutenberg block resume news inner content Grid Block
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package resume
 */

 use Carbon_Fields\Block;
 use Carbon_Fields\Field;

 Block::make( __( 'News inner Content Block' ) )
    ->add_fields( array(

	))
  ->set_icon( 'editor-alignright' )
  ->set_category( 'Resume blocks' )
  ->set_preview_mode( $preview = true )
  ->set_inner_blocks( true )
  ->set_allowed_inner_blocks( array(
        'core/paragraph',
        'core/list',
        'core/freeform',
       // 'carbon-fields/{{block name}}'
    ) )
  ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

        if($attributes){
            $class = $attributes['className'];
        } else {
            $class = '';
        }

    ?>
<!-- ================ news inner Content =============== -->

        <div class="container <?php echo esc_attr($class); ?>" id="news_content_block">
            <div class="row">
                <div class="news-detail-inner">
                    <div class="news-content-text">
                        <?php echo $inner_blocks; ?>
                    </div>
                </div>
            </div>
        </div>
  <!-- ======================== Close inner content ======================== -->

  <?php

	});
