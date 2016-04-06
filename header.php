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
	
	<header id="header" class="header ">
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
	<a id="menu-toggle" class="menu-toggle" href="#menu" data-toggle="menu">
		<span class="icon-menu">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</span>
	</a>
	<div class="content">
		<main role="main" class="main">