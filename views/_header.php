<!DOCTYPE HTML>
<html>
    <head>
        <title>Steelcase Administration</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="<?php static_url(); ?>css/reset.css">
        <link rel="stylesheet" href="<?php static_url(); ?>css/sorting_table.css">
        <link rel="stylesheet" href="<?php static_url(); ?>css/forms.css">
        <link rel="stylesheet" href="<?php static_url(); ?>css/style.css">
        <script src="<?php static_url(); ?>js/jquery-1.8.2.min.js"></script>
        <script src="<?php static_url(); ?>js/jquery.dataTables.min.js"></script>
        <script src="<?php static_url(); ?>js/ZeroClipboard.min.js"></script>
        <script src="<?php static_url(); ?>js/modal.js"></script>
        <script src="<?php static_url(); ?>js/crud.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
		<script src="http://code.highcharts.com/modules/exporting.js"></script>
        <script src="<?php static_url(); ?>js/test.js"></script>
    </head>
    <body>
        <div id="wrapper">
        <?php if (Auth::is_logged_in()): ?>
            <nav>
                <ul>
                    <li><a href="<?php static_url(); ?>/../../secure/">Dashboard</a></li>
                    <li><a href="<?php static_url(); ?>/../../users/">Admin Users</a></li>
                    <li><a href="<?php static_url(); ?>/../../glossary/">Glossary</a></li>
                    <li><a href="<?php static_url(); ?>/../../trainees/">Trainees</a></li>
                    <li><a href="<?php static_url(); ?>/../../module/">Modules</a></li>
                </ul>
            </nav><?php endif; ?>
            <div class="content">