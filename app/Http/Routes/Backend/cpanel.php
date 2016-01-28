<?php

/***************    Admin routes  ******************/
$router->get('logout', "Auth\AuthController@getLogout");
$router->get('changepw', "Admin\UserController@changepw");
$router->post('changepw', "Admin\UserController@updatepw");
// Admin Dashboard
$router->get('/', 'Admin\DashboardController@index');
$router->get('dashboard', 'Admin\DashboardController@index');
// Languages
$router->resource('languages', 'Admin\LanguageController');
$router->group(['prefix' => 'languages'], function ($router) {
    $router->get('create', ['uses' => 'Admin\LanguageController@create', 'middleware' => ['acl:languages_create']]);
    $router->post('create', ['uses' => 'Admin\LanguageController@store', 'middleware' => ['acl:languages_create']]);
    $router->get('{languages}/delete', ['uses' => 'Admin\LanguageController@delete', ['middleware' => 'acl:languages_delete']]);
});
# Configuration
    $router->get('/config', 'Admin\SettingController@index');
    $router->post('/config', 'Admin\SettingController@store');
    $router->resource('/config', 'Admin\SettingController');
// Users
$router->resource('user', 'Admin\UserController');
$router->group(['prefix' => 'user'], function ($router) {
    $router->get('/', [
        'as' => 'cpanel.user.index',
        'uses' => 'Admin\UserController@index',
        'middleware' => ['acl:user_create|user_update|user_delete'],
    ]);
    $router->get('{user}/show', ['uses' => 'Admin\UserController@show', 'middleware' => ['acl:user_update']]);
    $router->get('{user}/edit', ['uses' => 'Admin\UserController@edit', 'middleware' => ['acl:user_update']]);
    $router->get('{user}/delete', ['uses' => 'Admin\UserController@delete', 'middleware' => ['acl:user_delete']]);
    $router->get('{user}/update', ['uses' => 'Admin\UserController@update', 'middleware' => ['acl:user_update']]);
    $router->get('create', ['uses' => 'Admin\UserController@create', 'middleware' => ['acl:user_create']]);
    $router->post('create', ['uses' => 'Admin\UserController@store', 'middleware' => ['acl:user_create']]);
    $router->post('update', ['uses' => 'Admin\UserController@store', 'middleware' => ['acl:user_update']]);
});
// Group Users
$router->group(['prefix' => 'groupuser'], function ($router) {
    $router->get('/', [
        'as' => 'cpanel.groupuser.index',
        'uses' => 'Admin\GroupUserController@index',
        'middleware' => ['acl:groupuser_create|groupuser_update|groupuser_delete'],
    ]);
    $router->get('{groupuser}/delete', ['uses' => 'Admin\GroupUserController@delete', 'middleware' => ['acl:groupuser_delete']]);
    $router->get('{groupuser}/update', ['uses' => 'Admin\GroupUserController@update', 'middleware' => ['acl:groupuser_update']]);
    $router->post('update', ['uses' => 'Admin\GroupUserController@store', 'middleware' => ['acl:groupuser_update']]);
    $router->get('create', ['uses' => 'Admin\GroupUserController@create', 'middleware' => ['acl:groupuser_create']]);
    $router->post('create', ['uses' => 'Admin\GroupUserController@store', 'middleware' => ['acl:groupuser_create']]);
});
// Surveys
//$router->resource('survey', 'Admin\SurveyController');

// Route::get('list-modules',['as' =>'cpanel.list-modules',
//     'uses'=>'Admin\SurveyController@listModules']);


//Module Action
$router->group(['prefix' => 'module'], function ($router) {
    $router->get('/', [
        'as' => 'cpanel.module.index',
        'uses' => 'Admin\ModuleController@index',
        'middleware' => ['acl:module_create|module_update|module_delete'],
    ]);
    $router->get('{moduleid}/delete', ['uses' => 'Admin\ModuleController@destroy', 'middleware' => ['acl:module_delete']]);
    $router->get('create', ['uses' => 'Admin\ModuleController@create', 'middleware' => ['acl:module_create']]);
    $router->post('create', ['uses' => 'Admin\ModuleController@store', 'middleware' => ['acl:module_create']]);
    $router->get('{moduleid}/update', ['uses' => 'Admin\ModuleController@update', 'middleware' => ['acl:module_update']]);
    $router->post('update', ['uses' => 'Admin\ModuleController@store', 'middleware' => ['acl:module_update']]);
});

$router->group(['prefix' => 'survey'], function ($router) {
    $router->get('/', [
        'as' => 'cpanel.survey.index',
        'uses' => 'Admin\SurveyController@index',
        'middleware' => ['acl:survey_create|survey_update|survey_delete'],
    ]);
      $router->get('create', ['as' => 'cpanel.survey.create','uses' => 'Admin\SurveyController@create', 'middleware' => ['acl:survey_create']]);
    $router->post('create', ['as' => 'cpanel.survey.store','uses' => 'Admin\SurveyController@store', 'middleware' => ['acl:survey_create']]);
    $router->get('data/{id}', [
    'as' => 'cpanel.survey.data',
    'uses' => 'Admin\SurveyController@getData'
    ]);
});

Route::get('/error/denied', 'Admin\AccessController@index');
