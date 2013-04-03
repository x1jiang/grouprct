<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="referrals">
    <div id="content" class="refers">
        <div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Invite Friends and get a reward</h2></div>
                <div class="sect islogin">
					<?php if($money){?>
					<p class="notice-total">You have successfully invited <strong><?php echo $count; ?></strong> ,totally get <strong><span class="money"><?php echo $currency; ?></span><?php echo $count*$INI['system']['invitecredit']; ?></strong> Coupon,<a href="/account/refer.php">check successful list</a>.</p>
					<?php }?>
					<p class="intro">When your friends get Your invitation,and joined research projects listed in <?php echo $INI['system']['sitename']; ?>, our system will send you an $10 Starbucks card in 24 hours <?php echo $INI['system']['invitecredit']; ?> to Your <?php echo $INI['system']['sitename']; ?>account..</p>
					<div class="share-links">
						<ul class="share-list cf">
							<li class="site">
								<a class="logo" href="javascript:void 0" id="referrals-share-others-link"><img src="/static/css/i/logo_msn.png" /></a>
								<p class="im">This is your invitation link, please share it to your friends: <input id="share-copy-text" type="text" value="<?php echo $INI['system']['wwwprefix']; ?>/r.php?r=<?php echo $login_user_id; ?>" size="35" class="f-input" onfocus="this.select()" /></p>
							</li>
						</ul>

					</div>
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
