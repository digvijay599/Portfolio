<?php
/**
 * Template Name: Front Page
 *
 * @package WordPress
 * @subpackage resume
 * @since resume 1.0
 */

?>
<?php get_header();?>

<main id="main" data-barba="container" data-barba-namespace="home">

<?php
while (have_posts()): the_post();

    get_template_part('template-parts/content', 'page');

endwhile; // End of the loop.

?>

</main>
<?php get_footer();?>