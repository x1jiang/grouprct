<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="reset">
    <div id="content">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Reset password</h2></div>
                <div class="sect">
				<?php if($_POST){?>
				<?php } else { ?>
					<form method="post" action="/account/repass.php">
                    <div class="field email">
                        <label class="f-label" for="reset-email">Email</label>
                        <input type="text" name="email" class="f-input" id="reset-email" value="" />
                        <span class="hint">your Email address for login</span>
                    </div>
                    <div class="act">
                        <input type="submit" class="formbutton" value="ResetPassword" />
                    </div>
                    </form>
				</div>
				<?php }?>
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
