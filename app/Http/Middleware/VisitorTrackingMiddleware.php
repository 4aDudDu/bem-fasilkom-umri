<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\VisitorLog;
use Symfony\Component\HttpFoundation\Response;

class VisitorTrackingMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track successful GET requests for non-admin pages
        if ($request->method() === 'GET' && !$request->is('admin*') && $response->getStatusCode() === 200) {
            try {
                VisitorLog::create([
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'page_url' => $request->fullUrl(),
                ]);
            } catch (\Exception $e) {
                // Silently fail if tracking fails
            }
        }

        return $response;
    }
}
