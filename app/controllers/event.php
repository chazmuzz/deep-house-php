<?php

deep\routing\page('event', function($request, $response) {
	$user = $request->user;

	deep\routing\action('default', function() use ($request, $response, $user) {
		$response->foo = "foo";
		$response->user = $request->user;
	});

	deep\routing\action('create', function() use ($request, $response, $user) {
		$event = \bm\model\event\make();
		if ($request->event) {
			foreach ($request->event as $key => $value) {
				$event->$key = $value;
			}
		}
		$response->event = \bm\model\event\save($event);
	});

	deep\routing\action('read', function() use ($request, $response, $user) {
		if ($request->id) {
			$response->events = \bm\model\event\get($request->id);
		} else {
			$user = $request->user;
			$response->events = \bm\model\event\get($user, $request->start, $request->end);
		}
	});
 
	deep\routing\action('update', function() use ($request, $response, $user) {
		$event = \bm\model\event\get($request->event->id);
		if ($request->event) {
			foreach ($request->event as $key => $value) {
				$event->$key = $value;
			}
		}
		$response->event = \bm\model\event\save($event);
	});

	deep\routing\action('destroy', function() use ($request, $response, $user) {
		$event = \bm\model\event\get($request->event->id);
		$response->event = $request->event->id;
		$response->destroyed = \bm\model\event\destroy($event);
	});
});

