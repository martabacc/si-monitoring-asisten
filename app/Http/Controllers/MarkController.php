<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MarkController extends Controller
{
    public $modelName = 'mark';

    public function index(){
        return view('pages.mark.index');
    }

    public function create(){
        return view('pages.mark.create');
    }
}
