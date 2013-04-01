<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="bb5c110b0512ff89999a055118a84509">
<head>
	<meta http-equiv=content-type content="text/html; charset=UTF-8">
	<title>Install</title>
	<link rel="shortcut icon" href="static/icon/favicon.ico" />
	<link rel="stylesheet" href="static/css/index.css" type="text/css" media="screen" charset="utf-8" />
	<script src="static/js/index.js" type="text/javascript"></script>
</head>
<body class="newbie">
<div id="pagemasker"></div><div id="dialog"></div>
<div id="doc">

<div id="hdw">
	<div id="hd">
		<div id="logo"><a href="index.php" class="link"><img src="static/css/i/logo.gif" /></a></div>
		<div class="guides">
			<div class="city">
				<h2>software install</h2>
			</div>
		</div>
		<ul class="nav cf"><li class="current"><a href="install.php">Install</a></li></ul>
				<div class="logins">
			<ul id="account">
				<li class="username">Welcome</li>
			</ul>
			<div class="line islogin"></div>
		</div>
			</div>
</div>

<?php if($session_notice=Session::Get('notice',true)){?>
<div class="sysmsgw" id="sysmsg-success"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">Close</span></div></div> 
<?php }?>
<?php if($session_notice=Session::Get('error',true)){?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg"><p><?php echo $session_notice; ?></p><span class="close">Close</span></div></div> 
<?php }?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Insall</h2></div>
                <div class="sect">
                    <form id="login-user-form" method="post" action="install.php">
					<input type="hidden" name="id" value="100027" />
						<div class="wholetip clear"><h3>1,database info</h3></div>
                        <div class="field">
                            <label>host</label>
                            <input type="text" size="30" name="db[host]" id="partner-create-username" class="f-input" value="<?php echo $db['host']; ?>" />
                        </div>
                        <div class="field">
                            <label>Username</label>
                            <input type="text" size="30" name="db[user]" id="settings-password" class="f-input" value="<?php echo $db['user']; ?>" />
                        </div>
                        <div class="field password">
                            <label>Password</label>
                            <input type="text" size="30" name="db[pass]" id="settings-password" class="f-input" value="<?php echo $db['pass']; ?>" />
                        </div>
                        <div class="field password">
                            <label>database name</label>
                            <input type="text" size="30" name="db[name]" id="settings-password-confirm" class="f-input" value="<?php echo $db['name']; ?>" />
                        </div>

						<div class="wholetip clear"><h3>2,directory settings</h3></div>
						<div style="margin:20px; line-height:20px;">
							<h4>Make sure such belows writeable</h4>
							<ul>
							<li>Directory:include/configure/ ---------------- <b><?php echo !is_writable('include/configure') ? '<font color="red">Not writeable</font>':'<font color="green">writeable</font>'; ?></b></li>
							<li>Directory:include/data/ ---------------- <b><?php echo !is_writable('./include/data') ? '<font color="red">Not writeable</font>':'<font color="green">writeable</font>'; ?></b></li>
							<li>Directory:static/team/ ---------------- <b><?php echo !is_writable('./static/team') ? '<font color="red">Not writeable</font>':'<font color="green">writeable</font>'; ?></b></li>
							<li>Directory:static/user/ ---------------- <b><?php echo !is_writable('./static/user') ? '<font color="red">Not writeable</font>':'<font color="green">writeable</font>'; ?></b></li>
							</ul>
						</div>
                        <div class="act">
                            <input type="submit" value="install" name="commit" id="partner-submit" class="formbutton"/>
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

<div id="ftw">
  <div id="ft"></div>
</div>
</div>
</body>
</html>
