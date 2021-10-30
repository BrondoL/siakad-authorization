<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::with('menu')->latest()->get();
        $data = [
            'success' => true,
            'message' => 'List Action',
            'data' => $actions
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'action' => 'required|max:255|unique:actions,action',
            'url'   => 'required|max:255|unique:actions,url',
            'menu_id' => 'required|exists:menus,menu_id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $action = new Action();
        $action->action = $request->action;
        $action->url = $request->url;
        $action->menu_id = $request->menu_id;
        $action->save();

        if (!$action) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal create role!',
            ], 409);
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil create action!',
            'action'    => $action,
        ], 201);
    }

    public function show($action_id)
    {
        $action = Action::with('menu')->find($action_id);

        if ($action) {
            return response()->json([
                'success' => true,
                'message' => 'Detail action',
                'data'    => $action,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => "Data Not Found"
        ], 404);
    }

    public function update(Request $request, $action_id)
    {
        $action = Action::find($action_id);

        if (!$action) {
            return response()->json([
                'success' => false,
                'message' => "Data Not Found"
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'action'    => 'required|max:255|unique:actions,action,' . $action_id . ',action_id',
            'url'       => 'required|max:255|unique:actions,url,' . $action_id . ',action_id',
            'is_active' => 'required',
            'menu_id'   => 'required|exists:menus,menu_id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $action->action = $request->action;
        $action->url = $request->url;
        $action->is_active = $request->is_active;
        $action->menu_id = $request->menu_id;
        $action->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil update action!',
            'data'    => $action,
        ], 200);
    }

    public function destroy($action_id)
    {
        $action = Action::find($action_id);

        if (!$action) {
            return response()->json([
                'success' => false,
                'message' => "Data Not Found"
            ], 404);
        }
        $action->accesses()->delete();
        $action->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully!',
            'data'    => $action,
        ], 200);
    }
}
