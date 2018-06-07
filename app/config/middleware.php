<?php

use Slim\Middleware\JwtAuthentication;

/*
 * JWT Auth
 * */

$container = $app->getContainer();

/*
 * Options for JWT (outside of function due to scope issues w/ $jwtSecret)
 * */

$options = [
	"secret" => getenv("JWT_SECRET"),
	"passthrough" => ["/dev/", "/auth/"],
	"path" => ["/v1/"],
	"attribute" => "jwt",
	"secure" => false,
	"algorithm" => "HS256",
	"error" => function ($request, $response, $arguments) {
		$data["status"] = "error";
		$data["message"] = $arguments["message"];
		return $response
			->withStatus(401)
			->withHeader("Content-Type", "application/json")
			->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
	},
];
 
$container["JwtAuthentication"] = function ($container) {

	global $options;
	return new JwtAuthentication($options);
};

$app->add("JwtAuthentication");

/*
 * Enable CORS
 * */

$app->add(function ($req, $res, $next) {
	$response = $next($req, $res);
	return $response
		->withHeader('Access-Control-Allow-Origin', '*')
		->withHeader('Access-Control-Allow-Credentials', 'true')
		->withHeader('Access-Control-Allow-Headers', 'Cache-Control, Accept, Pragma, Origin, Authorization, Content-Type, X-Requested-With')
		->withHeader('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS');
});

?>