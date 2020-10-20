<?php

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group([
    'prefix' => 'profile',
    'as' => 'profile.',
    'namespace' => 'Auth',
    'middleware' => ['auth']
], function () {
    Route::get('password', 'ChangePasswordController@edit')
        ->name('password.edit');
    Route::post('password', 'ChangePasswordController@update')
        ->name('password.update');
    Route::post('profile', 'ChangePasswordController@updateProfile')
        ->name('password.updateProfile');
});
