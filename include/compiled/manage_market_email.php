<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_market('index'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Email market promotion</h2></div>
                <div class="sect">
                    <form method="post" class="validator">
						<div class="field">
							<label>Email title</label>
							<input type="text" name="title" class="f-input" value="<?php echo $title; ?>" datatype="require" require="true"/>
						</div>
						<div class="field">
							<label>receving email emailbox</label>
							<textarea name="emails" style="width:700px;height:40px;" datatype="require" require="true"><?php echo htmlspecialchars($_POST['email']); ?></textarea>
							<span class="hint">Real name emailbox,at most 20,seperated by blank or , </span>
						</div>
						<div class="field">
							<label>Email content</label>
							<div style="float:left;"><textarea style="width:700px;height:450px;" class="editor" name="content"><?php echo htmlspecialchars($_POST['content']); ?></textarea></div>
						</div>
                        <div class="act">
                            <input type="submit" value="Send" name="commit" class="formbutton"/>
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
