<?php
/**
 * resume post meta functions and definitions
 *
 * @link https://docs.carbonfields.net/#/containers/post-meta
 *
 * @package resume
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', __('Project Details'))
    ->where('post_type', '=', 'project')
    ->add_fields(array(
        Field::make('separator', 'general_config_sep', __('Project Details'))
            ->set_help_text('Add project details'),

	    Field::make('text', 'prject_type', __('Project Type'))
	         ->set_help_text('enter your project type'),

        Field::make('date', 'prject_year', __('Year'))
            ->set_help_text('Project done in which year'),

        Field::make('text','project_client', __('Client'))
            ->set_help_text("Project's Client"),

        Field::make('complex','project_roles', __('Roles on Project'))
            ->add_fields(array(
                Field::make( 'text', 'project_role', __( 'Role' ) )
                    ->set_help_text("add your role on project")
            )),
        Field::make('complex','project_technology', __('Technologies on Project'))
            ->add_fields( array(
                Field::make( 'text', 'ptechnology', __( 'Technology' ) )
                    ->set_help_text("add technology used in project")
                ) ),




    ));

Container::make('post_meta', 'News Details')
    ->where('post_type', '=', 'news')
    ->add_fields(array(

        Field::make('textarea', 'short_content', __('Short content'))
            ->set_help_text('add brief content for show news list page'),

        Field::make('date', 'ne_datum', __('Datum'))
            ->set_input_format('d F Y', 'd F Y'),

        Field::make('text', 'ne_redaktion', __('Redaktion')),

    ));

Container::make('post_meta', 'Page Top Section')
    ->where('post_type', '=', 'page')
    ->set_context( 'advanced' )
    ->set_priority( 'high' )
    ->add_fields(array(

        Field::make('separator', 'page_detail', __('Page Top Section'))
            ->set_help_text('Add details of page top section'),

        Field::make( 'radio', 'bg_type', __( 'Choose Background of Top Section' ) )
        ->add_options( array(
            'light' => __('Light'),
            'dark' => __('Dark'),
        ) ),

        Field::make('text', 'page_subtitle', __('Subtitle'))
            ->set_help_text('add title of Page'),

        Field::make('rich_text', 'page_description', __('Description'))
            ->set_help_text('add short description of Page'),
    ));
