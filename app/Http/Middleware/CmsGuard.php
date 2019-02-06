<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CmsGuard
{
    public function handle($request, Closure $next)
    {
        if (Session::has('is_admin')) {
            return $next($request);
        } else {
            return \redirect()->back();
        }
    }
}