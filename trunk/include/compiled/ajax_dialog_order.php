<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
	<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">Close</span></h3>
	<p class="info">Please pay on the new windos.</p>
	<p class="notice">Don't close this windows before payment finished.<br>After payment,please click below:</p>
	<p class="act"><input id="order-pay-dialog-succ" class="formbutton" value="Payment finished" type="submit" onclick="location.href=WEB_ROOT + '/order/pay.php?id=<?php echo $order_id; ?>';" />&nbsp;&nbsp;&nbsp;<input id="order-pay-dialog-fail" class="formbutton" value="Payment met problem" type="submit" onclick="location.href=WEB_ROOT + '/order/pay.php?id=<?php echo $order_id; ?>';" /></p>
	<p class="retry"><?php if($order_id=='charge'){?><a href="/credit/charge.php"><?php } else { ?><a href="/order/check.php?id=<?php echo $order_id; ?>"><?php }?>&raquo;Return choose others payment ways</a></p>
</div>
