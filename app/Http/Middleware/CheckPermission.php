<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission, $description = null)
    {
        $user = Auth::user();

        if (!$user) {
            // If the user is not authenticated, redirect to login page
            return redirect()->route('login');
        }

        // Fetch permissions with specific fields
        $permissions = $user->roles()
            ->with('permissions:id,name,description') // Specify fields
            ->get()
            ->pluck('permissions')
            ->flatten()
            ->unique('id');

        // Check if the user has the required permission by name and optionally by description
        $hasPermission = $permissions->contains(function ($perm) use ($permission, $description) {
            return $perm->name === $permission &&
                (!$description || $perm->description === $description);
        });

        if (!$hasPermission) {
            // If the user does not have the required permission, show a 403 error page
            abort(403, 'You are not allowed to visit this page.');
        }

        return $next($request);
    }
}
