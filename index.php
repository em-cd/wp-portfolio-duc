<?php 
if (is_front_page() ):
	get_header('home');
elseif (is_home() ):
	get_header('blog');
else:
	get_header();
endif;
?>

	<div class="container">

		<?php
		if ( have_posts() ): 
			while( have_posts() ): the_post(); ?>

		<article class="article">
			<?php get_template_part('content', get_post_format()); ?>
		</article>

		<?php endwhile;
		endif;
		?>

	</div>

<?php get_footer(); ?>