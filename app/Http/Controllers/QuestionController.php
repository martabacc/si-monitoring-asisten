<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Question;
use Mockery\CountValidator\Exception;

class QuestionController extends ControllerReal
{
    public $modelName = 'question';
	
	public function index(){
		$data['items'] = Question::all()->get();
		
		return view('pages.question.index')
	}
	//public function create(){}
	//public function store(){}
	//public function update(){}
	//public function delete(){}
}
