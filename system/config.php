<?php namespace deep\config;

/**
 *	Use this to define a configuration for a environment identified by $name.
 *	For example; defining options for a dev environment
 *	deep/config/environment('dev', function($config) { 
 *		$config->option = "foo";
 *		return $config;
 *	});
 */
function environment($name, $definition) {
	$config = get();
	$config = $definition($config);
}

function get() {
	static $config;
	if (!isset($config)) {
		$config = make();
	}
	return $config;
}

function make() {
	$config = new \stdClass;
	$config->db = new \stdClass;
	$config->db->host = 'localhost';
	$config->db->user = 'root';
	$config->db->pass = '';
	$config->db->database = 'default';
	return $config;
}
