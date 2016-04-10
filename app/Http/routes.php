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

Route::get('auth/login', function(){
    return view('pages.auth.login');
});

Route::group(['middleware' => ['web']], function () {
	//
});
