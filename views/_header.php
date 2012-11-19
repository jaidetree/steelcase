<!DOCTYPE HTML>
<html>
    <head>
        <title>Steelcase Administration</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="<?php static_url(); ?>css/reset.css" type="text/css">
        <link rel="stylesheet" href="<?php static_url(); ?>css/sorting_table.css" type="text/css">
        <link rel="stylesheet" href="<?php static_url(); ?>css/forms.css" type="text/css">
        <link rel="stylesheet" href="<?php static_url(); ?>css/style.css" type="text/css">
        <link rel="stylesheet" href="<?php static_url(); ?>css/dash.css" type="text/css"/>
        <script src="<?php static_url(); ?>js/jquery-1.8.2.min.js"></script>
        <script src="<?php static_url(); ?>js/jquery.dataTables.min.js"></script>
        <script src="<?php static_url(); ?>js/ZeroClipboard.min.js"></script>
        <script src="<?php static_url(); ?>js/modal.js"></script>
        <script src="<?php static_url(); ?>js/crud.js"></script>
        <script src="<?php static_url(); ?>js/highcharts.js"></script>
        <script src="<?php static_url(); ?>js/dashboard.js"></script>
    </head>
    <body>
        <div id="wrapper">
        <?php if (Auth::is_logged_in()): ?>
            <nav>
                <ul>
                    <li><a href="<?php url('Pages.secure'); ?>">Dashboard</a></li>
                    <li><a href="<?php url('Glossary.index'); ?>">Glossary</a></li>
                    <li><a href="<?php url('Trainees.index'); ?>">Trainees</a></li>
                    <li><a href="<?php url('Performances.index'); ?>">Performance</a></li>
                    <li><a href="<?php url('PerformanceObjects.index'); ?>">Performance Objects</a></li>
                    <li><a href="<?php url('Modules.index'); ?>">Modules</a></li>
                    <li><a href="<?php url('Users.index'); ?>">Admin Users</a></li>
                    <li><a href="<?php url('Account.logout'); ?>">Logout</a></li>
                </ul>
            </nav><?php endif; ?>
            <div class="content">