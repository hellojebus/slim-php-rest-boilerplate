<?php

/*
 * Composer Autoload
 * */

require './vendor/autoload.php';

/*
 * Load Config Vars
 * */

if($_SERVER['SERVER_NAME'] == "localhost"){
	$dotenv = new Dotenv\Dotenv(__DIR__);
	$dotenv->load();
}

/*
 * App Setup
 * */

require 'app/config/setup.php';

/*
 * Middleware
 * */

require  'app/config/middleware.php';

/*
 * DB Connect
 * */

require 'app/config/eloquent.php';


/*
 * Models
 * */

foreach (glob("app/models/*.php") as $filename)
{
	include $filename;
}

/*
 * Routes
 * */

foreach (glob("app/routes/*.php") as $filename)
{
	include $filename;
}

/*
 * Run App
 * */

$app->run();

?>
