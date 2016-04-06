<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<header id="header" class="header">
		<div class="container">
			<div class="inner">
				<a href="/" class="header-title"><h1><?php echo bloginfo('name'); ?></h1></a>
				<nav class="header-nav">
					<?php
						wp_nav_menu(array(
							'theme_location' => 'header-menu',
						    'container' => false,
						    'menu_class' => false,
						    'walker' => new Walker_Nav_Primary()
						    )
						);
					?>
				</nav>
				<div class="header-border"></div>
			</div>
		</div>
	</header>
	<a id="menu-toggle" class="menu-toggle" href="#menu" data-toggle="menu">
		<span class="icon-menu">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</span>
	</a>
	<div class="content">
		<main role="main" class="main">