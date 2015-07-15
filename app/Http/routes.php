<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

/**
 * Registration
 */
Route::get('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@create',
]);

Route::post('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store',
]);

/**
 * Sessions
 */
Route::get('login', [
    'as' => 'login_path',
    'uses' => 'SessionController@create',
]);

Route::post('login', [
    'as' => 'login_path',
    'uses' => 'SessionController@store',
]);

Route::get('logout', [
    'as' => 'logout_path',
    'uses' => 'SessionController@destroy',
]);

/**
 * Statuses
 */
Route::get('statuses', [
    'as' => 'statuses_path',
    'uses' => 'StatusesController@index',
]);

Route::post('statuses', [
    'as' => 'statuses_path',
    'uses' => 'StatusesController@store',
]);

/**
 * Users
 */
Route::get('users', [
    'as' => 'users_path',
    'uses' => 'UsersController@index',
]);

Route::get('@{username}', [
    'as' => 'profile_path',
    'uses' => 'UsersController@show'
]);

/**
 * Follows
 */
Route::post('follows', [
    'as' => 'follows_path',
    'uses' => 'FollowsController@store'
]);

Route::delete('follows/{id}', [
    'as' => 'unfollow_path',
    'uses' => 'FollowsController@destroy'
]);

/**
 * Password
 */
Route::controller('password', 'PasswordController');

/**
 * Comments
 */

Route::post('statuses/{id}/comment', [
    'as' => 'comment_path',
    'uses' => 'CommentsController@store'
]);
