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
			'host'      => getenv("DB_HOST"),
			'database'  => getenv("DB_NAME"),
			'username'  => getenv("DB_USER"),
			'password'  => getenv("DB_PASSWORD"),
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