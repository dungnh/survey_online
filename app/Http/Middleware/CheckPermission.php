<?php

namespace app\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request    Request
     * @param \Closure                 $next       Closure
     * @param String                   $permission Mermission
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        if (!app('Illuminate\Contracts\Auth\Guard')->guest()) {
            if ($request->user()->can($permission)) {
                return $next($request);
            }
        }

        return $request->ajax ? response('Unauthorized.', 401) : redirect('/cpanel/error/denied');
    }
}
