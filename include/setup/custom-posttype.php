<?php
/**
 * Resume custom post type register
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package resume
 */

// Register Custom Post Type
function news_post_type() {

$news = get_option("_news_slug" );

  if($news){

    $newsSlug = $news;

  } else {

    $newsSlug = "news";
}

	$labels = array(
		"name"                  => _x( "News", "Post Type General Name", "resume" ),
		"singular_name"         => _x( "News", "Post Type Singular Name", "resume" ),
		"menu_name"             => __( "News", "resume" ),
		"name_admin_bar"        => __( "News", "resume" ),
		"archives"              => __( "News Archives", "resume" ),
		"attributes"            => __( "News Attributes", "resume" ),
		"parent_item_colon"     => __( "Parent News:", "resume" ),
		"all_items"             => __( "All News", "resume" ),
		"add_new_item"          => __( "Add New News", "resume" ),
		"add_new"               => __( "Add New News", "resume" ),
		"new_item"              => __( "New News", "resume" ),
		"edit_item"             => __( "Edit News", "resume" ),
		"update_item"           => __( "Update News", "resume" ),
		"view_item"             => __( "View News", "resume" ),
		"view_items"            => __( "View News", "resume" ),
		"search_items"          => __( "Search News", "resume" ),
		"not_found"             => __( "Not found", "resume" ),
		"not_found_in_trash"    => __( "Not found in Trash", "resume" ),
		"featured_image"        => __( "Featured Image", "resume" ),
		"set_featured_image"    => __( "Set featured image", "resume" ),
		"remove_featured_image" => __( "Remove featured image", "resume" ),
		"use_featured_image"    => __( "Use as featured image", "resume" ),
		"insert_into_item"      => __( "Insert into News", "resume" ),
		"uploaded_to_this_item" => __( "Uploaded to this item", "resume" ),
		"items_list"            => __( "News list", "resume" ),
		"items_list_navigation" => __( "News list navigation", "resume" ),
		"filter_items_list"     => __( "Filter News list", "resume" ),
	);
	$args = array(
		"label"                 => __( "News", "resume" ),
		"description"           => __( "Post Type Description", "resume" ),
		"labels"                => $labels,
		"supports"              => array( "title", "editor", "thumbnail", "comments", "trackbacks", "revisions", "custom-fields", "page-attributes", "post-formats" ),
		"taxonomies"            => array( "news_cat" ),
		"hierarchical"          => false,
		"public"                => true,
		"show_ui"               => true,
		"show_in_menu"          => true,
		"menu_position"         => 20,
		"menu_icon"             => get_template_directory_uri()."/assets/images/newspaper.png",
		"show_in_admin_bar"     => true,
		"show_in_nav_menus"     => true,
		"can_export"            => true,
		"has_archive"           => false,
		"exclude_from_search"   => false,
		"publicly_queryable"    => true,
		"capability_type"       => "page",
		"show_in_rest"          => true,
    	"rewrite"               => array( "slug" => $newsSlug),
	);
	register_post_type( "news", $args );

}
add_action( "init", "news_post_type", 0 );



// Register Custom Taxonomy
function news_custom_taxonomy() {

  $news_taxonomy = get_option( "_news_cat_slug" );

  if($news_taxonomy){

      $news_taxonomy_slug = $news_taxonomy;

  } else {

      $news_taxonomy_slug = "news_cat";

}

	$labels = array(
		"name"                       => _x( "Categories", "Taxonomy General Name", "resume" ),
		"singular_name"              => _x( "Categories", "Taxonomy Singular Name", "resume" ),
		"menu_name"                  => __( "Categories", "resume" ),
		"all_items"                  => __( "All Items", "resume" ),
		"parent_item"                => __( "Parent Item", "resume" ),
		"parent_item_colon"          => __( "Parent Item:", "resume" ),
		"new_item_name"              => __( "New Item Name", "resume" ),
		"add_new_item"               => __( "Add New Item", "resume" ),
		"edit_item"                  => __( "Edit Item", "resume" ),
		"update_item"                => __( "Update Item", "resume" ),
		"view_item"                  => __( "View Item", "resume" ),
		"separate_items_with_commas" => __( "Separate items with commas", "resume" ),
		"add_or_remove_items"        => __( "Add or remove items", "resume" ),
		"choose_from_most_used"      => __( "Choose from the most used", "resume" ),
		"popular_items"              => __( "Popular Items", "resume" ),
		"search_items"               => __( "Search Items", "resume" ),
		"not_found"                  => __( "Not Found", "resume" ),
		"no_terms"                   => __( "No items", "resume" ),
		"items_list"                 => __( "Items list", "resume" ),
		"items_list_navigation"      => __( "Items list navigation", "resume" ),
	);
	$args = array(
		"labels"                     => $labels,
		"hierarchical"               => true,
		"public"                     => true,
		"show_ui"                    => true,
		"show_admin_column"          => true,
		"show_in_nav_menus"          => true,
		"show_tagcloud"              => true,
		"rewrite"                    => array( "slug" => $news_taxonomy_slug),
	);
	register_taxonomy( "news_cat", array( "news" ), $args );

}
add_action( "init", "news_custom_taxonomy", 0 );

/** ========================================= Custom Post type ==================================== **/

