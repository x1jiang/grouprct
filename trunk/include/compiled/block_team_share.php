<div id="deal-share">
	<div class="deal-share-top">
		<div class="deal-share-links">
			<h4>Share to:</h4>
			<ul class="cf"><li><a class="im" href="javascript:void(0);" id="deal-share-im">MSN/QQ</a></li><li><a class="kaixin" href="<?php echo share_kaixin($team); ?>" target="_blank">Kaixin</a></li><li><a class="renren" href="<?php echo share_renren($team); ?>" target="_blank">人人</a></li><li><a class="douban" href="<?php echo share_douban($team); ?>" target="_blank">douban</a></li><li><a class="sina" href="<?php echo share_sina($team); ?>" target="_blank">sina</a></li><li><a class="email" href="<?php echo share_mail($team); ?>" id="deal-buy-mailto">Email</a></li></ul>
		</div>
	</div>
	<div class="deal-share-fix"></div>
	<div id="deal-share-im-c">
		<div class="deal-share-im-b">
			<h3>Copy it and sent through MSN or ICQ,thanks.</h3>
			<p><input id="share-copy-text" type="text" value="<?php echo $INI['system']['wwwprefix']; ?>/team.php?id=<?php echo $team['id']; ?>&r=<?php echo $login_user_id; ?>" size="30" class="f-input" tip="复制成功,请粘贴到Your MSN或QQ上推荐给Your 好友"/> <input id="share-copy-button" type="button" value="copy" class="formbutton" /></p>
		</div>
	</div>
</div>
