<?php
/**
 * Routes for all kinds of users except guest
 */
Route::group(array('before' => 'secure'), function()
{
    /**
     * Dashboard
     */
     Route::get('/','DashboardController@dashboard');
    
    /**
     * Members
     */
    Route::get('members','MembersController@members');
    Route::post('members','MembersController@members_post');  
    Route::get('members/create','MembersController@create');
    Route::post('members/create','MembersController@create_post');  
    Route::get('members/update/{id}','MembersController@update');
    Route::post('members/update/{id}','MembersController@update_post');  
    Route::post('members/delete','MembersController@delete');
    Route::post('members/status','MembersController@status'); 
    Route::post('members/login','MembersController@login'); 
    Route::get('members/{id}/account','MembersController@account');
    /**
     * Blinds
     */
    Route::get('blinds','BlindsController@blinds');
    Route::post('blinds','BlindsController@blinds_post');  
    Route::get('blinds/create','BlindsController@create');
    Route::post('blinds/create','BlindsController@create_post');  
    Route::get('blinds/update/{id}','BlindsController@update');
    Route::post('blinds/update/{id}','BlindsController@update_post');  
    Route::post('blinds/delete','BlindsController@delete');
    /**
     * Levels
     */
    Route::get('levels','LevelsController@levels');
    Route::post('levels','LevelsController@levels_post');  
    Route::get('levels/create','LevelsController@create');
    Route::post('levels/create','LevelsController@create_post');  
    Route::get('levels/update/{id}','LevelsController@update');
    Route::post('levels/update/{id}','LevelsController@update_post');  
    Route::post('levels/delete','LevelsController@delete');
    /**
     * Users
     */
    Route::get('users','UsersController@users');
    Route::post('users','UsersController@users_post');  
    Route::get('users/create','UsersController@create');
    Route::post('users/create','UsersController@create_post');  
    Route::get('users/update/{id}','UsersController@update');
    Route::post('users/update/{id}','UsersController@update_post');  
    Route::post('users/delete','UsersController@delete');
    /**
     * Activities
     */
     Route::get('activities','ActivitiesController@activities');
     Route::post('activities','ActivitiesController@activities_post');
    /**
     * Reports
     */
     Route::get('reports','ReportsController@reports');
     Route::post('reports','ReportsController@reports_post');
     /**
      * Settings
      */
     Route::get('settings','ReportsController@settings');
     Route::post('settings','ReportsController@settings_post');
     

});

/**
 * Routes for authentication
 */
Route::get('auth/logout','AuthController@logout');
Route::group(array('before' => 'loggedin'), function()
{
    Route::get('auth/login','AuthController@login');
    Route::post('auth/login','AuthController@login_post');
    Route::get('auth/forgot','AuthController@forgot');
    Route::post('auth/forgot','AuthController@forgot_post'); 
    Route::get('auth/reset','AuthController@reset');
    Route::post('auth/reset','AuthController@reset_post');  

});


/**
 * Routes for superadmin only pages
 */
Route::group(array('superadmin' => 'secure'), function()
{
      
});