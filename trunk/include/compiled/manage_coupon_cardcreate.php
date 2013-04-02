<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_coupon('cardcreate'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>create Coupon </h2>
				</div>
                <div class="sect">
                    <form id="login-user-form" method="post" class="validator">
					<input type="hidden" name="id" value="<?php echo $card['id']; ?>" />
                        <div class="field">
                            <label>Merchant ID</label>
                            <input type="text" size="30" name="partner_id" id="card-create-partner" class="number" value="<?php echo abs(intval($card['partner_id'])); ?>" require="true" datatype="number" /><span class="inputtip">Merchant ID can be  copied from Merchant menu</span>
							<span class="hint">0 means it's univeral to all Merchant </span>
                        </div>
                        <div class="field">
                            <label>Coupon denomination</label>
                            <input type="text" size="30" name="money" id="card-create-money" class="number" value="<?php echo $card['money']; ?>" datatype="number" require="true" /><span class="inputtip">denomination :Dollars CNY\Dollars )</span>
                        </div>
                        <div class="field">
                            <label>Quantity</label>
                            <input type="text" size="30" name="quantity" id="card-create-quantity" class="number" value="<?php echo abs(intval($card['quantity'])); ?>" datatype="number" require="true" /><span class="inputtip">at most 1000,can repeat</span>
                        </div>
                        <div class="field">
                            <label>Begin time</label>
                            <input type="text" size="30" name="begin_time" id="card-create-begintine" class="number" value="<?php echo date('Y-m-d', $card['begin_time']); ?>" datatype="date" require="true" />
						</div>
                        <div class="field">
                            <label>End time</label>
                            <input type="text" size="30" name="end_time" id="card-create-endtime" class="number" value="<?php echo date('Y-m-d', $card['end_time']); ?>" datatype="date" require="true" />
						</div>
                        <div class="field">
                            <label>action id(code)</label>
                            <input type="text" size="30" name="code" id="card-create-code" class="number" value="<?php echo $card['code']; ?>" datatype="require" require="true" /><span class="inputtip">just a code,can be used to archive,accumulate,view to Coupon</span>
                        </div>
                        <div class="act">
                            <input type="submit" value="Edit " name="commit" id="partner-submit" class="formbutton"/>
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

<?php include template("manage_footer");?>
