<aside class="sidebar">

	<div class="widget category-list">
		<h3>Categories</h3>
		<ul>
			<?php $categories=get_categories( "taxonomy=articlecat&type=article&hide_empty=0");
			foreach($categories as $category) { ?>
			<li>
				<?php $category_image=get_tax_meta($category->term_id,'image_field_id'); if($category_image['url']!="") echo '<img src="'.$category_image['url'].'" alt="" style="width:24px;">'; ?> &nbsp;
				<a href="<?php echo  home_url(); ?>/articlecat/<?php echo $category->slug;?>/">
					<?php echo $category->name;?> ( <?php echo $category->count;?> )</a>
			</li>
			<?php } ?>
		</ul>
	</div>
	<!-- Sidebar Widgets Area -->
	<?php dynamic_sidebar( 'articles_sidebar' ); ?>
	<!-- END Sidebar Widgets Area -->
</aside>