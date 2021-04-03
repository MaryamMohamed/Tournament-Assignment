<?php

use Illuminate\Support\Facades\Route;

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
//Route::resource('Team', 'App\Http\Controllers\TeamController');

Route::get('/create-Team', 'App\Http\Controllers\TeamController@create')->name('team.create');
Route::Post('/store-Team', 'App\Http\Controllers\TeamController@store')->name('team.store');

Route::get('/create-Match', 'App\Http\Controllers\MatchController@create')->name('match.create');
Route::Post('/store-Match', 'App\Http\Controllers\MatchController@store')->name('match.store');

Route::get('/Teams', 'App\Http\Controllers\TeamController@index')->name('match.index');