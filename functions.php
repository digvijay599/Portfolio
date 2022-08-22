<?php
/**
 * resume functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package resume
 */

 define('RESUME_SRC', get_template_directory_uri());
 define ('RESUME_DIR', get_template_directory());

/* ==============  theme setup ============ */

if ( ! function_exists( 'resume_setup' ) ) :

	function resume_setup() {

		load_theme_textdomain( 'resume', RESUME_DIR . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		/* Image sizes */
		add_image_size('resume-slider-img', 390, 390, true); // (cropped)
		add_image_size('resume-blog-grid2', 372, 400, true); // (cropped)
		add_image_size('resume-blog-grid3', 672, 430, true); // (cropped)
		add_image_size('resume-grid', 272, 231, true); // (cropped)
		add_image_size('resume-gallery', 580, 408, true); // (cropped)
		add_image_size('resume-thumb', 287, 190, true); // (cropped)
		add_image_size('resume-thumb', 63, 63, true); // (cropped)
		add_image_size('resume-thumb1', 458, 425, true); // (cropped)
		add_image_size('resume-thumb2', 360, 198, true); // (cropped)
		add_image_size('resume-thumb3', 263, 198, true); // (cropped)
		add_image_size('resume-thumb4', 653, 199, true); // (cropped)

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Header', 'resume' ),
            'menu-2' => esc_html__( 'Footer', 'resume' ),
            'menu-3' => esc_html__( 'Other', 'resume' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'resume_setup' );

add_action( 'after_setup_theme', 'resume_content_width', 0 );
function resume_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'resume_content_width', 640 );
}

/* ==============  Register widget area. ============ */

if ( !function_exists('resume_widgets_init' ) ){

function resume_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'resume' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'resume' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'resume_widgets_init' );
}

/* =========== Enqueue scripts and styles ================*/

if ( !function_exists('resume_scripts' ) ){

	function resume_scripts() {

		//Styles
		wp_enqueue_style( 'resume-style', get_stylesheet_uri() );
        wp_enqueue_style( 'resume-slick', RESUME_SRC.'/assets/css/slick.min.css' );
        wp_enqueue_style( 'resume-bootstrap', RESUME_SRC.'/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'resume-locomotive', RESUME_SRC.'/assets/css/locomotive-scroll.css' );
        wp_enqueue_style('resume-icons', RESUME_SRC.'/assets/css/all.min.css');
        wp_enqueue_style( 'resume-styles', RESUME_SRC.'/assets/css/custom.css' );


		//scripts
		wp_enqueue_script( 'jQuery', RESUME_SRC . '/assets/js/jquery-3.6.0.min.js', array(), '3.6.0', true );
        wp_enqueue_script( 'resume-slick', RESUME_SRC . '/assets/js/slick.min.js', array(), '1.9.0', true );
        wp_enqueue_script( 'resume-barba', 'https://cdn.jsdelivr.net/npm/@barba/core', array(), '4.0', true );
        wp_enqueue_script('resume-locomotion', RESUME_SRC . '/assets/js/locomotive-scroll.min.js', array(), '3.5.4', true);
        wp_enqueue_script('resume-ScrollTrigger', RESUME_SRC . '/assets/js/ScrollTrigger.min.js', array(), '3.9.1', true);
        wp_enqueue_script('resume-gsap',RESUME_SRC . '/assets/js/gsap.min.js', array(), '2.0', true);
        wp_enqueue_script( 'resume-main', RESUME_SRC . '/assets/js/custom.js', array(), '1.0', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'resume_scripts' );
}

/*========= Implement the Custom Header feature =============*/

require RESUME_DIR . '/include/custom-header.php';

/*========= Implement plugin =============*/

require RESUME_DIR . '/include/plugins/plugin.php';

/*================  Custom template tags for this theme ======*/

require RESUME_DIR . '/include/template-tags.php';

/** =============== Customizer additions. ======================== **/

require RESUME_DIR . '/include/customizer.php';

/* ============== custom post type ============ */

require RESUME_DIR . '/include/setup/custom-posttype.php';

/* ============== admin-function ============ */

require RESUME_DIR . '/admin/admin-function.php';

/* ============== aq_resizer ============ */

require RESUME_DIR . '/include/setup/aq_resizer.php';

/* ============  Add Custom class in body class ======================= */

if ( !function_exists('my_body_classes' ) ){

	add_filter( 'body_class','my_body_classes', 10, 2  );

	function my_body_classes( $classes ) {

			if(is_page('Project')) {

				$classes[] = 'resume-project';

			} else if(is_page('News') || is_page('blog')) {

				$classes[] = 'resume-news';

			} else if(is_page('Fairplay')) {

				$classes[] = 'resume-main';

			} else if(is_singular('news') || is_singular('post') ) {

				$classes[] = 'resume-news-detail';

			} else if(is_singular('resume')) {

				$classes[] = 'resume-main-detail';

			} else if(is_singular('project')) {

				$classes[] = 'resume-product-detail';

			} else if(is_singular('post')) {

				$classes[] = 'all';
			} else {
        $classes[] = 'all';
      }

		return $classes;

	}
}


/* ============  for mail sprintfto function ======================= */

if ( !function_exists('resume_sprintf' ) ){

	function resume_sprintf($str='', $vars=array(), $char='%'){

		if (!$str) return '';

		if (count($vars) > 0)
		{
			foreach ($vars as $k => $v)
			{
				$str = str_replace($char . $k, $v, $str);
			}
		}

		return $str;
	}
}

/* ======================  resume_pagination   ======================== */

function resume_pagination()
{
?>
<div class="resume-pagination p-3 mb-2 justify-content-center">
    <div class=" pagination justify-content-center">
        <?php
		global $wp_query;

		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
		'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'  => '?paged=%#%',
		'type'   => 'list',
		'current' => max( 1, get_query_var('paged') ),
		'total'   => $wp_query->max_num_pages,
		'prev_text' => ' &#8592; ',
		'next_text' => ' → '
		) );
		?>
    </div>
</div>
<?php
}

