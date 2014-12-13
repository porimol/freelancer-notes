<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Defining Global Patterns
Route::pattern('id', '[0-9]+');

// Login route
Route::get('/', ['as'=>'login', 'uses'=>'AuthenticationController@index']);
Route::post('user-login', ['as'=>'check-auth', 'uses'=>'AuthenticationController@login']);
Route::get('logout', ['as'=>'user-logout', 'uses'=>'AuthenticationController@logout']);

//Route::post('register', ['as'=>'user-reg', 'uses'=>'AuthenticationController@store']);

//'before'=>'csrf',
// Group route
Route::group(array('before'=>'auth'), function(){
    // Dashboard route
    Route::get('dashboard', ['as'=>'home', 'uses'=>'DashboardController@create']);

    Route::get('users/password', ['as'=>'pass', 'uses'=>'AuthenticationController@password']);
    Route::post('users/change-password', ['as'=>'passchange', 'uses'=>'AuthenticationController@changePassword']);
    Route::get('users/profile', ['as'=>'profile_edit', 'uses'=>'AuthenticationController@editProfile']);
    Route::post('users/profile-update', ['as'=>'prof_update', 'uses'=>'AuthenticationController@updateProfile']);

    // Clients route
    Route::get('clients', ['as'=>'add_client', 'uses'=>'ClientsController@create']);
    Route::post('clients/save', ['as'=>'save_client', 'uses'=>'ClientsController@store']);
    Route::get('clients/{id}', ['as'=>'edit_client', 'uses'=>'ClientsController@edit']);
    Route::post('clients', ['as'=>'client_info_update', 'uses'=>'ClientsController@update']);
    Route::get('clients/delete/{id}', ['as'=>'delete_clients', 'uses'=>'ClientsController@destroy']);
    Route::get('clients/all', ['as'=>'all_client', 'uses'=>'ClientsController@index']);

    Route::get('projects', ['as'=>'new_project', 'uses'=>'ProjectsController@create']);
    Route::post('projects/save', ['before'=>'csrf', 'as'=>'save_project', 'uses'=>'ProjectsController@store']);
    Route::get('projects/{id}', ['as'=>'edit_project', 'uses'=>'ProjectsController@edit']);
    Route::post('projects', ['as'=>'project_info_update', 'uses'=>'ProjectsController@update']);
    Route::get('projects/delete/{id}', ['as'=>'delete_project', 'uses'=>'ProjectsController@destroy']);
    Route::get('projects/all', ['as'=>'all_project', 'uses'=>'ProjectsController@index']);

    Route::get('marketplaces', ['as'=>'add_marketplace','uses'=>'MarketplacesController@create']);
    Route::post('marketplaces/save', ['as'=>'save_marketplace','uses'=>'MarketplacesController@store']);
    Route::get('marketplaces/{id}', ['as'=>'edit','uses'=>'MarketplacesController@edit']);
    Route::post('marketplaces', ['as'=>'marketplace_info_update','uses'=>'MarketplacesController@update']);
    Route::get('marketplaces/delete/{id}', ['as'=>'delete_marketplace', 'uses'=>'MarketplacesController@destroy']);
    Route::get('marketplaces/all', ['as'=>'all_marketplace','uses'=>'MarketplacesController@index']);

    Route::get('reports', ['as'=>'report', 'uses'=>'ReportsController@index']);
    Route::post('reports', ['as'=>'show-report', 'uses'=>'ReportsController@show']);
});

// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
    return View::make('login')->with('title', 'Login'); // If don't match the url then it will redirect to 404 not found page.
});