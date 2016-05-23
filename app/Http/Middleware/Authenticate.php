<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Teacher;
use App\Models\Assistant;
use App\Models\Student;


class Authenticate
{
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check()){
            $id = $request->user()->id;
            $arrayOfRole = [];
        
            if( $id && !session('role') ){
                if($this->isAssistant( $id )){
                    array_push($arrayOfRole, '2' );
                    session()->set('role','2');
                }
                if($this->isTeacher( $id )) {
                    array_push($arrayOfRole, '1');
                    session()->set('role', '1');
                }
                if($this->isStudent( $id )){
                    array_push($arrayOfRole, '3' );
                    session()->set('role','3');
                }
                if( $request->user()->id ==1){
                    array_push($arrayOfRole, '0' );
                    session()->set('role','0');
                }
                session()->set('arrayOfRole', $arrayOfRole);
            }
        }

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/login');
            }
        }

        return $next($request);
    }

    private function isTeacher($id){
        try{
            return ( Teacher::find($id) ) ? true : false;
        }
        catch(Exception $e){
            return false;
        }
    }

    private function isAssistant($id){
        try{
            return ( Assistant::find($id) ) ? true: false;
        }
        catch(Exception $e){
            return false;
        }
    }

    private function isStudent($id){
        try{
            return ( Student::find($id) ) ? true : false;
        }
        catch(Exception $e){
            return false;
        }
    }
}
