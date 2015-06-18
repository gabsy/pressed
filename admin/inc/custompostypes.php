<?php
// Articles Custom Post Type
$labels = array(
	'name' => _x('Articles', 'post type general name', 'site5framework'),
    'singular_name' => _x('Article', 'post type singular name', 'site5framework'),
    'add_new' => _x('Add New', 'work', 'site5framework'),
    'add_new_item' => __('Add New Article', 'site5framework'),
    'edit_item' => __('Edit Article', 'site5framework'),
    'new_item' => __('New Article', 'site5framework'),
    'view_item' => __('View Article', 'site5framework'),
    'search_items' => __('Search Article', 'site5framework'),
    'not_found' =>  __('No article found', 'site5framework'),
    'not_found_in_trash' => __('No article found in Trash', 'site5framework'),
    'parent_item_colon' => ''
  );
register_post_type('article', array(
     'labels' => $labels,
     'singular_label' => __('article'),
     'public' => true,
     'show_ui' => true, // UI in admin panel
     '_builtin' => false, // It's a custom post type, not built in!
     '_edit_link' => 'post.php?post=%d',
     'capability_type' => 'post',
     'hierarchical' => false,
     'rewrite' => array("slug" => "article"), // Permalinks format
     'supports' => array('title','editor','thumbnail'),
		 'taxonomies' => array('post_tag')
));

register_taxonomy("articlecat", array("article"), array("hierarchical" => true, "label" => "Article Category", "singular_label" => "Article Category", "rewrite" => true));

add_action('init', 'article_add_default_boxes');

    function article_add_default_boxes() {
        register_taxonomy_for_object_type('post_tag', 'article');
    }


// Styling for the custom post type icon
add_action( 'admin_head', 'wpt_article_icons' );

function wpt_article_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-article .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/portfolio-icon.png) no-repeat 6px 6px !important;
        }
		#menu-posts-article:hover .wp-menu-image, #menu-posts-article.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
		#icon-edit.icon32-posts-article {background: url(<?php echo get_template_directory_uri(); ?>/admin/images/portfolio-32x32.png) no-repeat;}
    </style>

<?php
}

?>