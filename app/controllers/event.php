<?php

use function deep\routes\handle_page;
use function deep\routes\handle_action;

handle_page('event', function($request, $response) {
	$user = $request->user;

	handle_action('default', function() use ($request, $response, $user) {
		$response->foo = "foo";
		$response->user = $request->user;
	});

	handle_action('create', function() use ($request, $response, $user) {
		$event = bm\model\event\make();
		if ($request->event) {
			foreach ($request->event as $key => $value) {
				$event->$key = $value;
			}
		}
		$response->event = bm\model\event\save($event);
	});

	handle_action('read', function() use ($request, $response, $user) {
		if ($request->id) {
			$response->events = bm\model\event\get($request->id);
		} else {
			$user = $request->user;
			$response->events = bm\model\event\get($user, $request->start, $request->end);
		}
	});
 
	handle_action('update', function() use ($request, $response, $user) {
		$event = bm\model\event\get($request->event->id);
		if ($request->event) {
			foreach ($request->event as $key => $value) {
				$event->$key = $value;
			}
		}
		$response->event = bm\model\event\save($event);
	});

	handle_action('destroy', function() use ($request, $response, $user) {
		$event = bm\model\event\get($request->event->id);
		$response->event = $request->event->id;
		$response->destroyed = bm\model\event\destroy($event);
	});
});

