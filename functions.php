<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );
include_once( get_stylesheet_directory() . '/lib/init.php' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Enqueue Scripts
add_action( 'wp_enqueue_scripts', 'education_load_scripts' );
function education_load_scripts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Noto+Sans|Roboto+Condensed:700|Roboto+Slab:400', array(), CHILD_THEME_VERSION );
	
	wp_enqueue_script( 'education-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );

	wp_enqueue_style( 'dashicons' );
}

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before_footer', 'genesis_do_subnav' );

//* Reduce the secondary navigation menu to one level depth
add_filter( 'wp_nav_menu_args', 'education_secondary_menu_args' );
function education_secondary_menu_args( $args ){

	if( 'secondary' != $args['theme_location'] )
	return $args;

	$args['depth'] = 1;
	return $args;

}

/** Remove secondary sidebar */
unregister_sidebar( 'sidebar-alt' );

/** Register widget areas */
genesis_register_sidebar( array(
	'id'				=> 'home-cta-left',
	'name'			=> __( 'Home CTA Left', 'wpavenue' ),
	'description'	=> __( 'This is the CTA left area on the homepage.', 'wpavenue' ),
) );

genesis_register_sidebar( array(
	'id'				=> 'home-cta-right',
	'name'			=> __( 'Home CTA Right', 'wpavenue' ),
	'description'	=> __( 'This is the cta right area on the homepage.', 'wpavenue' ),
) );

genesis_register_sidebar( array(
	'id'				=> 'home-featured-left',
	'name'			=> __( 'Home Featured Left', 'wpavenue' ),
	'description'	=> __( 'This is the featured left area on the homepage.', 'wpavenue' ),
) );

genesis_register_sidebar( array(
	'id'				=> 'home-featured-right',
	'name'			=> __( 'Home Featured Right', 'wpavenue' ),
	'description'	=> __( 'This is the featured right area on the homepage.', 'wpavenue' ),
) );

add_filter( 'comment_form_defaults', 'remove_comment_form_allowed_tags' );
function remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comments_notes_after' ]= '';
	return $defaults;
	
}

// Remove post meta from the loop
remove_action('genesis_entry_footer', 'genesis_post_meta');

add_action('genesis_entry_header', 'genesis_post_meta_on_single');
function genesis_post_meta_on_single() {
	if ( is_single() ) {
		add_action( 'genesis_entry_footer', 'genesis_post_meta');
	}
}


remove_action( 'genesis_entry_header', 'genesis_post_info', 12);
add_action( 'genesis_entry_header', 'genesis_post_info', 9 );
// Customize the post info function
add_filter( 'genesis_post_info', 'post_info_filter' );
function post_info_filter($post_info) {
	$post_info = '<strong>[post_date] <i>by</i> [post_author_posts_link]</strong>';
	return $post_info;
}
 

//* Custom codes - Uncomment the action hooks to remove the functionality

//* remove_action( 'wp_enqueue_scripts', 'custom_enqueue_script' );
//* remove_action('genesis_entry_content', 'include_share_box', 9 );

//* remove_action( 'genesis_before_loop', 'custom_top_widgets' );
//* remove_action( 'genesis_before_comments', 'after_post_widgets' );

//* unregister_sidebar( 'single-cta' );
//* unregister_sidebar( 'after-post-entry' );