// Register Custom Post Type
function project_post_type() {

  $project = get_option( "_project_slug" );

  if($project){

      $project_slug = $project;

    } else {

      $project_slug = "project";

    }


	$labels = array(
		"name"                  => _x( "Projects", "Post Type General Name", "resume" ),
		"singular_name"         => _x( "Projects", "Post Type Singular Name", "resume" ),
		"menu_name"             => __( "Project", "resume" ),
		"name_admin_bar"        => __( "Project", "resume" ),
		"archives"              => __( "Project Archives", "resume" ),
		"attributes"            => __( "Project Attributes", "resume" ),
		"parent_item_colon"     => __( "Parent Project:", "resume" ),
		"all_items"             => __( "All Projects", "resume" ),
		"add_new_item"          => __( "Add New Project", "resume" ),
		"add_new"               => __( "Add New Project", "resume" ),
		"new_item"              => __( "New Project", "resume" ),
		"edit_item"             => __( "Edit Project", "resume" ),
		"update_item"           => __( "Update Project", "resume" ),
		"view_item"             => __( "View Project", "resume" ),
		"view_items"            => __( "View Projects", "resume" ),
		"search_items"          => __( "Search Project", "resume" ),
		"not_found"             => __( "Not found", "resume" ),
		"not_found_in_trash"    => __( "Not found in Trash", "resume" ),
		"featured_image"        => __( "Featured Image", "resume" ),
		"set_featured_image"    => __( "Set featured image", "resume" ),
		"remove_featured_image" => __( "Remove featured image", "resume" ),
		"use_featured_image"    => __( "Use as featured image", "resume" ),
		"insert_into_item"      => __( "Insert into Project", "resume" ),
		"uploaded_to_this_item" => __( "Uploaded to this item", "resume" ),
		"items_list"            => __( "Project list", "resume" ),
		"items_list_navigation" => __( "Project list navigation", "resume" ),
		"filter_items_list"     => __( "Filter Project list", "resume" ),
	);
	$args = array(
		"label"                 => __( "Project", "resume" ),
		"description"           => __( "Post Type Description", "resume" ),
		"labels"                => $labels,
		"supports"              => array( "title", "editor", "thumbnail", "comments", "trackbacks", "revisions", "custom-fields", "page-attributes", "post-formats" ),
		"taxonomies"            => array( "project_cat" ),
		"hierarchical"          => false,
		"public"                => true,
		"show_ui"               => true,
		"show_in_menu"          => true,
		"menu_position"         => 20,
		"menu_icon"             => get_template_directory_uri()."/assets/images/project.png",
		"show_in_admin_bar"     => true,
		"show_in_nav_menus"     => true,
		"can_export"            => true,
		"has_archive"           => false,
		"exclude_from_search"   => false,
		"publicly_queryable"    => true,
		"capability_type"       => "post",
		"show_in_rest"          => true,
        "rewrite"               => array( "slug" => $project_slug),
        'query_var'             => 'project',
       );
	register_post_type( "project", $args );

}
add_action( "init", "project_post_type", 0 );

// Register Custom Taxonomy
function project_custom_taxonomy() {

  $project_taxonomy = get_option( "_project_cat_slug" );

  if($project_taxonomy){

      $project_taxonomy_slug = $project_taxonomy;

  } else {

      $project_taxonomy_slug = "project_cat";

}

$project_taxonomy_slug = "project_cat";
	$labels = array(
		"name"                       => _x( "Categories", "Taxonomy General Name", "resume" ),
		"singular_name"              => _x( "Categories", "Taxonomy Singular Name", "resume" ),
		"menu_name"                  => __( "Categories", "resume" ),
		"all_items"                  => __( "All Items", "resume" ),
		"parent_item"                => __( "Parent Item", "resume" ),
		"parent_item_colon"          => __( "Parent Item:", "resume" ),
		"new_item_name"              => __( "New Item Name", "resume" ),
		"add_new_item"               => __( "Add New Item", "resume" ),
		"edit_item"                  => __( "Edit Item", "resume" ),
		"update_item"                => __( "Update Item", "resume" ),
		"view_item"                  => __( "View Item", "resume" ),
		"separate_items_with_commas" => __( "Separate items with commas", "resume" ),
		"add_or_remove_items"        => __( "Add or remove items", "resume" ),
		"choose_from_most_used"      => __( "Choose from the most used", "resume" ),
		"popular_items"              => __( "Popular Items", "resume" ),
		"search_items"               => __( "Search Items", "resume" ),
		"not_found"                  => __( "Not Found", "resume" ),
		"no_terms"                   => __( "No items", "resume" ),
		"items_list"                 => __( "Items list", "resume" ),
		"items_list_navigation"      => __( "Items list navigation", "resume" ),
	);
	$args = array(
		"labels"                     => $labels,
		"hierarchical"               => true,
		"public"                     => true,
		"show_ui"                    => true,
		"show_admin_column"          => true,
		"show_in_nav_menus"          => true,
		"show_tagcloud"              => true,
		"rewrite"                    => array( "slug" => $project_taxonomy_slug),
	);
	register_taxonomy( "project_cat", array( "project" ), $args );

}
add_action( "init", "project_custom_taxonomy", 0 );
