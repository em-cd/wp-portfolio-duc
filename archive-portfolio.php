<?php 
if (is_front_page() ):
	get_header('home');
else:
	get_header();
endif;
?>

		<?php if( have_posts() ): ?>


			<div id="masonry" class="posts masonry">

				<div class="page-header">
					<?php 
						
						the_archive_title('<h1 class="page-title">', '</h1>');

					?>
				</div>
				
				<article class="post">

					<?php while( have_posts() ): the_post(); ?>
						
						<?php get_template_part('content', 'archive'); ?>
					
					<?php endwhile; ?>

				</article>

			</div>
			
			<?php endif; ?>
			
<?php get_footer(); ?>