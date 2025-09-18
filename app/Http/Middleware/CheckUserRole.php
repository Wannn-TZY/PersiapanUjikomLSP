<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userRole = ['Murid', 'Walas'];
        if (!in_array(session('role'), $userRole)){
            dd($roles);
        } else {
            return $next($request);
        }
    }
}
