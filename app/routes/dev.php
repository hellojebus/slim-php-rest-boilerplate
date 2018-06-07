<?php

$app->get('/dev', function($req, $res, $args){
	$message = ["message" => "This is a development route"];
	return $res->withStatus(200)->withJson($message);
});

?>