/*================  custom comment list    ===================================*/

function bootstrap_comment($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
    <div class="media comment">
        <div class="vcard">

            <?php echo get_avatar($comment,$size='80',$default='' ); ?>

        </div>

        <div class="comment-body">
            <!--<a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"></a>-->
            <?php if ($comment->comment_approved == '0') : ?>
            <em><?php esc_html_e('Your comment is awaiting moderation.','5balloons_theme') ?></em>
            <br />
            <?php endif; ?>
            <p class="author_name text-dark"><?php echo get_comment_author() ?></p>

            <span
                class="date meta"><?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , '5balloons_theme'), get_comment_date('d.m.Y'),  get_comment_time()) ?></span>

            <strong
                class="reply rounded"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></strong>
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
        </div>
    </div>
    <hr>
    <?php }

/*===================== Fairplay Featured Images =============================*/

add_image_size( 'resume-featured-image', 120, 80, false );

// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'resume_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'resume_add_post_admin_thumbnail_column', 2);

// Add the column
function resume_add_post_admin_thumbnail_column($resume_columns){
    $resume_columns['resume_thumb'] = __('Featured Image');
    return $resume_columns;
}

// Let's manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'resume_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'resume_show_post_thumbnail_column', 5, 2);

// Here we are grabbing featured-thumbnail size post thumbnail and displaying it
function resume_show_post_thumbnail_column($resume_columns, $resume_id){
    switch($resume_columns){
        case 'resume_thumb':
        if( function_exists('the_post_thumbnail') )
            echo the_post_thumbnail( 'resume-featured-image' );
        else
            echo 'hmm... your theme doesn\'t support featured image...';
        break;
    }
}

/*=========================== Enable Svg Image File ==========================*/

//add SVG to allowed file uploads
function upload_svg_files( $allowed ) {
    if ( !current_user_can( 'manage_options' ) )
        return $allowed;
    $allowed['svg'] = 'image/svg+xml';
    return $allowed;
}
add_filter( 'upload_mimes', 'upload_svg_files');

/*==============================  =================================*/
