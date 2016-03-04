		</main>
	</div>
	<footer class="footer">
		<div class="footer-wrapper">
			<div class="footer-border"></div>
			<div class="container">
				<p>*** some *** widgets *** go *** here ***</p>
			</div>
		</div>
	</footer>
	<div id="menu" class="menu">
		<div class="menu-wrapper">
			<header class="menu-header">
				<div class="container">
					<div class="inner">
						<a href="/" class="header-title"><h1>DUC SIEGENTHALER</h1></a>
						<div class="header-menu-name">
							<a href="<?php the_permalink?>"><h2><?php $pages = get_pages(array(
	'meta_key' => '_wp_page_template',
	'meta_value' => 'page-portfolio.php'
));
foreach($pages as $page){
	echo $page->post_title;
}; ?></h2></a>
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