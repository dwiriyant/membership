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
Route::get('/listmembership', 'MembershipController@FUNC_LIST');
Route::get('/addmembership', 'MembershipController@FUNC_ADD');
Route::post('/savemembership', 'MembershipController@FUNC_SAVE');
Route::get('/editmembership/{id}', 'MembershipController@FUNC_EDIT');
Route::post('/updatemembership/{id}', 'MembershipController@FUNC_UPDATE');
Route::get('/deletemembership/{id}', 'MembershipController@FUNC_DELETE');
Auth::routes();

Route::get('/home', 'HomeController@index');
