	<footer>
		<div class="grid__item one-whole line"><hr></div><!--
		 --><nav class="footernav">
			<ul class="nav">
				<li><a href="<?php echo $homepage->url; ?>"><?php echo $homepage->title; ?></a></li>
				<?php foreach($settings->settings_footermenu as $menu) : 
					if($menu == $page || $menu === $page->rootParent) echo '<li><a class="active" href="#">'.$menu->title.'</a>';
					else echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a>';
				endforeach; ?>
			</ul>
		</nav><!--
		 --><div class="search">
			<form action="#" method="post" class="inline-form search-form">
			    <fieldset>
				    <legend class="is-vishidden">Search</legend>
				    <label for="search-field" class="is-vishidden">Search</label>
				    <input type="search" placeholder="" id="search-field" class="search-field">
				    <input type="submit" value="Suchen" class="search-submit">
			    </fieldset>
			</form>
		</div><!--
		 --><div class="copyright">
			&copy; 2013 Korona Leuchten GmbH
		</div>
	</footer>
	<script src="<?php echo $config->urls->templates?>js/jquery.min.js"></script>
	<script src="<?php echo $config->urls->templates?>js/init.js"></script>
</body>
</html>