<?php get_header(); ?>
<?php global $wp_query, $theme_option, $textdomain; ?>
		<!-- content 
			================================================== -->
		<div id="content">

			<!-- page-banner 
				================================================== -->
			<div class="section-content page-banner portfolio-page-banner">
				<div class="container">
					<h1><?php if($theme_option!=null and $theme_option['single_portfolio_heading']!='' ){echo $theme_option['single_portfolio_heading']; }else{ ?>Single Portfolio<?php } ?></h1>
				</div>
			</div>

			<!-- single project -section 
				================================================== -->
			<div class="single-project">
				<?php while(have_posts()) : the_post(); ?>
				<div class="title-section white">
					<div class="container triggerAnimation animated" data-animate="bounceIn">
						<h1><?php the_title(); ?></h1>
						<p><?php echo get_post_meta(get_the_ID(), '_cmb_sub_title', true); ?></p>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<div class="project-block triggerAnimation animated" data-animate="slideInLeft">
								<?php 
									$gallery = get_post_meta(get_the_ID(), '_cmb_p_slider', true);
								?>
								<?php if(count($gallery)>0){ ?>
								<div class="flexslider">
									<ul class="slides">
										<?php foreach($gallery as $img) {?>
										<li>
											<img alt="<?php the_title(); ?>" src="<?php echo bfi_thumb($img, array('width'=>450, 'height'=>250)); ?>" />
										</li>
										<?php } ?>
										
									</ul>
								</div>
								<?php } ?>
								<div class="single-project-content">
									<h1>Project description</h1>
									<h3>AALorem ipsum dolor sit amet, consectetuer adipiscing elit. </h3>
									<?php the_content();?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="project-sidebar triggerAnimation animated" data-animate="slideInRight">
								<?php 
									$photos = get_post_meta(get_the_ID(), '_cmb_p_photos', true);
								?>
								<?php if(count($photos)>0){ ?>
								<ul class="project-photos">
									<?php foreach($photos as $photo){ ?>
									<li>
										<img alt="<?php the_title();?>" src="<?php echo $photo; ?>">
										<a class="hover" href="#"></a>
									</li>
									<?php } ?>
									
								</ul>
								<?php } ?>
								<h1>Project details</h1>
								<h3>Quisque volutpat mattis eros. </h3>
								<p><?php _e('Categories', $textdomain); ?>: <?php $skill = get_the_term_list( get_the_ID(), 'portfolio_category', '', ' , ', '' ); ?> <?php echo $skill; ?></p>
								<p><?php _e('Client', $textdomain); ?>:  <span><?php echo get_post_meta(get_the_ID(), '_cmb_client', true); ?></span></p>
								<p><?php _e('Link', $textdomain); ?>: <a href="<?php echo get_post_meta(get_the_ID(), '_cmb_p_link', true); ?>"><?php echo get_post_meta(get_the_ID(), '_cmb_p_link', true); ?></a></p>
								<a href="<?php echo get_post_meta(get_the_ID(), '_cmb_p_link', true); ?>" target="_blank" class="button-third"><?php _e('View Project', $textdomain); ?></a>
							</div>
						</div>
					</div>					
				</div>
				<?php endwhile; ?>
			</div>

			<!-- portfolio-section 
				================================================== -->
			<div class="section-content portfolio-section">
				<div class="title-section">
					<div class="container triggerAnimation animated" data-animate="bounceIn">
						<h1>Related projects</h1>
						<p>Vivamus molestie gravida turpis</p>
					</div>
				</div>
				<div class="portfolio-box triggerAnimation animated" data-animate="bounceIn">
					<div id="owl-demo" class="owl-carousel owl-theme">
						<?php
								$item_cats = get_the_terms( $wp_query->get_queried_object_id(), 'portfolio_category');
								$portfolio_cats = array();
								foreach((array)$item_cats as $item_cat){
									$portfolio_cats[] = $item_cat->slug;
								}
								//print_r($portfolio_cats);
								$id = $wp_query->get_queried_object_id();
								$query = new WP_Query(array('post__not_in' => array( $id ),'post_type'=>'portfolio','posts_per_page'=>7,'tax_query' => array(array('taxonomy' => 'portfolio_category',
						'field' => 'slug','terms' => $portfolio_cats))));
							?>
							<?php while($query->have_posts()) : $query->the_post();?>
							<?php
								$image_url = bl_thumbnail_url('');
							?>
							<div class="item project-post">
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
						<a class="button-third" href="<?php echo get_post_type_archive_link('portfolio'); ?>">See All work</a>
						<a class="owl-next button-third" href="#"><i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			</div>

		</div>
		<!-- End content -->
<?php get_footer(); ?>