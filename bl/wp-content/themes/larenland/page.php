<?php get_header(); ?>
	<?php global $theme_option, $wp_query; ?>
		<!-- content 
			================================================== -->
		<div id="content">
			<?php if(get_post_meta($wp_query->get_queried_object_id(), '_cmb_page_heading', true)!="no"){ ?>
			<!-- page-banner 
				================================================== -->
			<div class="section-content page-banner blog-page-banner">
				<div class="container">
					<h1><?php single_post_title(); ?></h1>
				</div>
			</div>
			<?php } ?>
			<!-- blog-section 
				================================================== -->
			<div class="section-content blog-section with-sidebar">
				<div class="container">
          			<div class="blog-box">
          				<div class="row">
          					<?php
								if(get_post_meta($wp_query->get_queried_object_id(), '_cmb_page_fullwidth', true)=="yes"){
									$page_class="col-lg-12 col-md-12";
								}else{
									$page_class="col-lg-9 col-md-9";
								}
							?>
							<?php 
								if(get_post_meta($wp_query->get_queried_object_id(), '_cmb_page_fullwidth', true)!="yes" and get_post_meta($wp_query->get_queried_object_id(), '_cmb_sidebar_position', true)=="left"){
									$page_class .=' pull-right';
								}
							?>
							<div class="<?php echo $page_class; ?>">
								<?php while(have_posts()) : the_post(); ?>
								<?php bl_setPostViews(get_the_ID()); ?>
          						<div class="blog-post single-post">
									
									<div class="post-content">
										
										<?php the_content(); ?>
										<?php wp_link_pages(); ?>
										
									</div>
								</div>
							<?php endwhile; ?>
          					</div>
							<?php if(get_post_meta($wp_query->get_queried_object_id(), '_cmb_page_fullwidth', true)!="yes"){ ?>
          					<div class="col-md-3">
          						<?php get_sidebar(); ?>
          					</div>
							<?php } ?>
          				</div>
					 
					</div>
          		</div>
          		<a class="go-top" href="#"><i class="fa fa-arrow-circle-o-up"></i></a>
			</div>


		</div>
		<!-- End content -->
<?php get_footer(); ?>