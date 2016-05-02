<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class QuestionnaireController extends Controller
{
    public $modelName = 'questionnaire';

    public function getAnswer($id){
        return view('pages.answer.index')->with('items', \App\Models\Answer::where('questionnaire_id',$id)->get() );
    }

}
