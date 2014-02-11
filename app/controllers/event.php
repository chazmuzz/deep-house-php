<?php

ncmvc\routing\page('event', function($request, $response) {
	$user = $request->user;

	ncmvc\routing\action('default', function() use ($request, $response, $user) {
		$response->foo = "foo";
		$response->user = $request->user;
	});

	ncmvc\routing\action('create', function() use ($request, $response, $user) {
		$event = \bm\model\event\make();
		if ($request->event) {
			foreach ($request->event as $key => $value) {
				$event->$key = $value;
			}
		}
		$response->event = \bm\model\event\save($event);
	});

	ncmvc\routing\action('read', function() use ($request, $response, $user) {
		if ($request->id) {
			$response->events = \bm\model\event\get($request->id);
		} else {
			$user = $request->user;
			$response->events = \bm\model\event\get($user, $request->start, $request->end);
		}
	});
 
	ncmvc\routing\action('update', function() use ($request, $response, $user) {
		$event = \bm\model\event\get($request->event->id);
		if ($request->event) {
			foreach ($request->event as $key => $value) {
				$event->$key = $value;
			}
		}
		$response->event = \bm\model\event\save($event);
	});

	ncmvc\routing\action('destroy', function() use ($request, $response, $user) {
		$event = \bm\model\event\get($request->event->id);
		$response->event = $request->event->id;
		$response->destroyed = \bm\model\event\destroy($event);
	});
});


/**
 *	@page overview
 */
bm\route\handle_page('overview', function($request) {

	/**
	 *	@action default
	 */
	bm\route\handle_action('default', function($request) {
		bm\response\set_data('jobs', BMJobFetchList($request->user));
		bm\response\set_view_opt('title', 'Overview | Default');
	});

	/**
	 *	@action create
	 */
	bm\route\handle_action('create', function($request) {
		bm\response\set('jobs', BMJobFetchList($request->user));
	});

	/**
	 *	@action read
	 */
	bm\route\handle_action('read', function($request) {
		bm\response\set('jobs', BMJobFetchList($request->user));
	});

	/**
	 *	@action update
	 */
	bm\route\handle_action('update', function($request) {

	});

	/**
	 *	@action destroy
	 */
	bm\route\handle_action('destroy', function($request) {

	});
});