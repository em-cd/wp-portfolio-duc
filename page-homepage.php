<?php 

/*

Template Name: Homepage

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
			
				<div id="image-clipper">
					<?php the_post_thumbnail(); ?>
				</div>

		<?php endwhile;
	endif;
	?>

<?php get_footer(); ?>