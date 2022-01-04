<?php
/*
*Template Name: Blog Masonry
*/
?>
<?php get_header(); ?>
	<?php global $textdomain; ?>
		<!-- content 
			================================================== -->
		<div id="content">

			<!-- page-banner 
				================================================== -->
			<div class="section-content page-banner blog-page-banner">
				<div class="container">
					<h1><?php single_post_title(); ?></h1>
				</div>
			</div>

			<div class="categorize-blog">
				<div class="title-section">
					<div class="container">
						<h1>Latest Post</h1>
						<ul class="filter triggerAnimation animated" data-animate="bounceIn">
							<li><a href="#" data-filter="*" class="active">All</a></li>
							<?php $categories = get_categories(); ?>
							<?php if($categories){ 
								foreach($categories as $category) {
							?>
							<li><a href="#" data-filter=".<?php echo $category->slug?>"><?php echo $category->name; ?></a></li>
							<?php 
									}
								}
							
							?>
							
						</ul>
					</div>
				</div>				
			</div>

			<!-- blog-section 
				================================================== -->
			<div class="section-content blog-section second-style">
				<div class="container">
          			<div class="blog-box masonry triggerAnimation animated" data-animate="fadeInUp">
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
								<?php get_template_part( 'content2', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); ?>
							<?php $post_i++; endwhile; ?>
						<?php else: ?>
							<h1><?php _e('Nothing Found Here!',$textdomain); ?></h1>
						<?php endif; ?>
						
					 
					</div>

					<?php
						global $wp_query;
						if($query->max_num_pages>0){
					?>
					<div class=" text-center">
						<?php bl_pagination($prev = '&laquo; Prev', $next = 'Next &raquo;', $pages=$query->max_num_pages); ?>
					</div>  
					<?php } ?>
          		</div>
          		<a class="go-top" href="#"><i class="fa fa-arrow-circle-o-up"></i></a>
			</div>


		</div>
		<!-- End content -->
<?php get_footer(); ?>