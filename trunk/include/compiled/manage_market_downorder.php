<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_market('down'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>OrderDownload</h2>
					<ul class="filter"><?php echo mcurrent_market_down('downorder'); ?></ul>
				</div>
                <div class="sect">
                    <form method="post" target="_blank" class="validator">
                        <div class="field">
                            <label>Daily deal item </label>
							<input type="text" name="team_id" require="true" datatype="number" class="number" /><span class="inputtip">Please input Daily deal item's ID</span>
						</div>

                        <div class="field">
                            <label>payment Status</label>
							<div style="padding-top:8px;"><input type="checkbox" name="state[]" value="pay" checked />&nbsp;paid&nbsp;&nbsp;<input type="checkbox" name="state[]" value="unpay" checked>&nbsp;unpay</div>
						</div>

                        <div class="field">
                            <label>payment ways</label>
							<div style="padding-top:8px;"><input type="checkbox" name="service[]" value="alipay" checked />&nbsp;alipay&nbsp;&nbsp;<input type="checkbox" name="service[]" value="tenpay" checked />&nbsp;tenpay&nbsp;&nbsp;<input type="checkbox" name="service[]" value="chinabank" checked />&nbsp;chinabank&nbsp;&nbsp;<input type="checkbox" name="service[]" value="cash" checked />&nbsp;cash&nbsp;&nbsp;<input type="checkbox" name="service[]" value="credit" checked>&nbsp;Remaining pay</div>
						</div>

                        <div class="act">
                            <input type="submit" value="Download" name="commit" class="formbutton"/>
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
