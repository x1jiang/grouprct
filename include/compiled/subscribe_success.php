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
				  <div class="succ">Your email <strong><?php echo $_POST['email']; ?></strong> will receive <strong><?php echo $city['name']; ?></strong> updated clinical trial studies.</div>
				 </div>
			</div>
		</div>
		<div class="box-bottom"></div>
	</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
