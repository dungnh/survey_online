<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;

class Admin implements Middleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The response factory implementation.
     *
     * @var ResponseFactory
     */
    protected $response;

    /**
     * Create a new filter instance.
     *
     * @param Guard           $auth     Guard
     * @param ResponseFactory $response ResponseFactory
     */
    public function __construct(Guard $auth, ResponseFactory $response)
    {
        $this->auth = $auth;
        $this->response = $response;
    }
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param \Closure                 $next    Closure
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            $admin = 0;
            if ($this->auth->user()->admin == 1) {
                $admin = 1;
            }
            if ($admin == 0) {
                return $this->response->redirectTo('/');
            }

            return $next($request);
        }

        return $this->response->redirectTo('/');
    }
}
