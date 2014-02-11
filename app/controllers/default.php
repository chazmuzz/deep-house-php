<?php

deep\routes\handle_page('default', function($request, $response) {
	deep\routes\handle_action('default', function($request, $response) {
		$response->wasDefault = "YES";
	});
});
