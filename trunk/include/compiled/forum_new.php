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
                    <h2>Publish new topic</h2>
				</div>
                <div class="sect">
                    <form id="forum-new-form" method="post" class="validator">
                        <div class="field">
                            <label>Area</label>
							<select name='category' style="margin-top:3px;">
							<optgroup label="Local area">
								<option value="city"><?php echo $city['name']; ?>Area</option>
							</optgroup>
							<optgroup label="Public area">
								<?php echo Utility::Option($publics, $id); ?>
							</optgroup>
							</select>
                        </div>
						<div class="field">
							<label>Title</label>
							<input type="text" size="10" name="title" id="team-create-style" class="f-input" value="<?php echo htmlspecialchars($topic['title']); ?>" datatype="require" require="true" />
						</div>
						<div class="field">
							<label>Content</label>
							<textarea style="width:480px;height:240px;" name="content" id="forum-new-content" class="f-textarea" datatype="require" require="true"><?php echo htmlspecialchars($topic['content']); ?></textarea>
						</div>
						<div class="act">
                            <input type="submit" value="Submit" name="commit" id="leader-submit" class="formbutton"/>
                        </div>
                    </form>
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
