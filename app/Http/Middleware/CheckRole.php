<?php

namespace App\Http\Middleware;

use App\Models\Assistant;
use App\Models\Student;
use App\Models\Teacher;
use Closure;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class CheckRole
{
    private $roles;

    public function handle($request, Closure $next)
    {
        if(session('role')){
            $this->roles = $this->getRequiredRole($request->route());
            $userRole = session('role');

            if( $this->roles ){
                if( $userRole==0 || $this->isAuthorized( $userRole ))
                {
                    return $next($request);
                }
                else {
                    abort(403);
                }
            }
        }
        else return $next($request);

    }

    private function getRequiredRole($route)
    {
        $action = $route->getAction();
        return isset($action['roles']) ? $action['roles'] : null;
    }

    private function isAuthorized($role){
        if(is_array($this->roles))
            return in_array($role, $this->roles);
        else return $this->roles == $role;
    }



}
