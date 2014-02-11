<?php

deep\routing\page('teams', function($request, $response)
{
	deep\routing\action('default', function($request, $response)
	{
		$response->view->title = "Pony.";
	});

	deep\routing\action('create', function($request, $response) 
	{
		$new = bm\model\create('teams');
		$new->name = "Livepool";
		$new->players = bm\model\create('players');
		bm\model\save($new);
	});

	deep\routing\action('read', function($request, $response) 
	{
		$response->data->animal = new stdClass;
		$response->data->animal->name = "Pony";
	});

	deep\routing\action('update', function($request, $response) 
	{
		
	});

	deep\routing\action('destroy', function($request, $response) 
	{
		
	});
});
