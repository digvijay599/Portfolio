<?php
/**
 * resume theme Gutenberg block Resume Gallery Block
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package resume
 */

 use Carbon_Fields\Block;
 use Carbon_Fields\Field;

 Block::make( __( 'Gallery' ) )
    ->add_fields( array(
		Field::make('separator', 'gl-sep', __('Gallery Section')),
		Field::make( 'complex', 'gallery_img', __( 'Gallery Images' ) )
		->add_fields( array(

        Field::make( 'image', 'g_image', __( 'Block Image' ) ),

        Field::make( 'text', 'g_image_link', __( 'Block Image link' ) )
        ->set_help_text(''),
		))

    ))

  ->set_icon( 'format-gallery' )
  ->set_category( 'Resume blocks' )
  ->set_preview_mode( $preview = true )
  ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

	 $gallery_img = $fields['gallery_img']; // complex

    if($attributes){
            $class = $attributes['className'];
        } else {
            $class = '';
        }
  ?>
  <!-- ======== Gallery Block ======== -->

    <div class="resume-gallery <?php echo esc_attr($class); ?>" id="resume_slider_section">
        <div class="owl-carousel owl-theme">
         <?php

			if($gallery_img){
			foreach( $gallery_img as $key => $img_item ){
				$images = $img_item['g_image'];
				$imageAlt =get_post_meta( $images, '_wp_attachment_image_alt', true );
				$images_link = $img_item['g_image_link'];
				$images = wp_get_attachment_url($images);
				$images = aq_resize($images,400,400,true,true);
				//echo $images[0];
			?>

            <div class="item">
                <a href="<?=$images_link?>">
                    <img src="<?=esc_url($images)?>" alt="<?=esc_attr($imageAlt);?>">
                </a>
            </div>

		<?php }} ?>

        </div>
    </div>
	<!-- ======== Close Gallery Block ========= -->
  <?php
    }
  );


