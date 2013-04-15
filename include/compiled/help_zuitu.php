<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="learn">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_help('zuitu'); ?></ul>
	</div>
	<div id="content" class="about clear">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>What is <?php echo $INI['system']['abbreviation']; ?>?</h2></div>

 
                <div class="sect"><?php echo $page['value']; ?>
<h3>Interactive Matching Patients And randomized Clinical Trials (IMPACT) </h3>
<p>
Clinical trials that are designed to test health outcomes across different interventions and different patient groups play a critical role in advancing healthcare. However, difficulty and inefficiency associated with recruiting participants is considered one of the many challenges that researchers face. There exist many online recruitment sites that serve as information portals, where people can obtain information on past and ongoing clinical trials. But few of these portals deliver the information to the target population in an efficient and streamlined fashion through the incorporation of various factors (e.g., matching recruitment location, health conditions of interest, and eligibility constraints). There is also little support for direct interaction between potential subjects and researchers who are running these clinical trials. Patients play a limited role by passively waiting for clinical trials of their interest. </p>

<p>
To address these challenges, we propose a new paradigm of recruiting participants for randomized clinical trials (RCT) in a dynamic and interactive manner. Using our Interactive Matching Patients And Clinical Trials (IMPACT) social media application, researchers can reach out and motivate a larger patient population for recruitment. Patients have easier and more active ways to learn and participate in studies of interest. Stakeholders (e.g., funding agencies) can also play an active role in accelerating the RCT enrollment process. In addition, the IMPACT system keeps track of volunteers and only releases their contact information to authorized researchers of a study upon successful enrollment to better preserve patient privacy.  

</p>
</div>

            </div>
            <div class="box-bottom">

</div>
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