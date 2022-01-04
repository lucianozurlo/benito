<?php get_header(); ?>
	<?php global $textdomain, $theme_option; ?>
		<!-- content 
			================================================== -->
		<div id="content">

			<!-- page-banner 
				================================================== -->
			<div class="section-content page-banner blog-page-banner">
				<div class="container">
					<h1><?php if($theme_option!=null and $theme_option['single_heading']!='' ){echo $theme_option['single_heading']; }else{ ?>Our Blog <?php } ?></h1>
				</div>
			</div>

			<!-- blog-section 
				================================================== -->
			<div class="section-content blog-section with-sidebar">
				<div class="container">
          			<div class="blog-box">
          				<div class="row">
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
          					<div class="<?php echo $main_class; ?>">
								<?php while(have_posts()) : the_post(); ?>
								<?php bl_setPostViews(get_the_ID()); ?>
          						<div class="blog-post single-post">
									<?php if(get_post_format()=='gallery'){ ?>
										<?php 
											$gallery = get_post_meta(get_the_ID(), '_cmb_p_gallery', true);
										?>
										<?php if(count($gallery)>0){ ?>
										<div class="flexslider">
											<ul class="slides">
												<?php foreach($gallery as $img) {?>
												<li>
													<img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" />
												</li>
												<?php } ?>
												
											</ul>
										</div>
										<?php } ?>
									<?php }elseif(get_post_format()=='video'){ ?>
										<?php echo wp_oembed_get(get_post_meta(get_the_ID(), '_cmb_intro_video', true)); ?>
									<?php }elseif(has_post_thumbnail()){ ?>
									<?php the_post_thumbnail(); ?>
									<?php } ?>
									<div class="post-content">
										<div class="post-date">
											<p><span><?php the_time('d');?></span><?php the_time('m'); ?></p>
										</div>
										<div class="content-data">
											<h2><a href="single-post.html"><?php the_title(); ?></a></h2>
											<p><?php _e('By', $textdomain); ?>: <?php the_author_posts_link(); ?> | <?php comments_popup_link(__('0 Comment', $textdomain), __('1 Comments', $textdomain), __('% Comments', $textdomain)); ?> | <?php _e('View', $textdomain); ?>: <?php echo bl_getPostViews(get_the_ID()); ?>
											</p>
										</div>
										<?php the_content(); ?>
										<?php wp_link_pages(); ?>
										
										<div class="share-tag-box">
											
											<div class="post-tags">
												<b>Tags: </b>
												<?php the_tags( '', ', ', '' ); ?>
											</div>
											<span>Share this post:</span>
											<ul class="social-box">
												<li><a class="facebook" onclick="window.open('https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a></li>
												<li><a class="twitter" onclick="window.open('https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>"><i class="fa fa-twitter"></i></a></li>
												<li><a class="dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
												<li><a class="google" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','Google plus','width=585,height=666,left='+(screen.availWidth/2-292)+',top='+(screen.availHeight/2-333)+''); return false;" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a></li>
												<li><a class="linkedin" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>','Linkedin','width=863,height=500,left='+(screen.availWidth/2-431)+',top='+(screen.availHeight/2-250)+''); return false;" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a></li>
												<li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
											</ul>
										</div>
										<div class="pagination-boxer">
											<div class="prev-post">
												<?php

													$prev_post = get_adjacent_post(false, '', true);

												?>
												<a href="<?php echo get_permalink($prev_post->ID); ?>" class="button-third"><i class="fa fa-angle-left"></i> Prev</a>
												<p><?php echo $prev_post->post_title; ?></p>
											</div>
											<div class="next-post">
												<?php $next_post = get_adjacent_post(false, '', false); ?>
												<a href="<?php echo get_permalink($next_post->ID); ?>" class="button-third">Next <i class="fa fa-angle-right"></i></a>
												<p><?php echo $next_post->post_title; ?></p>
											</div>
										</div>
										<?php comments_template(); ?>
									</div>
								</div>
							<?php endwhile; ?>
          					</div>
							<?php if($theme_option['blog-layout']!='1'){ ?>
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