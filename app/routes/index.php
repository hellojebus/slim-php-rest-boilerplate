<?php

$app->get('/', function($req, $res, $args){
	return $res->withStatus(401)->withJson(array('error'=>'api key required'));
});

?>