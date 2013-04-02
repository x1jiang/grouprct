<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="forum">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_forum('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>All topics</h2>
					<ul class="filter"><li><a href="/forum/new.php">+Publish new topic</a></li></ul>
				</div>
                <div class="sect">
					<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<tr><th width="360">Topic</th><th width="80" nowrap>Class</th><th width="80" nowrap>Reply/Read</th><th width="100" nowrap>Last published</th></tr>
					<?php if(is_array($topics)){foreach($topics AS $index=>$one) { ?>
						<tr <?php echo $index%2?'':'class="alt"'; ?>><td style="text-align:left;"><a class="deal-title" href="/forum/topic.php?id=<?php echo $one['id']; ?>" style="<?php echo $one['head']?'color:#F00;':''; ?>"><?php echo htmlspecialchars($one['title']); ?></a></td><td nowrap><?php if($one['public_id']){?>Public area<?php } else if($one['team_id']) { ?>Daily deal area<?php } else { ?>Local area<?php }?></td><td align="center" nowrap><?php echo $one['reply_number']; ?>/<?php echo $one['view_number']; ?></td><td class="author" nowrap><?php echo $users[$one['user_id']]['username']; ?><br/><?php echo Utility::HumanTime($one['create_time']); ?></td></tr>
					<?php }}?>
                    </table>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
    <div id="sidebar">
		<?php include template("block_side_subscribe");?>
    </div>
</div>

</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
