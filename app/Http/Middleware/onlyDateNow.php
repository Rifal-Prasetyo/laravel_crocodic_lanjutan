<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class onlyDateNow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->access_token;
        if ($token && $this->isToday($token)) {

            return $next($request);
        }

        return response()->json(['error' => 'Access token invalid or expired.'], 401);
    }

    private function isToday($access_token)
    {
        if ($access_token == date("Y-m-d")) {
            return true;
        }
        return false;
    }
}
