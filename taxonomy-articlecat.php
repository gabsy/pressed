<?php get_header();
?>

 <!-- begin #main -->
        <div class="main clearfix">
				<div class="block">
						<!--<h2 class="center page-title"><?php echo get_queried_object()->name; ?><br>
							<span class="tagline"><?php echo get_queried_object()->description; ?></span>
						</h2>-->
         <h2 class="center page-title">Articles<br>
					<span class="tagline">Hosting insights and blablbla</span>
				</h2>

         <section class="content" role="main">

            <?php
				$args = array(
                    'post_type' => 'article',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'articlecat',
                            'field'    => 'slug',
                            'terms'    => get_queried_object()->name,
                        ),
                    ),
                );
                $query = new WP_Query( $args );
				if ($query->have_posts()) {
					while ($query->have_posts()) : $query->the_post(); ?>

            <!-- begin article -->
                <article <?php post_class(); ?>>
                        <div class="postmeta">

                            <div class="meta-text">
                                <span class="category"><?php post_taxonomy($post->ID);?></span>&nbsp;&nbsp;
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
					 <?php } else{ ?>
                <h3>No results</h3>
                <p>Sorry, we couldn't find anything based on your search terms.</p>
					 <?php } ?>
            <?php wp_reset_query(); ?>
            </section>
           <?php get_sidebar('articles');?>
        </div>
    </div>
<?php get_footer(); ?>