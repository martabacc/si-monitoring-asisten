<?php

namespace App\Http\Middleware;

use Closure;
class CheckRole
{
    private $requiredRoles;

    public function handle($request, Closure $next)
    {
        if(session('role')){
            $this->requiredRoles = $this->getRequiredRole($request->route());
            $userRole = session('role');

            if( $this->requiredRoles ){
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
        if(is_array($this->requiredRoles))
            return in_array($role, $this->requiredRoles);
        else return $this->requiredRoles == $role;
    }



}
