<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="forum">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_forum(null); ?></ul>
	</div>
    <div id="content" class="coupons-box clear">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2><?php echo htmlspecialchars($topic['title']); ?></h2>
					<ul class="filter" style="position:absolutely;bottom:0px;clear:both;float:none;"><li><a href="#reply">＋回复</a></li><?php if(is_manager()){?><li><a href="/ajax/topic.php?action=topicremove&id=<?php echo $topic['id']; ?>" class="ajaxlink" ask="Really delete it?">－Delete</a></li><li><a href="/ajax/topic.php?action=topichead&id=<?php echo $topic['id']; ?>" class="ajaxlink">#set top</a></li><?php }?></ul>
				</div>
                <div class="sect">
				<table id="replies-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
					<tr>
					<td width="48" valign="top"><div class="avatar"><img src="<?php echo user_image($users[$topic['user_id']]['avatar']); ?>" width="48" height="48" /></div></td>
					<td width="660">
						<div class="author">
							<span style="float:right;"><?php echo Utility::HumanTime($topic['create_time']); ?><?php if(is_manager()){?>&nbsp;<a href="/ajax/topic.php?action=topicremove&id=<?php echo $topic['id']; ?>" class="ajaxlink" ask="Really delete it?">－Delete</a><?php }?></span><b><?php echo $users[$topic['user_id']]['username']; ?></b><div class="clear"></div>
						</div>
						<div class="topic-content">
							<?php echo nl2br(htmlspecialchars($topic['content'])); ?>
						</div>
					</td>
					</tr>
					<?php if(is_array($replies)){foreach($replies AS $one) { ?>
					<tr>
					<td width="48" valign="top">
						<div class="avatar"><img src="<?php echo user_image($users[$one['user_id']]['avatar']); ?>" width="48" height="48" /></div>
					</td>
					<td width="660">
						<div class="author">
							<span style="float:right;"><?php echo Utility::HumanTime($one['create_time']); ?><?php if(is_manager()){?>&nbsp;<a href="/ajax/topic.php?action=topicremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Reall y delete the reply?">－Delete</a><?php }?></span><b><?php echo $users[$one['user_id']]['username']; ?></b><div class="clear"></div>
						</div>
						<div class="topic-content">
							<?php echo nl2br(htmlspecialchars($topic['content'])); ?>
						</div>
					</td>
					</tr>
					<?php }}?>
					<tr><td colspan="2"><?php echo $pagestring; ?></td></tr>
				</table>	
				</div>
				<div class="head" id="reply">
					<h2>I will reply</h2>
				</div>
				<div class="sect consult-form">
					<?php if(is_login()){?>
                    <form id="forum-reply-form" method="post" action="/forum/topic.php?id=<?php echo $topic['id']; ?>" class="validator">
					<input type="hidden" name="parent_id" value="<?php echo $topic['id']; ?>" />
					<textarea style="width:480px;height:240px;" name="content" id="forum-new-content" class="f-textarea" require="true" datatype="require"></textarea>
					<p class="commit"><input type="submit" value="submit" name="commit" id="leader-submit" class="formbutton"/></p>
					</form>
					<?php } else { ?>
					<a href="/account/login.php?r=<?php echo $currefer; ?>">Login</a>Or<a href="/account/signup.php">Register please.</a>
					<?php }?>
					<div class="clear"></div>
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
