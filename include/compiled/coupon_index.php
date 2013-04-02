<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_account('/coupon/index.php'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>My <?php echo $INI['system']['couponname']; ?></h2>
                    <ul class="filter">
						<li class="label">Category: </li>
						<?php echo current_coupon_sub('index'); ?>
					</ul>
				</div>
                <div class="sect">
					<?php if($selector=='index'&&!$coupons){?>
					<div class="notice">No usable <?php echo $INI['system']['couponname']; ?></div>
					<?php }?>
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="240">Daily deal item </th><th width="100" nowrap>Coupon ID</th><th width="60" nowrap>Coupon Password</th><th width="100" nowrap>Valid Time </th><th width="80">Operation</th></tr>
					<?php if(is_array($coupons)){foreach($coupons AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td><a class="deal-title" href="/team.php?id=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['title']; ?></a></td>
							<td><?php echo $one['id']; ?></td>
							<td><?php echo $one['secret']; ?></td>
							<td><?php echo date('Y-m-d', $one['expire_time']); ?></td>
							<td><a href="/ajax/coupon.php?action=sms&id=<?php echo $one['id']; ?>" class="ajaxlink">SMS</a>｜<a href="/coupon/print.php?id=<?php echo $one['id']; ?>" target="_blank">Print</a></td>
						</tr>	
					<?php }}?>
						<tr><td colspan="5"><?php echo $pagestring; ?></td></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
    <div id="sidebar">
		<?php include template("block_side_aboutcoupon");?>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
