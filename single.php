<?php 
if (is_front_page() ):
	get_header('home');
else:
	get_header('single');
endif;
?>
	
	<div class="container">

		<?php
		if ( have_posts() ): 
			while( have_posts() ): the_post(); ?>
				<article class="article">	
					<time class="post-date"><?php the_time('j.n.Y'); ?></time>
					<h2><?php the_title(); ?></h2>
					<div class="thumbnail-img"><?php the_post_thumbnail('large'); ?></div>
					<div class="article-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile;
		endif;
		?>
		
	</div>

<?php get_footer('single'); ?>