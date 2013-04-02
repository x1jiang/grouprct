<?php include template("biz_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="biz">
    <div id="content" class="biz">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                                <div class="head"><h2>Merchant Login</h2></div>
                <div class="sect">
                    <form id="biz-user-form" method="post" action="/biz/login.php" class="validator">
                        <div class="field">
                            <label for="biz-login">Login name</label>
                            <input type="text" size="30" name="username" id="biz-username" class="f-input" datatype="require" require="true" />
                        </div>
                        <div class="field">
                            <label for="biz-password">Password</label>
                            <input type="password" size="30" name="password" id="biz-password" class="f-input" datatype="require" require="true" />
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
	</div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
