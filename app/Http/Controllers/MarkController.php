<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    public $modelName = 'mark';

    public function index(){
        $data['activity'] = DB::table('activities')
                                ->leftJoin('marks' , 'activities.id','=','marks.activity_id');
                                ->sel
        return view('pages.mark.index');
    }

    public function create(){
        return view('pages.mark.create');
    }
}
