<?php 

/*

Template Name: Portfolio Template

*/

if (is_front_page() ):
	get_header('home');
else:
	get_header();
endif;
?>
	
	<div class="container">
		<div id="masonry" class="masonry">
		<div class="gutter-sizer"></div>
		<?php

		$args = array('post_type' => 'portfolio', 'posts_per_page' => -1);
		$loop = new WP_Query( $args );

		if ( $loop -> have_posts() ): 
			while( $loop -> have_posts() ): $loop -> the_post(); ?>

				<article class="post">
					<a href="<?php the_permalink(); ?>">
						<div class="post-thumbnail">
							<?php the_post_thumbnail(); ?>
							<div class="post-info">
								<div class="post-info-inner">
									<h2><?php the_title(); ?></h2>
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
					</a>
				</article>

			<?php endwhile;
		endif;
		?>
		
		</div>
	</div>

<?php get_footer(); ?>