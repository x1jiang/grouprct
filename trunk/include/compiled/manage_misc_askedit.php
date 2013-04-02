<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="misc">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('misc'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                  <h2>Reply</h2><span class="headtip"><?php echo $user['username']; ?>about(<a href="/team.php?id=<?php echo $team['id']; ?>" target="_blank"><?php echo $team['title']; ?></a>)'s query</span></div>
                <div class="sect">
                    <form id="login-user-form" method="post" action="/manage/misc/askedit.php?id=<?php echo $ask['id']; ?>">
						<input type="hidden" name="id" value="<?php echo $ask['id']; ?>" />
                        <div class="field">
                            <label>Query problem</label>
                            <textarea cols="45" rows="5" name="content" id="team-ask-content" class="f-textarea"><?php echo htmlspecialchars($ask['content']); ?></textarea>
                        </div>
                        <div class="field">
                            <label>Reply content</label>
                            <textarea cols="45" rows="5" name="comment" id="team-ask-comment" class="f-textarea"><?php echo htmlspecialchars($ask['comment']); ?></textarea>
                        </div>
                        <div class="act">
                            <input type="submit" value="Edit " name="commit" id="misc-submit" class="formbutton"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
