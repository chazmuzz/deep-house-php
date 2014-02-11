<?php namespace deep\request;

function get() {
	static $request;
	if (!isset($request)) {
		$request = make();
	}
	return $request;
}

function make() {
	global $argc, $argv;

	$request = new \stdClass;

	if (count($argc) > 0) {
		$request->cli = true;
	} 

	if ($request->cli) {
		$request->page = ($argc > 1) ? $argv[1] : 'default';
		$request->action = ($argc > 2) ? $argv[2] : 'default';
	} else {
		$request->page = $_REQUEST['page'];
		$request->action = $_REQUEST['action'];
	}

	$request->user = new \stdClass;
	$request->user->name = "charlie.murray";
	$request->user->employee = 19;

	$request->view = "html";

	$request->params = new \stdClass;
	foreach ($_REQUEST as $key => $value) {
		$request->params->$key = $value;
	}
	
	return $request;
}
