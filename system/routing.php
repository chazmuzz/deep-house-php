<?php namespace deep\routes;

function handle_page($page, $handler) {
	$request = \deep\request\get();
	$response = \deep\response\get();
	if ($page == $request->page) {
		$response = $handler($request, $response);
	}
}

function handle_action($action, $handler) {
	$request = \deep\request\get();
	$response = \deep\response\get();
	if ($action == $request->action) {
		$handler($request, $response);
	}
}

function include_page($page, $action, $arguments) {
	$request = new \stdClass;
	$request->page = $page;
	$request->action = $action;
	$request->arguments = $arguments;
	return \deep\handle_request($request);
}
