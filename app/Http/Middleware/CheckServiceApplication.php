<?php

namespace App\Http\Middleware;

use App\Models\ServiceRequest;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckServiceApplication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user  = $request->user();
        // check if the user has applied for the service within the last hour
        $lastApplication = ServiceRequest::where('client_id', $user->id)
            ->where('created_at', '>=', now()->subHour())
            ->count();
        $dailyApplication = ServiceRequest::where('client_id', $user->id)
            ->where('created_at', now())
            ->count();

        if ($lastApplication > 0 || $dailyApplication > 2) {
            return redirect('/')->with('error', 'You can not apply the Service Right now, maximun daily application is two applications at an interval of one hour');
        }
        return $next($request);
    }
}
