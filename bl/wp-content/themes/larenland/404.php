<?php get_header(); ?>
<?php global $theme_option; ?>
		<!-- content 
			================================================== -->
		<div id="content">

			<!-- page-banner 
				================================================== -->
			<div class="section-content page-banner error-page-banner">
				<div class="container">
					<h1><?php if($theme_option!=null and $theme_option['404_title']!=''){ echo $theme_option['404_title']; }else {?>Page not found <?php }?></h1>
				</div>
			</div>

			<!-- contact section 
				================================================== -->
			<div class="section-content error-section">
				<div class="error">
					<div class="container triggerAnimation animated" data-animate="tada">
						<span>404</span>
					</div>
				</div>
				<div class="error-content triggerAnimation animated" data-animate="bounceIn">
					<div class="container">
						<?php if($theme_option!=null and $theme_option['404_intro']!=''){ echo $theme_option['404_intro']; }else {?>
						<h1>The page you were looking for doesn't exist...</h1>
						<p>Vestibulum commodo felis quis tortor. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
						<?php } ?>
						<a href="<?php echo home_url(); ?>" class="button-third"><?php if($theme_option!=null and $theme_option['404_button']!=''){ echo $theme_option['404_button']; }else {?>Back to Home<?php } ?></a>						
					</div>
				</div>
			</div>

		</div>
		<!-- End content -->
<?php get_footer(); ?>