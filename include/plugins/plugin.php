<?php 
/**
 * fair-play meta ,Block and theme option functions and definitions
 *
 * @link https://docs.carbonfields.net/
 * @package fair-play
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

 add_action( 'carbon_fields_register_fields', 'crb_attach_file' );
 function crb_attach_file() {

	 require RESUME_DIR . '/include/theme-option/resume-post-meta.php';
	 require RESUME_DIR . '/include/theme-option/resume-theme-option.php';
   	 require RESUME_DIR .'/include/theme-option/resume-blocks.php';

 }

 add_action( 'after_setup_theme', 'crb_load' );
 function crb_load() {
     require_once( 'vendor/autoload.php' );
     \Carbon_Fields\Carbon_Fields::boot();
 }
