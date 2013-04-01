<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('invite'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
				<?php if('index'==$s){?>
                    <h2>to be pay bonus (amount：<span class="currency"><?php echo $currency; ?></span><?php echo $summary; ?>)</h2>
				<?php } else { ?>
                    <h2>paid bonus (amount：<span class="currency"><?php echo $currency; ?></span><?php echo $summary; ?>)</h2>
				<?php }?>
					<ul class="filter">
						<li><form action="/manage/misc/invite.php" method="get">invitor Email：<input type="text" name="memail" value="<?php echo htmlspecialchars($memail); ?>" class="h-input" />&nbsp;<input type="submit" value="filter" class="formbutton"  style="padding:1px 6px;"/><form></li><li><?php echo mcurrent_misc_invite($s); ?></li>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="350">item</th><th width="150">user</th><th width="150">invitee</th><th width="140">time</th><?php if('index'==$s){?><th width="150">Operate</th><?php } else { ?><th width="150">Operator</th><?php }?></tr>
					<?php if(is_array($invites)){foreach($invites AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="order-list-id-<?php echo $one['id']; ?>">
						<td><a class="deal-title" href="/team.php?id=<?php echo $one['team_id']; ?>" target="_blank"><?php echo $teams[$one['team_id']]['title']; ?></a></td>
						<td nowrap><a class="ajaxlink" href="/ajax/manage/userview.php?id=<?php echo $one['user_id']; ?>"><?php echo $users[$one['user_id']]['email']; ?></a><br/><?php echo $users[$one['user_id']]['username']; ?><br/><?php echo $one['user_ip']; ?></td>
						<td nowrap><a class="ajaxlink" href="/ajax/manage/userview.php?id=<?php echo $one['other_user_id']; ?>"><?php echo $users[$one['other_user_id']]['email']; ?></a><br/><?php echo $users[$one['other_user_id']]['username']; ?><br/><?php echo $one['other_user_ip']; ?></td>
						<td nowrap><?php echo date('Y-m-d H:i', $one['create_time']); ?><br/><?php echo date('Y-m-d H:i', $one['buy_time']); ?></td>
						<td class="op" nowrap><?php if('index'==$s){?><a href="/ajax/manage.php?action=inviteok&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="are sure ？">sure</a>｜<a href="/ajax/manage.php?action=inviteremove&id=<?php echo $one['id']; ?>" class="ajaxlink remove">remove</a><?php } else { ?><?php echo $users[$one['admin_id']]['email']; ?><br/><?php echo $users[$one['admin_id']]['username']; ?><?php }?></td>
					</tr>
					<?php }}?>
					<tr><td colspan="8"><?php echo $pagestring; ?></tr>
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
