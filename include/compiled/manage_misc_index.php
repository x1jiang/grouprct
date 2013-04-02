<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="help">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_misc('index'); ?></ul>
	</div>
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Homepage(Group buy_<?php echo SYS_VERSION; ?>)</h2>
				</div>
                <div class="sect">
					<div class="wholetip clear"><h3>datas</h3></div>
					<div style="margin:0 20px;">
						<p>today members：<?php echo $user_today_count; ?></p>
						<p>today orders：<?php echo $order_today_count; ?></p>
					</div>
					<div class="wholetip clear"><h3>data</h3></div>
					<div style="margin:0 20px;">
						<p>items：<?php echo $team_count; ?></p>
						<p>members：<?php echo $user_count; ?></p>
						<p>orders：<?php echo $order_count; ?></p>
						<p>subscribes：<?php echo $subscribe_count; ?></p>
					</div>
				</div>
			</div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
