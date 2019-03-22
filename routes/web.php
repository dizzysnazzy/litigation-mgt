<?php

// Login view.

use Illuminate\Support\Facades\Route;

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
//    new user profile
    Route::get('/system/new_user', [
        'uses' => 'User\newUserCtrl@newUser',
    ]);

    Route::post('/system/new_user', [
        'as'   => 'register-new',
        'uses' => 'User\newUserCtrl@registerNew',
    ]);
//   end new user profile
Route::get('/system/view/users', [
    'uses' => 'User\newUserCtrl@viewUsers',
]);

Route::delete('/system/profile/{id}/delete', [
    'uses' => 'User\newUserCtrl@deleteUser',
]);
//matter view add edit destroy
Route::get('/system/matter/new', 'MatterCtrl@index');

Route::post('/system/matter/new', 'MatterCtrl@newMatter');

Route::get('/system/cases/view', 'MatterCtrl@viewMatters');

Route::get('/system/case/{id}/view', 'MatterCtrl@viewMatter');

Route::get('/system/case/{id}/update', 'MatterCtrl@editMatter');

Route::put('/system/case/{id}/update', 'MatterCtrl@updateMatter');

Route::delete('/system/matter/{id}/delete', 'MatterCtrl@destroy');

//Tasks view
Route::get('/system/task/{id}/new', 'TaskCtrl@addTask');

Route::post('/system/task/{id}/new', 'TaskCtrl@postTask');

