<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;


class Authenticate extends Middleware
{
    protected $guards;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
    */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;
        return parent::handle($request, $next, ...$guards);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(HttpRequest $request): ?string
    {
        if (!$request->expectsJson()) {
            if (Request::is('admin') || Arr::first($this->guards) === 'admin') {

              
                return route('admin.login');
            }
            return route('login');
        }
    }
    
}
