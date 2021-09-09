<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/msg/{msg?}', function($msg = 'no message.'){

    $html = <<<EOF
    <h1>{$msg}</h1>
    EOF;

    return $html;
});

Route::get('hello','HelloController@index');

Route::get('hello/other','HelloController@other');

Route::get('single','SingleActionController');


