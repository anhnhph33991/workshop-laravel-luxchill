<?php

namespace App\Http\Middleware;

use App\Helpers\Alert;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->get('age') >= 18) {
            return $next($request);
        }

        Alert::error('Bạn chưa đủ 18 tuổi không thể truy cập', 'LuxChill Thông Báo');
        return redirect()->route('home');
    }
}
