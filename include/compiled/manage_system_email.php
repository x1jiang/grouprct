<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('email'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Email settings</h2></div>
                <div class="sect">
                    <form method="post">
						<div class="wholetip clear"><h3>1,sending email setting</h3></div>
						<div class="field">
							<label>sending way</label>
							<div style="margin-top:5px;" id="mail-zone-div"><input type="radio" name="mail[mail]" value="smtp" <?php echo $INI['mail']['mail']!='mail'?'checked':''; ?> />&nbsp;SMTP sending &nbsp;<input type="radio" name="mail[mail]" value='mail' <?php echo $INI['mail']['mail']=='mail'?'checked':''; ?> />&nbsp;PHP self's MAIL&nbsp;</div>
						</div>
						<div id="mail-zone-smtp" style="display:<?php echo $INI['mail']['mail']!='mail'?'block':'none'; ?>;">
                        <div class="field">
                            <label>SMTP address</label>
                            <input type="text" size="30" name="mail[host]" class="f-input" value="<?php echo $INI['mail']['host']; ?>"/>
                        </div>
                        <div class="field">
                            <label>SMTP port</label>
                            <input type="text" size="30" name="mail[port]" class="number" value="<?php echo $INI['mail']['port']; ?>"/>
                        </div>
                        <div class="field">
                            <label>SSL way?</label>
                            <input type="text" size="30" name="mail[ssl]" class="number" value="<?php echo $INI['mail']['ssl']; ?>"/>
                            <span class="inputtip">false, ssl, tls</span>
                        </div>
                        <div class="field">
                            <label>Verification Username</label>
                            <input type="text" size="30" name="mail[user]" class="f-input" value="<?php echo $INI['mail']['user']; ?>"/>
                        </div>
                        <div class="field">
                            <label>Verification Password</label>
                            <input type="text" size="30" name="mail[pass]" class="f-input" value="<?php echo $INI['mail']['pass']; ?>"/>
                        </div>
						</div>
                        <div class="field">
                            <label>sending email address</label>
                            <input type="text" size="30" name="mail[from]" class="f-input" value="<?php echo $INI['mail']['from']; ?>"/>
                            <span class="inputtip">sending Email address</span>
                        </div>
                        <div class="field">
                            <label>receiving email address</label>
                            <input type="text" size="30" name="mail[reply]" class="f-input" value="<?php echo $INI['mail']['reply']; ?>"/>
                            <span class="inputtip">receiving email Email address</span>
                        </div>

						<div class="wholetip clear"><h3>2,Subscribe setting(sending Email subscribe notification)</h3></div>
                        <div class="field">
                            <label>Phone number</label>
                            <input type="text" size="30" name="subscribe[helpphone]" class="f-input" value="<?php echo $INI['subscribe']['helpphone']; ?>"/>
                        </div>
                        <div class="field">
                            <label>contact Email</label>
                            <input type="text" size="30" name="subscribe[helpemail]" class="f-input" value="<?php echo $INI['subscribe']['helpemail']; ?>"/>
                        </div>

                        <div class="act">
                            <input type="submit" value="Save" name="commit" class="formbutton"/>
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
