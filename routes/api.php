<?php

use Illuminate\Http\Request;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::post('register', 'AuthenticationController@register')->name('auth.register');
Route::get('login', 'AuthenticationController@login')->name('auth.login');

Route::group(['middleware' => ['auth:api']], function() {

    Route::get('test', 'AuthenticationController@test')->name('auth.test');


    Route::group(['prefix'=>'game'], function(){
        Route::get('/', 'GameController@index')->name('game.index');
        Route::post('/', 'GameController@create')->name('game.create');

        Route::post('/explore', 'GameController@explore')->name('game.explore');


    });

});

