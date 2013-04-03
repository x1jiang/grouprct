<?php include template("header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="maillist">
	<div id="content">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content welcome">
				<div class="head">
					 <h2>Email subscribe</h2>
				</div>
                <div class="sect">
					<div class="lead"><h4> <?php echo $city['name']; ?>'s randomized clinical trial projects will be sent to your email.</h4></div>
					<div class="enter-address">
						<p>subscribe.</p>
						<div class="enter-address-c">
						<form id="enter-address-form" action="/subscribe.php" method="post" class="validator">
						<div class="mail">
							<label>Email address:</label>
							<input id="enter-address-mail" name="email" class="f-input f-mail" type="text" value="<?php echo $login_user['email']; ?>" size="20" require="true" datatype="email" />
							<span class="tip">Please don't worry, we hate spam email</span>
						</div>
						<div class="city">
							<label>&nbsp;</label>
							<select name="city_id" class="f-city"><?php echo Utility::Option(Utility::OptionArray($hotcities, 'id', 'name'), $city['id']); ?></select>
							<input id="enter-address-commit" type="submit" class="formbutton" value="Subscribe" />
						</div>
						</form>
					</div>
					<div class="clear"></div>
				</div>
				<div class="intro">
					<p>Randomized Clinical Trial of the day</p>
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
