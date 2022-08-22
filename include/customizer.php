<?php
/**
 * Resume Theme Customizer
 *
 * @package resume
 */

function resume_customize_register($wp_customize)
{

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'resume_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'resume_customize_partial_blogdescription',
        ));
    }

    $wp_customize->remove_control('header_textcolor');

    /**  =============================================================================
                                    Header Logo Section
     ================================================================================= */

	//Header Section Setting
	$wp_customize->add_section('upload_custom_logo', array(
        'title' => __('Header Section', 'resume'),
        'description' => __('Display a custom logos?', 'resume'),
        'priority' => 25,
    ));

	//Preloader Logo
	$wp_customize->add_setting('preloader_logo', array(
		'default' => '',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'preloader_logo', array(
		'label' => __('Preloader Logo', 'resume'),
		'section' => 'upload_custom_logo', // put the name of whatever section you want to add your settings
		'settings' => 'preloader_logo',
	)));

	// Header Logo
    $wp_customize->add_setting('custom_logo', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
        'label' => __('Banner Logo', 'resume'),
        'description' => '',
        'section' => 'upload_custom_logo',
        'settings' => 'custom_logo',
    )));

	// Menu Section Logo
    $wp_customize->add_setting('menu_logo', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'menu_logo', array(
        'label' => __('Menu Logo', 'resume'),
        'section' => 'upload_custom_logo', // put the name of whatever section you want to add your settings
        'settings' => 'menu_logo',
    )));


	/**  =============================================================================
									Footer Section
	================================================================================= */

	//Footer Section Setting
	$wp_customize->add_section('footer_section', array(
		'title' => __('Footer Section', 'resume'),
		'description' => '',
		'priority' => 26,
	));

	// Footer Logo
	$wp_customize->add_setting('footer_logo', array(
		'default' => '',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
		'label' => __('Footer Logo', 'resume'),
		'section' => 'footer_section', // put the name of whatever section you want to add your settings
		'settings' => 'footer_logo',
	)));

	// Footer main Title
	$wp_customize->add_setting('_footer_text', array(
		'default' => '',
	));
	$wp_customize->add_control('_footer_text', array(
		'label' => __('Preloader Logo', 'resume'),
		'type' => 'text',
		'section' => 'footer_section', // put the name of whatever section you want to add your settings
		'settings' => '_footer_text',
	));

	// Footer Content
	$wp_customize->add_setting('footer_content', array(
		'default' => '',
	));
	$wp_customize->add_control('footer_content', array(
		'label' => __('Short Description', 'resume'),
		'type' => 'textarea',
		'section' => 'footer_section', // put the name of whatever section you want to add your settings
		'settings' => 'footer_content',
	));

	// Email
	$wp_customize->add_setting('admin_email', array(
		'default' => '',
	));
	$wp_customize->add_control('admin_email', array(
		'label' => __('Email', 'resume'),
		'type' => 'email',
		'section' => 'footer_section', // put the name of whatever section you want to add your settings
		'settings' => 'admin_email',
		'description' => __( 'add your email address.' ),
	));

	// Phone
	$wp_customize->add_setting('_phone_info', array(
		'default' => '',
	));
	$wp_customize->add_control('_phone_info', array(
		'label' => __('Phone Number', 'resume'),
		'type' => 'tel',
		'section' => 'footer_section',
		'settings' => '_phone_info',
		'description' => __( 'add your phone number.' ),
	));

	// Copyright Info
	$wp_customize->add_setting('_copyright_info', array(
		'default' => '',
	));
	$wp_customize->add_control('_copyright_info', array(
		'label' => __('Copyright Info', 'resume'),
		'type' => 'text',
		'section' => 'footer_section',
		'settings' => '_copyright_info',
		'description' => __( 'add copyright info in footer section.' ),
	));

	/**  =============================================================================
						Social media Link
	================================================================================= */

	//Social media Section Setting
	$wp_customize->add_section('social_section', array(
		'title' => __('Socials', 'resume'),
		'description' => __('add socials links', 'resume'),
		'priority' => 28,
	));

	// LinkedIn URL
	$wp_customize->add_setting('_linkedin_link', array(
		'default' => '',
	));
	$wp_customize->add_control('_linkedin_link', array(
		'label' => __('LinkedIn', 'resume'),
		'type' => 'url',
		'section' => 'social_section', // put the name of whatever section you want to add your settings
		'settings' => '_linkedin_link',
		'description' => __('add your linkedIn link', 'resume'),
	));

	// Facebook URL
	$wp_customize->add_setting('_facebook_link', array(
		'default' => '',
	));
	$wp_customize->add_control('_facebook_link', array(
		'label' => __('Facebook', 'resume'),
		'type' => 'url',
		'section' => 'social_section', // put the name of whatever section you want to add your settings
		'settings' => '_facebook_link',
		'description' => __('add your facebook link', 'resume'),
	));

	// Instagram URL
	$wp_customize->add_setting('_instagram_link', array(
		'default' => '',
	));
	$wp_customize->add_control('_instagram_link', array(
		'label' => __('Instagram', 'resume'),
		'type' => 'url',
		'section' => 'social_section', // put the name of whatever section you want to add your settings
		'settings' => '_instagram_link',
		'description' => __('add your instagram link', 'resume'),
	));

	// Github URL
	$wp_customize->add_setting('github_link', array(
		'default' => '',
	));
	$wp_customize->add_control('github_link', array(
		'label' => __('Github', 'resume'),
		'type' => 'url',
		'section' => 'social_section', // put the name of whatever section you want to add your settings
		'settings' => 'github_link',
		'description' => __('add your github link', 'resume'),
	));

	// Skype URL
	$wp_customize->add_setting('skype_link', array(
		'default' => '',
	));
	$wp_customize->add_control('skype_link', array(
		'label' => __('Skype', 'resume'),
		'type' => 'url',
		'section' => 'social_section', // put the name of whatever section you want to add your settings
		'settings' => 'skype_link',
		'description' => __('add your skype link', 'resume'),
	));

}
add_action('customize_register', 'resume_customize_register');

/** ======================================================================================
 *          Render the site title for the selective refresh partial.
====================================================================================== */

function resume_customize_partial_blogname()
{
    bloginfo('name');
}

/** ======================================================================================
          Render the site tagline for the selective refresh partial.
====================================================================================== */

function resume_customize_partial_blogdescription()
{
    bloginfo('description');
}

/** ======================================================================================
    Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
====================================================================================== */

function resume_customize_preview_js()
{
    wp_enqueue_script('resume-customizer', RESUME_SRC . 'assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'resume_customize_preview_js');
