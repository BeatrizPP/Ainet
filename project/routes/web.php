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

Route::get('/contacts', [
    'uses' => 'RouteController@contactsView',
    'as' => 'contacts'
]);

Route::get('/profile-page', [
    'uses' => 'RouteController@profilePageView',
    'as' => 'profilePage'
]);

Route::get('/personal-profile', [
    'uses' => 'RouteController@editProfileView',
    'as' => 'personalProfile'
]);

Route::get('/request-description', [
    'uses' => 'RouteController@requestDescriptionView',
    'as' => 'requestDescription'
]);

Route::get('/personal-requests', [
    'uses' => 'RouteController@listRequestsView',
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

Route::get('/list-all-requests', [
    'uses' => 'RouteController@allRequestsView',
    'as' => 'listAllRequests'
]);