<?php

namespace App\Http\Middleware;

use App\Helpers\Alert;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $role = $request->role;

        if (!$role || !in_array($role, $roles)) {
            Alert::error('Bạn không có quyền vào trang này', 'LuxChill Thông Báo');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
