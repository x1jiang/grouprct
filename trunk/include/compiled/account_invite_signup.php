<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="referrals">
    <div id="content">
        <div class="box clear">
                    <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Invite to get bonus</h2></div>
                <div class="sect">
                <p class="intro">When friends receive your invitation,on <?php echo $INI['system']['sitename']; ?> firstly  buy successfuly,system will return <?php echo $INI['system']['invitecredit']; ?> Dollars to your <?php echo $INI['system']['sitename']; ?>account,you can pay when doing Daily deal ,no limit,invite more,gain more.</p>
                            <p class="login"> <a href="/account/login.php?r=<?php echo $currefer; ?>">Login</a> or <a href="/account/signup.php">Register</a>, get your invitation link.</p>
        				                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
    <div id="sidebar">
		<?php include template("block_side_invitetip");?>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
