<div class="project-post <?php echo $item_classes; ?>">
	<div class="project-gal">
		<img alt="<?php the_title(); ?>" src="<?php echo bfi_thumb($image_url, array('width'=>450, 'height'=>250)); ?>">
		<div class="hover-box">
			<a class="zoom" href="<?php echo $image_url; ?>"><i class="fa fa-search-plus"></i></a>
			<a class="link" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
		</div>
	</div>
	<div class="project-content">
		<h2><?php the_title(); ?></h2>
		<p><?php echo get_post_meta(get_the_ID(), '_cmb_sub_title', true); ?></p>
	</div>
</div>