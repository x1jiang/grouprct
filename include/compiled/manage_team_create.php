<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_team($selector); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>new daily deal</h2></b></div>
                <div class="sect">
				<form id="login-user-form" method="post" action="/manage/team/create.php" enctype="multipart/form-data" class="validator">
					<div class="wholetip clear"><h3>1,basic info</h3></div>
					<div class="field">
						<label>City and categories</label>
						<select name="city_id" class="f-input" style="width:160px;"><?php echo Utility::Option(Utility::OptionArray($hotcities, 'id','name'), $team['city_id'], 'All Cities'); ?></select><select name="group_id" class="f-input" style="width:160px;"><?php echo Utility::Option($groups, $team['group_id']); ?></select><select name="conduser" class="f-input" style="width:160px;"><?php echo Utility::Option($option_cond, $team['conduser']); ?></select>
					</div>
					<div class="field">
						<label>Title</label>
						<input type="text" size="30" name="title" id="team-create-title" class="f-input" value="<?php echo $team['title']; ?>" require="true" datatype="require"/>
					</div>
					<div class="field">
						<label>Retail price</label>
						<input type="text" size="10" name="market_price" id="team-create-market-price" class="number" value="<?php echo moneyit($team['market_price']); ?>" datatype="money" require="true" />
						<label>Our price</label>
						<input type="text" size="10" name="team_price" id="team-create-team-price" class="number" value="<?php echo moneyit($team['team_price']); ?>" datatype="double" require="true" />
						<span class="inputtip">Our price must be lower thanRetail price</span>
					</div>
					<div class="field">
						<label>Minimal Quantity</label>
						<input type="text" size="10" name="min_number" id="team-create-min-number" class="number" value="<?php echo intval($team['min_number']); ?>" maxLength="6" datatype="number" require="true" />
						<label>Maximized Quantity</label>
						<input type="text" size="10" name="max_number" id="team-create-max-number" class="number" value="<?php echo intval($team['max_number']); ?>" maxLength="6" datatype="number" require="true" />
						<label>limitations for each person </label>
						<input type="text" size="10" name="per_number" id="team-create-per-number" class="number" value="<?php echo intval($team['per_number']); ?>" maxLength="6" datatype="number" require="true" />
						<span class="hint">Minimal Quantity must be larger than 0,Maximized Quantity/limitaion:0 means no limit.</span>
					</div>
					<div class="field">
						<label>Begin time</label>
						<input type="text" size="10" name="begin_time" id="team-create-begin-time" class="date" value="<?php echo date('Y-m-d', $team['begin_time']); ?>" maxLength="10" />
						<label>End time</label>
						<input type="text" size="10" name="end_time" id="team-create-end-time" class="date" value="<?php echo date('Y-m-d', $team['end_time']); ?>" maxLength="10" />
						<label>Valid period</label>
						<input type="text" size="10" name="expire_time" id="team-create-expire-time" class="date" value="<?php echo date('Y-m-d', $team['expire_time']); ?>" maxLength="10" />
						<span class="hint">Begin time00:00:00,End time00:00:00</span>
					</div>
					<div class="field">
						<label>description</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="summary" id="team-create-summary" class="f-textarea" datatype="require" require="true"></textarea></div>
					</div>
					<div class="field">
						<label>Additional Information</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="notice" id="team-create-notice" class="f-textarea editor"><?php echo $team['notice']; ?></textarea></div>
						<span class="hint">valid period,hint</span>
					</div>
					<input type="hidden" name="guarantee" value="Y" />
					<input type="hidden" name="system" value="Y" />
					<div class="wholetip clear"><h3>2,item info</h3></div>
					<div class="field">
						<label>merchants</label>
						<select name="partner_id" datatype="require" require="true"><?php echo Utility::Option($partners, $team['partner_id'], '------ please choose merchant ------'); ?></select>
					</div>
					<div class="field">
						<label>Coupon use</label>
						<input type="text" size="10" name="card" id="team-create-card" class="number" value="<?php echo moneyit($team['card']); ?>" require="true" datatype="money" />
						<span class="inputtip"> Coupon max money</span>
					</div>
					<div class="field">
						<label>item name</label>
						<input type="text" size="30" name="product" id="team-create-product" class="f-input" value="<?php echo $team['product']; ?>" datatype="require" require="true" />
					</div>
					<div class="field">
						<label>item picture</label>
						<input type="file" size="30" name="upload_image" id="team-create-image" class="f-input" />
						<span class="hint">at least upload 1 item picture</span>
					</div>
					<div class="field">
						<label>item picture1</label>
						<input type="file" size="30" name="upload_image1" id="team-create-image1" class="f-input" />
					</div>
					<div class="field">
						<label>item picture2</label>
						<input type="file" size="30" name="upload_image2" id="team-create-image2" class="f-input" />
					</div>
					<div class="field">
						<label>FLVvideo clips </label>
						<input type="text" size="30" name="flv" id="team-create-flv" class="f-input" />
						<span class="hint">like:http://.../video.flv</span>
					</div>
					<div class="field">
						<label>this Info</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="detail" id="team-create-detail" class="f-textarea editor"></textarea></div>
					</div>
					<div class="field">
						<label>comments </label>
						<div style="float:left;"><textarea cols="45" rows="5" name="userreview" id="team-create-userreview" class="f-textarea"><?php echo htmlspecialchars($team['userreview']); ?></textarea></div>
						<span class="hint">format:"cool|bunny|http://ww....|XXX",each comment each line</span>
					</div>
					<div class="field">
						<label><?php echo $INI['system']['abbreviation']; ?>ads words</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="systemreview" id="team-create-systemreview" class="f-textarea editor"></textarea></div>
					</div>
					<div class="wholetip clear"><h3>3,delivery info</h3></div>
					<div class="field">
						<label>delivery way</label>
						<div style="margin-top:5px;" id="express-zone-div"><input type="radio" name="delivery" value="coupon" checked>&nbsp;<?php echo $INI['system']['couponname']; ?>&nbsp;<input type="radio" name="delivery" value='express' />&nbsp;Delivery&nbsp;<input type="radio" name="delivery" value='pickup' />&nbsp;Pickup</div>
					</div>
					<div id="express-zone-coupon" style="display:<?php echo $team['delivery']=='coupon'?'block':'none'; ?>;">
						<div class="field">
							<label>return coupon</label>
							<input type="text" size="10" name="credit" id="team-create-credit" class="number" value="<?php echo moneyit($team['credit']); ?>" datatype="money" require="true" />
							<span class="inputtip">when consume <?php echo $INI['system']['couponname']; ?> ,get accountRemaining return,dollars</span>
						</div>
					</div>
					<div id="express-zone-pickup" style="display:<?php echo $team['delivery']=='pickup'?'block':'none'; ?>;">
						<div class="field">
							<label>Phone number</label>
							<input type="text" size="10" name="mobile" id="team-create-mobile" class="f-input" value="<?php echo $login_manager['mobile']; ?>" />
						</div>
						<div class="field">
							<label>address </label>
							<input type="text" size="10" name="address" id="team-create-address" class="f-input" value="<?php echo $login_manager['address']; ?>" />
						</div>
					</div>
					<div id="express-zone-express" style="display:<?php echo $team['delivery']=='express'?'block':'none'; ?>;">
						<div class="field">
							<label>Delivery fees </label>
							<input type="text" size="10" name="fare" id="team-create-fare" class="number" value="<?php echo intval($team['fare']); ?>" maxLength="6" datatype="money" require="true" />
							<span class="inputtip"> Delivery fees </span>
						</div>
						<div class="field">
							<label>Delivery comments</label>
							<div style="float:left;"><textarea cols="45" rows="5" name="express" id="team-create-express" class="f-textarea"><?php echo $team['express']; ?></textarea></div>
						</div>
					</div>
					<div class="act">
						<input type="submit" value="ok and submit" name="commit" id="leader-submit" class="formbutton"/>
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
