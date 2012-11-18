<?php echo render('_header') ?>
<link href="<?php static_url(); ?>css/dash.css" rel="stylesheet" type="text/css" />

<h1>You can now see the secure content!</h1>

<div class="page">
    <div id="main">
    	<ul>
        	<li>
                <div class="ribbon1">
                </div>1st place
                <div class="box" > table stuff can go
                </div>
            </li>
            <li>
                <div class="ribbon2">
                </div>2nd place
                <div class="box"> more table stuff can go here
                </div>
            </li>
        	<li>
                <div class="ribbon3">
                </div>3rd place
                <div class="box"> and alas, even more table stuff
                </div>
            </li>
    	</ul>
        
        <div id="prevLogin">
            Previous Logins
        	<ul>
            	<li>
                    guy
                </li>
                <li>
                    guy
                </li>
                <li>
                    guy
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