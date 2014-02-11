<?php namespace ncmvc\routing;

function page($page, $handler) {
	$request = \ncmvc\request\get();
	$response = \ncmvc\response\get();
	if ($page == $request->page) {
		$response = $handler($request, $response);
	}
}

function action($action, $handler) {
	$request = \ncmvc\request\get();
	if ($action == $request->action) {
		$handler();
	}
}

function include_page($page, $action, $arguments) {
	$request = new \stdClass;
	$request->page = $page;
	$request->action = $action;
	$request->arguments = $arguments;
	return \ncmvc\handle_request($request);
}
