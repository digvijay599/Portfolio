<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package resume
 */

?>

<section class="no-results not-found text-center">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'resume' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content fair-m-top-90">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'resume' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
		
			echo '<div class="card">';
			echo '<div class="card-body">';
			echo '<p class="card-text">';
			?>
			<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'resume' ); ?>
			<?php
			echo '</p>';
			echo '<div class="fair-m-top-90 text-center">';
				get_search_form();
			echo'</div></div></div>';

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'resume' ); ?></p>
	
			<?php
			
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
