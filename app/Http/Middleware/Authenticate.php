<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    /**
     * @var array
     */
    protected $guards = ['IsAdmin'];


    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if (in_array('IsAdmin', $this->guards)) {
                return route('backend.login');
            }

            return route('frontend.login');
        }
    }
}
