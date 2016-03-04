<?php 

/*

Template Name: Homepage image top-align

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
			
			<div class="block-image image-top">
				<div class="image-clipper">
					<?php the_post_thumbnail(); ?>
				</div>
			</div>

		<?php endwhile;
	endif;
	?>

<?php get_footer(); ?>