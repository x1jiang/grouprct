<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_team('team'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>Edit </h2>
					<span class="headtip">(<?php echo $team['title']; ?>)</span>
				</div>
                <div class="sect">
				<form id="-user-form" method="post" action="/manage/team/edit.php?id=<?php echo $team['id']; ?>" enctype="multipart/form-data" class="validator">
					<input type="hidden" name="id" value="<?php echo $team['id']; ?>" />
					<div class="wholetip clear"><h3>1,basic info</h3></div>
					<div class="field">
						<label>City and category</label>
						<select name="city_id" class="f-input" style="width:160px;"><?php echo Utility::Option(Utility::OptionArray($hotcities, 'id','name'), $team['city_id'], 'All Cities'); ?></select><select name="group_id" class="f-input" style="width:160px;"><?php echo Utility::Option($groups, $team['group_id']); ?></select><select name="conduser" class="f-input" style="width:160px;"><?php echo Utility::Option($option_cond, $team['conduser']); ?></select>
					</div>
					<div class="field">
						<label>this Title</label>
						<input type="text" size="30" name="title" id="team-create-title" class="f-input" value="<?php echo $team['title']; ?>" datatype="require" require="true" />
					</div>
					<div class="field">
						<label>Retail price</label>
						<input type="text" size="10" name="market_price" id="team-create-market-price" class="number" value="<?php echo moneyit($team['market_price']); ?>" datatype="money" require="true" />
						<label>Our price</label>
						<input type="text" size="10" name="team_price" id="team-create-team-price" class="number" value="<?php echo moneyit($team['team_price']); ?>" datatype="double" require="true" />
						<span class="inputtip">our price must be lower than retail price</span>
					</div>
					<div class="field">
						<label>minimal Quantity</label>
						<input type="text" size="10" name="min_number" id="team-create-min-number" class="number" value="<?php echo intval($team['min_number']); ?>" maxLength="6" datatype="number" require="true" />
						<label>max Quantity</label>
						<input type="text" size="10" name="max_number" id="team-create-max-number" class="number" value="<?php echo intval($team['max_number']); ?>" maxLength="6" datatype="number" require="true" />
						<label>each people at most buy:</label>
						<input type="text" size="10" name="per_number" id="team-create-per-number" class="number" value="<?php echo intval($team['per_number']); ?>" maxLength="6" datatype="number" require="true" />
						<span class="hint">min Quantity must be higher than 0,max Quantity/limitation:0 means no limit</span>
					</div>
					<div class="field">
						<label>Begin time</label>
						<input type="text" size="10" name="begin_time" id="team-create-begin-time" class="date" value="<?php echo date('Y-m-d', $team['begin_time']); ?>" maxLength="10" />
						<label>End time</label>
						<input type="text" size="10" name="end_time" id="team-create-end-time" class="date" value="<?php echo date('Y-m-d', $team['end_time']); ?>" maxLength="10" />
						<label>Valid period</label>
						<input type="text" size="10" name="expire_time" id="team-create-expire-time" class="date" value="<?php echo date('Y-m-d', $team['expire_time']); ?>" maxLength="10" />
						<span class="hint">Begin at 00:00:00,end at 00:00:00</span>
					</div>
					<div class="field">
						<label>Description</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="summary" id="team-create-summary" class="f-textarea" datatype="require" require="true"><?php echo htmlspecialchars($team['summary']); ?></textarea></div>
					</div>
					<div class="field">
						<label>Hints</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="notice" id="team-create-notice" class="f-textarea editor"><?php echo $team['notice']; ?></textarea></div>
						<span class="hint">as to valid time,introduce</span>
					</div>
					<input type="hidden" name="guarantee" value="Y" />
					<input type="hidden" name="system" value="Y" />
					<div class="wholetip clear"><h3>2,item info</h3></div>
					<div class="field">
						<label>merchants</label>
						<select name="partner_id" datatype="require" require="true"><?php echo Utility::Option($partners, $team['partner_id'], '------ choose merchant ------'); ?></select>
					</div>
					<div class="field">
						<label>Coupon usage</label>
						<input type="text" size="10" name="card" id="team-create-card" class="number" value="<?php echo moneyit($team['card']); ?>" require="true" datatype="money" />
						<span class="inputtip">Coupon max money</span>
					</div>
					<div class="field">
						<label>item name</label>
						<input type="text" size="30" name="product" id="team-create-product" class="f-input" value="<?php echo $team['product']; ?>" datatype="require" require="true" />
					</div>
					<div class="field">
						<label>item picture</label>
						<input type="file" size="30" name="upload_image" id="team-create-image" class="f-input" />
						<?php if($team['image']){?><span class="hint"><?php echo team_image($team['image']); ?></span><?php }?>
					</div>
					<div class="field">
						<label>picture 1</label>
						<input type="file" size="30" name="upload_image1" id="team-create-image1" class="f-input" />
						<?php if($team['image1']){?><span class="hint"><?php echo team_image($team['image1']); ?></span><?php }?>
					</div>
					<div class="field">
						<label>picture 2</label>
						<input type="file" size="30" name="upload_image2" id="team-create-image2" class="f-input" />
						<?php if($team['image2']){?><span class="hint"><?php echo team_image($team['image2']); ?></span><?php }?>
					</div>
					<div class="field">
						<label>FLV video clips</label>
						<input type="text" size="30" name="flv" id="team-create-flv" class="f-input" value="<?php echo $team['flv']; ?>" />
						<span class="hint">like :http://.../video.flv</span>
					</div>
					<div class="field">
						<label>this Info</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="detail" id="team-create-detail" class="f-textarea editor"><?php echo htmlspecialchars($team['detail']); ?></textarea></div>
					</div>
					<div class="field">
						<label>comments</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="userreview" id="team-create-userreview" class="f-textarea"><?php echo htmlspecialchars($team['userreview']); ?></textarea></div>
						<span class="hint">formant:"cool|bunny|http://ww....|XXX",one comment each line</span>
					</div>
					<div class="field">
						<label><?php echo $INI['system']['abbreviation']; ?>Ads words</label>
						<div style="float:left;"><textarea cols="45" rows="5" name="systemreview" id="team-create-systemreview" class="f-textarea editor"><?php echo htmlspecialchars($team['systemreview']); ?></textarea></div>
					</div>
					<div class="wholetip clear"><h3>3,delivery info</h3></div>
					<div class="field">
						<label>delivery way</label>
						<div style="margin-top:5px;" id="express-zone-div"><input type="radio" name="delivery" value="coupon" <?php echo $team['delivery']=='coupon'?'checked':''; ?> />&nbsp;<?php echo $INI['system']['couponname']; ?>&nbsp;<input type="radio" name="delivery" value='express' <?php echo $team['delivery']=='express'?'checked':''; ?> />&nbsp;Delivery&nbsp;<input type="radio" name="delivery" value='pickup' <?php echo $team['delivery']=='pickup'?'checked':''; ?> />&nbsp;self get</div>
					</div>
					<div id="express-zone-coupon" style="display:<?php echo $team['delivery']=='coupon'?'block':'none'; ?>;">
						<div class="field">
							<label>consume return</label>
							<input type="text" size="10" name="credit" id="team-create-credit" class="number" value="<?php echo moneyit($team['credit']); ?>" datatype="money" require="true" />
							<span class="inputtip">when use<?php echo $INI['system']['couponname']; ?>,get Remaining ,Dollar</span>
						</div>
					</div>
					<div id="express-zone-pickup" style="display:<?php echo $team['delivery']=='pickup'?'block':'none'; ?>;">
						<div class="field">
							<label>Phone number</label>
							<input type="text" size="10" name="mobile" id="team-create-mobile" class="f-input" value="<?php echo $team['mobile']; ?>" />
						</div>
						<div class="field">
							<label>delivery address</label>
							<input type="text" size="10" name="address" id="team-create-address" class="f-input" value="<?php echo $team['address']; ?>" />
						</div>
					</div>
					<div id="express-zone-express" style="display:<?php echo $team['delivery']=='express'?'block':'none'; ?>;">
						<div class="field">
							<label>Delivery fee</label>
							<input type="text" size="10" name="fare" id="team-create-fare" class="number" value="<?php echo intval($team['fare']); ?>" maxLength="6" datatype="money" require="true" />
							<span class="inputtip">Delivery fee</span>
						</div>
						<div class="field">
							<label>Delivery description</label>
							<div style="float:left;"><textarea cols="45" rows="5" name="express" id="team-create-express" class="f-textarea"><?php echo $team['express']; ?></textarea></div>
						</div>
					</div>
					<input type="submit" value="submit" name="commit" id="leader-submit" class="formbutton" style="margin:10px 0 0 120px;"/>
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
