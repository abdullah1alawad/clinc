<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAssistant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->roles()->where('name','banned')->first())
            return redirect()->route('banned.page');

        if(auth()->user()->roles()->where('name','pending')->first())
            return redirect()->route('pending.page');

        if(auth()->user()->roles()->where('name','assistant')->first())
            return $next($request);

        return \response('you are not an assistant');
    }
}
