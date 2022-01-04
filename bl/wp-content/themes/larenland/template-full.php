<?php
/*
*Template Name: Template Builder
*/
?>
<?php get_header(); ?>
		<!-- page-banner 
			================================================== -->
		<div class="section-content page-banner contact-page-banner">
			<div class="container">
				<h1><?php single_post_title(); ?></h1>
			</div>
		</div>
		<?php 
			while(have_posts()) : the_post(); 
				the_content(); 
			endwhile;
		?>
		
		<!-- End content -->
<?php get_footer(); ?>