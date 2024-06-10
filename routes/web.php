<?php 

  $route = [];

  $routes['GET']['/'] = 'WelcomeController@index';
  $routes['GET']['/home'] = 'HomeController@index';

  $routes['GET']['/login'] = 'AuthController@viewlogin';
  $routes['GET']['/register'] = 'AuthController@viewregister';
  $routes['POST']['/login'] = 'AuthController@login';
  $routes['POST']['/register'] = 'AuthController@register';
  $routes['GET']['/logout'] = 'AuthController@logout';


  # Example
  // $routes['GET']['/example'] = 'ExampleController@index';
  // $routes['GET']['/examplecreate'] = 'ExampleController@formcreate';
  // $routes['GET']['/exampleupdate/{id}'] = 'ExampleController@formupdate';
  // $routes['POST']['/example'] = 'ExampleController@create';
  // $routes['POST']['/example/{id}'] = 'ExampleController@update';
  // $routes['GET']['/exampledelete/{id}'] = 'ExampleController@delete';


?>