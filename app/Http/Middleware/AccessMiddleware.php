<?php

namespace App\Http\Middleware;

use App\Models\Action;
use Closure;
use Illuminate\Support\Facades\Auth;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $payload = Auth::payload();
            $role_id = $payload->get("role_id");
            $url = ($request->route())[1]['as'];
            $action = Action::where("url", $url)->first()->accesses->where('role_id', $role_id)->first();
            if (!$action) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized!',
                ], 401);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
