<?php
/**
 * Resume theme Gutenberg block Resume project grid list Block
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package resume
 */

 use Carbon_Fields\Block;
 use Carbon_Fields\Field;

 Block::make( __( 'Portfolio Grid' ) )
    ->add_fields( array(
		Field::make('separator', 'pf-sep', __('Protfolio Section')),
    	Field::make('text', 'project_main', __('Main')),

    	Field::make('text', 'project_title', __('Title')),

		Field::make( 'text', 'project_numberposts', __( 'Number of project list' ) )
		->set_help_text('add number of projects show on front end, default:6'),

		Field::make( 'select', 'project_orderby', __( 'Order By Project List' ) )
			->add_options( array(
				'ID' => __( 'ID' ),
				'title' => __( 'Title' ),
				'date' => __( 'Date' ),
			) )
			->set_help_text('Please select oderby project list ,default:ID'),

		Field::make( 'select', 'project_order', __( 'Order of Project List' ) )
			->add_options( array(
				'ASC' => __( 'ASC' ),
				'DESC' => __( 'DESC' ),
			) )
			->set_help_text('please select order of project list ,default:ASC '),

	))

  ->set_icon( 'screenoptions' )
  ->set_category( 'Resume blocks' )
  ->set_preview_mode( $preview = true )
  ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

	if($attributes){
		$class = $attributes['className'];
	} else {
		$class = '';
	}

	$project_numberposts  = $fields['project_numberposts'];
	$project_orderby 	  = $fields['project_orderby'];
	$project_order 		  = $fields['project_order'];
	$project_main  		  = $fields['project_main'];
	$project_title  	  = $fields['project_title'];

	// project totle no
	if($project_numberposts){
		$totle_project = $project_numberposts;
	} else {
		$totle_project = 6;
	}

	// orderby project List
	if($project_orderby){
	   $orderby = $project_orderby;
	} else {
		$orderby = 'ID';
	}

	// order of project
	if($project_order){
		$order = $project_order;
	} else {
		$order = 'ASC';
	}

	$args = array(
		'post_type'        => 'project',
		'posts_per_page'   => $totle_project,
        'orderby'        => $orderby,
        'order'          => $order,
   );

	$project_list = new WP_Query($args);
	//print_r($project_list);

	?>

	<!-- ========== Portfolio ============== -->

		<section class="section Green <?php echo esc_attr($class); ?>" data-bg="Dark-BG" id="work">
				<div class="container">
					<div class="row">
						<div class="col-xl-9 Text-Center Fade-In"  style="opacity: 1; transform: translate(0px);">
							<h2 class="Sub-Header Add-Flourish "><?=$project_main?></h2>
							<h3><?=$project_title?></h3>
						</div>
						<div class="col-xl-12 Text-Center">
							<div class="Portfolio-Wrapper">
								<?php
									while ( $project_list->have_posts() ) : $project_list->the_post();
									$image_Id = get_post_thumbnail_id(get_the_ID());
									$image_alt = get_post_meta( $image_Id, '_wp_attachment_image_alt', true );
									$project_img = wp_get_attachment_url($image_Id);
									//$project_img = aq_resize($project_img,391,391,true,true);

									$project_short_content = carbon_get_post_meta(get_the_ID(),'project_short_content');
								if($project_img){ ?>
								<a href="<?php the_permalink(); ?>" class="Portfolio-Item Fade-In">
									<div class="Portfolio-Text">
										<div class="Number">01</div>
										<div class="Text">
											<h4><?php the_title(); ?></h4>
											<h4>Responsive Website Redesign</h4>
											<div class="btn btn3">View Case Study</div>
										</div>
									</div>
									<div class="Portfolio-Image">
										<img src="<?php echo esc_url($project_img); ?>" alt="<?=esc_attr($image_alt)?>" class="image">
									</div>
								</a>
								<?php } ?>
							<?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

	<!-- ========== Close Project List ============== -->

<?php }); ?>
