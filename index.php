<?php 
if (is_front_page() ):
	get_header('home');
else:
	get_header();
endif;
?>

	<div id="primary" class="container">

		<?php
		if ( have_posts() ): 
			while( have_posts() ): the_post(); ?>
				<?php get_template_part('content'); ?>
			<?php endwhile;
		endif;
		?>

	</div>

<?php get_footer(); ?>