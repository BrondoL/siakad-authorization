<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $data = [
            'success' => true,
            'message' => 'List Role',
            'data' => $roles
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|max:255|unique:roles,role',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $role = new Role();
        $role->role = $request->role;
        $role->save();

        if ($role) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil create role!',
                'role'    => $role,
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal create role!',
        ], 409);
    }

    public function show($role_id)
    {
        $role = Role::find($role_id);
        if ($role) {
            return response()->json([
                'success' => true,
                'message' => 'Detail role',
                'data'    => $role,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => "Data Not Found"
        ], 404);
    }

    public function update(Request $request, $role_id)
    {
        $role = Role::find($role_id);

        if (!$role) {
            return response()->json([
                'success' => false,
                'message' => "Data Not Found"
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'role' => 'required|max:255|unique:roles,role,' . $role_id . ',role_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $role->role = $request->role;
        $role->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil update role!',
            'data'    => $role,
        ], 200);
    }

    public function destroy($role_id)
    {
        $role = Role::find($role_id);

        if (!$role) {
            return response()->json([
                'success' => false,
                'message' => "Data Not Found"
            ], 404);
        }
        $role->accesses()->delete();
        $role->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully!',
            'data'    => $role,
        ], 200);
    }
}
