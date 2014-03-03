<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Solo' );
define( 'CHILD_THEME_URL', 'http://www.iampuneet.com/' );
define( 'CHILD_THEME_VERSION', '2.0.1' );

//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Merriweather:400,300,700|Muli:400,300', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
// add_theme_support( 'genesis-footer-widgets', 3 );

//* Customize the entry meta in the entry header (requires HTML5 theme support)
add_filter( 'genesis_post_info', 'ps_post_info_filter' );
function ps_post_info_filter($post_info) {
	$post_info = '[post_date] by [post_author_posts_link]';
	return $post_info;
}

//* Customize the entry meta in the entry footer (requires HTML5 theme support)
add_filter( 'genesis_post_meta', 'ps_post_meta_filter' );
function ps_post_meta_filter($post_meta) {
	$post_meta = '[post_categories]';
	return $post_meta;
}

//* Customize the credits
add_filter( 'genesis_footer_creds_text', 'ps_footer_creds_text' );
function ps_footer_creds_text() {
	echo '<div class="creds"><p>';
	echo 'Copyright &copy; ';
	echo date('Y');
	echo ' &middot; <a href="http://iampuneet.com/">Puneet Sahalot</a> &middot; Solo child theme for the <a href="http://www.studiopress.com/themes/genesis" title="Genesis Framework">Genesis Framework</a>';
	echo '</p></div>';
}


//* Add new featured image sizes
add_image_size( 'home-thumb', 920, 350, TRUE );

// Move post feature image above post title
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 3 );

//* Force full-width-content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


//* Unregister content/sidebar layout setting
genesis_unregister_layout( 'content-sidebar' );
 
//* Unregister sidebar/content layout setting
genesis_unregister_layout( 'sidebar-content' );
 
//* Unregister content/sidebar/sidebar layout setting
genesis_unregister_layout( 'content-sidebar-sidebar' );
 
//* Unregister sidebar/sidebar/content layout setting
genesis_unregister_layout( 'sidebar-sidebar-content' );
 
//* Unregister sidebar/content/sidebar layout setting
genesis_unregister_layout( 'sidebar-content-sidebar' );