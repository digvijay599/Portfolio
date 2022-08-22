<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package resume
 */

?>
<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head();?>
</head>


	<body id="Top" data-barba="wrapper" <?php body_class();?>>
	<?php wp_body_open();?>
	<div class="cursor-wrapper">
		<div class="cursor"></div>
		<div class="follower"></div>
	</div>
	<ul class="transition">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
	<div class="Preloads">
		<div class="LoaderImage">
			<div class="LoaderOverlay">
				<img class="Dim" src="<?php echo get_template_directory_uri(); ?>/assets/images/JPF-Logo-White.svg" alt="Jason Frelich Logo Grey" />
			</div>
			<img class="Color" src="<?php echo get_template_directory_uri(); ?>/assets/images/JPF-Logo-Gold.svg" alt="Jason Frelich Logo Color" />
		</div>
	</div>

	<div class="scrollContainer" id="scrollContainer" data-scroll-container>
		<header id="header" class="is-inview Light-BG" data-scroll data-scroll-sticky data-scroll-target="#scrollContainer">
		<a class="Screen-Reader" href="#main">Skip to main Content</a>
		<div id="Logo">
			<a href="/">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/JPF-Logo.svg" alt="Jason Frelich Logo">
				<img class="light" src="<?php echo get_template_directory_uri(); ?>/assets/images/JPF-Logo-Light.svg" alt="Jason Frelich Logo" />
			</a>
		</div>
		<button class="btn Menu-Button Closed">
			<span class="Text">Menu</span>
			<span class="Hamburger ">
				<span class="Hamburger-box">
					<span class="Hamburger-Inner"></span>
				</span>
			</span>
		</button>
		<div id="Menu" class="Menu">
			<div id="MainLinks">
				<span class="Sub-Header Add-Flourish ">Menu</span>
						<?php
		                  wp_nav_menu( array(
							'menu_id'        => 'menu-1',
							'container' 	 => false,
							'menu_class'      => '', 
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'depth'           => 0,
							'walker'          => '',
							'theme_location'  => ''
		                  ) );
		                  ?>
           			<ul>
					  <li class="nav selected">
					    <a class="mask" data-href="/" data-text="Home" tabindex="0">Home</a>
					    <a href="/">Home</a>
					  </li>
					  <li class="nav">
					    <a class="mask" data-href="Work.html" data-text="Work" tabindex="0">Work</a>
					    <a href="Work.html">Work</a>
					  </li>
					  <li class="nav">
					    <a class="mask" data-href="About.html" data-text="About" tabindex="0">About</a>
					    <a href="About.html">About</a>
					  </li>
					  <li class="nav">
					    <a class="mask" data-href="Contact.html" data-text="Contact" tabindex="0">Contact</a>
					    <a href="Contact.html">Contact</a>
					  </li>
					  <li class="indicator"></li>
					</ul>
			</div>
		</div>
	</header>
