<?php

ncmvc\routing\page('default', function($request, $response) {
	ncmvc\routing\action('default', function() use ($request, $response) {
		$response->wasDefault = "YES";
	});
});