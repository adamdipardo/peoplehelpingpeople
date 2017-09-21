<?php

add_action( 'after_setup_theme', 'setup_people' );
add_action('wp_enqueue_scripts', 'people_styles' );
add_action('wp_enqueue_scripts', 'people_scripts' );

add_action( 'customize_register', 'people_customizer' );
add_action( 'init', 'people_menus' );
add_action( 'init', 'people_support' );
add_action( 'init', 'people_members_post_type' );
add_action( 'after_setup_theme', 'people_image_size' );
add_action('init', 'redirect_member_donate');

add_filter( 'body_class', 'people_add_featured_image_body_class' );
add_filter( 'document_title_parts', 'people_filter_donation_page_titles' );

add_action( 'admin_menu', 'people_admin_menu_cleanup' );

// handle theme setup
function setup_people() {

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

}

// enqueueing styles
function people_styles() {

	// bootstrap styles
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.7', 'all' );
	wp_register_style( 'peoplehelpingpeople', get_template_directory_uri() . '/style.css', array(), '0.0.4', 'all' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'peoplehelpingpeople' );

}

function people_scripts() {

	// bootstrap JS
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.7' );
	wp_enqueue_script( 'bootstrap' );

}

function people_customizer( $wp_customize ) {

	// $wp_customize->add_section( 'people_logo_section' , array(
	//     'title' => 'Logo',
	//     'priority' => 30,
	//     'description' => 'Upload a logo to use in the top left corner of the theme',
	// ) );

	// $wp_customize->add_setting( 'people_logo' );

	// $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'people_logo', array(
	//     'label'    => 'Logo',
	//     'section'  => 'people_logo_section',
	//     'settings' => 'people_logo',
	// ) ) );

}

// register menus
function people_menus() {

	register_nav_menu( 'people_header_menu', 'Primary header menu' );

}

// register support for stuff
function people_support() {

	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'people_member' ) );

}

function people_get_header_background_image() {

	if ( has_post_thumbnail() && !is_archive() && get_post_type() != 'people_member' )	{

		echo 'background-image: url(' . get_the_post_thumbnail_url() . ')';

	}

}

function people_add_featured_image_body_class( $classes ) {

	if ( has_post_thumbnail() && !is_archive() && get_post_type() != 'people_member' ) {

		$classes[] = "has-thumbnail";

	}

	return $classes;

}

function people_members_post_type() {

	register_post_type( 'people_member',
		array(
			'labels' => array(
				'name' => 'Members',
				'singular_name' => 'Member'
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array(
				'slug' => 'members',
				'with_front' => false
			),
			'supports' => array(
				'title',
				'editor',
				'thumbnail'
			),
			'menu_icon' => 'dashicons-groups'
		)
	);

}

function people_image_size() {

	// image size for members archive
	add_image_size( 'people_member_archive_thumb', 500, 374, true );

	// image size for single members page
	add_image_size( 'people_member_single_thumb', 424, 317, true );

}

function redirect_member_donate() {

	add_rewrite_rule('members\/(.*)\/donate\/finished\/?', 'index.php?page_id=39' , 'top');
	add_rewrite_rule('members\/(.*)\/donate\/?', 'index.php?page_id=36' , 'top');
	add_rewrite_rule('donate\/finished\/?', 'index.php?page_id=41' , 'top');

}

function people_filter_donation_page_titles( $title ) {

	preg_match( "/members\/(.*)\/donate(?:\/finished)?\/?/", $_SERVER['REQUEST_URI'], $matches );
	preg_match( "/(donate(?:\/finished)?\/?)/", $_SERVER['REQUEST_URI'], $matches2 );

	if ( $matches[1] ) {
		$post = get_page_by_path( $matches[1], OBJECT, 'people_member' );
		$title['title'] = "Support " . $post->post_title;
		return $title;
	}
	else if ( $matches2[1] ) {
		$title['title'] = "Support Us";
		return $title;
	}

	return $title;

}

function people_admin_menu_cleanup() {
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );
}