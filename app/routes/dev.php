<?php

use Puppers\User;

$app->get('/dev', function($req, $res, $args){
	$users = User::all();
	return $res->withStatus(200)->withJson($users);
});

?>
