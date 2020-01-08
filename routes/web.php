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

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/user_login', 'AuthController@user_login');

Route::group(['middleware' => 'auth.user'], function () {

    Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard');
    Route::get('/register', 'AuthController@register');
    Route::post('/save_register', 'AuthController@save_register')->name('save_user');

    Route::get('/profile', 'AuthController@get_update_profile')->name('profile');
    Route::post('/save_profile', 'AuthController@save_profile');
    Route::post('delete_profile_picture', 'AuthController@deleteProfilePicture')->name('delete.profile.picture');
    Route::post('/UpdatePassword', 'AuthController@UpdatePassword');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});



Route::get('find_profile', 'ProfileController@find_profile');
Route::get('filter_profile', 'ProfileController@filter_profile')->name('search.profile');



