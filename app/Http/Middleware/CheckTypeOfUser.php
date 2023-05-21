<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTypeOfUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->type == config('constants.USER.TYPE.DEFAULT')) {
            return $next($request);
        }

        return redirect()->route('site.job.list');
    }
}
