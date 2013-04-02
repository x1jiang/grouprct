<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="recent-deals">
    <div id="content">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2><?php echo $city['name']; ?>Recent daily deal</h2></div>
				<div class="sect">
					<ul class="deals-list">
					<?php if(is_array($teams)){foreach($teams AS $index=>$one) { ?>
						<li class="<?php echo $index++%2?'alt':''; ?> <?php echo $index<=2?'first':''; ?>">
							<p class="time"><?php echo date('Y-n-j', $one['begin_time']); ?></p>
							<h4><a href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" target="_blank"><?php echo $one['title']; ?></a></h4>
							<div class="pic">
								<div class="<?php echo $one['picclass']; ?>"></div>
								<a href="/team.php?id=<?php echo $one['id']; ?>" title="<?php echo $one['title']; ?>" target="_blank"><img alt="<?php echo $one['title']; ?>" src="<?php echo team_image($one['image']); ?>" width="200" height="121"></a>
							</div>
							<div class="info"><p class="total"><strong class="count"><?php echo $one['now_number']; ?></strong>bought</p><p class="price">Retail Price:<strong class="old"><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['market_price']); ?></strong><br />Discount:<strong class="discount"><?php echo moneyit((10*$one['team_price']/$one['market_price'])); ?></strong><br />Our price:<strong><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['team_price']); ?></strong><br />Save:<strong><span class="money"><?php echo $currency; ?></span><?php echo moneyit($one['market_price']-$one['team_price']); ?></strong><br /></p></div>
						</li>
					<?php }}?>
					</ul>
					<div class="clear"></div>
					<div><?php echo $pagestring; ?></div>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
	<div id="sidebar">
		<?php include template("block_side_subscribe");?>
	</div>
</div>
    </div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
