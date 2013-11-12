<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );
include_once( get_stylesheet_directory() . '/lib/init.php' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before_footer', 'genesis_do_subnav' );

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

//* Custom codes - Uncomment the action hooks to remove the functionality

//* remove_action( 'wp_enqueue_scripts', 'custom_enqueue_script' );
//* remove_action('genesis_entry_content', 'include_share_box', 9 );

//* remove_action( 'genesis_before_loop', 'custom_top_widgets' );
//* remove_action( 'genesis_before_comments', 'after_post_widgets' );

//* unregister_sidebar( 'single-cta' );
//* unregister_sidebar( 'after-post-entry' );


