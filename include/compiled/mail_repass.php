hi <?php echo $user['username']; ?>,<br />
<br />
In <?php echo $INI['system']['sitename']; ?> you apply for reset password,please clik below link to finish password reset:<br />
<br />
<a href="<?php echo $INI['system']['wwwprefix']; ?>/account/reset.php?code=<?php echo $user['recode']; ?>"><?php echo $INI['system']['wwwprefix']; ?>/account/reset.php?code=<?php echo $user['recode']; ?></a><br />
<br />
--<br />
<?php echo $INI['system']['sitename']; ?> - Cool deal every day
