<?php
	include("_header.inc");
	$c = $page->contact_repeater->eq($page->contact_used_contact - 1);
?>
	<div class="content grid">
		<div class="block b-kontakt grid__item one-whole bp-med--one-third">
			<h2 class="headline">
				<?php echo $c->contact_data_org; ?>
			</h2>
			<div class="b-text">
				<div class="vcard">
					<div class="org is-vishidden"><?php echo $c->contact_data_org; ?></div>
					<div class="adr">
					 <div class="street-address"><?php echo $c->contact_data_adr_street; ?></div>
					 <span class="postal-code"><?php echo $c->contact_data_adr_postal; ?></span>
					 <span class="locality"><?php echo $c->contact_data_adr_city; ?></span>
					</div>
					<br>
					<div class="email"><?php echo $c->contact_data_email; ?></div>
					<div class="tel">
						<span class="type is-vishidden">Work</span>
						<?php 
							echo 'T <span class="value">'.str_replace(" ", "</span><span class=\"value\">", $c->contact_data_tel).'</span>'; 
						?>
					</div>
					<div class="tel">
						<span class="type is-vishidden">Fax</span>
						<?php 
							echo 'F <span class="value">'.str_replace(" ", "</span><span class=\"value\">", $c->contact_data_fax).'</span>'; 
						?>
					</div>
					<br>
					<div>
						Ansprechpartner:
						<span class="fn" style="font-weight: normal"><?php echo $c->contact_data_name; ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	include("_footer.inc");
?>