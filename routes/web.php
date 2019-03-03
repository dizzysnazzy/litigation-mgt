<?php

// Login view.
Route::get('/', [
    'uses' => 'Auth\LoginController@login',
]);

Route::post('login', [
    'as'   => 'login',
    'uses' => 'Auth\LoginController@postLogin',
]);

// Register view.
Route::get('register', [
    'uses' => 'Auth\RegisterController@create',
]);

Route::post('register', [
    'as'   => 'register',
    'uses' => 'Auth\RegisterController@register',
]);

// system admin routes
Route::get('/sys/admin', function() {
  return view('system.home');
});

Route::get('/system/register', [
    'uses' => 'Auth\RegisterController@new_user',
]);

Route::post('/system/register', [
    'as'   => 'register-new',
    'uses' => 'Auth\RegisterController@registerNew',
]);

route::get('/system/new_user', 'User\newUserCtrl@newUser');
