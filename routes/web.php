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
    Route::get('product/{id}', 'ShopController@show')->name('product.show');
    Route::get('products', 'ShopController@index')->name('products');


    Route::group(['middleware' => ['auth']], function () {
        Route::get('account', 'UserAccountController@account')->name('account.edit');
        Route::get('orders', 'UserAccountController@orders')->name('orders.index');
        Route::get('cart/{id}', 'UserAccountController@cart')->name('cart.index');
        Route::post('new/order', 'UserAccountController@store')->name('orders.new');
        Route::get('thanks', 'UserAccountController@thanks')->name('orders.thanks');
    });
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

          Route::get('', 'DashboardController@index')->name('index');

        Route::resource('products', 'ProductController');
        Route::get('setting', 'SettingController@edit')->name('setting.edit');
        Route::post('setting', 'SettingController@updateSiteInfo')->name('setting.UpdateSiteInfo');
        Route::get('orders', 'OrdersController@index')->name('orders.index');
        Route::get('orders/edit/{id}', 'OrdersController@edit')->name('orders.edit');
        Route::PUT('orders/edit/{id}/update', 'OrdersController@update')->name('orders.update');
        Route::delete('orders/delete/{id}', 'OrdersController@destroy')->name('orders.destroy');

      Route::get('users', 'UsersController@index')->name('users.index');
        Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit');
        Route::PUT('users/edit/{id}/update', 'UsersController@update')->name('users.update');
        Route::delete('users/delete/{id}', 'UsersController@destroy')->name('users.destroy');



    });

});
