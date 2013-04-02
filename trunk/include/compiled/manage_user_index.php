<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_user('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>User list</h2>
                    <ul class="filter">
						<li><form action="/manage/user/index.php" method="get">Username:<input type="text" name="uname" class="h-input" value="<?php echo htmlspecialchars($uname); ?>" >&nbsp;Email:<input type="text" name="like" class="h-input" value="<?php echo htmlspecialchars($like); ?>" >&nbsp;<select name="ucity" style="width:120px;"><?php echo Utility::Option(option_category('city'), $ucity, 'City'); ?></select>&nbsp;<input type="submit" value="Filter" class="formbutton"  style="padding:1px 6px;"/><form></li>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="50">ID</th><th width="200">Email/Username</th><th width="100" nowrap>Name/City</th><th width="40">Remaining </th><th width="40">Zip code</th><th width="120">RegisterIP/Register time</th></th><th width="100">Phone number</th><th width="120">Operation</th></tr>
					<?php if(is_array($users)){foreach($users AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo $one['id']; ?></td>
						<td><?php echo $one['email']; ?><br/><?php echo $one['username']; ?></td>
						<td><?php echo $one['realname']?$one['realname']:'----';; ?><br/><?php if($one['city_id']){?><?php echo $hotcities[$one['city_id']]['name']; ?><?php } else { ?>Others <?php }?></td>
						<td><span class="currency"><?php echo $currency; ?></span><?php echo moneyit($one['money']); ?></td>
						<td><?php echo $one['zipcode']; ?></td>
						<td><?php echo $one['ip']; ?><br/><?php echo date('Y-m-d H:i', $one['create_time']); ?></td>
						<td><?php echo $one['mobile']; ?></td>
						<td class="op"><a href="/ajax/manage.php?action=userview&id=<?php echo $one['id']; ?>" class="ajaxlink">Info</a>｜<a href="/manage/user/edit.php?id=<?php echo $one['id']; ?>">Edit </a></td>
					</tr>
					<?php }}?>
					<tr><td colspan="8"><?php echo $pagestring; ?></tr>
                    </table>
				</div>
            </div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->


