<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="help">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('upgrade'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>zuitu</h2>
				</div>
                <div class="sect">
					<div class="wholetip clear"><h3>Newest version<?php echo $newversion; ?></h3></div>
					<div style="margin:0 20px;">
					<?php if($isnew){?>
						<p>Your current version is:<strong><?php echo $newversion; ?></strong></p>
					<?php } else { ?>
						<p>Your current version is not the newest version,please update.</p>
					<?php }?>
					</div>
				<?php if($install){?>
					<div class="wholetip clear"><h3>New installation package</h3></div>
					<div style="margin:0 20px;">
						<?php if(is_array($install)){foreach($install AS $v=>$l) { ?>
						<p><a href="<?php echo $l; ?>">ZuituGo_<?php echo $v; ?></a></p>
						<?php }}?>
					</div>
				<?php }?>
				<?php if($upgrade){?>
					<div class="wholetip clear"><h3>Installation package</h3></div>
					<div style="margin:0 20px;">
					<?php if(is_array($upgrade)){foreach($upgrade AS $v=>$l) { ?>
						<p><a href="<?php echo $l; ?>">ZuituGo_Upgrade_<?php echo $v; ?></a></p>
					<?php if($upgradedesc[$v]){?>
						<p style="text-index:2em;"><?php echo $upgradedesc[$v]; ?></p>
					<?php }?>
					<?php }}?>
					</div>
				<?php }?>
				<?php if($patch){?>
					<div class="wholetip clear"><h3>Patches</h3></div>
					<div style="margin:0 20px;">
					<?php if(is_array($patch)){foreach($patch AS $v=>$l) { ?>
						<p><a href="<?php echo $l; ?>">ZuituGo_Patch_<?php echo $v; ?></a></p>
					<?php if($patchdesc[$v]){?>
						<p style="text-index:2em;"><?php echo $patchdesc[$v]; ?></p>
					<?php }?>
					<?php }}?>
					</div>
				<?php }?>
					<div class="wholetip clear"><h3>How to update dabase</h3></div>
					<div style="margin:0 20px;">
						<p>1,firstly update database structure,<b>it will not affct data now</b>,directly click<b><a href="/manage/system/upgrade.php?action=db">here </a></b>to finish update dabase structure.</p>
						<p>2,download update package,directly overwrite the dabase,if template changed,please do template backup.</p>
						<p>3,after file copied,update finished.</p>
					</div>

					<div class="wholetip clear"><h3>software info</h3></div>
					<div style="margin:0 20px;">
					<?php if(is_array($software)){foreach($software AS $n=>$meta) { ?>
						<p><?php echo $n; ?>:<?php if($meta[0]=='link'){?><a href="<?php echo $meta[1]; ?>" target="_blank"><?php echo $meta[1]; ?></a><?php } else { ?><?php echo $meta[1]; ?><?php }?></p>
					<?php }}?>
					</div>
				</div>
			</div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
