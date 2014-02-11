<?php

deep\config\environment('dev', function($config) {
	$config->db->user = 'bmore';
	$config->db->pass = 'my-special-secure-password-321$';
});
