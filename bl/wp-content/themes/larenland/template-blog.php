<?php
/*
*Template Name: Blog
*/
?>
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
							<div class="blog-list <?php echo $page_class; ?>">

          						<?php 
									if(is_front_page()) {
										$paged = (get_query_var('page')) ? get_query_var('page') : 1;
									} else {
										$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									}
									$args = array(
										'post_type' => 'post',
										'paged' => $paged,
									);
									$query = new WP_Query($args);
								?>
								 <?php if($query->have_posts()) : ?>
									<?php $post_i=1; ?>
									<?php while($query->have_posts()) : $query->the_post(); ?>
										<?php get_template_part( 'content1', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); ?>
									<?php $post_i++; endwhile; ?>
								<?php else: ?>
									<h1><?php _e('Nothing Found Here!',$textdomain); ?></h1>
								<?php endif; ?>
								
								<?php
									global $wp_query;
									if($query->max_num_pages>0){
								?>
								<div class=" text-center">
									<?php bl_pagination($prev = '&laquo; Prev', $next = 'Next &raquo;', $pages=$query->max_num_pages); ?>
								</div>  
								<?php } ?>
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