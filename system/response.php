<?php namespace deep\response;

function get() {
	static $response;
	if (!isset($response)) {
		$response = new \stdClass;
	}
	return $response;
}
