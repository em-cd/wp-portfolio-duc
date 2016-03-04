<?php 
if (is_front_page() ):
	get_header('home');
else:
	get_header();
endif;
?>

		<?php if( have_posts() ): ?>
			
			<header class="page-header">
				<?php 
					
					the_archive_title('<h1 class="page-title">', '</h1>');
					the_archive_description('<div class="taxonomy-description">', '</div>');
					
				?>
			</header>
			
			<?php while( have_posts() ): the_post(); ?>
				
				<?php get_template_part('content', 'archive'); ?>
			
			<?php endwhile; ?>
				
			<div>
				<?php the_posts_navigation(); ?>
			</div>
			
			<?php endif; ?>
			
<?php get_footer(); ?>