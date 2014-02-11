<?php namespace deep\util;

function requireDirectory($dir) {
	$dir = realpath($dir);
	if ($handle = opendir($dir)) {
	    while (false !== ($entry = readdir($handle))) {
	    	$path = $dir . '/' . $entry;
            $info = pathinfo($path);
	    	if (file_exists($path) && isset($info['extension']) && $info['extension'] === 'php') {
				require_once $path;
			}
	    }
	    closedir($handle);
	}
}
