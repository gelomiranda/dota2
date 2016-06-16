<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->get('api/example','ExampleController@index');
$app->get('api/hero','HeroController@index');

$app->get('api/items','ItemController@index');
$app->get('api/item/{item_id}','ItemController@item');
$app->get('api/profile','ProfileController@index');