<?php
/**
* Resume theme Gutenberg block Client Grid Block
*
* @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
*
* @package resume
*/

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( __( 'Our Partners Block' ) )
	->add_fields( array(
		Field::make('text','team_main',__('Main'))
			 ->set_help_text('add main title of this block section'),

		Field::make('text','team_heading',__('Heading'))
			 ->set_help_text('Add heading of this block'),

		Field::make('textarea','team_content',__('Content'))
			 ->set_help_text('Add short content of this block'),

		Field::make('complex','complex_client_grid',__('Grid'))
  			->add_fields( array(

				 Field::make('image','client_images',__('Brand Logo'))
					  ->set_help_text('please upload clients brand logo'),

  			))
))

->set_icon( 'layout' )
->set_category( 'Resume blocks' )
->set_preview_mode( $preview = true )
->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

	$team_main = $fields['team_main'];
	$team_heading = $fields['team_heading'];
	$team_content = $fields['team_content'];
	$grid = $fields['complex_client_grid'];

  if($attributes){
    $class = $attributes['className'];
  } else {
    $class = '';
  }

  ?>
	<!-- Our Team Section -->
	<section class="section <?php echo esc_attr($class); ?>" data-bg="Light-BG" >
		<div class="container">
			<div class="row">
				<div class="col-xl-9 Text-Center Fade-In">
					<h2 class="Sub-Header Add-Flourish "><?=esc_attr($team_main)?></h2>
					<h3><?=esc_attr($team_heading)?></h3>
					<p><?=esc_attr($team_content)?></p>
				</div>
				<div class="col-xl-12 No-Margin">
					<ul class="Module-Logo-Grid">
					<?php
						if($grid) {
							foreach ($grid as $grid_item) {
								$imgID = $grid_item['client_images'];
								$imageAlt =get_post_meta( $imgID, '_wp_attachment_image_alt', true );
								$brand_icon = wp_get_attachment_url( $imgID );
								//$brand_resize_icon = aq_resize($project_client_images,684,987,true,true);

							?>
							<?php if($brand_icon): ?>
							<li><img src="<?php echo esc_url($brand_icon); ?>"  alt="<?php echo esc_attr($imageAlt); ?>" /></li>
							<?php endif; ?>
						<?php }} ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- Close Our Team Section -->
  <?php
    });
