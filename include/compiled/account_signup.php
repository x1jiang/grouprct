<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="signup">
    <div id="content" class="signup-box">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Register</h2><span>&nbsp;or<a href="/account/login.php">Login</a></span></div>
                <div class="sect">
                    <form id="signup-user-form" method="post" action="/account/signup.php" class="validator">
                        <div class="field email">
                            <label for="signup-email-address">Email</label>
                            <input type="text" size="30" name="email" id="signup-email-address" class="f-input" value="<?php echo $_POST['email']; ?>" require="true" datatype="email|ajax" url="<?php echo WEB_ROOT; ?>/ajax/validator.php" vname="signupemail" msg="|" />
                            <span class="f-input-tip">Please input valid Email</span> 
                            <span class="hint">for Login or find password back,NONPUBLIC</span>
                        </div>
                        <div class="field username">
                            <label for="signup-username">Username</label>
                            <input type="text" size="30" name="username" id="signup-username" class="f-input" value="<?php echo $_POST['username']; ?>" datatype="limit|ajax" require="true" min="2" max="16" maxLength="16" url="<?php echo WEB_ROOT; ?>/ajax/validator.php" vname="signupname" msg="|" />
                            <span class="hint">4-16 letters</span>
                        </div>
                        <div class="field password">
                            <label for="signup-password">Password</label>
                            <input type="password" size="30" name="password" id="signup-password" class="f-input" require="true" datatype="require" />
                            <span class="hint">at least 4 letters</span>
                        </div>
                        <div class="field password">
                            <label for="signup-password-confirm">re-type</label>
                            <input type="password" size="30" name="password2" id="signup-password-confirm" class="f-input" require="true" datatype="compare" compare="signup-password" />
                        </div>
                        <div class="field">
                            <label for="signup-password-confirm">Mobile</label>
                            <input type="text" size="30" name="mobile" id="signup-mobile" class="number" /><span class="inputtip">Mobile number is important way to contact you</span>
                        </div>
						<div class="field city">
                            <label id="enter-address-city-label" for="signup-city">City</label>
							<select name="city_id" class="f-city"><?php echo Utility::Option(Utility::OptionArray($hotcities, 'id', 'name'), $city['id']); ?><option value='0'>Others </option></select>
                        </div>
						 <div class="field subscribe">
                            <input tabindex="3" type="checkbox" value="1" name="subscribe" id="subscribe" class="f-check" checked="checked" />
                            <label for="subscribe">Subscribe news</label>
                        </div>
                        <div class="act">
                            <input type="submit" value="Register" name="commit" id="signup-submit" class="formbutton"/>
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
                    <h2>Has<?php echo $INI['system']['abbreviation']; ?>account?</h2>
                    <p> <a href="/account/login.php">Login</a></p>
                </div>
            </div>
            <div class="sbox-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
