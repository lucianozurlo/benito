<?php
/** A simple text block **/
class Portfolio_Block extends AQ_Block {
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => '<i class="fa fa-medkit"></i> Recent Works',
			'size' => 'col-md-12',
			'offset' => '',
			'effect' => 'None',
		);
		
		//create the block
		parent::__construct('Portfolio_Block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text' => '',
			'per_page' => 8,
			'row' => 1,
			'style' => ''
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
		
		
		
		<?php
	}
	
	function block($instance) {
		extract($instance);

		$wp_autop = ( isset($wp_autop) ) ? $wp_autop : 0;
		global $textdomain; 
		
		?>
		
		<div class="portfolio-box triggerAnimation animated" data-animate="pulse">
			<div id="owl-demo" class="owl-carousel owl-theme">
				<?php
					
					$args = array(
						'post_type' => 'portfolio',
						'posts_per_page' => $per_page,
					);
					
					$portfolio = new WP_Query($args);
					while($portfolio->have_posts()) : $portfolio->the_post();
					$item_classes = '';
						$item_skill = '';
						$item_cats = get_the_terms(get_the_ID(), 'portfolio_category');
						foreach((array)$item_cats as $item_cat){
							if(count($item_cat)>0){
								$item_classes .= $item_cat->slug . ' ';
								$item_skill .= $item_cat->name . ' ';
							}
						}
				?>
				<div class="item project-post">
					<?php
							$image_url = bl_thumbnail_url('');
						?>
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
				<?php endwhile; ?>
			 
			</div>
			<div class="buttons">
				<a class="owl-prev button-third" href="#"><i class="fa fa-angle-left"></i></a>
				<a class="button-third" href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>"><?php _e('See All work', $textdomain); ?></a>
				<a class="owl-next button-third" href="#"><i class="fa fa-angle-right"></i></a>
			</div>
		</div>

	<?php
	}
}
?>