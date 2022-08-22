<?php
/**
 * resume theme Gutenberg block Resume Single Slider Block
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package resume
 */

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'Slider Block' ) )
   ->add_fields( array(

       Field::make('complex','complex_resume_slider',__('Image Slider'))

       ->add_fields( array(

            Field::make( 'image','slider_img', __('Image') )
            ->set_help_text(' upload slider image ')

        ) )
   ))
 ->set_icon( 'image-flip-horizontal' )
 ->set_category( 'Resume blocks' )
 ->set_preview_mode( true )
 ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

        if($attributes){
            $class = $attributes['className'];
        } else {
            $class = '';
        }

        $complex_resume_slider = $fields['complex_resume_slider'];

        $total_image = count($complex_resume_slider);

?>

<!-- ============== Single Image Slider =============== -->

<div class="main-content <?php echo esc_attr($class); ?>" id="single-news-slider">
    <div class="container">
        <div class="row">
            <div class="news-detail content-about-us">
                <div class="news-img-slider">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php   for($i = 1; $i <= $total_image ; $i++ ){ ?>

                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" <?php if($i==0) { ?> class="active" <?php } ?>></li>
                            <?php } ?>

                        </ol>
                        <div class="carousel-inner">
                            <?php
                                 foreach( $complex_resume_slider as $key => $slider) {

                                    $slider_img = $slider['slider_img'];
                                    $slider_img = wp_get_attachment_url($slider_img);
                                    $slider_img = aq_resize($slider_img,900,567,true,true);

                                ?>

                                    <div class="carousel-item <?php if($key == 0){ echo "active";} ?>">
                                       <img class="d-block w-100" src="<?php echo esc_url($slider_img); ?>" alt="<?php echo $key; ?>">
                                    </div>

                             <?php } ?>
                        </div>
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
						  </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============== Single Image Slider =============== -->


<?php

   });
