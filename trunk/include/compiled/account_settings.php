<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="settings">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_account('/account/settings.php'); ?></ul>
	</div>
    <div id="content" class="clear settings-box">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Account settings</h2></div>
                <div class="sect">
                    <form id="settings-form" method="post" action="/account/settings.php" enctype="multipart/form-data" class="validator">
						<div class="wholetip clear"><h3>Basic Information</h3></div>
                        <div class="field email">
                            <label>Email</label>
                            <input type="text" size="30" name="email" id="settings-email-address" class="f-input readonly" readonly="readonly" value="<?php echo $login_user['email']; ?>" />
                        </div>
                        <div class="field">
                            <label>Photo</label>
							<?php if($login_user['avatar']){?>
							<img src="<?php echo user_image($login_user['avatar']); ?>" style="float:left;margin-top:-10px;margin-right:10px;"/>
							<?php }?>
                            <input type="file" size="30" name="upload_image" id="settings-avatar" class="f-input" />
                            <span class="hint">Please upload your photo in 512k</span>
                        </div>
                        <div class="field username">
                            <label>Username</label>
                            <input type="text" size="30" name="username" id="settings-username" class="f-input" value="<?php echo $login_user['username']; ?>" require="true" datatype="limit" min="2" max="16" maxLength="16"/>
                        </div>
                        <div class="field password">
                            <label>New password</label>
                            <input type="password" size="30" name="password" id="settings-password" class="f-input" />
                            <span class="hint">if not modify password,please keep blank</span>
                        </div>
                        <div class="field password">
                            <label>re-type password</label>
                            <input type="password" size="30" name="password2" id="settings-password-confirm" class="f-input" />
                        </div>
                        <div class="field password">
                            <label>Gendre</label>
							<select name="gender" class="f-city"><?php echo Utility::Option($option_gender, $login_user['gender']); ?></select>
                        </div>
						<div class="wholetip clear"><h3>Additional Information</h3></div>
                        <div class="field mobile">
                            <label>Mobile</label>
                            <input type="text" size="30" name="mobile" id="settings-mobile" class="number" value="<?php echo $login_user['mobile']; ?>" /><span class="inputtip">Mobile number is the important way that we contact you.</span>
                        </div>
                        <div class="field password">
                            <label>Home phone</label>
                            <input type="text" size="30" name="qq" id="settings-qq" class="number" value="<?php echo $login_user['qq']; ?>" />
                        </div>
                        <div class="field username">
                            <label>Full Name</label>
                            <input type="text" size="30" name="realname" id="settings-realname" class="f-input" value="<?php echo $login_user['realname']; ?>" />
                        </div>
                        <div class="field username">
                            <label>Address</label>
                            <input type="text" size="30" name="address" id="settings-address" class="f-input" value="<?php echo $login_user['address']; ?>" />
                            <span class="hint">Please fill it completely</span>
                        </div>
                        <div class="field city">
                            <label>City</label>
                            <select name="city_id" class="f-city"><?php echo Utility::Option(Utility::OptionArray($hotcities, 'id', 'name'), $login_user['city_id']); ?><option value='0'>Others </option></select>
                        </div>
                        <div class="field">
                            <label>Zip code </label>
                            <input type="text" maxLength=6 size="10" name="zipcode" id="settings-zipcode" class="f-input number" value="<?php echo $login_user['zipcode']; ?>" />
                        </div>
                        <div class="clear"></div>
                        <div class="act">
                            <input type="submit" value="Modiy" name="commit" id="settings-submit" class="formbutton"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
    <div id="sidebar" class="rail">
		<?php include template("block_side_credit");?>
		<?php include template("block_side_credittip");?>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
