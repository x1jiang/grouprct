<?php if(trim(strip_tags($INI['bulletin'][0]))){?>
<div class="sbox side-business">
	<div class="sbox-top"></div>
	<div class="sbox-content">
		<div class="tip">
			<h2>Big news</h2>
			<div><?php echo $INI['bulletin'][0]; ?></div>
		</div>
	</div>
	<div class="sbox-bottom"></div>
</div>
<?php }?>

<?php if(trim(strip_tags($INI['bulletin'][$city['id']]))){?>
<div class="sbox side-business">
	<div class="sbox-top"></div>
	<div class="sbox-content">
		<div class="tip">
			<h2><?php echo $city['name']; ?>Bulletin</h2>
			<div><?php echo $INI['bulletin'][$city['id']]; ?></div>
		</div>
	</div>
	<div class="sbox-bottom"></div>
</div>
<?php }?>
