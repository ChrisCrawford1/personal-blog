<?php

namespace App\Http\Middleware;

use App\Settings;
use Closure;
use Illuminate\Http\Request;

class CheckIfProjectsEnabled
{
    /**
     * Prevent access to projects page if its disabled.
     *
     * @param Request  $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Settings::all()->first()->projects_enabled) {
            return $next($request);
        }

        return redirect(route('posts.index'));
    }
}
