<?php
add_filter('show_admin_bar', '__return_false');

/* THUMBNAIL SUPPORT
---------------------------------*/

add_theme_support( 'post-thumbnails' );


/*******************************
 WIDGETS AREAS
********************************/

function widgets_init() {

register_sidebar(array(
	'name' => 'Sidebar',
	'id' => 'sidebar',
    'before_widget' => '<div class="widget %2$s" id="%1$s">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
));
}

add_action( 'widgets_init', 'widgets_init' );

/*
 GETTING EXTERNAL FUNCTIONS FILES
------------------------------------*/
/*include ("inc/projects.php");
include ("inc/team.php");
include ("inc/homepage.php");
include ("inc/metaboxes/meta-box-setup.php");*/

/*
 REMOVE IMAGE DIMENSIONS HTML ATTRIBUTES FOR THUMBS
------------------------------------*/
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/* MENU
----------------------------------------*/

register_nav_menus(                      		// wp3+ menus
		array(
			'main_nav' => 'Top Menu',   // main nav in header
		)
	);

function main_nav($container_class) {
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    	'menu' => '', /* menu name */
    	'theme_location' => '', /* where in the theme it's assigned */
			'container' => 'nav',
			'container_class' => 'navigation'
    	)
    );
}

// Get page id by slug > content, title by id

function get_page_id($page_slug) {
    $page = get_page_by_path($page_slug);
    if(!empty($page)) {
        return $page->ID;
    }
}

function get_page_content($page_id) {
	$page_data = get_page($page_id);
	$content = apply_filters('the_content', $page_data->post_content);
	return $content;
}

function get_page_title($page_id) {
	$page_data = get_page($page_id);
	$title = apply_filters('title', $page_data->post_title);
	return $title;
}

/*COMMENT LAYOUT
---------------------------------------*/

function site5framework_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>">
			<header class="comment-author vcard">
				<?php echo get_avatar($comment,$size='40',$default='' ); ?>

				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?> |
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
				<?php edit_comment_link(__('(Edit)'),'  ','') ?>
			</header>

			<section class="comment_content">
				<?php comment_text() ?>

			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      <?php if ($comment->comment_approved == '0') : ?>
      <em style="display:block;">Your comment is awaiting moderation.</em>
      <?php endif; ?>

		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/* POPULAR POSTS SNIPPETS
------------------------------------*/

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/* PAGINATION
-----------------------------------

 * Retrieve or display pagination code.
 *
 * The defaults for overwriting are:
 * 'page' - Default is null (int). The current page. This function will
 *      automatically determine the value.
 * 'pages' - Default is null (int). The total number of pages. This function will
 *      automatically determine the value.
 * 'range' - Default is 3 (int). The number of page links to show before and after
 *      the current page.
 * 'gap' - Default is 3 (int). The minimum number of pages before a gap is
 *      replaced with ellipses (...).
 * 'anchor' - Default is 1 (int). The number of links to always show at begining
 *      and end of pagination
 * 'before' - Default is '<div class="emm-paginate">' (string). The html or text
 *      to add before the pagination links.
 * 'after' - Default is '</div>' (string). The html or text to add after the
 *      pagination links.
 * 'title' - Default is '__('Pages:')' (string). The text to display before the
 *      pagination links.
 * 'next_page' - Default is '__('&raquo;')' (string). The text to use for the
 *      next page link.
 * 'previous_page' - Default is '__('&laquo')' (string). The text to use for the
 *      previous page link.
 * 'echo' - Default is 1 (int). To return the code instead of echo'ing, set this
 *      to 0 (zero).
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param array|string $args Optional. Override default arguments.
 * @return string HTML content, if not displaying.
 */

function emm_paginate($args = null) {
	$defaults = array(
		'page' => null, 'pages' => null,
		'range' => 3, 'gap' => 3, 'anchor' => 1,
		'before' => '<div class="emm-paginate">', 'after' => '</div>',
		'title' => false,
		'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo;'),
		'echo' => 1
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	if (!$page && !$pages) {
		global $wp_query;

		$page = get_query_var('paged');
		$page = !empty($page) ? intval($page) : 1;

		$posts_per_page = intval(get_query_var('posts_per_page'));
		$pages = intval(ceil($wp_query->found_posts / $posts_per_page));
	}

	$output = "";
	if ($pages > 1) {
		$output .= "$before<span class='emm-title'>$title</span>";
		$ellipsis = "<span class='emm-gap'>...</span>";

		if ($page > 1 && !empty($previouspage)) {
			$output .= "<a href='" . get_pagenum_link($page - 1) . "' class='emm-prev'>$previouspage</a>";
		}

		$min_links = $range * 2 + 1;
		$block_min = min($page - $range, $pages - $min_links);
		$block_high = max($page + $range, $min_links);
		$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
		$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

		if ($left_gap && !$right_gap) {
			$output .= sprintf('%s%s%s',
				emm_paginate_loop(1, $anchor),
				$ellipsis,
				emm_paginate_loop($block_min, $pages, $page)
			);
		}
		else if ($left_gap && $right_gap) {
			$output .= sprintf('%s%s%s%s%s',
				emm_paginate_loop(1, $anchor),
				$ellipsis,
				emm_paginate_loop($block_min, $block_high, $page),
				$ellipsis,
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else if ($right_gap && !$left_gap) {
			$output .= sprintf('%s%s%s',
				emm_paginate_loop(1, $block_high, $page),
				$ellipsis,
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else {
			$output .= emm_paginate_loop(1, $pages, $page);
		}

		if ($page < $pages && !empty($nextpage)) {
			$output .= "<a href='" . get_pagenum_link($page + 1) . "' class='emm-next'>$nextpage</a>";
		}

		$output .= $after;
	}

	if ($echo) {
		echo $output;
	}

	return $output;
}

/**
 * Helper function for pagination which builds the page links.
 *
 * @access private
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param int $start The first link page.
 * @param int $max The last link page.
 * @return int $page Optional, default is 0. The current page.
 */
function emm_paginate_loop($start, $max, $page = 0) {
	$output = "";
	for ($i = $start; $i <= $max; $i++) {
		$output .= ($page === intval($i))
			? "<span class='emm-page emm-current'>$i</span>"
			: "<a href='" . get_pagenum_link($i) . "' class='emm-page'>$i</a>";
	}
	return $output;
}

function post_is_in_descendant_category( $cats, $_post = null )
{
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}

?>