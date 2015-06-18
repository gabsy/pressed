<?php
add_filter('show_admin_bar', '__return_false');
/*********************************************************************************************

Adding Translation Option

*********************************************************************************************/
load_theme_textdomain( 'site5framework', get_template_directory().'/languages' );
$locale = get_locale();
$locale_file = get_template_directory()."/languages/$locale.php";
if ( is_readable($locale_file) ) require_once($locale_file);


/*********************************************************************************************

Load site5framework Theme Options

*********************************************************************************************/
require('theme-options.php');


/*********************************************************************************************

Add Thumbnail Support

*********************************************************************************************/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100, true ); // Normal post thumbnails
add_image_size( 'single-post-image', 720, 320, TRUE );
add_image_size( 'team-item-small', 280, 440, TRUE );



/*********************************************************************************************

Adding Nav Menus

*********************************************************************************************/
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
    register_nav_menus(                      		// wp3+ menus
        array(
					'main_nav' => 'Top Menu',
					'submenu_about' => 'Submenu About',
					'footer_nav1' => 'Footer Nav 1',
					'footer_nav2' => 'Footer Nav 2',
					'footer_nav3' => 'Footer Nav 3',
					'footer_nav4' => 'Footer Nav 4'
        )
    );
}

function main_nav() {
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    	'menu' => 'Top Menu', /* menu name */
    	'theme_location' => '', /* where in the theme it's assigned */
			'container' => 'nav',
			'container_class' => 'navigation'
    	)
    );
}

function submenu_about() {
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    	'menu' => 'Menu About', /* menu name */
    	'theme_location' => '', /* where in the theme it's assigned */
			'container' => 'nav',
			'container_class' => 'submenu'
    	)
    );
}

function footer_nav($index) {
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    	'menu' => 'Footer Nav '.$index, /* menu name */
    	'theme_location' => '', /* where in the theme it's assigned */
			'container' => 'ul',
			'container_class' => ''
    	)
    );
}

/*********************************************************************************************

Add Custom Background Support

*********************************************************************************************/
$defaults = array(
	'default-color'          => '000000',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );


/*********************************************************************************************

Replaces the excerpt "more" text by a link

*********************************************************************************************/
function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '<a class="post_read_more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/*********************************************************************************************

Special Shortcode: Job Openings

*********************************************************************************************/
function getTitle( $dom, $tagName, $attrName, $attrValue ){
    $html = '';
    $domxpath = new DOMXPath($dom);
    $newDom = new DOMDocument;
    $newDom->formatOutput = true;
    $filtered = $domxpath->query("//$tagName" . '[@' . $attrName . "='$attrValue']");
    foreach ($filtered as $entry) {
    $value[] = $entry->getAttribute('href').'%%@%%'.$entry->nodeValue;
    }
    return $value;
}
function available_jobs_func( ) {
    // Initialize the jobs array
    $jobs = array();
    $job_link = "http://wwwh.theresumator.com/apply/";
    $dom = new DOMDocument;
    $dom->preserveWhiteSpace = false;
    @$dom->loadHTMLFile($job_link);

    $title    = getTitle($dom,'a','class','resumator-jobs-text resumator-job-title-link');
    $location = getTitle($dom,'div','class','resumator-job-info resumator-jobs-text');
    foreach($title as $key =>$entry) {
      $exploded_entry      = explode("%%@%%",$entry);
      $jobs[$key]['href']  = $exploded_entry[0];
      $jobs[$key]['title'] = trim($exploded_entry[1]);
    }
    foreach($location as $key   => $entry) {
      $exploded_entry           = explode("%%@%%", $entry);
      $exploded2_entry          = explode("Department:",$exploded_entry[1]);
      $jobs[$key]['location']   = trim(str_replace("Location:","",$exploded2_entry[0]));
      $jobs[$key]['department'] = trim($exploded2_entry[1]);
    }


    $display_jobs = "<div>";
    if(!empty($jobs)):
      $display_jobs .= "<table class=\"careers_table\">
        <tr>
          <th>Job Title</th>
          <th>Location</th>
          <th>Department</th>
        </tr>";
        foreach($jobs as $job):
          $display_jobs .= "<tr>
            <td><a target='_blank' href='".$job['href']."'>".$job['title']."</a></td>
            <td>".$job['location']."</td>
            <td>".$job['department']."</td>
          </tr>";
        endforeach;
      $display_jobs .= "</table>";
    else:
      $display_jobs .= "<p>There are no jobs available.</p>";
    endif;
    $display_jobs .= "</div>";

    return $display_jobs;
}
add_shortcode( 'available_jobs', 'available_jobs_func' );

// GET POST CUSTOM TAXONOMY
//--------------------------------
function post_taxonomy($postid) {
	$terms = get_the_terms( $postid, 'articlecat' );
		if ( !empty( $terms ) ){
				// get the first term
				$term = array_shift( $terms );
				echo $term->name;
		}
}
?>