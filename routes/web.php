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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function(){
	Route::resource('companies','companyController');
	Route::resource('projects','projectController');
	Route::get('/projects/create/{company_id?}','projectController@create');
	Route::post('projects/adduser','projectController@adduser')->name('projects.adduser');
	Route::resource('roles','roleController');
	Route::resource('users','taskController');
	Route::resource('users','userController');
	Route::resource('tasks','taskController');
	Route::resource('comments','commentController');


});

