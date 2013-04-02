<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('skin'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>System skin</h2></div>
                <div class="sect">
                    <form method="post">
                        <div class="field">
                            <label>template change</label>
							<select name="skin[template]" class="f-input" style="width:200px;"><?php echo Utility::Option(ZSystem::GetTemplateList(), $INI['skin']['template']); ?></select>
							<span class="hint">template under [<?php echo DIR_ROOT; ?>/template] ,you can change template</span>
                        </div>
                        <div class="field">
                            <label>theme change</label>
							<select name="skin[theme]" class="f-input" style="width:200px;"><?php echo Utility::Option(ZSystem::GetThemeList(), $INI['skin']['theme']); ?></select>
							<span class="hint">theme under [<?php echo WWW_ROOT; ?>/static/theme] 下,you can change</span>
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
