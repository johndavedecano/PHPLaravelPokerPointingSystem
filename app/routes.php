<?php


/**
 * Routes for all kinds of users except guest
 */
Route::group(array('before' => 'secure'), function()
{
    Route::get('/','DashboardController@dashboard');
      
});

/**
 * Routes for authentication
 */
Route::group(array('before' => 'loggedin'), function()
{
    Route::get('auth/login','AuthController@login');
    Route::post('auth/login','AuthController@login_post');
    Route::get('auth/forgot','AuthController@forgot');
    Route::post('auth/forgot','AuthController@forgot_post'); 
    Route::get('auth/reset','AuthController@reset');
    Route::post('auth/reset','AuthController@reset_post');  

});
Route::get('auth/forgot','AuthController@forgot');


/**
 * Routes for superadmin only pages
 */
Route::group(array('superadmin' => 'secure'), function()
{
      
});