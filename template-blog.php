<?php
/* Template Name: Blog */
global $more;
$more = 0;
?>

<?php get_header(); ?>
       <!-- begin #main -->
        <div class="main clearfix">
				<div class="block">
						<h2 class="center page-title">Blog<br>
							<span class="tagline">Bits of Pressed everyday life.</span>
						</h2>

         <section class="content" role="main">

                <?php if (is_category()) { ?>
                    <div id="archive-title">
                            Browsing posts in: <span><?php single_cat_title(); ?></span>
                    </div>
                    <?php } elseif (is_tag()) { ?>
                    <div id="archive-title">
                            Posts tagged with: <span><?php single_cat_title(); ?></span>
                    </div>
                    <?php } elseif (is_month()) { ?>
                    <div id="archive-title">
                            Monthly Archives: <span><?php the_time('F Y'); ?></span>
                    </div>
                    <?php } elseif (is_year()) { ?>
                    <div id="archive-title">
                           Yearly Archives: <span><?php the_time('Y'); ?></span>
                    </div>
                    <?php } elseif (is_Search()) { ?>
                    <div id="archive-title">
                            Search Results for: <span><?php echo esc_attr(get_search_query()); ?></span>
                    </div>
                    <?php } ?>

            <?php
				query_posts('');
				if (have_posts()) : while (have_posts()) : the_post(); ?>

            <!-- begin article -->
                <article <?php post_class(); ?>>
                        <div class="postmeta">
                            <!--<img src="<?php echo get_stylesheet_directory_uri();?>/img/ico_pen.svg" class="ico-article">-->
                            <div class="meta-text">
                               <!--<span class="category"><?php echo the_category($post->ID);?></span>&nbsp;&nbsp;-->
                                <?php the_time('M j, Y') ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php comments_popup_link('0 comments', '1 comment', ' % comments'); ?>
                            </div>
                        </div>
                        <h1>
                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                        </h1>
                        <div class="separator"></div>
                        <div class="entry-content clearfix">
                            <p><?php the_post_thumbnail(); ?> </p>
                            <?php if(is_search()){
                                the_excerpt();
                            }else{
                             the_content("Read more");
                            }?>
                        </div>
                    </article>
            <!-- end article -->
            <?php endwhile; ?>

            <!-- begin #pagination -->
                <?php if (function_exists("emm_paginate")) {
                        emm_paginate();
                     } else { ?>
                <div class="navigation">
                    <div class="alignleft"><?php next_posts_link(__('Older','site5framework')) ?></div>
                    <div class="alignright"><?php previous_posts_link(__('Newer','site5framework')) ?></div>
                </div>
            <?php } ?>
            <!-- end #pagination -->
            <?php elseif(is_search()):?>
                <h2>No results</h2>
                <p>Sorry, we couldn't find anything based on your search terms.</p>
            <?php endif;?>

            <?php wp_reset_query(); ?>

            </section>
            <?php get_sidebar('blog'); ?>
        </div>
    </div>
    <?php get_footer(); ?>