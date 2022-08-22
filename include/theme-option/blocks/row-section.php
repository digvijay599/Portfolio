<?php
/**
 * fair-play theme Gutenberg block Fairplay Row Section  Block
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package fair-play
 */

 use Carbon_Fields\Block;
 use Carbon_Fields\Field;

 Block::make( __( 'Row Section' ) )
    ->add_fields( array(

	))
  ->set_icon( 'align-center' )
  ->set_category( 'Resume blocks' )
  ->set_preview_mode( $preview = true )
  ->set_inner_blocks( true )
  ->set_allowed_inner_blocks( array(
                    'core/paragraph',
                    'core/image',
                    'core/heading',
                    'core/gallery',
                    'core/list',
                    'core/quote',
                    'core/audio',
                    'core/cover',
                    'core/file',
                    'core/video',
                    'core/preformatted',
                    'core/code',
                    'core/freeform',
                    'core/html',
                    'core/pullquote',
                    'core/table',
                    'core/verse',
                    'core/button',
                    'core/columns',
                    'core/media-text',
                    'core/more',
                    'core/nextpage',
                    'core/separator',
                    'core/separator',
                    'core/spacer',
                    'core/shortcode',
                    'core/archives',
                    'core/categories',
                    'core/latest-comments',
                    'core/latest-posts',
                    'core/embed',
                    'core-embed/twitter',
                    'core-embed/youtube',
                    'core-embed/facebook',
                    'core-embed/instagram',
                    'core-embed/wordpress',
                    'core-embed/soundcloud',
                    'core-embed/spotify',
                    'core-embed/flickr',
                    'core-embed/vimeo',
                    'core-embed/animoto',
                    'core-embed/cloudup',
                    'core-embed/collegehumor',
                    'core-embed/dailymotion',
                    'core-embed/funnyordie',
                    'core-embed/hulu',
                    'core-embed/imgur',
                    'core-embed/issuu',
                    'core-embed/kickstarter',
                    'core-embed/meetup-com',
                    'core-embed/mixcloud',
                    'core-embed/photobucket',
                    'core-embed/polldaddy',
                    'core-embed/reddit',
                    'core-embed/reverbnation',
                    'core-embed/screencast',
                    'core-embed/scribd',
                    'core-embed/slideshare',
                    'core-embed/smugmug',
                    'core-embed/speaker',
                    'core-embed/ted',
                    'core-embed/tumblr',
                    'core-embed/videopress',
                    'core-embed/wordpress-tv',

    ) )
  ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

        if($attributes){
            $class = $attributes['className'];
        } else {
            $class = '';
        }

    ?>
<!-- ================ Row Section =============== -->
<div class="main-content <?php echo $class; ?>" id="fairplay_row_block">
    <div class="container">
        <div class="row">
            <div class="content-about-us">
                <?php echo $inner_blocks; ?>
            </div>
        </div>
    </div>
</div>
  <!-- ======================== Close row section ======================== -->

  <?php

	});
