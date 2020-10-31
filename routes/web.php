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

    Route::get('admin/login', 'AdminController@login')->name('admin.login');
    Route::post('admin/admin_login', 'AdminController@postLogin');
    Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
    

    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/user_login', 'AuthController@user_login');

    Route::get('/register', 'AuthController@register');
    Route::get('verify_account', 'AuthController@verifyAccount');
    Route::post('/save_register', 'AuthController@save_register')->name('save_user');


    // Reset Password
    Route::get('check_email_page', 'AuthController@checkEmailPage')->name('check_email_page');
    Route::post('forgot_password', 'AuthController@forgotPassword')->name('user.forgot.password');
    Route::get('reset_password', 'AuthController@showResetPasswordPage')->name('reset.password');
    Route::post('reset_password', 'AuthController@resetPassword')->name('user_reset_password');
    


Route::group(['middleware' => 'auth.user'], function () {

    Route::get('/', 'AuthController@dashboard')->name('dashboard');
    Route::get('/profile', 'AuthController@get_update_profile')->name('profile');
    Route::post('/save_profile', 'AuthController@save_profile');
    Route::post('delete_profile_picture', 'AuthController@deleteProfilePicture')->name('delete.profile.picture');
    Route::post('/UpdatePassword', 'AuthController@UpdatePassword');
    Route::get('/logout', 'AuthController@logout')->name('logout');    

      // Save Business Listings
      Route::post('save_business', 'AuthController@save_business');

});

