<?php
	global $textdomain; 
	$categories = get_the_category();
	$p_class = '';
	foreach($categories as $category) {
		$p_class .= $category->slug;
	}
?>
<div class="blog-post <?php echo $p_class; ?>">
	<div class="post-date">
		<p><span><?php the_time('d'); ?></span><?php the_time('m'); ?></p>
	</div>
	<div class="post-gal">
		<?php 
		$gallery = get_post_meta(get_the_ID(), '_cmb_p_gallery', true);
		?>
		<?php if(count($gallery)>0){ ?>
		<div class="flexslider">
			<ul class="slides">
				<?php foreach($gallery as $img) {?>
				<li>
					<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" />
				</li>
				<?php } ?>
				
			</ul>
		</div>
		<?php } ?>
	</div>							
	<div class="post-content">
		<div class="content-data">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p><?php _e('By', $textdomain); ?>: <?php the_author_posts_link(); ?> | <?php comments_popup_link(__('0 Comment ', $textdomain), __('1 Comment', $textdomain), __(' % Comments', $textdomain)); ?> | <?php _e('View', $textdomain); ?>: <?php echo bl_getPostViews(get_the_ID()); ?></p>
		</div>
		<p><?php echo marbale_excerpt($limit = 30); ?></p>
	</div>
</div>