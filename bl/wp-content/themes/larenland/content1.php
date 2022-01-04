<?php global $textdomain; ?>
<div class="blog-post triggerAnimation animated" data-animate="slideInUp">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
	<?php if(has_post_thumbnail()){ ?>
		<?php
			$image_url = bl_thumbnail_url('');
		?>
		<img class="img-responsive" src="<?php echo bfi_thumb($image_url, array('width'=>640, 'height'=> 310)); ?>" alt="<?php the_title(); ?>" />
	<?php } ?>
	<div class="post-content">
		<div class="post-date">
			<p><span><?php the_time('d'); ?></span><?php the_time('m'); ?></p>
		</div>
		<div class="content-data">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p><?php _e('By', $textdomain); ?>: <?php the_author_posts_link(); ?> | <?php comments_popup_link(__('0 Comment ', $textdomain), __('1 Comment', $textdomain), __(' % Comments', $textdomain)); ?> | <?php _e('View', $textdomain); ?>: <?php echo bl_getPostViews(get_the_ID()); ?></p>
		</div>
		<?php the_excerpt(); ?>
		<a class="button-third" href="<?php the_permalink(); ?>"><?php _e('Read More', $textdomain); ?></a>
	</div>
	</div>
</div>