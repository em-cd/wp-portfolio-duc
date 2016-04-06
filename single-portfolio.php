<?php 
if (is_front_page() ):
	get_header('home');
else:
	get_header('single');
endif;
?>

	<?php
	if ( have_posts() ): 
		while( have_posts() ): the_post(); ?>

		<div class="container">
			<article class="portfolio">
				<h1><?php the_title(); ?></h1>
				<?php the_excerpt(); ?>
				<?php the_content(); ?>
			</article>
		</div>

		<?php endwhile;
	endif;
	?>

<?php get_footer('single'); ?>