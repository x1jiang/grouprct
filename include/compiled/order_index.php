<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_account('/order/index.php'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>My Order</h2>
                    <ul class="filter">
						<li class="label">Filter: </li>
						<?php echo current_order_index($selector); ?>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="380">Item</th><th width="60">Quantity</th><th width="60">Price</th><th width="60">Status</th><th width="40">Operation</th></tr>
					<?php if(is_array($orders)){foreach($orders AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td style="text-align:left;"><a class="deal-title" href="/team.php?id=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['title']; ?></a></td>
							<td><?php echo $one['quantity']; ?></td>
							<td><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['origin']); ?></td>
							<td><?php if($one['state']=='pay'){?>Paid<?php } else if($teams[$one['team_id']]['close_time']>0) { ?>Expired<?php } else { ?>Unpay<?php }?><!--{/if}--></td>
							<td class="op"><?php if(($one['state']=='unpay'&&$teams[$one['team_id']]['close_time']==0)){?><a href="/order/check.php?id=<?php echo $one['id']; ?>">Pay</a><?php } else if($one['state']=='pay') { ?><a href="/order/view.php?id=<?php echo $one['id']; ?>">Info</a><?php }?></td>
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
		<?php include template("block_side_aboutorder");?>
    </div>
</div>

</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
