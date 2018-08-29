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


/*---------------------------------------HOME------------------------------------------------*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*---------------------------------------TEAM------------------------------------------------*/

Route::get('team/add', 'TeamController@add')->middleware('admin');

Route::post('team/store', 'TeamController@store');

Route::get('team/{id?}', 'TeamController@show');

Route::get('teams', 'TeamController@showAll');

Route::get('teams/{id?}', 'TeamController@showStats');

Route::post('team/sendidtoformeditteam/{id}', 'TeamController@sendIdToFormEditTeam');

Route::get('team/formeditteam', 'TeamController@formEditTeam');

Route::post('team/editteam', 'TeamController@editTeam');

/*---------------------------------------PLAYER------------------------------------------------*/

Route::get('player/add', 'PlayerController@add')->middleware('admin');

Route::post('player/store', 'PlayerController@store');

Route::get('player/delete', 'PlayerController@deletePage');

Route::post('player/delete', 'PlayerController@deletePlayer');

Route::get('player/{id?}', 'PlayerController@show');

Route::get('players', 'PlayerController@showAll');

Route::post('players/delete/{id}', 'PlayerController@delete');

Route::post('players/sendidtoformedit/{id}', 'PlayerController@sendIdToFormEdit');

Route::get('players/formedit', 'PlayerController@formEdit');

Route::post('player/edit', 'PlayerController@edit');

/*---------------------------------------ADMIN------------------------------------------------*/

Route::get('admin', 'AdminController@showPage')->middleware('admin');

/*---------------------------------------IMAGE UPLOAD------------------------------------------------*/


/*---------------------------------------GAMES------------------------------------------------*/

Route::get('games', 'GameController@displayAllUpcoming');

Route::get('game/add', 'GameController@add')->middleware('admin');

Route::post('game/store', 'GameController@store');

/*---------------------------------------USER------------------------------------------------*/

Route::get('user', 'UserController@display');


