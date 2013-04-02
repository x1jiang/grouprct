<?php include template("header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="login">
    <div id="content" class="login-box">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Login</h2><span>&nbsp;or <a href="/account/signup.php">Register</a></span></div>
                <div class="sect">
                    <form id="login-user-form" method="post" action="/account/login.php" class="validator">
                        <div class="field email">
                            <label for="login-email-address">Email/Username</label>
                            <input type="text" size="30" name="email" id="login-email-address" class="f-input" value="" require="true" datatype="require|limit" min="2" />
                        </div>
                        <div class="field password">
                            <label for="login-password">Password</label>
                            <input type="password" size="30" name="password" id="login-password" class="f-input" require="true" datatype="require" />
                            <span class="lostpassword"><a href="/account/repass.php">Forget Password?</a></span> 
                        </div>
                        <div class="field autologin">
                            <input type="checkbox" value="1" name="auto-login" id="autologin" class="f-check" checked />
                            <label for="autologin">Remember me</label>
                        </div>
                        <div class="act">
                            <input type="submit" value="Login" name="commit" id="login-submit" class="formbutton"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
    <div id="sidebar">
        <div class="sbox">
            <div class="sbox-top"></div>
            <div class="sbox-content">
                <div class="side-tip">
                    <h2>No <?php echo $INI['system']['abbreviation']; ?> acouunt?</h2>
                    <p><a href="/account/signup.php">Register</a></p>
                </div>
            </div>
            <div class="sbox-bottom"></div>
        </div>
    </div>
</div>
    </div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
