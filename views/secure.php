<?php echo render('_header') ?>

<h1>Steelcase Training Dashboard</h1>

<div class="page">
    <div id="main">
    	<ul>
        	<li>
                <div class="ribbon1"></div> 1st place
                <div class="box" >
                    <a href="#">Trainee 321241</a> scored <b>99.5%</b><br/>
                    <i>Monday November 19th, 2012 at 3:15 PM</i>
                </div>
            </li>
            <li>
                <div class="ribbon2"></div> 2nd place
                <div class="box">
                    <a href="#">Trainee 345541</a> scored <b>94.4%</b> <br/>
                    <i>Monday November 19th, 2012 at 3:15 PM</i>
                </div>
            </li>
        	<li>
                <div class="ribbon3"></div> 3rd place
                <div class="box">
                    <a href="#">Trainee 421213</a> scored <b>93.7%</b> <br/>
                    <i>Monday November 19th, 2012 at 3:15 PM</i>
                </div>
            </li>
    	</ul>
        
        <div id="prevLogin">
            <h3>Most Recent Logins</h3>
        	<ul>
            	<li>
                    <a href="#">Trainee 321241</a> on Monday November 19th, 2012 at 3:15 PM
                </li>
                <li>
                    <a href="#">Trainee 345541</a> on Monday November 19th, 2012 at 1:30 PM
                </li>
                <li>
                    <a href="#">Trainee 421213</a> on Monday November 19th, 2012 at 10:23 AM
                </li>
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