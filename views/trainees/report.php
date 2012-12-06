<?php echo render('_header') ?>
<script src="<?php static_url(); ?>js/highcharts.js"></script>
<script src="<?php static_url(); ?>js/report-graph.js"></script>
<script src="<?php static_url(); ?>js/report-graphBottom.js"></script>
<script src="<?php static_url(); ?>js/report-graphBottomRight.js"></script>

<link href="<?php static_url(); ?>css/report.css" rel="stylesheet" type="text/css" />

<h1>Report for Trainee <?php echo $trainee->employee_id ?></h1>
<div id="holder">

	<div id="graph1">
		<div class="head">Progress Over Time</div>
		<div id="graphBox1" style="width: 810px; height: 370px; margin: 0 auto"></div>
	</div>

	<div id="graph2">
		<div class="head">Average Score</div>
	    <div id="graphBox2" style="width: 400px; height: 350px; margin: 0 auto"></div>
	</div>
	<div id="graph3">
		<div class="head">Average Time</div>
		<div id="graphBox3" style="width: 400px; height: 350px; margin: 0 auto"></div>
	</div>
	<div id="log">
		<h3>Most Recent Logins</h3>
    	<ul>
        	<li>Monday December 3rd, 2012 at 3:15 PM</li>
            <li>Monday November 19th, 2012 at 11:15 AM</li>
        	<li>Tuesday November 12th, 2012 at 3:45 PM</li>
        	<li>Friday November 11th, 2012 at 1:20 PM</li>
        	<li>Thursday November 9th, 2012 at 5:15 PM</li>
        </ul>
    </div>
</div>
    

<div id="guage">
</div>

<?php echo render('_footer') ?>