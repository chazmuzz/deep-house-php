<?php namespace bm\model\event;

/**
 *	
 */
function query() {
	\deep\db\select('* from bm_job_time');
}

/**
 *
 */
function make() {
	$event = new \stdClass;
	return $event;
}

/**
 *	
 */
function save() {
	$event = new \stdClass;
	return $event;
}

/**
 *
 */
function get($id) {
	$event = new \stdClass;
	return $event;
}

/**
 *	
 */
function create() {
	$event = new \stdClass;
	return $event;
}

/**
 *	
 */
function update() {
	$event = new \stdClass;
	return $event;
}

/**
 *	
 */
function destroy() {
	return true;
}
