<?php

use Illuminate\Support\Facades\Route;

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.', 'namespace' => 'frontend'], function () {
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.form');
    Route::post('login', 'Auth\LoginController@login')->name('login');;
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register.form');
    Route::post('register', 'Auth\RegisterController@register')->name('register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('', 'HomeController@index')->name('index');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'backend', 'as' => 'backend.','namespace' => 'backend'], function () {

        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.form');
        Route::post('login', 'Auth\LoginController@login')->name('login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        // Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');

        Route::group(['middleware' => ['auth','is_admin']], function () {
        Route::get('/', function (){
            return view('backend.index');
        })->name('index');

        Route::resource('products', 'ProductController');
        Route::get('setting', 'SettingController@edit')->name('setting.edit');
        Route::post('setting', 'SettingController@updateSiteInfo')->name('setting.UpdateSiteInfo');


    });

});
