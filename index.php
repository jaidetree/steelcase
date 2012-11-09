<?php
include "bootstrap.php";
APP::module('router')->load_route(preg_replace('/^\//', '', $_SERVER['REQUEST_URI']) );
?>
