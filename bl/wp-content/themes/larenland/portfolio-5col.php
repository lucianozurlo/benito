<?php get_header(); ?>

		<!-- content 
			================================================== -->
		<div id="content">

			<!-- portfolio-section 
				================================================== -->
			<div class="section-content portfolio-section">
				<div class="portfolio-box portfolio-style2">
					<ul class="filter">
						<?php $portfolio_skills = get_terms('portfolio_category'); ?>
						<li><a href="#" class="active" data-filter="*">Todo</a></li>
						<?php foreach($portfolio_skills as $portfolio_skill) { ?>
						<li><a href="#" data-filter=".<?php echo $portfolio_skill->slug; ?>"><?php echo $portfolio_skill->name; ?></a></li>
						<?php } ?>
					</ul>
					<div class="masonry five-col" style="margin-left: 120px; margin-right: 120px;">
						<?php
							if(is_front_page()) {
								$paged = (get_query_var('page')) ? get_query_var('page') : 1;
							} else {
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							}
							$args = array(
								'post_type' => 'portfolio',
								'paged' => $paged,
								'posts_per_page' => 400,
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
							<div class="project-gal" style="margin: 10px;">
								<img alt="<?php the_title(); ?>" src="<?php echo bfi_thumb($image_url, array()); ?>">
								<div class="hover-box">
									<div class="inner-hover">
										<a class="zoom" href="<?php echo $image_url; ?>"><i class="fa fa-search-plus"></i></a>
										<h2 style="padding: 2px 20px 2px 20px !important; line-height: 20px;"><?php the_title(); ?></h2>
										<p style="padding: 2px 20px 2px 20px !important;"><?php echo get_post_meta(get_the_ID(), '_cmb_sub_title', true); ?></p>
										<p style="padding: 2px 20px 2px 20px !important;"><?php echo get_post_meta(get_the_ID(), '_cmb_client', true); ?></p>
										<p style="padding: 2px 20px 2px 20px !important;"><?php echo get_post_meta(get_the_ID(), '_cmb_p_link', true); ?></p>
                                        <p style="padding: 2px 20px 2px 20px !important;"><?php _e('Categoría', $textdomain); ?>: <?php $skill = get_the_term_list( get_the_ID(), 'portfolio_category', '', ' , ', '' ); ?> <?php echo $skill; ?></p>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; endif; ?>
					 
					</div>
				</div>
			</div>
		</div>
		<!-- End content -->
<?php get_footer(); ?>