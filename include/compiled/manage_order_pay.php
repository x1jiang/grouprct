<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_order('pay'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>pay Order</h2>
					<ul class="filter"><li><form method="get">User Email:<input type="text" name="uemail" class="h-input" value="<?php echo htmlspecialchars($uemail); ?>" >&nbsp;Daily deal id:<input type="text" name="team_id" class="h-input number" value="<?php echo $team_id; ?>" >&nbsp;<input type="submit" value="Filter" class="formbutton"  style="padding:1px 6px;"/><form></li></ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="40">ID</th><th width="340">item</th><th width="180">User </th><th width="40" nowrap>Quantity</th><th width="50" nowrap>total money</th><th width="50" nowrap>still need pay</th><th width="50" nowrap>pay</th><th width="50" nowrap>delivery</th><th width="50" nowrap>Operation</th></tr>
					<?php if(is_array($orders)){foreach($orders AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td><?php echo $one['team_id']; ?>&nbsp;(<a class="deal-title" href="/team.php?id=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['title']; ?></a>)</td>
						<td><a href="/ajax/manage.php?action=userview&id=<?php echo $one['user_id']; ?>" class="ajaxlink"><?php echo $users[$one['user_id']]['email']; ?><br/><?php echo $users[$one['user_id']]['username']; ?></a></td>
						<td><?php echo $one['quantity']; ?></td>
						<td><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['origin']); ?></td>
						<td><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['credit']); ?></td>
						<td><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['money']); ?></td>
						<td><?php echo $option_delivery[$teams[$one['team_id']]['delivery']]; ?><?php echo $one['express_id']?'Y':''; ?></td>
						<td class="op" nowrap><a href="/ajax/manage.php?action=orderview&id=<?php echo $one['id']; ?>" class="ajaxlink">Info</a></td>
					</tr>
					<?php }}?>
					<tr><td colspan="9"><?php echo $pagestring; ?></tr>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
