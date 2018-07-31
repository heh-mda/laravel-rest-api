<?php

namespace App\Http\Middleware;

use Closure;
use App\Token;

class CheckToken
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
        $token = $request->header('Authorization', null);

        if ($token) {
            $token = Token::where('token', $token)->first();          
            
            if(!$token) {
                return response()->json('No such token.', 401);
            }
        } else {
            return response()->json('No token provided.', 401);
        }

        return $next($request);
    }
}
