<?php
/**
 * Resume theme Gutenberg block Resume Quotes Block
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package resume
 */

 use Carbon_Fields\Block;
 use Carbon_Fields\Field;

 Block::make( __( 'Resume Quotes Block' ) )
    ->add_fields( [

		 Field::make( 'complex', 'complex_quotes' , __( ' Quotes ( Left and Right Align)' ) )
		 ->add_fields( [

			Field::make( 'text', 'quotes_title' , __( ' Title' ) ),

			Field::make( 'textarea', 'quotes_text' , __( ' Quote content' ) ),

		 ])

    ])

  ->set_icon( 'format-quote' )
  ->set_category( 'Resume blocks' )
  ->set_preview_mode( $preview = true )
  ->set_render_callback( function ( $quotes , $attributes ) {

	$complex_quotes = $quotes['complex_quotes']; // Complex

	if($attributes){
		$class = $attributes['className'];
	} else {
		$class = '';
	}


	if($complex_quotes){
  ?>

  <!-- ========= Quotes ============== -->

    <div class="resume-main-content <?php echo esc_attr($class); ?>" id="resume_quotes_block">
        <div class="container">
            <div class="row">
				<div class="about-us">
					<?php
						$item_q = 1;
						foreach( $complex_quotes as $key => $quotes_item ){

							$title = $quotes_item['quotes_title'];
							$content = $quotes_item['quotes_text'];

						if($item_q % 2 == 0 ){
							$quotes_class = "text-right";
						} else {
							$quotes_class = "text-left";
						}
					?>
						<div class="fp-content-inner <?php echo $quotes_class; ?>">
							<h3><?php echo esc_html($title); ?></h3>
							<div class="reusme-block-<?php echo $quotes_class; ?> ">
								<div class="resume-block-inner">
									<p>
									   <?php echo esc_textarea($content); ?>
									</p>
								</div>
							</div>
						</div>
						<?php

						if($item_q % 2 == 1 ){

							echo '<div class="spacer65"></div>';

						}

							$item_q++;
						} // close foreach loop
						?>
				</div>
            </div>
        </div>
    </div>
	<!--- =========== Close Quotes Block ================= -->


  <?php

	}
});
