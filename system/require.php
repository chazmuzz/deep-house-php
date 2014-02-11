<?php namespace ncmvc\util;

function requireDirectory($dir) {
	$dir = realpath($dir);
	if ($handle = opendir($dir)) {
	    while (false !== ($entry = readdir($handle))) {
	    	$path = $dir . '/' . $entry;
	    	if (file_exists($path) && pathinfo($path)['extension'] === 'php') {
				require_once $path;
			}
	    }
	    closedir($handle);
	}
}