deep-house-php
==============

What is this?

A little MVC style framework that lets you simply write request->response PHP applications.  The framework has no classes or global variables, rather just some static functions that you call to define handlers for specific routes

Here is an example of a basic CRUD controller:

```
deep\routes\handle_page('person', function($request) {

  deep\routes\handle_action('default', function($request) {
    $models = app\models\person\fetch();
    deep\response\set('models', $models);
  });
  
  deep\routes\handle_action('create', function($request) {
    $model = app\model\person\create();
    $model->name = $request->params->name;
    $model->age = $request->params->age;
    app\model\person\save($model);
    deep\response\set('model', $model);
  });
  
  deep\routes\handle_action('destroy', function($request) {
    $destroyed = app\model\person\destroy($request->params->id);
    deep\response\set('destroyed', $success);
  });
  
});
```
