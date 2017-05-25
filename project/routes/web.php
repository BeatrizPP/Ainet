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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return view('example');
});

Route::get('/', [
    'uses' => 'RouteController@mainView',
    'as' => 'main'
]);

Route::get('/home', 'RouteController@mainView')->name('home');

Route::get('/contacts', [
    'uses' => 'UserController@index',
    'as' => 'contacts'
]);

Route::get('/profile-page/{user}', [
    'uses' => 'UserController@show',
    'as' => 'profilePage'
]);

Route::get('/personal-profile', [
    'uses' => 'RouteController@editProfileView',
    'as' => 'personalProfile'
]);

Route::get('/create-profile', [
    'uses' => 'RegistrationController@create',
    'as' => 'createProfile'
]);

Route::post('/create-profile', 'RegistrationController@store');

Route::get('/login', 'SessionController@create');

Route::post('/login', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy');


Route::get('/request-description/{printRequest}', [
    'uses' => 'PrintRequestController@show',
    'as' => 'requestDescription'
]);

Route::get('/personal-requests', [
    'uses' => 'PrintRequestController@currentUserIndex',
    'as' => 'personalRequests'
]);

Route::get('/requests-admin', [
    'uses' => 'RouteController@requestsAdminView',
    'as' => 'requestsAdmin'
]);

Route::get('/request-create-edit', [
    'uses' => 'RouteController@requestsCreationEditView',
    'as' => 'requestCreateEdit'
]);

Route::get('/request-create', [
    'uses' => 'PrintRequestController@create',
    'as' => 'requestCreate'
]);

Route::post('/request-create', 'PrintRequestController@store');

Route::get('/list-all-requests',[
    'uses' => 'PrintRequestController@index',
    'as' => 'listAllRequests'
]);
