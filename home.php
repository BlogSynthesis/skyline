<?php

add_action( 'genesis_meta', 'bs_home_genesis_meta' );
/**
 * Add widget support for homepage.
 *
 */
function bs_home_genesis_meta() {

	if ( is_active_sidebar( 'home-cta-left' ) || is_active_sidebar( 'home-cta-right' ) ) {
	
		add_action( 'genesis_after_header', 'bs_home_loop_helper' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		//* Add homepage widgets
		add_action( 'genesis_loop', 'child_do_custom_loop' );

	}
}

/**
 * Display widget content for home calltoaction sections.
 *
 */
function bs_home_loop_helper() {

	if ( is_active_sidebar( 'home-cta-left' ) || is_active_sidebar( 'home-cta-right' ) ) {

			echo '<div id="home-cta"><div class="wrap clearfix">';

			echo '<div class="home-cta-left">';
			dynamic_sidebar( 'home-cta-left' );
			echo '</div><!-- end .home-cta-left -->';	

			echo '<div class="home-cta-right">';
			dynamic_sidebar( 'home-cta-right' );
			echo '</div><!-- end .home-cta-right -->';

			echo '</div><!-- end .wrap --></div><!-- end #home-cta -->';	

		}

}

 
function child_do_custom_loop() {

	if ( is_active_sidebar( 'home-featured-left' ) || is_active_sidebar( 'home-featured-right' ) ) {
	
		echo '<div id="home-featured"><div class="wrap clearfix">';

			echo '<div class="home-featured-left">';
			dynamic_sidebar( 'home-featured-left' );
			echo '</div><!-- end .home-featured-left -->';	

			echo '<div class="home-featured-right">';
			dynamic_sidebar( 'home-featured-right' );
			echo '</div><!-- end .home-featured-right -->';

			echo '</div><!-- end .wrap --></div><!-- end #home-featured -->';	

	}
}

genesis();