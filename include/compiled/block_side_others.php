<?php if($others){?>
<div class="sbox side-business">
	<div class="sbox-top"></div>
	<div class="sbox-content">
		<div class="tip">
		<h2>Ongoing daily deal ...</h2>
		<?php if(is_array($others)){foreach($others AS $one) { ?>
			<b><?php echo ++$index; ?>,<?php echo $one['title']; ?></b>
			<p><a href="/team.php?id=<?php echo $one['id']; ?>"><img src="<?php echo team_image($one['image']); ?>" width="195" height="148" border="0" /></a></p>
			<p><a href="/team.php?id=<?php echo $one['id']; ?>">&raquo;&nbsp;Click view the order Info</a></p>
		<?php }}?>
		</div>
	</div>
	<div class="sbox-bottom"></div>
</div>
<?php }?>
