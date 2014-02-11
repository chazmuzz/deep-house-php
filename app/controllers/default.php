<?php

deep\routing\page('default', function($request, $response) {
	deep\routing\action('default', function() use ($request, $response) {
		$response->wasDefault = "YES";
	});
});
