<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $modelName;
    
	public function index(){
		$stringView = 'pages.'.$this->modelName . '.index';
		return view($stringView);
		// return view($view);
	}


	public function create(){
		$stringView = 'pages.'.$this->modelName . '.create';
		return view($stringView);
		// return view($view);
		
	}


	public function update(){
		
	}

	public function show($id){
		$stringView = 'pages.'.$this->modelName . '.detail';
		return view($stringView);
		// return view($view);
	}
}
