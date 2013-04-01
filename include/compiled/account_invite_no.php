<?php include template("header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="referrals">
    <div id="content" class="refers">
        <div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Invite to get bonus</h2></div>
                <div class="sect islogin">
					<?php if($money){?>
					<p class="notice-total">You have succssfully invited <strong><?php echo $count; ?></strong> persons,totaly gain <strong><span class="money"><?php echo $currency; ?></span><?php echo $count*$INI['system']['invitecredit']; ?></strong> Coupon,<a href="/account/refer.php">view successful list</a>.</p>
					<?php }?>
					<div class="share-links">
                    <ul class="share-list cf">
                        <li class="site">
                            <a class="logo" href="javascript:void 0" id="referrals-share-others-link"><img src="<?php echo $INI['system']['wwwprefix']; ?>/static/css/i/logo_msn.png" /></a>
                            <p class="im">this is your invitation link,send to your friend via MSN,OICQ,SKYP,EMAIL:
                                <input id="share-copy-text" type="text" value="<?php echo $INI['system']['wwwprefix']; ?>/r.php?r=<?php echo $login_user_id; ?>" size="35" class="f-input" onfocus="this.select()" />
                            </p>
                        </li>
                    </ul>
					<div class="nodeal cf">
					<!-- 	<ul class="share-list">
							<li><a class="logo" href="<?php echo share_kaixin($team); ?>" target="_blank" title="开心网好友点击链接并购买,您可获 <?php echo $INI['system']['invitecredit']; ?> Dollars Coupon"><img src="/static/css/i/logo_kaixin.gif" /></a><p class="link"><a href="<?php echo share_kaixin($team); ?>" target="_blank" title="开心网好友点击链接并购买,您可获 <?php echo $INI['system']['invitecredit']; ?> Dollars Coupon">分享到开心网</a></p></li>
							<li><a class="logo" href="<?php echo share_renren($team); ?>" target="_blank" title="人人网好友点击链接并购买,您可获 <?php echo $INI['system']['invitecredit']; ?> Dollars Coupon"><img src="/static/css/i/logo_renren.png" /></a><p class="link"><a href="<?php echo share_renren($team); ?>" target="_blank" title="人人网好友点击链接并购买,您可获 <?php echo $INI['system']['invitecredit']; ?> Dollars Coupon">分享到人人网</a></p></li>
							<li><a class="logo" href="<?php echo share_sina($team); ?>" target="_blank" title="关注者点击链接并购买,您可获 <?php echo $INI['system']['invitecredit']; ?> Dollars Coupon"><img src="/static/css/i/logo_sina.png" /></a><p class="link"><a href="<?php echo share_sina($team); ?>" target="_blank" title="关注者点击链接并购买,您可获 <?php echo $INI['system']['invitecredit']; ?> Dollars Coupon">分享到新浪微博</a></p></li>
							<li><a class="logo" href="<?php echo share_douban($team); ?>" target="_blank" title="豆瓣网友点击链接并购买,您可获 <?php echo $INI['system']['invitecredit']; ?> Dollars Coupon"><img src="/static/css/i/logo_douban.gif" /></a><p class="link"><a href="<?php echo share_douban($team); ?>" target="_blank" title="豆瓣网友点击链接并购买,您可获 <?php echo $INI['system']['invitecredit']; ?> Dollars Coupon">分享到豆瓣</a></p></li>
							<li><a class="logo" href="<?php echo share_mail($team); ?>" target="_blank" title="好友点击链接并购买,您可获 <?php echo $INI['system']['invitecredit']; ?> Dollars Coupon"><img src="/static/css/i/logo_email.gif" /></a><p class="link"><a href="<?php echo share_mail($team); ?>" target="_blank" title="好友点击链接并购买,您可获 <?php echo $INI['system']['invitecredit']; ?> Dollars Coupon">通过Email发给好友</a></p></li>
						</ul> 
						 -->
						</div>
					</div>
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
