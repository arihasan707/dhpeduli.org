<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        Visitor::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'utm_source' => $request->query('utm_source'),
            'utm_campaign' => $request->query('utm_campaign'),
            'url' => $request->Url(),
            'visited_at' => now(),
        ]);

        return $next($request);
    }
}
