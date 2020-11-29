<?php

namespace App\Http\Middleware;

use App\Models\Transaction;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

        Log::info(['Request' => $request->all()]);
        $transaction = Transaction::create([
            'request' => json_encode($request->all())
        ]);
        
        if(null !== Auth::onceBasic()){
            return response()->json(['message' => 'unauthorized'], 401);
        }
        else{
            $transaction->user_id = Auth::id();
            $transaction->save();
            return $next($request);
        }
    }
}
