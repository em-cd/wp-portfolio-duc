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
							<h2><?php echo trim(wp_title('', false)) ?></h2>
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