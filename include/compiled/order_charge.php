<?php include template("header");?>
<?php if(is_get()){?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg"><p>This Order has not finished payment,please repay</p><span class="close">Close</span></div></div>
<?php }?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="order-pay">
    <div id="content">
        <div id="deal-buy" class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Charge amount:<strong class="total-money"><?php echo moneyit($total_money); ?></strong> dollars</h2>
                </div>
                <div class="sect">
                    <div style="text-align:left;">
<?php if($order['service']=='tenpay'){?>
<form id="order-pay-form" method="post" target="_blank" sid="charge">
	<input type="hidden" name="reqUrl" value="<?php echo $reqUrl; ?>" />
	<input type="hidden" name="action" value="redirect" />
	<input type="submit" class="formbutton" value="前往财付通付款" />
</form>
<?php } else if($order['service']=='alipay') { ?>
<form id="order-pay-form" method="post" action="https://www.alipay.com/cooperate/gateway.do?_input_charset=<?php echo $_input_charset; ?>" target="_blank" sid="charge">
	<input type="hidden" name="body" value="<?php echo $body; ?>" />
	<input type="hidden" name="notify_url" value="<?php echo $notify_url; ?>" />
	<input type="hidden" name="out_trade_no" value="<?php echo $out_trade_no; ?>" />
	<input type="hidden" name="partner" value="<?php echo $partner; ?>" />
	<input type="hidden" name="payment_type" value="1" />
	<input type="hidden" name="return_url" value="<?php echo $return_url; ?>" />
	<input type="hidden" name="seller_email" value="<?php echo $seller_email; ?>" />
	<input type="hidden" name="service" value="<?php echo $service; ?>" />
	<input type="hidden" name="show_url" value="<?php echo $show_url; ?>" />
	<input type="hidden" name="subject" value="<?php echo $subject; ?>" />
	<input type="hidden" name="total_fee" value="<?php echo $total_money; ?>" />
	<input type="hidden" name="sign_type" value="<?php echo $sign_type; ?>" />
	<input type="hidden" name="sign" value="<?php echo $sign; ?>" />
	<img src="/static/css/i/alipay.png" /><br /><input type="submit" class="formbutton gotopay" value="前往支付宝支付" />
</form>
<?php } else if($order['service']=='alipay') { ?>
<form id="order-pay-form" method="post" action="https://www.alipay.com/cooperate/gateway.do?_input_charset=<?php echo $_input_charset; ?>" target="_blank" sid="charge">
	<input type="hidden" name="body" value="<?php echo $body; ?>" />
	<input type="hidden" name="notify_url" value="<?php echo $notify_url; ?>" />
	<input type="hidden" name="out_trade_no" value="<?php echo $out_trade_no; ?>" />
	<input type="hidden" name="partner" value="<?php echo $partner; ?>" />
	<input type="hidden" name="payment_type" value="1" />
	<input type="hidden" name="return_url" value="<?php echo $return_url; ?>" />
	<input type="hidden" name="seller_email" value="<?php echo $seller_email; ?>" />
	<input type="hidden" name="service" value="<?php echo $service; ?>" />
	<input type="hidden" name="show_url" value="<?php echo $show_url; ?>" />
	<input type="hidden" name="subject" value="<?php echo $subject; ?>" />
	<input type="hidden" name="total_fee" value="<?php echo $total_money; ?>" />
	<input type="hidden" name="sign_type" value="<?php echo $sign_type; ?>" />
	<input type="hidden" name="sign" value="<?php echo $sign; ?>" />
	<img src="/static/css/i/alipay.png" /><br /><input type="submit" class="formbutton gotopay" value="前往支付宝支付" />
</form>
<?php } else if($order['service']=='chinabank') { ?>
<form id="order-pay-form" method="post" action="https://pay3.chinabank.com.cn/PayGate" target="_blank" sid="charge">
	<input type="hidden" name="v_mid" value="<?php echo $v_mid; ?>" />
	<input type="hidden" name="v_oid" value="<?php echo $v_oid; ?>" />
	<input type="hidden" name="v_amount" value="<?php echo $total_money; ?>" />
	<input type="hidden" name="v_moneytype" value="<?php echo $v_moneytype; ?>" />
	<input type="hidden" name="v_url" value="<?php echo $v_url; ?>" />
	<input type="hidden" name="v_md5info" value="<?php echo $v_md5info; ?>" />
	<img src="/static/css/i/chinabank.png" /><br/><input type="submit" class="formbutton gotopay" value="前往网银在线支付" style="vertical-align:middle;"/>
</form>
<?php }?>
						<div class="back-to-check"><a href="/credit/charge.php?money=<?php echo $total_money; ?>">&raquo; Return choose other payment ways</a></div>
                    </div>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
