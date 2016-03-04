<?php 

/*

Template Name: About Page

*/
 
if (is_front_page() ):
	get_header('home');
else:
	get_header();
endif;
?>

<?php
	if ( have_posts() ): 
		while( have_posts() ): the_post(); ?>
		
			<div class="container">
				<div class="about">
					<div class="about-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="about-text">
						<?php the_content(); ?>
					</div>
				</div>
			</div>	

		<?php endwhile;
	endif;
?>


<?php get_footer(); ?>