<?php

namespace App\Http\Middleware;

use App\Models\Assistant;
use App\Models\Student;
use App\Models\Teacher;
use Closure;

class CheckRole
{
    public function handle($request, Closure $next)
    {
        $role = $this->getRequiredRole($request->route());
        $id = $request->user()->id;

        if($id && $role){
            if( $this->isAssistant($id,$role) ||
                $this->isStudent($id,$role) ||
                $this->isTeacher($id,$role) )
            {
                return $next($request);
            }
            else redirect('/');
        }
        else return $next($request);

    }

    private function getRequiredRole($route)
    {
        $action = $route->getAction();
//         1 dosen, 2 asisten , 3 praktikan
        return isset($action['roles']) ? $action['roles'] : null;
    }

    private function isTeacher($id, $role){
        try{
            return ( Teacher::find($id) && $role == 1 ) ? true : false;
        }
        catch(Exception $e){
            return false;
        }
    }

    private function isAssistant($id, $role){
        try{
            return ( Assistant::find($id) && $role == 2 ) ? true : false;
        }
        catch(Exception $e){
            return false;
        }
    }

    private function isStudent($id, $role){
        try{
            return ( Student::find($id) && $role == 2 ) ? true : false;
        }
        catch(Exception $e){
            return false;
        }
    }


}
