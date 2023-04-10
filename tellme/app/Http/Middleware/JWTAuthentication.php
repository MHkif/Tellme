<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenExpiredException) {
                // return response()->json(['error' => 'TokenExpired'], 401);
                $newToken = JWTAuth::parseToken()->refresh();
                return response()->json(['token' => $newToken, 'status' => 'Expired'], 200);
            } else if ($e instanceof TokenInvalidException) {
                return response()->json(['error' => 'TokenInvalid'], 401);
            } else {
                return response()->json(['error' => 'TokenNotFound'], 401);
            }
        }
        return $next($request);
    }
}
