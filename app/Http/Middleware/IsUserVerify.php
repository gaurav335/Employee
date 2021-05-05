<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class IsUserVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            
            if(Auth::user()->is_verify == 0) {
                return Response::json(['success' => 'false', 'message' => __('messages.user.unverified')], 403);
            }
            if(Auth::user()->is_active == 0) {
                return Response::json(['success' => 'false', 'message' => __('messages.user.blocked')], 423);
            }
        }
        return $next($request);
    }
}
