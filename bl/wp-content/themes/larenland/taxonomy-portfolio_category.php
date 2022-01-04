<?php get_header(); ?>
		<!-- content 
			================================================== -->
		<div id="content">

			<!-- portfolio-section 
				================================================== -->
			<div class="section-content portfolio-section">
				<div class="title-section white">
					<div class="container">
						<p style="color: #ffffff;">Categoría</p>
                        <h1><?php single_cat_title(''); ?></h1>
					</div>
				</div>
				<div class="portfolio-box">
					
                    <div class="masonry three-col" style="margin-left: 120px; margin-right: 120px;">
          
						<?php
							if(have_posts()) : while(have_posts()) : the_post();
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
							<div class="project-gal" style="margin: 10px 10px 0 10px;">
								<img alt="<?php the_title(); ?>" src="<?php echo bfi_thumb($image_url, array()); ?>">
								<div class="hover-box">
									<a class="zoom" href="<?php echo $image_url; ?>"><i class="fa fa-search-plus"></i></a>
								</div>
							</div>
							<div class="project-content" style="margin: 0 10px 10px 10px;">
								<h2><?php the_title(); ?></h2>
                                <p style="padding: 2px 20px 2px 20px !important;"><?php echo get_post_meta(get_the_ID(), '_cmb_sub_title', true); ?></p>
                                <p style="padding: 2px 20px 2px 20px !important;"><?php echo get_post_meta(get_the_ID(), '_cmb_client', true); ?></p>
                                <p style="padding: 2px 20px 2px 20px !important;"><?php echo get_post_meta(get_the_ID(), '_cmb_p_link', true); ?></p>
							</div>
						</div>
						
						<?php endwhile; endif; ?>
					</div>
					<?php
						global $wp_query;
						if($wp_query->max_num_pages>0){
					?>
					<div class=" text-center">
						<?php bl_pagination($prev = '&laquo; Prev', $next = 'Next &raquo;', $pages=$wp_query->max_num_pages); ?>
					</div>  
					<?php } ?>
				</div>
			</div>


		</div>
		<!-- End content -->
<?php get_footer();  ?>