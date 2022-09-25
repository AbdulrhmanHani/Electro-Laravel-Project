<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsGuro
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
        if ($request->session()->has('guro')) {
            return $next($request);
        } else {
            request()->session()->flash('dont_message', "Don't Try Doing This Again");
            return redirect(url('/mario'));
        }
    }
}
