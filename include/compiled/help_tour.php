<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="learn">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_help('tour'); ?></ul>
	</div>
	<div id="content" class="about clear">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">

                <div class="head"><h2><?php echo $INI['system']['abbreviation']; ?> tour</h2></div>

                <div class="sect"><?php echo $page['value']; ?> 

<iframe width="560" height="315" src="http://www.youtube.com/embed/Urj8Dv6vULU" frameborder="0" allowfullscreen></iframe>

</div>

            </div>

            <div class="box-bottom"></div>
        </div>
	</div>
	<div id="sidebar">
		<?php include template("block_side_business");?>
		<?php include template("block_side_subscribe");?>
	</div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>