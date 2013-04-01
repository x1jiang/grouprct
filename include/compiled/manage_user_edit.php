<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="user">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_user(null); ?><li class="current"><a href="/manage/user/edit.php?id=<?php echo $user['id']; ?>">Edit User </a><span></span></li></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Edit User </h2><b style="margin-left:20px;font-size:16px;">(<?php echo $user['email']; ?>/<?php echo $user['username']; ?>)</b></div>
                <div class="sect">
                    <form id="login-user-form" method="post" action="/manage/user/edit.php?id=<?php echo $user['id']; ?>">
					<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
						<div class="wholetip clear"><h3>1,identification</h3></div>
                        <div class="field">
                            <label>User Email</label>
                            <input type="text" size="30" name="email" id="user-edit-email" class="f-input" value="<?php echo $user['email']; ?>" readonly />
						</div>
						<div class="field">
                            <label>Username</label>
                            <input type="text" size="30" name="username" id="user-edit-username" class="f-input" value="<?php echo $user['username']; ?>" readonly />
                        </div>
						<div class="field">
                            <label>Real Name</label>
                            <input type="text" size="30" name="realname" id="user-edit-realname" class="f-input" value="<?php echo $user['realname']; ?>" />
                        </div>
						<div class="field">
                            <label>QQ Number</label>
                            <input type="text" size="30" name="qq" id="user-edit-qq" class="number" value="<?php echo $user['qq']; ?>" />
                        </div>
                        <div class="field password">
                            <label>Login Password</label>
                            <input type="text" size="30" name="password" id="settings-password" class="f-input" />
                            <span class="hint">if don't want to modiy Password,Keep blank</span>
                        </div>
						<div class="wholetip clear"><h3>2,basic info</h3></div>
                        <div class="field">
                            <label>Zip code </label>
                            <input type="text" size="30" name="zipcode" id="user-edit-zipcode" class="f-input" value="<?php echo $user['zipcode']; ?>"/>
                        </div>
                        <div class="field">
                            <label>Delivery address</label>
                            <input type="text" size="30" name="address" id="user-edit-address" class="f-input" value="<?php echo $user['address']; ?>"/>
						</div>
                        <div class="field">
                            <label>Mobile number</label>
                            <input type="text" size="30" name="mobile" id="user-edit-mobile" class="number" value="<?php echo $user['mobile']; ?>" maxLength="11" />
						</div>
						<div class="wholetip clear"><h3>3.Other info</h3></div>
                        <div class="field">
                            <label>EmailVerification </label>
                            <input type="text" size="30" name="secret" id="user-edit-secret" class="f-input" value="<?php echo $user['secret']; ?>"/>
                            <span class="hint">After verification ,please keep it blank</span>
                        </div>
						<?php if($login_user_id==1){?>
                        <div class="field">
                            <label>Manager</label>
                            <input type="text" size="30" name="manager" id="user-edit-manager" class="number" value="<?php echo $user['manager']; ?>" maxLength="1" require="true" datatype="require" style="text-transform:uppercase;" /><span class="inputtip">Y:Yes N:No</span>
						</div>
						<?php }?>
                        <div class="act">
                            <input type="submit" value="Edit " name="commit" id="user-submit" class="formbutton"/>
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
