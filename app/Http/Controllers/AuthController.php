<?php

namespace App\Http\Controllers;

use App\Models\Action;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $role_id = $request->role_id;
        $url = $request->url;

        $action = Action::where("url", $url)->first()->accesses->where('role_id', $role_id)->first();
        if (!$action) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized!',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Mempunyai Hak Akses!',
            'action'    => $action,
        ], 200);
    }
}
