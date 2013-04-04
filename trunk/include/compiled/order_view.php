<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="order-detail">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_account(null); ?></ul>
	</div>
    <div id="content">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
                    <h2>Information</h2>
                </div>
                <div class="sect">

<table cellspacing="0" cellpadding="0" border="0" class="data-table">
    <tr>
        <th> ID:</th>
        <td class="orderid"><strong><?php echo $order['id']; ?></strong></td>
        <th> Time:</th>
        <td><span><?php echo date('Y-m-d H:i',$order['create_time']); ?></span></td>
    </tr>
</table>

<table cellspacing="0" cellpadding="0" border="0" class="info-table">
    <tr>
        <th class="left" width="auto">Item</th>

        <th width="150">Status</th>
    </tr>
    <tr>
        <td class="left"><a href="/team.php?id=<?php echo $order['team_id']; ?>" target="_blank"><?php echo $team['title']; ?></a></td>
        <td class="status"><?php if(!$express&&!$order['card_id']){?>Joined<?php } else { ?>-<?php }?></td>
    </tr>

<?php if($order['card_id']){?>
    <tr>
        <td class="left">Coupon:<?php echo $order['card_id']; ?></td>
        <td><?php echo moneyit($order['card']); ?></td>
        <td>x</td>
        <td>1</td>
        <td>=</td>
        <td class="total"><span class="money"><?php echo $currency; ?></span><?php echo moneyit($order['card']); ?></td>
        <td class="status">-</td>
    </tr>
<?php }?>

<?php if($express){?>
    <tr>
        <td class="left">Delivery</td>
        <td><?php echo moneyit($team['fare']); ?></td>
        <td>x</td>
        <td>1</td>
        <td>=</td>
        <td class="total"><span class="money"><?php echo $currency; ?></span><?php echo moneyit($team['fare']); ?></td>
        <td class="status">-</td>
    </tr>
<?php }?>

<?php if($express||$order['card_id']){?>
    <tr>
        <td class="left"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="total"><span class="money"><?php echo $currency; ?></span><?php echo moneyit($order['origin']); ?></td>
        <td class="status">Joined</td>
    </tr>
<?php }?>

</table>

<?php if($order['remark']){?>
<table cellspacing="0" cellpadding="0" border="0" class="data-table">
    <tr>
        <th>Order Remark:</th>
        <td class="other-coupon"><?php echo nl2br(htmlspecialchars($order['remark'])); ?></td>
    </tr>
</table>
<?php }?>
<?php if($team['delivery']=='coupon'){?>
<?php } else if($team['delivery']=='express') { ?>
<table cellspacing="0" cellpadding="0" border="0" class="data-table">
    <tr>
        <th>Delivery:</th>
	<?php if($order['express_id']){?>
        <td><?php echo $option_express[$order['express_id']]; ?>:<?php echo $order['express_no']; ?></td>
	<?php } else { ?>
        <td class="other-coupon">PLease wait..</td>
	<?php }?>
    </tr>
    <tr>
        <th>Real name:</th>
        <td><?php echo $order['realname']; ?></td>
    </tr>
    <tr>
        <th>Address:</th>
        <td><?php echo $order['address']; ?></td>
    </tr>
    <tr>
        <th>Mobile number:</th>
        <td><?php echo $order['mobile']; ?></td>
    </tr>
</table>
<?php } else if($team['delivery']=='pickup') { ?>
<table cellspacing="0" cellpadding="0" border="0" class="data-table">
    <tr>
        <th>Self get:</th>
        <td class="other-coupon"></td>
    </tr>
    <tr>
        <th>Get address:</th>
        <td><?php echo $team['address']; ?></td>
    </tr>
    <tr>
        <th>Mobile:</th>
        <td><?php echo $team['mobile']; ?></td>
    </tr>
</table>
<?php }?>
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

<?php include template("footer");?>
