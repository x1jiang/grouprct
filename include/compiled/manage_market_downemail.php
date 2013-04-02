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
					<h2>Email address</h2>
					<ul class="filter"><?php echo mcurrent_market_down('downemail'); ?></ul>
				</div>
                <div class="sect">
                    <form method="post" target="_blank">
                        <div class="field">
                            <label>City scope</label>
							<div style="padding-top:8px;"><?php if(is_array($hotcities)){foreach($hotcities AS $one) { ?><input type="checkbox" name="city_id[]" value="<?php echo $one['id']; ?>" checked />&nbsp;<?php echo $one['name']; ?>&nbsp;&nbsp;<?php }}?><input type="checkbox" name="city_id[]" value="0" checked>&nbsp;Others </div>
						</div>

                        <div class="field">
                            <label>Email origination</label>
							<div style="padding-top:8px;"><input type="checkbox" name="source[]" value="user" checked />&nbsp;RegisterUser &nbsp;&nbsp;<input type="checkbox" name="source[]" value="subscribe" checked>&nbsp;Email subscribe</div>
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
