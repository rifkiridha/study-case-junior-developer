<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\PersonalAccessToken;

class EnsureTokenIsValid
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        if ( $request->path() !== "api/login" && (!$token || !$this->isValidToken($token))) {
            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }

        return $next($request);
    }

    protected function isValidToken($token)
    {
        $tokenModel = PersonalAccessToken::findToken($token);
            if ($tokenModel) {
        return true;
    }
        return false;
    }
}
