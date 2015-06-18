<?php get_header(); ?>

        <div class="main">
        <div class="block">
            <?php $the_query = new WP_Query( "pagename=articles" );
            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    $article_page_title = get_the_title( $the_query->post->ID );
                    $article_page_description = get_post_meta( $the_query->post->ID, 'tagline', true );
                }
            } else {
            }
            wp_reset_postdata(); ?>
					<h2 class="center page-title"><?php echo $article_page_title; ?><br>
						<span class="tagline"><?php echo $article_page_description; ?></span>
					</h2>

         <section class="content" role="main">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <!-- begin article -->
                <article <?php post_class(); ?>>
                        <div class="postmeta">
                            <div class="meta-text">
                                <span class="category"><?php post_taxonomy($post->ID);?></span>&nbsp;&nbsp;
                                <?php the_time('M j, Y') ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php comments_popup_link('0 comments', '1 comment', ' % comments'); ?>
                            </div>
                        </div>
                        <h1>
                            <?php the_title();?>
                        </h1>
                        <div class="separator"></div>
                        <div class="entry-content clearfix">
                            <p><?php the_post_thumbnail(); ?> </p>
                             <?php the_content();?>
                        </div>
                        <?php if(has_tag()){?>
                            <div class="posttags"><?php the_tags('<strong>Tags:</strong> ', ', ', ''); ?></div>
                        <?php }?>
                    </article>
            <!-- end article -->
             <?php comments_template(); ?>
            <?php endwhile;
            endif;
            ?>

            </section>
          <?php get_sidebar('articles');?>
        </div>
    </div>
<?php get_footer(); ?>