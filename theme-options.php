<?php

// Default options values
$organicfarm_options = array(
	'back_to_top' => true,
	'show_query_stats' => false,
	'maintenance_mode' => false,
	'custom_css' => ''
);

if ( is_admin() ) : // Load only if we are viewing an admin page

function organicfarm_register_settings() {
	// Register settings and call sanitation functions
	register_setting( 'organicfarm_theme_options', 'organicfarm_options', 'organicfarm_validate_options' );
}

add_action( 'admin_init', 'organicfarm_register_settings' );


function organicfarm_theme_options() {
	// Add theme options page to the addmin menu
	add_menu_page( 'organicfarm', 'organicfarm', 'edit_theme_options', 'theme_options', 'organicfarm_theme_options_page',get_template_directory_uri() . '/images/html5.png' );
	add_submenu_page( 'theme_options', 'organicfarm Notes', 'Notes', 'edit_theme_options', 'theme_options_notes', 'organicfarm_theme_notes_page');
}

add_action( 'admin_menu', 'organicfarm_theme_options' );

// Function for notes page
function organicfarm_theme_notes_page() {
	echo '<div class="wrap">';
	screen_icon();
	echo '<h2>organicfarm Notes</h2><ol>
	<li><strong>Archive Page:</strong> There\'s a page template called Archives. Don\'t enter any page content, just title the page and select Archives for the page template. The archives will be generated automatically. See <a href="http://organicfarm.com/archives/">here for an example</a>.</li>
	<li><strong>Link Post Format:</strong> To utilize the link Post Format, simply write a new post and select "Link" for the format. You\'ll also need to add a custom field with the URL you want to link to. The custom field name should be LinkFormatURL and the custom field value should be the URL you want to link to.</li>
	<li><strong>Quote Post Format:</strong> When using this post format, I usually use the author or source as the post title, and then put the quote inside a blockquote for the actual post content.</li>
	<li><strong>Status Post Format:</strong> Just put your status as the post title and publish (make sure you select the status format!). No post content is necessary.</li>
	<li><strong>Maintenance Mode:</strong> This option lets you show a "maintenance" message to visitors who aren\'t logged in. This can be useful while making changes to your website or while tinkering with organicfarm. Just don\'t forget to disable it when you\'re done or your visitors won\'t see your site!</li>
	<li><strong>Fuzzy Timestamps:</strong> Enabling fuzzy timestamps on the options page will cause dates/times to display like "two days ago" or "4 hours ago", instead of dates showing "10/07/2011 11:23:34".</li>
	<li><strong>Twitter Widget:</strong> A custom twitter widget is included with organicfarm as of version 2.1. This widget is based on the <a href="https://github.com/matthiassiegel/Simple-Twitter-Widget" target="_blank">Simple Twitter Widget</a> by <a href="http://chipsandtv.com" target="_blank">Matthias Siegel</a>. Matthias graciously allowed me to include his code in organicfarm.</li>
</ol></div>';
}

// Function to generate options page
function organicfarm_theme_options_page() {
	global $organicfarm_options, $organicfarm_image_sizes, $organicfarm_categories, $organicfarm_num_featured_options, $organicfarm_theme_colors, $organicfarm_theme_fonts;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false; ?>

	<div class="wrap">

	<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options','organicfarm' ) . "</h2>"; ?>

	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e( 'Options saved', 'organicfarm' ); ?></strong></p></div>
	<?php endif; ?>

	<form method="post" action="options.php">

	<?php $settings = get_option( 'organicfarm_options', $organicfarm_options ); ?>
	
	<?php settings_fields( 'organicfarm_theme_options' ); ?>

	<table class="form-table">

	<tr valign="top"><th scope="row"><label for="back_to_top">"Back to Top" Button</label></th>
	<td>
	<input type="checkbox" id="back_to_top" name="organicfarm_options[back_to_top]" value="1" <?php checked( true, $settings['back_to_top'] ); ?> />
	<label for="back_to_top">Enabled</label>
	</td>
	</tr>
	<tr valign="top"><th scope="row"><label for="show_query_stats">Show Query Stats In Footer</label></th>
	<td>
	<input type="checkbox" id="show_query_stats" name="organicfarm_options[show_query_stats]" value="1" <?php checked( true, $settings['show_query_stats'] ); ?> />
	<label for="show_query_stats">Enabled</label>
	</td>
	</tr>
	<tr valign="top"><th scope="row"><label for="maintenance_mode">Maintenance Mode</label></th>
	<td>
	<input type="checkbox" id="maintenance_mode" name="organicfarm_options[maintenance_mode]" value="1" <?php checked( true, $settings['maintenance_mode'] ); ?> />
	<label for="maintenance_mode">Enabled</label>
	</td>
	</tr>
	<tr valign="top"><th scope="row"><label for="custom_css">Custom CSS</label></th>
	<td>
	<textarea name="organicfarm_options[custom_css]" style="width:350px; height:200px;" cols="" rows=""><?php echo esc_attr($settings['custom_css']); ?></textarea>
	</td>
	</tr>
	</table>

	<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

	</form>

	</div>

	<?php
}

function organicfarm_validate_options( $input ) {
	global $organicfarm_options, $organicfarm_image_sizes, $organicfarm_categories, $organicfarm_num_featured_options, $organicfarm_theme_colors, $organicfarm_theme_fonts;

	$settings = get_option( 'organicfarm_options', $organicfarm_options );
	
	// If the checkbox has not been checked, we void it
	if ( ! isset( $input['show_query_stats'] ) )
		$input['show_query_stats'] = null;
	// We verify if the input is a boolean value
	$input['show_query_stats'] = ( $input['show_query_stats'] == 1 ? 1 : 0 );

	// If the checkbox has not been checked, we void it
	if ( ! isset( $input['maintenance_mode'] ) )
		$input['maintenance_mode'] = null;
	// We verify if the input is a boolean value
	$input['maintenance_mode'] = ( $input['maintenance_mode'] == 1 ? 1 : 0 );
	
	// If the checkbox has not been checked, we void it
	if ( ! isset( $input['back_to_top'] ) )
		$input['back_to_top'] = null;
	// We verify if the input is a boolean value
	$input['back_to_top'] = ( $input['back_to_top'] == 1 ? 1 : 0 );
	
	return $input;
}

endif;  // EndIf is_admin()
?>
