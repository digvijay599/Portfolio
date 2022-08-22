<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package resume
 */
?>
<?php get_header();?>

<main id="main" class="Interior" data-barba="container" data-barba-namespace="<?php the_title(); ?>">
    <?php

        while (have_posts()): the_post(); 
            $bg_type = carbon_get_post_meta( get_the_ID(), 'bg_type' );
            $page_subtitle = carbon_get_post_meta( get_the_ID(), 'page_subtitle' );
            $page_description = carbon_get_post_meta( get_the_ID(), 'page_description' );
            
            if($bg_type == 'dark') {
                $wClass = "Green Feature-Top";
                $databg = "Dark-BG";
                $row = "Justify-Center";
            } else {
                $wClass = "Grey";
                $databg = "Light-BG";
                $row = "";
            }

    ?>

    <section class="section <?=$wClass?>" data-bg="<?=$databg?>">
		<div class="container">
			<div class="row <?=$row?>">
				<div class="col-xl-9 Text-Center Fade-In" style="opacity: 1; transform: translate(0px);">
					<h2 class="Sub-Header Add-Flourish "><?php the_title(); ?></h2>
					<h3><?=esc_html($page_subtitle)?></h3>
					<?php echo apply_filters( 'the_content', $page_description ); ?>
				</div>
			</div>
		</div>
	</section>

<?php

    get_template_part('template-parts/content', 'page');

endwhile; // End of the loop.

?>

</main>
<?php get_footer();?>
