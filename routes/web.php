<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/** ======================================================================== */
Route::get('/friends', 'FriendController@index')->name('friends.index')->middleware('auth');

