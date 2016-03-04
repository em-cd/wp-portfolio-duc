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
	
	<header id="header" class="header ">
		<div class="container">
			<div class="inner">
				<a href="/" class="header-title"><h1>DUC SIEGENTHALER</h1></a>
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
// elseif (is_singular()):
// 	$posts = get_pages(array(
// 		'meta_key' => '_wp_page_template',
// 		'meta_value' => '.php'
// 	));
// 	foreach($posts as $post){
// 		echo '<a href="'.get_permalink($post).'"><h2>'.$post->post_title.'</h2></a>';
// 	};
else:
	echo '<h2>'.trim(wp_title('', false)).'</h2>';
endif;
?>
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