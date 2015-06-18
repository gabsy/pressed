<?php
/* Template Name: About */
get_header(); ?>

<div class="main">
<div class="block">
		<!--<h2 class="center page-title"><?php the_title();?><br>
			<span class="tagline"><?php echo get_post_meta($post->ID, 'tagline', true); ?></span>
		</h2>-->
		<h2 class="center page-title">About Pressed<br>
			<span class="tagline">What is Pressed and what can it do for you?</span>
		</h2>
		<?php submenu_about('menu-about');?>
		<div class="content-full-width">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content();?>
		 <?php endwhile;
			endif;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>