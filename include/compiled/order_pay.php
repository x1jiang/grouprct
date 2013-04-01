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
                    <h2>Total money :<strong class="total-money"><?php echo moneyit($total_money); ?></strong> dollars</h2>
                </div>
                <div class="sect">
                    <div style="text-align:left;">
<?php if($order['service']=='credit'){?>
<form id="order-pay-credit-form" method="post" sid="<?php echo $order_id; ?>">
	<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
	<input type="hidden" name="service" value="credit" />
	<input type="submit" class="formbutton gotopay" value="to to pay user remaining charge" />
</form>
<?php } else if($order['service']=='tenpay') { ?>
<form id="order-pay-form" method="post" sid="<?php echo $order_id; ?>" target="_blank">
	<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
	<input type="hidden" name="reqUrl" value="<?php echo $reqUrl; ?>" />
	<input type="hidden" name="action" value="redirect" />
	<input type="submit" class="formbutton" value="goto tenpay" />
</form>
<?php } else if($order['service']=='alipay') { ?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> 
<!-- Identify your business so that you can collect the payments. --> 
<input type="hidden" name="business" value="fenghaidongchina@gmail.com"> 
<!-- Specify a Buy Now button. --> 
<input type="hidden" name="cmd" value="_xclick"> 
<!-- Specify details about the item that buyers will purchase. --> 
<input type="hidden" name="item_name" value=<?php echo $team['title']; ?>>
<input type="hidden" name="item_number" value="Grouponstyle">
 
<input type="hidden" name="amount" value="<?php echo $total_money; ?>"> 
<input type="hidden" name="currency_code" value="USD"> 
<input type="hidden" name="return"     value= "http://www.taodyp.com/index.php"  > 
<input type="hidden" name="notify_url" value= "http://www.taodyp.com/myipn.php"  > 
<!-- Display the payment button. --> 
<input type="image" name="submit" border="0" 
src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" 
alt="PayPal - The safer, easier way to pay online"> 
<img alt="" border="0" width="1" height="1" 
src="https://www.paypal.com/en_US/i/scr/pixel.gif" > 
</form> 
<?php } else if($order['service']=='alipay') { ?>
<form id="order-pay-form" method="post" action="https://www.alipay.com/cooperate/gateway.do?_input_charset=<?php echo $_input_charset; ?>" target="_blank" sid="<?php echo $order['id']; ?>">
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
	<img src="/static/css/i/alipay.png" /><br /><input type="submit" class="formbutton gotopay" value="Goto Paypal to pay this product" />
</form>
<?php } else if($order['service']=='chinabank') { ?>
<form id="order-pay-form" method="post" action="https://pay3.chinabank.com.cn/PayGate" target="_blank" sid="<?php echo $order['id']; ?>">
	<input type="hidden" name="v_mid" value="<?php echo $v_mid; ?>" />
	<input type="hidden" name="v_oid" value="<?php echo $v_oid; ?>" />
	<input type="hidden" name="v_amount" value="<?php echo $total_money; ?>" />
	<input type="hidden" name="v_moneytype" value="<?php echo $v_moneytype; ?>" />
	<input type="hidden" name="v_url" value="<?php echo $v_url; ?>" />
	<input type="hidden" name="v_md5info" value="<?php echo $v_md5info; ?>" />
	<img src="/static/css/i/chinabank.png" /><br/><input type="submit" class="formbutton gotopay" value="goto chinabank" style="vertical-align:middle;"/>
</form>
<?php }?>
						<div class="back-to-check"><a href="/order/check.php?id=<?php echo $order_id; ?>">&raquo; Return choose other ways to pay</a></div>
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
