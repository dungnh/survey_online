<?php

/***************    Frontend routes  ******************/

Route::get('/', 'HomeController@home');
Route::get('index', 'HomeController@home');
Route::get('survey/create', [
    'as'=>'survey.create',
    'uses' => 'Admin\SurveyController@create'
]);
