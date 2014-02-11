<?php

deep\routes\handle_page('teams', function($request, $response)
{
	deep\routes\handle_action('default', function($request, $response)
	{
		$response->view->title = "Pony.";
	});

	deep\routes\handle_action('create', function($request, $response) 
	{
		$new = bm\model\create('teams');
		$new->name = "Livepool";
		$new->players = bm\model\create('players');
		bm\model\save($new);
	});

	deep\routes\handle_action('read', function($request, $response) 
	{
		$response->data->animal = new stdClass;
		$response->data->animal->name = "Pony";
	});

	deep\routes\handle_action('update', function($request, $response) 
	{
		
	});

	deep\routes\handle_action('destroy', function($request, $response) 
	{
		
	});
});
