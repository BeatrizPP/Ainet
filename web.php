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

Route::get('/', 'RouteController@mainView')->name('main');

Route::get('/contacts', 'UserController@index')->name('contacts');

Route::get('/contacts/{orderCode}', 'UserController@indexOrdered')->name('contactsOrdered');

Route::get('/profile-page/{user}', 'UserController@show')->name('profilePage');

Route::get('/personal-profile', 'RouteController@editProfileView')->name('personalProfile');

Route::get('/request-description/{printRequest}', 'PrintRequestController@show')->name('requestDescription');

Route::post('/request-description/{printRequestID}', 'CommentController@store')->name('comment.store');

Route::post('/request-description/{printRequestID}/{parentCommentID}', 'CommentController@reply')->name('comment.reply');

Route::get('/request-description/{printRequestID}/{commentID}', 'CommentController@switch')->name('comment.switch');

Route::get('/personal-requests', 'PrintRequestController@currentUserIndex')->name('personalRequests');

Route::get('/requests-admin', 'RouteController@requestsAdminView')->name('requestsAdmin')->middleware(['auth', 'admin']);

Route::get('/request-create', 'PrintRequestController@create')->name('requestCreate');

Route::post('/request-create', 'PrintRequestController@store');

Route::get('/list-all-requests/', 'PrintRequestController@index')->name('listAllRequests');

Route::get('/list-all-requests/{orderCode}', 'PrintRequestController@indexOrdered')->name('listAllRequestsOrdered');

Route::get('/stats/{depID}', 'RouteController@mainViewByDepartment')->name('mainByDepartment');

Route::get('/register/verify/{token}', 'RegistrationController@verify');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/userBlock','UserController@block')->name('block');

Route::post('/userAdmin','UserController@makeAdmin');

Route::post('/approve','PrintRequestController@approve');

Route::post('/deny','PrintRequestController@deny');

Route::post('/filter','PrintRequestController@filter');

Auth::routes();

//or

// Authentication Routes...
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//
//// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
//
//// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');



//////// old routes ///////

//Route::get('/welcome', 'welcome')->name('welcome');
//Route::get('/example', 'example')->name('example');

//Route::get('/request-create-edit', 'RouteController@requestsCreationEditView')-> name('requestCreateEdit');
//Route::get('/create-profile', 'RegistrationController@create')->name('createProfile');
//Route::post('/create-profile', 'RegistrationController@store');
//Route::get('/login', 'SessionController@create');
//Route::post('/login', 'SessionController@store');
//Route::get('/logout', 'SessionController@destroy');
//Route::get('/home', 'RouteController@mainView')->name('home');