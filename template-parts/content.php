<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package resume
 */

?>
<?php

$blog_img = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
$blog_img = aq_resize($blog_img,750,300,true,true);	

?>
<!-- Blog Post -->
        <div class="card mb-4" id="post-<?php the_ID(); ?>">
          <img class="card-img-top" src="<?php echo esc_url($blog_img); ?>" alt="Card image cap">
		  <?php  if ( 'post' === get_post_type() ) :
			?>
			<div class="card-footer text-muted">
				<?php
				resume_posted_on();
				resume_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
          <div class="card-body">
            <h4 class="card-title"><?php 
			if ( is_singular() ) :
				the_title();
				else :
					the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
				endif; 
		    ?>
			</h4>
            <div class="card-text">
			<?php
			
			if ( is_singular() ) :
					the_content();
			else:
			    $content = strip_tags(get_the_content());
				echo substr($content, 0, 100);
			endif;	
			?>
			</div>
            <a href="<?php the_permalink();?>" class="project-more-btn">Read More &rarr;</a>
          </div>
        </div>	
	
