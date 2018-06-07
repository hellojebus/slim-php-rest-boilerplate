<?php

/*
 * Current API Version
 * */

$apiVersion = '/v1';

/*
 *
 * */

$settings = [
	'settings' => [
		'db'                  => [
			// Eloquent configuration
			'driver'    => 'mysql',
			'host'      => $db["host"],
			'database'  => $db["db"],
			'username'  => $db["username"],
			'password'  => $db["password"],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		],
		'displayErrorDetails' => true,
	],
	'notFoundHandler' => function ($c) {
		return function ($request, $response) use ($c) {
			return $c['response']
				->withStatus(404)
				->withJson(['error' => 'invalid request']);
		};
	}
];


/*
 * Init App
 * */

$app = new Slim\App($settings);


?>