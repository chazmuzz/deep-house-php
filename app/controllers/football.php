<?php

bm\route\page('teams', function($request, $response)
{
	bm\route\action('default', function($request, $response)
	{
		$response->view->title = "Pony.";
	});

	bm\route\action('create', function($request, $response) 
	{
		$new = bm\model\create('teams');
		$new->name = "Livepool";
		$new->players = bm\model\create('players');
		bm\model\save($new);
	});

	bm\route\action('read', function($request, $response) 
	{
		$response->data->animal = new stdClass;
		$response->data->animal->name = "Pony";
	});

	bm\route\action('update', function($request, $response) 
	{
		
	});

	bm\route\action('destroy', function($request, $response) 
	{
		
	});
});
