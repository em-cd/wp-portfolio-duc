<?php 
if (is_front_page() ):
	get_header('home');
else:
	get_header();
endif;
?>
	
			<section class="error-404 not-found">
					
					<?php the_widget('WP_Widget_Recent_Posts'); ?>
					
					<?php the_widget('WP_Widget_Archives', 'dropdown=0', "after_title=</h2>$archive_content"); ?>
									
			</section>
			
<?php get_footer(); ?>