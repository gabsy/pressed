<?php get_header(); ?>

        <div class="main">
        <div class="block">
					<h2 class="center page-title">Blog<br>
						<span class="tagline">Bits of Pressed everyday life.</span>
					</h2>

         <section class="content" role="main">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <!-- begin article -->
                <article <?php post_class(); ?>>
                        <div class="postmeta">
                            <!--<img src="<?php echo get_stylesheet_directory_uri();?>/img/ico_pen.svg" class="ico-article">-->
                            <div class="meta-text">
                                <!--<span class="category"><?php echo get_the_category();?></span>&nbsp;&nbsp;-->
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
            <?php get_sidebar('blog'); ?>
        </div>
    </div>
<?php get_footer(); ?>