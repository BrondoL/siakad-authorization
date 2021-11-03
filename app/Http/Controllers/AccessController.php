<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccessController extends Controller
{
    public function index()
    {
        $access = Access::latest()->get();
        $data = [
            'success' => true,
            'message' => 'List Access',
            'data' => $access
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required|exists:roles,role_id',
            'action_id' => 'required|exists:actions,action_id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $access = new Access();
        $access->role_id = $request->role_id;
        $access->action_id = $request->action_id;
        $access->save();

        if (!$access) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal create access!',
            ], 409);
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil create access!',
            'access'    => $access,
        ], 201);
    }

    public function show($access_id)
    {
        $access = Access::find($access_id);
        if ($access) {
            return response()->json([
                'success' => true,
                'message' => 'Detail access',
                'data'    => $access,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => "Data Not Found"
        ], 404);
    }

    public function update(Request $request, $access_id)
    {
        $access = Access::find($access_id);

        if (!$access) {
            return response()->json([
                'success' => false,
                'message' => "Data Not Found"
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'role_id' => 'required|exists:roles,role_id',
            'action_id' => 'required|exists:actions,action_id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $access->role_id = $request->role_id;
        $access->action_id = $request->action_id;
        $access->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil update access!',
            'data'    => $access,
        ], 200);
    }

    public function destroy($access_id)
    {
        $access = Access::find($access_id);

        if (!$access) {
            return response()->json([
                'success' => false,
                'message' => "Data Not Found"
            ], 404);
        }

        $access->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully!',
            'data'    => $access,
        ], 200);
    }
}
