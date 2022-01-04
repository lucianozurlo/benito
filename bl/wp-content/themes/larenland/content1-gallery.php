<?php global $textdomain; ?>
<div class="blog-post triggerAnimation animated" data-animate="slideInUp">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php 
		$gallery = get_post_meta(get_the_ID(), '_cmb_p_gallery', true);
	?>
	<?php if(count($gallery)>0){ ?>
	<div class="flexslider">
		<ul class="slides">
			<?php foreach($gallery as $img) {?>
			<li>
				<img src="<?php echo bfi_thumb($img, array('width'=>640, 'height'=> 310)); ?>" alt="<?php the_title(); ?>" />
			</li>
			<?php } ?>
			
		</ul>
	</div>
	<?php } ?>
	<div class="post-content">
		<div class="post-date">
			<p><span><?php the_time('d'); ?></span><?php the_time('m'); ?></p>
		</div>
		<div class="content-data">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p><?php _e('By', $textdomain); ?>: <?php the_author_posts_link(); ?> | <?php comments_popup_link(__('0 Comment ', $textdomain), __('1 Comment', $textdomain), __(' % Comments', $textdomain)); ?> | <?php _e('View', $textdomain); ?>: <?php echo bl_getPostViews(get_the_ID()); ?></p>
		</div>
		<p><?php the_excerpt(); ?></p>
		<a class="button-third" href="<?php the_permalink(); ?>"><?php _e('Read More', $textdomain); ?></a>
	</div>
	</div>
</div>