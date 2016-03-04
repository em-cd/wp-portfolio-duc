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
					<div class="post-thumbnail-holder">
						<div class="post-thumbnail" style="background-image: url('<?php the_post_thumbnail_url('small'); ?>')"></div>
						<div class="post-thumbnail-mask">
							<a href="<?php the_permalink(); ?>">
								<div class="inner">
									<h2><?php the_title(); ?></h2>
								</div>
							</a>
						</div>
					</div>
				</article>

			<?php endwhile;
		endif;
		?>
		</div>
	</div>

<?php get_footer(); ?>