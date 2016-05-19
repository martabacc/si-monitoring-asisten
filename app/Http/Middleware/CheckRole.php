<?php

namespace App\Http\Middleware;

use App\Models\Assistant;
use App\Models\Student;
use App\Models\Teacher;
use Closure;
use Exception;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    private $roles;

    public function handle($request, Closure $next)
    {
        $this->roles = $this->getRequiredRole($request->route());
        $id = $request->user()->id;

        if( $id && $this->roles ){
            if( $this->isAssistant( $id ) ||
                $this->isStudent( $id ) ||
                $this->isTeacher( $id ) )
            {
                return $next($request);
            }
            else return redirect('/');
        }
        else return $next($request);

    }

    private function getRequiredRole($route)
    {
        $action = $route->getAction();
//         1 dosen, 2 asisten , 3 praktikan
        return isset($action['roles']) ? $action['roles'] : null;
    }

    private function isAuthorized($role){
        return in_array($role, $this->roles);
    }

    private function isTeacher($id){
        try{
            return ( Teacher::find($id) ) ? $this->isAuthorized(1) : false;
        }
        catch(Exception $e){
            return false;
        }
    }

    private function isAssistant($id){
        try{
            return ( Assistant::find($id) ) ? $this->isAuthorized(2): false;
        }
        catch(Exception $e){
            return false;
        }
    }

    private function isStudent($id){
        try{
            return ( Student::find($id) ) ? $this->isAuthorized(3): false;
        }
        catch(Exception $e){
            return false;
        }
    }


}
