<?php
 $settings = $pages->get("title=Settings, template=settings");
?><!doctype html>
<!--[if lt IE 9]><html  lang="de" class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html lang="de"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>style.css">
	<link rel="icon" href="images/favicon_16.png" type="image/png">
	
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
			<a href="" title="Startseite"><img src="<?php echo $config->urls->templates?>images/logo.png" alt="Logo von Korona"></a>
		</div><nav class="mainnav">
			<ul class="nav">
				<?php foreach($settings->settings_mainmenu as $menu) : 
					if($menu == $page || $menu === $page->rootParent) echo '<li><a class="active" href="#">'.$menu->title.'</a>';
					else echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a>';
				endforeach; ?>
			</ul>
		</nav>
		<div class="grid__item one-whole">
			<div class="teaser">
				<?php if(true) : ?>
					<img src="<?php echo $settings->settings_header_image->eq(0)->getThumb("header-klein"); ?>" alt="<?php echo $settings->settings_header_image->eq(0)->description; ?>">
				<?php endif; ?>
				<h1><?php echo $page->get("headline|title") ?></h1>
			</div>
		</div>
		<ul class="nav breadcrumb">
			<?php
			foreach($breadcrumb as $key => $value){
				echo "<li><a href='$value'>$key</a>";
			}
			?>
		</ul>
	</header>