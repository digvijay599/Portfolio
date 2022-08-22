<?php
/**
 * resume theme option  functions and definitions
 *
 * @link https://docs.carbonfields.net/#/containers/post-meta
 *
 * @package resume
 *
 * Header Container
 * url Config
 * Contact Page
 * Mail Information
 * Footer
 *
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Header
$resume = Container::make('theme_options', __('General Settings'))
	    ->set_icon('dashicons-portfolio')
	    ->set_page_menu_position(4)
	    ->set_page_menu_title(__('Theme Option'))

         ->add_fields(array(

	        Field::make('separator', 'general_config_sep', __('General information'))
	            ->set_help_text('Add or edit styles and scripts'),

	        Field::make('header_scripts', 'crb_header_script', __('Custom CSS'))
	            ->set_hook_priority(10),

	        Field::make('footer_scripts', 'crb_footer_script', __('Custom JS')),

         ));


		// url Config
		Container::make('theme_options', __('URL Config'))

		    ->set_icon('dashicons-carrot')

		    ->set_page_parent($resume)

		    ->add_fields(array(

		        Field::make('separator', 'url_config_sep', __('URL Rewrite'))
		            ->set_help_text('Please refresh the permalinks (in the settings menu) after any changes you made to the following slugs (to avoid a 404 error page).'),

		        Field::make('text', 'news_slug', __('Rewrite news slug'))
		            ->set_help_text('Standard ist "news"'),

		        Field::make('text', 'news_cat_slug', __('Rewrite news category slug'))
		            ->set_help_text('Standard ist "news_cat"'),

		        Field::make('text', 'project_slug', __('Rewrite Project slug'))
		            ->set_help_text('Standard ist "project"'),

		        Field::make('text', 'project_cat_slug', __('Rewrite project category slug'))
		            ->set_help_text('Standard ist "project_cat"'),

		    ));


