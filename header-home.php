<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<?php 

	if( is_front_page() ):
		$hoopy_classes = array('hoopy-class', 'my-class');
	else:
		$hoopy_classes = array('no-homepage');
	endif;

?>

<body <?php body_class($hoopy_classes); ?>>
	
	<header id="header" class="header">
		<div class="container">
			<div class="inner">
				<a href="/" class="header-title"><h1>DUC SIEGENTHALER</h1></a>
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