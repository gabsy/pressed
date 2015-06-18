<?php
/* Template Name:xzcxcArticles */
global $more;
$more = 0;
?>

<?php get_header(); ?>
       <!-- begin #main -->
        <div class="main clearfix">
				<div class="block">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<!--<h2 class="center page-title"><?php the_title();?><br>
							<span class="tagline"><?php echo get_post_meta( get_the_ID(), 'tagline', true ); ?></span>
						</h2>-->
         <h2 class="center page-title">Articles<br>
					<span class="tagline">Hosting insights and blablbla</span>
				</h2>

         <section class="grid3 clearfix categories content" role="main">
            <?php
            $categories = get_categories("taxonomy=articlecat&type=article&hide_empty=0");
            foreach($categories as $category) {
            ?>
                <div class="col">
                   <?php $category_image = get_tax_meta($category->term_id,'image_field_id');
                          if($category_image['url']!="") echo '<div style="width: 100%; overflow: hidden;"><img src="'.$category_image['url'].'" alt=""/></div>'; ?>
                    <br><strong style="text-transform:uppercase;"><?php echo $category->name;?></strong>
									<p><?php echo $category->description;?></p>
                   <strong><a href="<?php echo  home_url(); ?>/articlecat/<?php echo $category->slug;?>/"><?php echo $category->count;?> article<?php echo ($category->count==1) ? '' : 's'; ?> &raquo;</a></strong>

                </div>
            <?php
            }
            ?>
            </section>
                <?php endwhile; endif; ?>
            <aside class="sidebar">
                <!-- Sidebar Widgets Area -->
                <?php dynamic_sidebar( 'articles_sidebar' ); ?>
                <!-- END Sidebar Widgets Area -->
            </aside>
        </div>
    </div>
    <?php get_footer(); ?>