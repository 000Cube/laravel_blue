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

use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/msg/{msg?}', function($msg = 'no message.'){

    $html = <<<EOF
    <h1>{$msg}</h1>
    EOF;

    return $html;
});

Route::get('hello','HelloController@index')
->middleware('helo');

Route::post('hello','HelloController@post')
->middleware('helo');


Route::get('hello/other','HelloController@other');

Route::get('hello/view/{id?}','HelloController@view');
Route::get('hello/query','HelloController@query');

Route::get('hello/blade','HelloController@blade');
Route::post('hello/blade','HelloController@bladePost');

Route::get('hello/foreach','HelloController@forEach');
Route::get('hello/for','HelloController@For');
Route::get('hello/while','HelloController@While');


Route::get('single','SingleActionController');




