<?php
/*
*Template Name: Portfolio 4 col ver2
*/
?>
<?php get_header(); ?>

		<!-- content 
			================================================== -->
		<div id="content">

			<!-- page-banner 
				================================================== -->
			<div class="section-content page-banner portfolio-page-banner">
				<div class="container">
					<h1>Portfolio</h1>
				</div>
			</div>

			<!-- portfolio-section 
				================================================== -->
			<div class="section-content portfolio-section">
				<div class="title-section white">
					<div class="container triggerAnimation animated" data-animate="bounceIn">
						<h1><?php single_post_title(); ?></h1>
						<p>Cras iaculis ultricies nulla.</p>
					</div>
				</div>
				<div class="portfolio-box portfolio-style2">
					<ul class="filter triggerAnimation animated" data-animate="bounceIn">
						<?php $portfolio_skills = get_terms('portfolio_category'); ?>
						<li><a href="#" class="active" data-filter="*">All</a></li>
						<?php foreach($portfolio_skills as $portfolio_skill) { ?>
						<li><a href="#" data-filter=".<?php echo $portfolio_skill->slug; ?>"><?php echo $portfolio_skill->name; ?></a></li>
						<?php } ?>
					</ul>
					<div class="masonry four-col triggerAnimation animated" data-animate="bounceIn">
						<?php
							if(is_front_page()) {
								$paged = (get_query_var('page')) ? get_query_var('page') : 1;
							} else {
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							}
							$args = array(
								'post_type' => 'portfolio',
								'paged' => $paged,
								'posts_per_page' => 12,
							);
							$portfolio = new WP_Query($args);
							if($portfolio->have_posts()) : while($portfolio->have_posts()) : $portfolio->the_post();
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
						<?php
							$image_url = bl_thumbnail_url('');
						?>
						<div class="project-post <?php echo $item_classes; ?>">
							<div class="project-gal">
								<img alt="<?php the_title(); ?>" src="<?php echo bfi_thumb($image_url, array('width'=>450, 'height'=>250)); ?>">
								<div class="hover-box">
									<div class="inner-hover">
										<a class="zoom" href="<?php echo $image_url; ?>"><i class="fa fa-search-plus"></i></a>
										<a class="link" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
										<h2><?php the_title(); ?></h2>
										<p><?php echo get_post_meta(get_the_ID(), '_cmb_sub_title', true); ?></p>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; endif; ?>
					 
					</div>
					<?php
						global $wp_query;
						if($portfolio->max_num_pages>0){
					?>
					<div class=" text-center">
						<?php bl_pagination($prev = '&laquo; Prev', $next = 'Next &raquo;', $pages=$portfolio->max_num_pages); ?>
					</div>  
					<?php } ?>
				</div>
			</div>
			<?php 
			
				while(have_posts()) : the_post(); 
					the_content();
				endwhile;
				
			?>

		</div>
		<!-- End content -->
<?php get_footer(); ?>