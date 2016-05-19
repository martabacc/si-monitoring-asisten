<?php

namespace App\Http\Controllers;

use App\Models\Privilege;
use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
{
    public function index(){
        $data['roles'] = Privilege::all();
        return view('pages.role.change', $data);
    }
}
