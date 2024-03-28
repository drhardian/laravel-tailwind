<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if(!app()->runningInConsole() && $user) {
            $roles = Role::with('permissions')->get();
            
            $permissionsArray = [];

            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->permission->title][] = $role->id;
                }
            }

            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function(User $user) use ($roles) {
                    return count(array_intersect(array($user->roleuser->role_id), $roles)) > 0;
                });
            }
        }

        return $next($request);
    }
}
