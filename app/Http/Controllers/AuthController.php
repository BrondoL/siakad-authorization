<?php

namespace App\Http\Controllers;

use App\Models\Action;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $role_id = $request->role_id;
        $url = $request->url;

        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'url' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $action = Action::where("url", $url)->first();
        if ($action) {
            $action = $action->accesses->where('role_id', $role_id)->first();
        }
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
