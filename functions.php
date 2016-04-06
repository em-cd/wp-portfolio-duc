<?php

/*
	===============================================
	external files
	===============================================
*/

require get_template_directory() . '/inc/walker.php';

/*
	===============================================
	theme support
	===============================================
*/

function portfolio_theme_setup() {

	add_theme_support('post-thumbnails'); // add thumbnail support
	add_theme_support('title-tag'); // add title tag to head
	add_theme_support('infinite-scroll', array(
		'container' => 'primary',
		'type' => 'scroll',
		'wrapper' => false,
		'footer' => false,
		)); // add infinite scroll (this uses the Jetpack plugin!)

}

/*
	===============================================
	functions
	===============================================
*/

 // load  header script
function portfolio_header_scripts() {
	if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
		// conditionizr (head.js)
		wp_register_script('portfoliohead', get_template_directory_uri() . '/js/head.js', array(), '1.0.0');
		// enqueue head.js
		wp_enqueue_script('portfoliohead');
	}
}

// load other scripts
function portfolio_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('masonry');
	wp_enqueue_script('portfolioscripts', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '1.0.0', true);
}

// load styles 
function portfolio_styles() {
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/portfolio.min.css', array(), '1.0.0', 'all');
}

// register navigation menus
function register_portfolio_menu() {
	register_nav_menus( array(
		'header-menu' => 'Home Header Navigation',
		'toggled-menu' => 'Toggled Navigation Menu',
	) );
}

//remove default image links
function imagelink_setup() {

    $image_set = get_option( 'image_default_link_type' );
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}

//remove jquery spinner from infinite scroll when loading posts
function spinner_dequeue() {
	wp_dequeue_script('jquery.spin');
}

/*
	===============================================
	actions & filters
	===============================================
*/

// add actions
add_action('after_setup_theme', 'portfolio_theme_setup'); // add theme support
add_action('init', 'portfolio_header_scripts'); // add scripts to wp_head
add_action('wp_enqueue_scripts', 'portfolio_scripts'); // add scripts
add_action('wp_enqueue_scripts', 'portfolio_styles'); // add stylesheet
add_action('init', 'register_portfolio_menu'); // add menu
add_action('admin_init', 'imagelink_setup'); // remove default image links
add_action('init','portfolio_custom_post_type'); // add custom portfolio post type
add_action('wp_print_scripts', 'spinner_dequeue', 100); // remove jquery spinner from infinite scroll



// add filters
add_filter( 'show_admin_bar', '__return_false' ); // hide admin bar when viewing website
add_filter( 'use_default_gallery_style', '__return_false' ); // get rid of default gallery style

/*
	===============================================
	custom post type: portfolio
	===============================================
*/

function portfolio_custom_post_type() {

	$labels = array(
		'name' => 'Portfolio',
		'singular_name' => 'Project',
		'add_new' => 'Add Item',
		'add_new_item' => 'Add Item',
		'all_items' => 'All Items',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_items' => 'Search Portfolio',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'show_in_rest' => true,
		'query_var' => true,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail'
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
	);

	register_post_type('portfolio',$args);
}
