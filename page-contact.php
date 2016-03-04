<?php 

/*

Template Name: Contact

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

				<div class="contact">
					<?php the_content(); ?>
				</div>

		<?php endwhile;
	endif;
?>


<?php get_footer(); ?>