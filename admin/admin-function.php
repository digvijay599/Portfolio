<?php
/**
 * fair-play admin functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fair-play
 */
function resume_wp_admin_style()
{

    wp_enqueue_style('resume_admin_css', get_template_directory_uri() . '/admin/css/admin.css', false, '1.0.0');
    //wp_enqueue_style('resume_mb', 'https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css');

//js

    wp_enqueue_script('admin_bootstrap-min', 'https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js');

}
add_action('admin_enqueue_scripts', 'resume_wp_admin_style', 10, 1);

//=======================================================
//                        Login Screen
//=======================================================
if (!function_exists('resume_login_screen')) {
    function listingpro_login_screen()
    {
        wp_enqueue_style('resume_login_css', get_template_directory_uri() . '/admin/css/login.css', false, '1.0.0');
        //  wp_enqueue_style( 'resume_mb', 'https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css' );
    }

    add_action('login_enqueue_scripts', 'listingpro_login_screen');
}
/*====================================================================================*/
