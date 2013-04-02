<div id="ftw">
	<div id="ft">
		<p class="contact"><a href="/feedback/suggest.php">Suggestions</a></p>
		<ul class="cf">
			<li class="col">
				<h3>User Help</h3>
				<ul class="sub-list">
					<li><a href="/help/tour.php">Play <?php echo $INI['system']['abbreviation']; ?></a></li>
					<li><a href="/help/faqs.php">FAQs</a></li>
					<li><a href="/help/zuitu.php">What's <?php echo $INI['system']['abbreviation']; ?></a></li>
					<li><a href="/help/api.php">API</a></li>
				</ul>
			</li>
			<li class="col">
				<h3>Get Info</h3>
				<ul class="sub-list">
					<li><a href="/subscribe.php?ename=<?php echo $city['ename']; ?>">Email subscribe</a></li>
					<li><a href="/feed.php?ename=<?php echo $city['ename']; ?>">RSS Subscribe</a></li>
				</ul>
			</li>
			<li class="col">
				<h3>Cooperation&Contact</h3>
				<ul class="sub-list">
					<li><a href="/feedback/seller.php">Biz Cooperation</a></li>
					<li><a href="/feedback/suggest.php">Suggestions</a></li>
					<li><a href="/about/contact.php">Contact</a></li>
					<?php if(is_manager()){?>
					<li><a href="/manage/index.php">Manage <?php echo $INI['system']['abbreviation']; ?></a></li>
					<?php }?>
				</ul>
			</li>
			<li class="col">
				<h3>company info</h3>
				<ul class="sub-list">
					<li><a href="/about/us.php">About <?php echo $INI['system']['abbreviation']; ?></a></li>
					<li><a href="/about/job.php">Jobs</a></li>
					<li><a href="/about/terms.php">User Terms</a></li>
					<li><a href="/about/privacy.php">Privacy</a></li>
				</ul>
			</li>
			<li class="col end">
					<div class="logo-footer">
						<a href="/"><img src="/static/css/i/logo-footer.gif" /></a>
					</div>
			</li>
		</ul>
		<div class="copyright">
		<p>&copy;</p>
	  </div>
	</div>
</div>
<?php include template("manage_html_footer");?>
