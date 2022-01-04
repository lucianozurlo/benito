<?php get_header(); ?>
<?php global $textdomain, $theme_option; ?>
		<!-- content 
			================================================== -->
		<div id="content">

			<!-- page-banner 
				================================================== -->
			<div class="section-content page-banner blog-page-banner">
				<div class="container">
					<h1><?php if($theme_option!=null and $theme_option['blog_heading']!='' ){echo $theme_option['blog_heading']; }else{ ?>Our Blog <?php } ?></h1>
				</div>
			</div>
			<?php if($theme_option['blog_style']=='2'){ ?>
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
			<?php } ?>
			<?php  
			
				if($theme_option['blog_style']=='2'){
					$blog_style = 'second-style';
				}else{
					$blog_style = 'with-sidebar';
				}
			?>
			<!-- blog-section 
				================================================== -->
			<div class="section-content blog-section <?php echo $blog_style; ?>">
				<div class="container">
          			<div class="blog-box <?php if($theme_option['blog_style']=='2'){ ?> masonry triggerAnimation animated" data-animate="fadeInUp" <?php } ?>>
					<?php if($theme_option['blog_style']!='2'){ ?>
          				<div class="row">
					<?php } ?>
							<?php 
								
								if($theme_option['blog-layout']=='1'){
									$main_class = 'col-lg-12 col-md-12 col-sm-12';
								}else{
									$main_class = 'col-lg-9 col-md-9 col-sm-9';
								}
								if($theme_option['blog-layout']=='2'){
									$main_class .= ' pull-right';
								} 
							?>
							<?php if($theme_option['blog_style']!='2'){ ?>
          					<div class="<?php echo $main_class; ?>">
							<?php } ?>
								<?php
									if($theme_option!=null and $theme_option['blog_style']!=''){

										$bog_style = $theme_option['blog_style'];
									}else{

										$bog_style = '1';
									}
								?>
          						<?php 
									if(have_posts()) :
										while(have_posts()) : the_post(); 
								?>
								<?php get_template_part( 'content'.$bog_style, ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); ?>
								
								<?php endwhile; ?>
								<?php else: ?>
									<h1><?php _e('Nothing Found Here!',$textdomain); ?></h1>
								<?php endif; ?>
								<div class="clear"></div>
								
								<?php
									if($theme_option['blog_style']!='2'){ ?>
									<?php
										global $wp_query;
										if($wp_query->max_num_pages>0){
									?>
									<div class=" text-center">
										<?php bl_pagination($prev = '&laquo; Prev', $next = 'Next &raquo;', $pages=$wp_query->max_num_pages); ?>
									</div>  
									<?php } ?>
								<?php	}
								
								?>
							<?php if($theme_option['blog_style']!='2'){ ?>
          					</div>
							<?php } ?>
							<?php if($theme_option['blog-layout']!='1' and $theme_option['blog_style']!='2'){ ?>
          					<div class="col-md-3">
          						<?php get_sidebar(); ?>
          					</div>
							<?php } ?>
					<?php if($theme_option['blog_style']!='2'){ ?>
          				</div>
					 <?php } ?>
					</div>
					<?php
						if($theme_option['blog_style']=='2'){ ?>
							<?php
								global $wp_query;
								if($wp_query->max_num_pages>0){
							?>
							<div class=" text-center">
								<?php bl_pagination($prev = '&laquo; Prev', $next = 'Next &raquo;', $pages=$wp_query->max_num_pages); ?>
							</div>  
							<?php } ?>
					<?php	}
					
					?>
          		</div>
          		<a class="go-top" href="#"><i class="fa fa-arrow-circle-o-up"></i></a>
			</div>


		</div>
		<!-- End content -->
<?php get_footer(); ?>