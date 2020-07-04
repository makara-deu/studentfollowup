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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('students', 'StudentController');
Route::get('/returnOutFollowUpView', 'StudentController@returnOutFollowUpView')->name('returnOutFollowUpView');
Route::resource('comments', 'CommentController');
Route::post('/addComment/{id}', 'CommentController@addComment')->name('addComment');
Route::get('/deleteComment/{id}', 'CommentController@deleteComment')->name('deleteComment');
Route::get('/outfollowup/{id}', 'StudentController@outfollowup')->name('outfollowup');
Route::get('/followup/{id}', 'StudentController@followup')->name('followup');