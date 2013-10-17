<?php
	include("_header.inc");
?>
	<div class="content grid">
		<div class="produkt">
			<div class="p-images grid__item one-whole bp-large--two-thirds">
				<div class="grid">
					<?php if($page->product_images) : 
						if($page->product_images->eq(0)) : ?>
					<img class="grid__item one-whole" src="<?php echo $page->product_images->eq(0)->getThumb("produkt-gross"); ?>" alt="<?php echo $page->product_images->eq(0)->description; ?>"><?php
					endif;
					if($page->product_images->eq(1)) : 
					?><img class="grid__item one-whole bp-small-2--one-half" src="<?php echo $page->product_images->eq(1)->getThumb("produkt-gross"); ?>" alt="<?php echo $page->product_images->eq(1)->description; ?>"><?php
					endif;
					if($page->product_images->eq(2)) : 
					?><img class="grid__item one-whole bp-small-2--one-half" src="<?php echo $page->product_images->eq(2)->getThumb("produkt-gross"); ?>" alt="<?php echo $page->product_images->eq(2)->description; ?>"><?php endif; endif;?>
				</div>
			</div><!--
			 --><div class="p-beschreibung grid__item one-whole bp-large--one-third">
				<h2 class="headline"><?php echo $page->product_description_title; ?></h2>
				<?php echo $page->product_description; ?>
			</div>
			<div class="p-bereiche grid__item one-whole">
				<h2 class="headline">Technische Informationen</h2>
				<div class="accordion">
					<ul>
						<?php foreach($page->product_technical_repeater as $tech) : ?>
						<li class="acc-item">
							<h3 class="headline">
								<a class="acc-handle"><?php echo $tech->title; ?></a>
							</h3>
							<div class="acc-panel grid">
								<div class="acc-info">
									<div class="text grid__item one-whole bp-small-2--one-half bp-large--two-thirds grid">
										<div class="grid__item one-whole bp-large--one-half">
											<?php echo $tech->body; ?>
										</div><!--
										--><div class="grid__item one-whole bp-large--one-half">
											<?php echo $tech->body_2; ?>
										</div>
									</div><!--
							 --><div class="grid__item one-whole bp-small-2--one-half bp-large--one-third">
										<?php if($tech->images && $tech->images->eq(0)) :?>
							 		<img src="<?php echo $tech->images->eq(0)->getThumb("einspaltig"); ?>" alt="<?php echo $tech->images->eq(0)->description; ?>">
										<?php endif;?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="p-bereiche grid__item one-whole">
				<h2 class="headline">Anwendungsgebiete</h2>
				<div class="accordion">
					<ul>
						<?php foreach($page->product_uses_repeater as $tech) : ?>
						<li class="acc-item">
							<h3 class="headline">
								<a class="acc-handle"><?php echo $tech->title; ?></a>
							</h3>
							<div class="acc-panel grid">
								<div class="acc-info">
									<div class="text grid__item one-whole bp-small-2--one-half bp-large--two-thirds grid">
										<div class="grid__item one-whole bp-large--one-half">
											<?php echo $tech->body; ?>
										</div><!--
										--><div class="grid__item one-whole bp-large--one-half">
											<?php echo $tech->body_2; ?>
										</div>
									</div><?php
									?><div class="grid__item one-whole bp-small-2--one-half bp-large--one-third">
										<?php if($tech->images && $tech->images->eq(0)) :?>
							 		<img src="<?php echo $tech->images->eq(0)->getThumb("einspaltig"); ?>" alt="<?php echo $tech->images->eq(0)->description; ?>">
										<?php endif;?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="space-1"></div>
			<div class="block b-leistung grid__item one-whole bp-med--one-third">
				<h2 class="headline"><?php echo $page->product_service_title; ?></h2>
				<div class="b-text">
					<?php echo $page->product_service_text; ?>
				</div>
			</div><?php
			?><div class="block b-downloads grid__item one-whole bp-med--one-third">
				<h2 class="headline">Downloads</h2>
				<div class="b-text">
					<table>
						<?php foreach($page->product_download_repeater as $dl) : ?>
						<tr>
							<td><?php echo $dl->title; ?>:</td>
							<td>
								<?php if($dl->product_download_save == 0) : ?>
									<a class="noarr" href="#">PDF</a>
								<?php else : ?>
									<a class="d-refer" href="downloads.php#kor01data">EXL</a>
								<?php endif;?>
							</td>
						</tr>
					<?php endforeach; ?>
					</table>
				</div>
			</div><!--
			 --><div class="block b-kontakt grid__item one-whole bp-med--one-third">
				<h2 class="headline">Kontakt</h2>
				<div class="b-text">
					<div class="vcard">
						<div class="fn">Stephan Meyer</div>
						<div class="email">info@korona-licht.de</div>
						<div class="tel">
							<span class="type is-vishidden">Work</span>
							T <span class="value">+49</span><span class="value">821</span><span class="value">90628-0</span>
						</div>
						<div class="tel">
							<span class="type is-vishidden">Fax</span>
							F <span class="value">+49</span><span class="value">821</span><span class="value">90628-12</span>
						</div>
					</div>
				</div>
			</div>
			<div class="space-3"></div>
			<?php if($page->product_reference_show == 1) : ?>
			<div class="block b-systemreferenzen grid__item one-whole">
				<h2 class="headline">Referenzen zu diesem System</h2>
				<div class="grid">
					<?php foreach($page->product_reference_pages as $ref) : ?>
					<div class="block grid__item one-whole bp-small-2--one-half bp-large--one-third b-referenz">
						<h3 class="headline">
							<a href="<?php echo $ref->url; ?>" class="inner"><?php echo $ref->title; ?></a>
						</h3>
						<figure>
							<a href="<?php echo $ref->url; ?>" class="noarr"><img src="images/produkte_kor_01/09_forum_tashkent.jpg" alt="Image"></a>
						</figure>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
			<div class="space-4"></div>
			<?php endif;?>
			<?php if($page->product_related_show == 1) : ?>
			<div class="block b-systemprodukte grid__item one-whole">
				<h2 class="headline">Alle Systemprodukte</h2>
				<div class="grid">
					<?php foreach($page->product_related_pages as $rel) : ?>
					<div class="block grid__item one-whole bp-small-2--one-half bp-large--one-third systemprodukt">
						<h3 class="headline"><a href="<?php echo $rel->url; ?>"><?php echo $rel->title; ?></a></h3>
						<figure>
							<?php if($rel->product_images && $rel->product_images->eq(0)) : ?>
							<a class="noarr" href="<?php echo $rel->url; ?>"><img class="notrans" src="<?php echo $rel->product_images->eq(0)->getThumb("produkt-klein"); ?>" alt="<?php echo $rel->product_images->eq(0)->description; ?>"></a>
						<?php endif; ?>
						<figcaption>LED Profil, Stichpunkt, Produktbeschreibung, Stecker, Strombedingungen</figcaption>
						</figure>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
<?php
	include("_footer.inc");
?>