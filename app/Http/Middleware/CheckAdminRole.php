<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'You do not have access to this page.');
    }
}
