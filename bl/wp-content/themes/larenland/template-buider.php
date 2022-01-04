<?php
/*
*Template Name: Template Home
*/
?>
<?php get_header(); ?>

		<?php 
			while(have_posts()) : the_post(); 
				the_content(); 
			endwhile;
		?>
		
		<!-- End content -->
<?php get_footer(); ?>