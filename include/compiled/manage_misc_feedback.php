<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('feedback'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>feedbacks</h2>
                    <ul class="filter">
						<li><form action="/manage/misc/feedback.php" method="get"><input type="text" name="like" value="<?php echo htmlspecialchars($like); ?>" class="h-input" />&nbsp;<select name="cate"><?php echo Utility::Option($feedcate, $cate, '所有分类'); ?></select>&nbsp;<input type="submit" value="filter" class="formbutton"  style="padding:1px 6px;"/><form></li>
					</ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr><th width="200">customer</th><th width="80">type</th><th width="360">content</th><th width="80">state</th><th width="80">date</th><th width="100">operate</th></tr>
					<?php if(is_array($asks)){foreach($asks AS $index=>$one) { ?>
					<tr <?php echo $index%2?'':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
						<td><?php echo htmlspecialchars($one['title']); ?><br/><?php echo htmlspecialchars($one['contact']); ?></td>
						<td nowrap><?php echo $feedcate[$one['category']]; ?></td>
						<td><?php echo htmlspecialchars($one['content']); ?></td>
						<td nowrap><?php echo $one['user_id']?$users[$one['user_id']]['username']:''; ?></td>
						<td nowrap><?php echo date('Y-n-j',$one['create_time']); ?></td>
						<td class="op" nowrap><a href="/manage/misc/feedback.php?action=r&id=<?php echo $one['id']; ?>&r=<?php echo $currefer; ?>" class="remove-record">remove</a><?php if(!$one['user_id']){?>｜<a href="/manage/misc/feedback.php?action=m&id=<?php echo $one['id']; ?>&r=<?php echo $currefer; ?>">operate</a><?php }?></td>
					</tr>
					<?php }}?>
					<tr><td colspan="6"><?php echo $pagestring; ?></tr>
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
