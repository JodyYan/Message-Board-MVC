<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Identify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id=Auth::id();
        $board=$request->route('message');
        if($id !== $board->user_id) {
            return  response(['error' => 'identiy error'], 422);
        }
        return $next($request);
    }
}
