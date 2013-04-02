<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="content">
    <div id="deal-buy" class="box">
        <div class="box-top"></div>
        <div class="box-content">
            <div class="head"><h2>Your Order</h2></div>
            <div class="sect">
                <table class="order-table">
                    <!--<tr>
                        <th class="deal-buy-desc">Item</th>
                        <th class="deal-buy-quantity">Quantity</th>
                        <th class="deal-buy-multi"></th>
                        <th class="deal-buy-price">Price</th>
                        <th class="deal-buy-equal"></th>
                        <th class="deal-buy-total">Total </th>
                    </tr>-->
                    <tr>
                        <td class="deal-buy-desc"><?php echo $team['title']; ?></td>
                        <!--<td class="deal-buy-quantity"><?php /*echo $order['quantity']; */?></td>
                        <td class="deal-buy-multi">x</td>
                        <td class="deal-buy-price" id="deal-buy-price"><span class="money"><?php /*echo $currency; */?><span><?php /*echo moneyit($order['price']); */?></td>
                        <td class="deal-buy-equal">=</td>
                        <td class="deal-buy-total" id="deal-buy-total"><span class="money"><?php /*echo $currency; */?></span><?php /*echo moneyit($order['price']*$order['quantity']); */?></td>-->
                    </tr>
					<?php if($team['delivery']=='express'){?>
					<tr>
						<td class="deal-buy-desc">Delivery</td>
						<td class="deal-buy-quantity"></td>
						<td class="deal-buy-multi"></td>
						<td class="deal-buy-price"><span class="money"><?php echo $currency; ?></span><span id="deal-express-price"><?php echo $team['fare']; ?></span></td>
						<td class="deal-buy-equal">=</td>
						<td class="deal-buy-total"><span class="money"><?php echo $currency; ?></span><span id="deal-express-total"><?php echo $team['fare']; ?></span></td>
					</tr>
					<?php }?>
					<?php if($order['card']>0){?>
				   <tr id="cardcode-row">
						<td class="deal-buy-desc">Coupon:<span id="cardcode-row-n"><?php echo $order['card_id']; ?></span></td>
						<td class="deal-buy-quantity"></td>
						<td class="deal-buy-multi"></td>

						<td class="deal-buy-price"><span class="money"><?php echo $currency; ?></span><?php echo moneyit($order['card']); ?></td>
						<td class="deal-buy-equal">=</td>
						<td class="deal-buy-total">-<span class="money">¥</span><span id="cardcode-row-t"><?php echo $order['card']; ?></span></td>
					</tr>
					<?php }?>

					<!--<tr class="order-total">
                        <td class="deal-buy-desc"><strong>Total money :</strong></td>
                        <td class="deal-buy-quantity"></td>
                        <td class="deal-buy-multi"></td>
                        <td class="deal-buy-price"></td>
                        <td class="deal-buy-equal">=</td>
                        <td class="deal-buy-total"><span class="money"><?php /*echo $currency; */?></span><?php /*echo $order['origin']; */?></td>
                    </tr>-->
                </table>
				<div class="paytype">
                <form action="/order/pay.php" method="post" class="validator">
				<div class="order-check-form ">
					<!--<div class="order-pay-credit">
						<h3>Your remaining charge</h3>
						<p>remaining charge:<strong><span class="money"><?php /*echo $currency; */?></span><?php /*echo moneyit($login_user['money']); */?></strong> <?php /*if($login_user['money']<$order['origin']){*/?>Your remaining c harge is not enough,still need <strong><span class="money"><?php /*echo $currency; */?></span><?php /*echo moneyit($order['origin']-$login_user['money']); */?></strong>.Please choose payment way:<?php /*} else { */?>Your remaining charge is enough,please finish payment.<?php /*}*/?></p>
						<div class="other_pay"><?php /*echo $INI['other']['pay']; */?></div>
					</div>-->
				<?php /*if($login_user['money']<$order['origin']){*/?><!--
					<ul class="typelist">
					<?php /*if($INI['alipay']['mid']){*/?>
						<li><input id="check-alipay" type="radio" name="paytype" value="alipay" <?php /*echo $ordercheck['alipay']; */?> />
						<label for="check-alipay" class="alipay">Paypal,if you have Paypal account.</label>
						</li>
					<?php /*}*/?>
					<?php /*if($INI['tenpay']['mid']){*/?>
						<li><input id="check-tenpay" type="radio" name="paytype" value="tenpay" <?php /*echo $ordercheck['tenpay']; */?> /><label for="check-tenpay" class="tenpay">财付通交易,推荐QQUser 使用</label></li>
					<?php /*}*/?>
					<?php /*if($INI['chinabank']['mid']){*/?>
						<li><input id="check-chinabank" type="radio" name="paytype" value="chinabank" <?php /*echo $ordercheck['chinabank']; */?> /><label for="check-chinabank" class="chinabank">支持招商,工行,建行,中行等主流银行的网银支付</label></li>
					<?php /*}*/?>
					</ul>
				<?php /*} else { */?>
					<input type="hidden" name="paytype" value="credit" />
				--><?php /*}*/?>
					<div class="clear"></div>
					<p class="check-act">
					<input type="hidden" name="order_id" value="<?php echo $order['id']; ?>" />
					<input type="hidden" name="team_id" value="<?php echo $order['team_id']; ?>" />
					<input type="hidden" name="cardcode" value="" />
					<input type="hidden" name="quantity" value="<?php echo $order['quantity']; ?>" />
					<input type="hidden" name="address" value="<?php echo $order['address']; ?>" />
					<input type="hidden" name="express" value="<?php echo $order['express']; ?>" />
					<input type="hidden" name="remark" value="<?php echo $order['remark']; ?>" />
					<input type="submit" value="OK & Pay now" class="formbutton" /> <a href="/team/buy.php?id=<?php echo $order['team_id']; ?>" style="margin-left:1em;">Return Modify Order</a>
					</p>
				</div>
				</form>
				</div>
			</div>
		</div>
		<div class="box-bottom"></div>
	</div>
</div>
<div id="sidebar">
<?php if(!$order['card_id']){?>
	<?php include template("block_side_card");?>
<?php }?>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
