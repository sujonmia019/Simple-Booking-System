<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->user() || auth()->user()->role_name !== $role) {
            if(auth()->user()->role_name == CUSTOMER_ROLE){
                return redirect('portal');
            }else if(auth()->user()->role_name == ADMIN_ROLE){
                return redirect('/');
            }else{
                abort(403, 'Unauthorized Access');
            }
        }

        return $next($request);
    }
}
