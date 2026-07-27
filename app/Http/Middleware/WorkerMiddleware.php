<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return response()->json([
                'message' => 'Unauthenticated.'
            ], 401);
        }

        if (auth()->user()->role !== 'worker') {
            return response()->json([
                'message' => 'Only workers can access this resource.'
            ], 403);
        }

        return $next($request);
    }
}