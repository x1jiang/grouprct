<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="credit">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_account('/credit/index.php'); ?></ul>
	</div>
    <div id="content">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Account remaining </h2>
                </div>
                <div class="sect">
					<p class="charge">Store to <?php echo $INI['system']['abbreviation']; ?> account. <span>&raquo;</span> <a href="/credit/charge.php">Now go tstore</a></p>
					<h3 class="credit-title">Your current remaining is <strong><?php echo moneyit($login_user['money']); ?></strong> dollars </h3>
					<table id="order-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="120">Time</th><th width="auto">Info</th><th width="50">Finance</th><th width="70">Amount(dollars )</th></tr>
						<?php if(is_array($flows)){foreach($flows AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>><td style="text-align:left;"><?php echo date('Y-m-d H:i', $one['create_time']); ?></td><td><?php echo $option_flow[$one['action']]; ?>&nbsp;-&nbsp;<?php if($one['action']=='coupon'){?><?php echo $INI['system']['couponname']; ?>Coupon<?php } else if($one['action']=='invite') { ?>Friend:<?php echo $users[$one['detail_id']]['username']; ?><?php } else if($one['action']=='buy') { ?><a href="/team.php?id=<?php echo $one['detail_id']; ?>"><?php echo $teams[$one['detail_id']]['product']; ?></a><?php } else if($one['action']=='refund') { ?><a href="/team.php?id=<?php echo $one['detail_id']; ?>"><?php echo $teams[$one['detail_id']]['product']; ?></a><?php } else if($one['action']=='charge') { ?>Online store<?php } else if($one['action']=='withdraw') { ?>User Withdraw<?php } else if($one['action']=='store') { ?>Offline store<?php }?></td><td class="<?php echo $one['direction']; ?>"><?php echo $one['direction']=='income'?'Income':'Payout'; ?></td><td><?php echo moneyit($one['money']); ?></td></tr>
						<?php }}?>
						<tr><td colspan="4"><?php echo $pagestring; ?></td></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
    <div id="sidebar">
		<?php include template("block_side_credit");?>
		<?php include template("block_side_credittip");?>
    </div>
</div>

</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
