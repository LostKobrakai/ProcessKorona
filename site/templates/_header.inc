<?php
	$settings = $pages->get("title=Settings, template=settings");
	$homepage = $pages->get("id=1");
?><!doctype html>
<!--[if lt IE 9]><html  lang="de" class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html lang="de"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>style.css">
	<link rel="icon" href="<?php echo $config->urls->templates?>images/favicon_16.png" type="image/png">
	<meta name="description" content="<?php echo $page->seo_description; ?>">
	<meta name="keywords" content="<?php echo $page->seo_keywords; ?>">
	<?php
	 echo "<title>".$page->get("headline|title")." ".$settings->settings_title."</title>"
	?>
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<header>
		<div class="logo">
			<a href="<?php echo ($page == $homepage) ? "#" : $homepage->url; ?>" title="<?php echo $homepage->title; ?>"><img src="<?php echo $config->urls->templates?>images/logo.png" alt=""></a>
		</div><nav class="mainnav">
			<ul class="nav">
				<?php foreach($settings->settings_mainmenu as $menu) : 
					if($menu == $page) echo '<li><a class="active" href="#">'.$menu->title.'</a>';
					elseif($menu === $page->rootParent) echo '<li><a class="active" href="'.$menu->url.'">'.$menu->title.'</a>';
					else echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a>';
				endforeach; ?>
			</ul>
		</nav>
		<div class="grid__item one-whole">
			<div class="teaser<?php echo ($page == $homepage) ? " big" : ""; ?>">
				<?php if($page->settings_header_image && $page->settings_header_image->eq(0)) : ?>
					<img src="<?php echo $page->settings_header_image->eq(0)->getThumb("header-klein"); ?>" alt="<?php echo $page->settings_header_image->eq(0)->description; ?>">
				<?php elseif($settings->settings_header_image && $settings->settings_header_image->eq(0)) : ?>
					<img src="<?php echo $settings->settings_header_image->eq(0)->getThumb(($page == $homepage) ? "header-gross" : "header-klein"); ?>" alt="<?php echo $settings->settings_header_image->eq(0)->description; ?>">
				<?php endif; ?>
				<h1><?php echo $page->get("headline|title") ?></h1>
			</div>
		</div>
		<?php if($page != $homepage) : ?>
		<ul class="nav breadcrumb">
			<?php foreach($page->parents as $parent) : ?>
				<li><a href="<?php echo $parent->url; ?>"><?php echo $parent->title; ?></a>
			<?php endforeach; ?>
			<li><?php echo $page->title; ?>
		</ul>
		<?php endif;?>
	</header>