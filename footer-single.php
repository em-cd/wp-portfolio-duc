		</main>
	</div>
	<footer class="footer">
		<div class="footer-wrapper">
			<div class="footer-border"></div>
			<div class="container">
				<p>*** some *** widgets *** go *** here *** ? ***</p>
			</div>
		</div>
	</footer>
	<div id="menu" class="menu">
		<div class="menu-wrapper">
			<header class="menu-header">
				<div class="container">
					<div class="inner">
						<a href="/" class="header-title"><h1><?php echo bloginfo('name'); ?></h1></a>
						<div class="header-menu-name">
							<?php
							if (is_singular('portfolio') ):
								$portfolios = get_pages(array(
									'meta_key' => '_wp_page_template',
									'meta_value' => 'page-portfolio.php'
								));
								foreach($portfolios as $portfolio){
									echo '<a href="'.get_permalink($portfolio).'"><h2>'.$portfolio->post_title.'</h2></a>';
								};
							else:
								echo '<a href="'.get_permalink( get_option( 'page_for_posts' ) ).'"><h2>'.get_the_title( get_option('page_for_posts')).'</h2></a>';
							endif;
							?>
						</div>
						<div class="header-border"></div>
					</div>
				</div>
			</header>
			<div class="menu-container">
				<nav class="menu-nav">
					<?php
						wp_nav_menu(array(
							'theme_location' => 'toggled-menu',
						    'container' => false,
						    'menu_class' => false,
						    'walker' => new Walker_Nav_Primary()
						    )
						);
					?>
				</nav>
			</div>
		</div>
	</div>

	<?php wp_footer(); ?>

	</body>
</html>