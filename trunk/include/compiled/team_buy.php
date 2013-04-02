<?php include template("header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="content">
    <form action="/team/buy.php?id=<?php echo $team['id']; ?>" method="post" class="validator">
	<input id="deal-per-number" value="<?php echo $team['per_number']; ?>" type="hidden" />
    <div id="deal-buy" class="box">
        <div class="box-top"></div>
        <div class="box-content">
            <div class="head"><h2>Submit order</h2></div>
            <div class="sect">
            <table class="order-table">
                <!--<tr>
                    <th class="deal-buy-desc">Item</th>
                    <th class="deal-buy-quantity">Quantity</th>
                    <th class="deal-buy-multi"></th>
                    <th class="deal-buy-price">Price</th>
                    <th class="deal-buy-equal"></th>
                    <th class="deal-buy-total">Total money</th>
                </tr>-->
                <tr>
                    <td class="deal-buy-desc"><?php echo $team['title']; ?></td>
                   <!-- <td class="deal-buy-quantity"><input type="text" class="input-text f-input" maxlength="4" name="quantity" value="<?php /*echo $order['quantity']; */?>" id="deal-buy-quantity-input" <?php /*echo $team['per_number']==1?'readonly':''; */?> /><br /><span style="font-size:12px;color:gray;"><?php /*if($team['per_number']==0){*/?>At most 9999<?php /*} else { */?>At most <?php /*echo $team['per_number']; */?><?php /*}*/?></span></td>
                    <td class="deal-buy-multi">x</td>
                    <td class="deal-buy-price"><span class="money"><?php /*echo $currency; */?></span><span id="deal-buy-price"><?php /*echo $team['team_price']; */?></span></td>
                    <td class="deal-buy-equal">=</td>
                    <td class="deal-buy-total"><span class="money"><?php /*echo $currency; */?></span><span id="deal-buy-total"><?php /*echo $order['quantity']*$team['team_price']; */?></span></td>-->
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

                <!-- <tr class="order-total">
                    <td class="deal-buy-desc"><strong>Order amount:</strong></td>
                    <td class="deal-buy-quantity"></td>
                    <td class="deal-buy-multi"></td>
                    <td class="deal-buy-price"></td>
                    <td class="deal-buy-equal">=</td>
                    <td class="deal-buy-total"><span class="money"><?php /*echo $currency; */?></span><strong id="deal-buy-total-t"><?php /*echo $order['origin']; */?></strong></td>
                </tr> -->
            </table>
			<?php if($team['delivery']=='express'){?>
			<div class="wholetip clear"><h3>Delivery info</h3></div>
			<div class="field username">
				<label>Real Name</label>
				<input type="text" size="30" name="realname" id="settings-realname" class="f-input" value="<?php echo $login_user['realname']; ?>" require="true" datatype="require" />
			</div>
			<div class="field mobile">
				<label>Mobile number</label>
				<input type="text" size="30" name="mobile" id="settings-mobile" class="f-input" value="<?php echo $login_user['mobile']; ?>" require="true" datatype="mobile" maxLength="11" />
				<span class="hint">Mobile number is the contact way</span>
			</div>
			<div class="field mobile">
				<label>Zip code</label>
				<input type="text" size="30" name="zipcode" id="settings-mobile" class="f-input" value="<?php echo $login_user['zipcode']; ?>" require="true" datatype="zip" maxLength="6" />
			</div>
			<div class="field username">
				<label>Address</label>
				<input type="text" size="30" name="address" id="settings-address" class="f-input" value="<?php echo $login_user['address']; ?>" require="true" datatype="require" />
				<span class="hint">Please fill it completely</span>
			</div>
			<?php }?>
			<div class="field mobile">
				<label>Remark</label>
				<textarea name="remark" style="width:500px;height:80px;padding:2px;"><?php echo htmlspecialchars($order['remark']); ?></textarea>
			</div>
            <input id="deal-buy-cardcode" type="hidden" name="cardcode" maxlength="8" value="" />
            <input type="hidden" name="id" value="<?php echo $order['id']; ?>" />
			<div class="form-submit"><input type="submit" class="formbutton" name="buy" value="Make sure and buy"/></div>
            </div>
        </div>
        <div class="box-bottom"></div>
    </div>
    </form>
</div>
<div id="sidebar">
	<?php include template("block_side_credit");?>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
