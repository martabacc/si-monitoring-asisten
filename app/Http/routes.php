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

    Route::group(['middleware' => ['auth','roles']], function() {

        Route::group(['roles'=> [1,2] ], function(){
            Route::resource('activity', 'ActivityController');
        });

        Route::resource('class', 'ClassController');
        Route::resource('issue', 'IssueController');
        Route::resource('presence', 'PresenceController');
        Route::resource('privilege', 'PrivilegeController');
        Route::resource('question', 'QuestionController');
        Route::resource('questionnaire', 'QuestionnaireController');
        Route::resource('schedule', 'ScheduleController');
        Route::resource('user', 'UserController');
        Route::resource('assistant', 'AssistantController');
        Route::resource('teacher', 'TeacherController');
        Route::resource('student', 'StudentController');
        Route::resource('subject', 'SubjectController');

        Route::get('/class/{class}/student', ['uses' => 'ClassController@viewStudents', 'as' => 'class.student.view']);
        Route::post('/class/{class}/student', ['uses' => 'ClassController@addStudents', 'as' => 'class.student.add']);
        Route::delete('/class/{class}/student/{student}/', ['uses' => 'ClassController@deleteStudents', 'as' => 'class.student.destroy']);

        Route::get('/class/{class}/assistant', ['uses' => 'ClassController@viewAssistants', 'as' => 'class.assistant.view']);
        Route::post('/class/{class}/assistant', ['uses' => 'ClassController@addAssistants', 'as' => 'class.assistant.add']);
        Route::delete('/class/{class}/assistant/{assistant}/', ['uses' => 'ClassController@deleteAssistants', 'as' => 'class.assistant.destroy']);

        Route::get('/class/{class}/teacher', ['uses' => 'ClassController@viewTeachers', 'as' => 'class.teacher.view']);
        Route::post('/class/{class}/teacher', ['uses' => 'ClassController@addTeachers', 'as' => 'class.teacher.add']);
        Route::delete('/class/{class}/teacher/{teacher}/', ['uses' => 'ClassController@deleteTeachers', 'as' => 'class.teacher.destroy']);

        Route::get('role','RoleController@index');

        Route::group(['roles'=> 3], function(){
            Route::get('mark','MarkController@index');
            Route::get('mark/create','MarkController@create');
            Route::post('mark/create','MarkController@create');
        });
    });
});