<?php echo render('_header') ?>

<script src="<?php static_url(); ?>js/highcharts.js"></script>
<script src="<?php static_url(); ?>js/dashboard.js"></script>

<h1>Steelcase Training Dashboard</h1>

                    
<div class="page">
    <div id="main">
    	<ul>
        	<li>
                <div class="ribbon1"></div> 1st place
                <div class="box" >
                    <a href="<?php url('trainees.report', 2) ?>">Trainee 00000-001</a> scored <b>99.5%</b><br/>
                    <i>Monday November 19th, 2012 at 3:15 PM</i>
                </div>
            </li>
            <li>
                <div class="ribbon2"></div> 2nd place
                <div class="box">
                    <a href="<?php url('trainees.report', 3) ?>">Trainee 00000-0001</a> scored <b>94.4%</b> <br/>
                    <i>Monday November 19th, 2012 at 3:15 PM</i>
                </div>
            </li>
        	<li>
                <div class="ribbon3"></div> 3rd place
                <div class="box">
                    <a href="<?php url('trainees.report', 5) ?>">Trainee 00000-006</a> scored <b>93.7%</b> <br/>
                    <i>Monday November 19th, 2012 at 3:15 PM</i>
                </div>
            </li>
    	</ul>
        
        <div id="prevLogin">
            <h3>Most Recent Logins</h3>
        	<ul>
                <?php foreach($trainees as $trainee): ?>
            	<li>
                    <a href="<?php url('trainees.report', $trainee->id ) ?>">Trainee <?php echo $trainee->employee_id  ?></a> on 5:45pm on Monday 3th December 2012
                    <!-- $trainee->last_visited_at->format('g:ia \o\n l jS F Y') -->
                </li>

                <?php endforeach; ?>
            </ul>
        </div><!-- #prevLogin -->
    </div><!-- #main -->

    <div id="side">
    	<div id="graph"> 
            <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
        </div><!-- #graph -->
    </div><!-- #side -->
</div><!-- .page -->

<?php echo render('_footer') ?>