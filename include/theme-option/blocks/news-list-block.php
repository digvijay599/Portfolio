<?php
/**
 * resume theme Gutenberg block Resume News list Block
 *
 * @link https://docs.carbonfields.net/#/containers/gutenberg-blocks
 *
 * @package resume
 */

 use Carbon_Fields\Block;
 use Carbon_Fields\Field;

 Block::make( __( 'News List Block' ) )
    ->add_fields( array(
	Field::make( 'text', 'news_numberposts', __( 'Number of news list' ) )
		->set_help_text('add number of news show on frontend, default:6'),

		Field::make( 'select', 'news_orderby', __( 'Order By news List' ) )
			->add_options( array(
				'ID' => __( 'ID' ),
				'title' => __( 'Title' ),
				'date' => __( 'Date' ),

			) )
			->set_help_text('Please select oderby news list ,default:ID'),

		Field::make( 'select', 'news_order', __( 'Order of news List' ) )
			->add_options( array(
				'ASC' => __( 'ASC' ),
				'DESC' => __( 'DESC' ),
			) )
			->set_help_text('please select order of news list ,default:ASC '),

		Field::make( 'text', 'news_button_text', __( 'Button Text' ) )
		->set_help_text(' add Button text'),

		Field::make( 'text', 'news_button_link', __( 'Button Link' ) )
		->set_help_text(' add page link on Button '),

	))

  ->set_icon('list-view')
  ->set_category( 'Resume blocks' )
  ->set_preview_mode($preview = true )
  ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

	if($attributes){
		$class = $attributes['className'];
	} else {
		$class = '';
	}

	$news_numberposts = $fields['news_numberposts'];
	$news_orderby 	 = $fields['news_orderby'];
	$news_order 		 = $fields['news_order'];
	$news_button_text = $fields['news_button_text'];
	$news_button_link = $fields['news_button_link'];

	// news totle no
	if($news_numberposts){
		$totle_news = $news_numberposts;
	} else {
		$totle_news = 6;
	}

	// orderby news List
	if($news_orderby){
	   $orderby = $news_orderby;
	} else {
		$orderby = 'ID';
	}

	// order of news
	if($news_order){
		$order = $news_order;
	} else {
		$order = 'ASC';
	}

	//post type news slug
	$news = get_option( '_news_slug' );
	//echo $news;

	$args = array(
		'post_type'        => $news,
		'post_per_pages'   => $totle_news,
        'orderby'          => $orderby,
        'order'            => $order,
   );

	$news_list = new WP_Query($args);
	//echo "<pre>";print_r($news_list);echo "<pre>";

	?>

    <!-- ============ News List ============= -->

   <div class="main-content <?php echo esc_attr($class); ?>" id="news-list">
    <div class="container">
        <div class="project-detail content-about-us">
            <div class="row">
			<?php
				$count = 1;
				while($news_list->have_posts()): $news_list->the_post();
	  			$imageId = get_post_thumbnail_id(get_the_ID());
	  			$imageAlt =get_post_meta( $imageId, '_wp_attachment_image_alt', true );
				$news_img = wp_get_attachment_url($imageId);
				$news_img = aq_resize($news_img,455,355,true,true);
				$news_short_content = get_post_meta(get_the_ID(),'_short_content',true);

				//print_r($news_short_content);

				if($count % 2 == 0 ){
					$news_class = "right";
				} else {
					$news_class = "left";
				}
			?>
                <div id="<?php echo ''.$count; ?>" class="<?php echo $news_class; ?>">
                    <div class="col-sm-6">
                        <div class="product-detail-left">
                            <img src="<?php echo esc_url($news_img); ?>" alt="<?php echo esc_attr($imageAlt); ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="product-detail-right">
                            <ul>
                                <li class="detail-first">
                                    <h4>
                                    	<a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                </li>
                                <li class="detail-second">
                                    <p>
                                        <?php echo esc_html($news_short_content,'resume'); ?>
                                    </p>
                                </li>
                                <li class="detail-third">
                                    <a href="<?php the_permalink(); ?>">
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
              <div class="spacer50"></div>
			<?php $count++; ?>
            <?php endwhile; ?>
          </div>
        </div>
		<?php if( $news_button_link && $news_button_text ){ ?>
        <div class="project-button">
            <div class="button">
                <a href="<?php echo esc_url($news_button_link); ?>" class="project-more-btn"><?php echo esc_html($news_button_text,'resume'); ?></a>
            </div>
        </div>
		<?php } ?>
    </div>
</div>
<!-- ========= Close News List =========== -->

	<?php
  });
