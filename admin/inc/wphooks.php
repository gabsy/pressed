<?php
/*********************************************************************************************

WP_Hooks - Enqueue Javascripts

*********************************************************************************************/
function site5framework_header_init() {
    if (!is_admin()) {
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script('modernizr', get_template_directory_uri() .'/js/vendor/modernizr-2.6.2.min.js');	
    }
}
add_action('init', 'site5framework_header_init');


/*********************************************************************************************

Favicon

*********************************************************************************************/
function site5framework_custom_shortcut_favicon() {
	if (of_get_option('custom_shortcut_favicon') != '') {
    echo '<link rel="shortcut icon" href="'. of_get_option('custom_shortcut_favicon') .'" type="image/ico" />'."\n";
	}
	else { ?><link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/favicon.ico" type="image/ico" />
	<?php }
}
add_action('wp_head', 'site5framework_custom_shortcut_favicon');




/*********************************************************************************************

Stats

*********************************************************************************************/
function site5framework_analytics(){
	$output = of_get_option('stats');
	if ( $output <> "" )
	echo stripslashes($output) . "\n";
}
add_action('wp_footer','site5framework_analytics');
?>