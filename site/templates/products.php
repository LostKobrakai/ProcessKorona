<?php
	include("_header.inc");
?>
	<div class="content produkte grid">
		<?php foreach($page->children as $ptype) : ?>
		<div class="block grid__item one-whole">
			<h2 class="headline" id="<?php echo $ptype->name; ?>"><?php echo $ptype->title; ?></h2>
			<div class="b-text bp-large--two-thirds">
				<?php echo $ptype->body; ?>
			</div>
			<div class="grid">
				<?php foreach($ptype->children as $product) : 
			?><div class="block grid__item one-whole bp-small-2--one-half bp-large--one-third systemprodukt">
					<h3 class="headline"><a href="<?php echo $product->url; ?>"><?php echo $product->title; ?></a></h3>
					<figure>
						<?php if($product->product_images && $product->product_images->eq(0)) : ?>
						<a class="noarr" href="<?php echo $product->url; ?>"><img class="notrans" src="<?php echo $product->product_images->eq(0)->getThumb("produkt-klein"); ?>" alt="<?php echo $product->product_images->eq(0)->description; ?>"></a>
					<?php endif;?>
					<figcaption><?php echo $product->product_description_list; ?></figcaption>
					</figure>
				</div><?php endforeach; ?>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
<?php
	include("_footer.inc");
?>