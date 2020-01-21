<?php


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/** ======================================================================== */
Route::middleware('auth')->group(function () {
    Route::get('/friends', 'FriendController@index')->name('friends.index');

    Route::get('/chat', 'ChatController@index')->name('chat.index');
    Route::get('/chat/{id}', 'ChatController@show')->name('chat.show');
    Route::post('/chat/getChat/{id}', 'ChatController@getChat')->name('getchat');
    Route::post('/chat/sendChat', 'ChatController@sendChat')->name('sendchat');
});
