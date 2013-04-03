<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="consult">
    <div class="consult-hd">

		<div class="deal-info"><table class="deal-info-table"><tr><td class="link"><p><a href="/team.php?id=<?php echo $team['id']; ?>">&raquo;&nbsp;Return </a></p><h2><?php echo $team['title']; ?></h2></td><?php if($team['close_time']==0){?><td class="buy"><a href="/team/buy.php?id=<?php echo $team['id']; ?>">hello</a></td><?php }?></tr></table></div>
	</div>
    <div class="consult-bd">
        <div id="content">
            <div class="box clear">
                <div class="box-top"></div>
                <div class="box-content">
                    <div class="head">
                        <h2><?php echo $INI['system']['abbreviation']; ?> FAQs</h2>
                    </div>
                    <div class="sect consult-list">
                        <ul class="list">
						<?php if(is_array($asks)){foreach($asks AS $one) { ?>
						<li id="ask-entry-<?php echo $one['id']; ?>" >
							<div class="item">
								<p class="user"><strong><?php echo $users[$one['user_id']]['username']; ?></strong><span><?php echo Utility::HumanTime($one['create_time']); ?></span></p>
								<div class="clear"></div>
								<p class="text"><?php echo $one['content']; ?></p>
								<p class="reply"><strong>Reply:</strong><?php echo $one['comment']; ?></p>
							</div>
						</li>
						<?php }}?>
						</ul>
						<?php echo $pagestring; ?>
					</div>
                    <div class="head" id="post">
                        <h2>Raise a question</h2>
                    </div>
                    <div class="sect consult-form">
					<?php if(is_login()){?>
						<form id="consult-add-form" method="post" action="/ajax/team.php?action=ask&id=<?php echo $team['id']; ?>">
						<input type="hidden" id="parent_id" value="<?php echo $parent_id; ?>"/>
						<textarea class="f-textarea" cols="60" rows="5" name="content" id="consult-content"></textarea>
						<p class="commit">
							<input type="hidden" name="team_id" value="<?php echo $team['id']; ?>" />
							<input type="submit" value="Submit" name="commit" class="formbutton"/>
						</p>
						</form>
                        <div id="consult-add-succ" class="succ"><p>Submit successfuly,please wait for your helpdesk to handle it.</p><p><a href="/team.php?id=<?php echo $team['id']; ?>">Return</a>,or<a id="consult-add-more" href="javascript:void(0);">Any other questions?</a></p></div>
					<?php } else { ?>
						Please <a href="/account/login.php?r=<?php echo $currefer; ?>">Login</a>Or<a href="/account/signup.php">Register</a>then raise a quesiton
					<?php }?>
					</div>
                </div>
                <div class="box-bottom"></div>
            </div>
        </div>
        <div id="sidebar">
			<?php include template("block_side_invite");?>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
