<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->roles()->where('name','banned')->first())
            return redirect()->route('banned');

        if(auth()->user()->roles()->where('name','pending')->first())
            return redirect()->route('pending');

        if(auth()->user()->roles()->where('name','doctor')->first())
            return $next($request);

        return \response('you are not a doctor');
    }
}
