<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="account-charge">
    <div id="content">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>Store</h2></div>
                <div class="sect">
                    <div class="charge">
                        <form id="account-charge-form" action="/order/charge.php" method="post" class="validator">
                            <p>Please input amount:</p>
                            <p class="number">
                                <input type="text" maxlength="6" class="f-text" name="money" require="true" datatype="number" value="<?php echo $money; ?>" /> Dollars  (at least 1 Dollars )
                            </p>
                            <p id="account-charge-tip" class="tip" style="visibility:hidden;"></p>
                            <div class="choose">
                                <p class="choose-pay-type">Payment method:</p>
                                <ul class="typelist">
									<?php if($INI['alipay']['mid']){?>
										<li><input id="check-alipay" type="radio" name="paytype" value="alipay" <?php echo $ordercheck['alipay']; ?> /><label for="check-alipay" class="alipay">Alipay</label></li>
									<?php }?>
									<?php if($INI['tenpay']['mid']){?>
										<li><input id="check-tenpay" type="radio" name="paytype" value="tenpay" <?php echo $ordercheck['tenpay']; ?> /><label for="check-tenpay" class="tenpay">Tenpay</label></li>
									<?php }?>
									<?php if($INI['chinabank']['mid']){?>
										<li><input id="check-chinabank" type="radio" name="paytype" value="chinabank" <?php echo $ordercheck['chinabank']; ?> /><label for="check-chinabank" class="chinabank">Online payment</label></li>
									<?php }?>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                            <p class="commit">
                                <input type="submit" value="OK,pay now" class="formbutton" />
                            </p>
                        </form>
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
