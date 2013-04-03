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
                    <h2>My Projects</h2>
                    <ul class="filter">
						<li class="label">Filter: </li>
						<?php echo current_order_index($selector); ?>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="380">RCT names</th><th width="70">Status</th><th width="40">Details</th></tr>
					<?php if(is_array($orders)){foreach($orders AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>>
							<td style="text-align:left;"><a class="deal-title" href="/team.php?id=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['title']; ?></a></td>
							<td><?php if($one['state']=='pay'){?>Joined<?php } else if($teams[$one['team_id']]['close_time']>0) { ?>Expired<?php } else { ?>Pending<?php }?><!--{/if}--></td>
							<td class="op"><?php if(($one['state']=='unpay'&&$teams[$one['team_id']]['close_time']==0)){?><a href="/order/check.php?id=<?php echo $one['id']; ?>">Join</a><?php } else if($one['state']=='pay') { ?><a href="/order/view.php?id=<?php echo $one['id']; ?>">Info</a><?php }?></td>
						</tr>
					<?php }}?>
						<tr><td colspan="5"><?php echo $pagestring; ?></td></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>

</div>

</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
