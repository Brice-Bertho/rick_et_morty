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

Route::get('/', 'CharacterController@characters');

Route::get('/character/{id}', 'CharacterController@character');
Route::get('/lastpage', 'CharacterController@lastpage');
Route::get('/previous/{id}', 'CharacterController@previous');
Route::get('/next/{id}', 'CharacterController@next');
