//
// This file contains the configuration for the AMD loader require.js.  I'm
// using require.js so that only the javascript files that are needed for a
// specific page are actually included.  Each page has a main view, which 
// defines a set of dependencies.  In _content.tpl, the main file for the page
// is loaded automatically.  For that to happen, there needs to be a javascript
// file with the same name as the page. This follows the practice of naming the
// controller, template and main script using the page name.
//
// For example, the overview page will call the following files:
//	- overview.php (view controller)
//	- overview.tpl (view HTML template)
//	- overview.js (client side view controller)
// 
require.config({
	paths: {
		'jquery': 'lib/jquery-2.1.0.min',
		'underscore': 'lib/underscore-min',
		'backbone': 'lib/backbone-min',
		'bootstrap': 'lib/bootstrap.min',
	},
	shim: {
		'backbone': {
			deps: ['underscore', 'jquery'],
			exports: 'Backbone'
		},
		'underscore': {
			exports: '_'
		},
		'jquery': {
			exports: '$'
		},
		'bootstrap': {
			deps: ['jquery']
		}
	}
})