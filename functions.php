<?php
require_once ( get_template_directory() . '/theme-options.php' );
// Setup options
add_action( 'wp_head', 'organicfarm_layout_view' );
function organicfarm_layout_view() {
	global $organicfarm_options;
	$settings = get_option( 'organicfarm_options', $organicfarm_options );
}

if ( ! isset( $content_width ) ) $content_width = 580;

// Set organicfarm version
define( 'organicfarm_version', '1.0-rc1' );
function organicfarm_getinfo( $show = '' ) {
        $output = '';

		switch ( $show ) {
			case 'version' :
			$output = organicfarm_version;
					break;
		}
		return $output;
}

// Setup theme basics
add_action( 'after_setup_theme', 'organicfarm_theme_setup' );
function organicfarm_theme_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'organicfarm', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	add_theme_support( 'post-formats', array( 'link','quote','status' ) ); // support for post formats
	add_theme_support( 'post-thumbnails' ); // post thumbnails
	register_nav_menu( 'main-menu', __('Main Menu','organicfarm') ); // navigation menus
	add_theme_support( 'automatic-feed-links' ); // automatic feeds
	add_custom_background( 'organicfarm_custom_background_callback' ); // enable custom backgrounds
	add_editor_style( '/css/editor-style.css' );
}

// Register all the javascript
add_action( 'wp_enqueue_scripts', 'organicfarm_register_scripts' );
function organicfarm_register_scripts() {

	wp_enqueue_script( 'jquery', includes_url( 'js/jquery/jquery.js' ));
	wp_enqueue_script( 'easing', get_stylesheet_directory_uri() . '/js/easing.min.js', array( 'jquery' ), '1.1.2', true );
	global $organicfarm_options; $organicfarm_settings = get_option( 'organicfarm_options', $organicfarm_options );
	// If back to top is enabled, add easing and the back to top javascript.
	if ( $organicfarm_settings['back_to_top'] == 1 ) {
		wp_enqueue_script( 'totop', get_stylesheet_directory_uri() . '/js/jquery.ui.totop.js', array( 'jquery' ), '1.1', true );
	}
}

// Setup update checking
add_action( 'admin_notices', 'organicfarm_update_notice' );
add_action( 'network_admin_notices', 'organicfarm_update_notice' ); // I have no idea if that actually works
function organicfarm_update_notice() {

	if ( current_user_can( 'update_themes' ) ) :

		include_once( ABSPATH . WPINC . '/feed.php' );

		// Get the update feed
		$rss = fetch_feed( 'http://www.longren.org/organicfarm.xml' );

		if ( ! is_wp_error( $rss ) ) :
			$maxitems = $rss->get_item_quantity(1); // We only want the latest
			$rss_items = $rss->get_items(0, 1);
		endif;

		if ( $maxitems != 0 ) :

			foreach ( $rss_items as $item ) {
				// Compare feed version to theme version
				if ( version_compare( $item->get_title(), organicfarm_getinfo('version') ) > 0 )
					echo '<div id="update-nag">organicfarm ' . esc_html( $item->get_title() ) .' is available! <a href="' . esc_url( $item->get_permalink() ) .'">Click here to download</a>. ' . esc_html( $item->get_description() ) .
'</div>';
}
endif;
endif; // current_user_can('update_themes')
}

// Setup Widget Areas
add_action( 'widgets_init', 'iowaweekly_sidebars' );
function iowaweekly_sidebars() {
	register_sidebar(array(
		'id' => 'homepage-welcome',
		'name' => 'Homepage Welcome',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));
	register_sidebar(array(
		'id' => 'homepage-row1col1',
		'name' => 'Homepage Row 1 Column 1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => ''
	));
	register_sidebar(array(
		'id' => 'homepage-row1col2',
		'name' => 'Homepage Row 1 Column 2',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => ''
	));
	register_sidebar(array(
		'id' => 'homepage-row1col3',
		'name' => 'Homepage Row 1 Column 3',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => ''
	));
}

?>