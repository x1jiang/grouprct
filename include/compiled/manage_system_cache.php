<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('cache'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>buffer settings(only support Memcache)</h2></div>
                <div class="sect">
                    <form method="post">
						<div class="wholetip clear">
							<h3>format:  127.0.0.1:11211:100 ,if no Memcache,just keep blow blank</h3>
						</div>
						<div style="margin:0 20px;">
							<p>127.0.0.1 Memcache host's IP</p>
							<p>11211 Memcache port</p>
							<p>100 is weight,must be larger than 0</p>
						</div>
						<div class="wholetip clear"><h3>1,Cache host</h3></div>
                        <div class="field">
                            <label>host 1</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][0]; ?>"/>
                        </div>
                        <div class="field">
                            <label>host 2</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][1]; ?>"/>
                        </div>
                        <div class="field">
                            <label>host 3</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][2]; ?>"/>
                        </div>
                        <div class="field">
                            <label>host 4</label>
                            <input type="text" size="30" name="memcache[]" class="f-input" value="<?php echo $INI['memcache'][3]; ?>"/>
                        </div>

                        <div class="act">
                            <input type="submit" value="Save" name="commit" class="formbutton"/>
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
