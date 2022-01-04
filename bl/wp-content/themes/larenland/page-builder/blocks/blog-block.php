<?php
/** A simple text block **/
class Blog_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => '<i class="fa fa-copy"></i> Blogs',
			'size' => 'col-md-12',
			'offset' => '',
			'effect' => 'None',
		);
		
		//create the block
		parent::__construct('Blog_Block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text' => '',
			'per_page' => 8,
			'id' => '',
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		$options = array(
			'fadeInLeft' => 'fadeInLeft',
        	'fadeInRight' => 'fadeInRight',
        	'fadeInUp' => 'fadeInUp',
        	'None' => 'None',
        );
		?>
		<p class="description ">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		<p class="description ">
			<label for="<?php echo $this->get_field_id('per_page') ?>">
				Number Order
				<?php echo aq_field_input('per_page', $block_id, $per_page, $size = 'full') ?>
			</label>
		</p>
		<p class="description ">
			<label for="<?php echo $this->get_field_id('id') ?>">
				Page ID list all page
				<?php echo aq_field_input('id', $block_id, $id, $size = 'full') ?>
			</label>
		</p>
		
		
		<?php
	}
	
	function block($instance) {
		extract($instance);

		$wp_autop = ( isset($wp_autop) ) ? $wp_autop : 0;
		
		?>
			
			
			<div id="owl-demo2" class="owl-carousel owl-theme">
			<?php
				global $textdomain, $theme_option;
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => $per_page,
				);
				$i = 0;
				$portfolio = new WP_Query($args);
				while($portfolio->have_posts()) : $portfolio->the_post();
				$i++;
				if($i%2==1){

					$class= "first";
				}else{
					$class = '';
				}
			?>
			
			<div class="item blog-post">
				
				<?php if(get_post_format()=='gallery'){ ?>
					<?php 
						$gallery = get_post_meta(get_the_ID(), '_cmb_p_gallery', true);
					?>
					<?php if(count($gallery)>0){ ?>
					<div class="flexslider">
						<ul class="slides">
							<?php foreach($gallery as $img) {?>
							<li>
								<img width="350" height="200" src="<?php echo bfi_thumb($img, array('width'=>350, 'height'=> 200)); ?>" alt="<?php the_title(); ?>" />
							</li>
							<?php } ?>
							
						</ul>
					</div>
					<?php } ?>
				<?php }elseif(get_post_format()=='video'){ ?>
					<div class="video-contaiter">
					<?php echo wp_oembed_get(get_post_meta(get_the_ID(), '_cmb_intro_video', true)); ?>
					</div>
				<?php }elseif(has_post_thumbnail()){ ?>
				<?php
					$image_url = bl_thumbnail_url('');
				?>
				<img class="img-responsive" width="350" height="200" src="<?php echo bfi_thumb($image_url, array('width'=>350, 'height'=> 200)); ?>" alt="<?php the_title(); ?>" />
				<?php } ?>
				
				<div class="post-content">
					<div class="post-date">
						<p><span><?php the_time('d'); ?></span><?php the_time('m'); ?></p>
					</div>
					<div class="content-data">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php _e('By', $textdomain); ?>: <?php the_author_posts_link(); ?> | <?php comments_popup_link(__('0 Comment ', $textdomain), __('1 Comment', $textdomain), __(' % Comments', $textdomain)); ?> | <?php _e('View', $textdomain); ?>: <?php echo bl_getPostViews(get_the_ID()); ?></p>
					</div>
				</div>
			</div>
			
			<?php endwhile; ?>
		 
		</div>
		<div class="buttons">
			<a class="owl-prev button-third" href="#"><i class="fa fa-angle-left"></i></a>
			<a class="button-third" href="<?php  echo get_permalink( $id ); ?>"><?php _e('See All Posts', $textdomain);?></a>
			<a class="owl-next button-third" href="#"><i class="fa fa-angle-right"></i></a>
		</div>
		
	<?php
	}
	
}
?>