<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="reset">
    <div id="content">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>ResetPassword</h2></div>
                <div class="sect">
					<p class="notice">Operation OK.please go to <strong><?php echo $_SESSION['reemail']; ?></strong> to view <?php echo $INI['system']['abbreviation']; ?>'s Email,click links in email to reset your Password.</p>
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
