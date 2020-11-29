<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicAuth
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
        // $response = Auth::onceBasic();
        // dd($response);
        if(null !== Auth::onceBasic()){
            return response()->json(['message' => 'unauthorized'], 401);
        }
        else{
            return $next($request);
        }
        return Auth::onceBasic() ?: $next($request);
    }
}
