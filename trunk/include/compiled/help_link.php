<?php include template("header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="maillist">
	<div id="content">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content welcome">
				<div class="head">
					 <h2>Friendlinks</h2>
				</div>
                <div class="sect">
					<div class="link">
            		<?php if(is_array($logos)){foreach($logos AS $one) { ?>
						<a href="<?php echo $one['url']; ?>" title="<?php echo $one['title']; ?>" target="_blank"><img src="<?php echo $one['logo']; ?>" alt="<?php echo $one['title']; ?>" /></a>
            		<?php }}?>
        			</div>
        			<div class="cl"></div>
      				<div id="txt_link">
					<?php if(is_array($texts)){foreach($texts AS $one) { ?>
						<a href="<?php echo $one['url']; ?>" title="<?php echo $one['title']; ?>" target="_blank"><?php echo $one['title']; ?></a>
            		<?php }}?>
                    </div>
					
				<div class="intro">
					<p>1、不链接有反动、色情、赌博等不良内容或提供不良内容链接的网站，以及网站名称或内容违反国家有关政策法规的网站；</p>
					<p>2、不链接含有病毒、木马，弹出插件或恶意更改他人电脑设置的网站、及有多个弹窗广告的网站；</p>
					<p>3、不链接网站名称和实际内容不符的网站，如贵站正在建设中，或尚未明确主题的网站，请不必现在申请收录，欢迎您在贵站建设完毕后再申请；</p>
					<p>4、不链接非顶级域名、挂靠其他站点、无实际内容，只提供域名指向的网站或仅有单页内容的网站；</p>
					<p>5、不链接在正常情况下无法访问的网站；</p>
					<p>6、注意：<a href="/feedback/suggest.php">提交申请</a>前请做好本站的链接，否则不予通过。</p>
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
