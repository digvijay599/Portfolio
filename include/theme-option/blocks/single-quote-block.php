<?php
/**
 * fair-play theme Gutenberg block Fairplay single quote Block
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package fair-play
 */

 use Carbon_Fields\Block;
 use Carbon_Fields\Field;

 Block::make( __( 'Single Quote Block' ) )
    ->add_fields( array(

        Field::make('rich_text','single_quote_content',__(' Quote Content'))
        ->set_help_text(' add content of single Quote area'),

        Field::make('text','author_name',__('name'))
        ->set_help_text(' add name here'),

        Field::make('text','author_position',__('Position'))
        ->set_help_text(' add postion'),

	))
  ->set_icon( 'format-quote' )
  ->set_category( 'Resume blocks' )
  ->set_preview_mode( $preview = true )
  ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

    $single_quote_content = $fields['single_quote_content'];
    $name                 = $fields['author_name'];
    $author_position      = $fields['author_position'];

    if($attributes){
		$class = $attributes['className'];
	} else {
		$class = '';
	}

    ?>

    <!-- =========== Single Quote area =============== -->

    <div class="main-content  <?php echo esc_attr($class); ?>" id="single_quote_block">
        <div class="container">
            <div class="row">
                <div class="gallery-block-text">
                    <div class="gallery-block-inner">
                        <ul>
                            <li>
                                <?php echo apply_filters( 'the_content', $single_quote_content ); ?>
                            </li>
                            <li>
                                <span><?php echo esc_html($name).', '.esc_html($author_position); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================== Close single Quote Area ================== -->

    <?php

	});
