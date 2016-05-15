<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function() {
    return redirect('activity');
});

Route::group(['middleware' => ['web']], function() {
    Route::get('/login', ['uses' => 'AuthController@getLogin', 'as' => 'login']);
    Route::get('/logout', ['uses' => 'AuthController@getLogout', 'as' => 'logout']);
    Route::post('/login', ['uses' => 'AuthController@postLogin']);

    Route::group(['middleware' => 'auth'], function() {
    	Route::resource('activity', 'ActivityController');
        Route::resource('class', 'ClassController');
        Route::resource('issue', 'IssueController');
        Route::resource('presence', 'PresenceController');
        Route::resource('privilege', 'PrivilegeController');
        Route::resource('question', 'QuestionController');
        Route::resource('questionnaire', 'QuestionnaireController');
        Route::resource('schedule', 'ScheduleController');
        Route::resource('user', 'UserController');
        Route::resource('assistant', 'AssistantController');
        Route::resource('subject', 'SubjectController');
        Route::resource('teacher', 'TeacherController');


        Route::get('role','RoleController@index');
        Route::get('mark','MarkController@index');
    });
});