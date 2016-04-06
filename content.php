<article class="article">
	<a class="post-permalink" href="<?php the_permalink(); ?>">
		<time class="post-date"><?php the_time('j.n.Y'); ?></time>
		<h2><?php the_title(); ?></h2>
		<div class="thumbnail-img"><?php the_post_thumbnail('large'); ?></div>
		<?php the_excerpt(); ?> 
	</a>
</article>