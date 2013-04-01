<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('pay'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Payment ways</h2></div>
                <div class="sect">
                    <form method="post">
					<!-- Alipay -->
						<div class="wholetip clear"><h3>1,alipay</h3></div>
                        <div class="field">
                            <label>Merchant ID number </label>
                            <input type="text" size="30" name="alipay[mid]" class="f-input" value="<?php echo $INI['alipay']['mid']; ?>"/>
                        </div>
                        <div class="field">
                            <label>transaction key</label>
                            <input type="text" size="30" name="alipay[sec]" class="f-input" value="<?php echo $INI['alipay']['sec']; ?>"/>
                        </div>
                        <div class="field">
                            <label>Alipay emailbox</label>
                            <input type="text" size="30" name="alipay[acc]" class="f-input" value="<?php echo $INI['alipay']['acc']; ?>"/>
                        </div>

					<!-- Chinabank -->
						<div class="wholetip clear"><h3>2,bankpay</h3></div>
                        <div class="field">
                            <label>MerchantID</label>
                            <input type="text" size="30" name="chinabank[mid]" class="f-input" value="<?php echo $INI['chinabank']['mid']; ?>"/>
                        </div>
                        <div class="field">
                            <label>key</label>
                            <input type="text" size="30" name="chinabank[sec]" class="f-input" value="<?php echo $INI['chinabank']['sec']; ?>"/>
                        </div>

					<!-- Tenpay -->
						<div class="wholetip clear"><h3>3,tenpay</h3></div>
                        <div class="field">
                            <label>Merchant ID </label>
                            <input type="text" size="30" name="tenpay[mid]" class="f-input" value="<?php echo $INI['tenpay']['mid']; ?>"/>
                        </div>
                        <div class="field">
                            <label>key</label>
                            <input type="text" size="30" name="tenpay[sec]" class="f-input" value="<?php echo $INI['tenpay']['sec']; ?>"/>
                        </div>

						
					<!-- other -->
						<div class="wholetip clear"><h3>4,Others  </h3></div>
                        <div class="field">
                            <label>information</label>
                            <div style="float:left;"><textarea cols="45" rows="5" name="other[pay]" class="f-textarea editor"><?php echo htmlspecialchars($INI['other']['pay']); ?></textarea></div>
                        </div>

                        <div class="act">
                            <input type="submit" value="Save" name="commit" class="formbutton"/>
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
