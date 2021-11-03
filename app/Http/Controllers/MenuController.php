<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->get();
        $data = [
            'success' => true,
            'message' => 'List Menu',
            'data' => $menus
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'menu' => 'required|max:255|unique:menus,menu',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $menu = new Menu();
        $menu->menu = $request->menu;
        $menu->save();

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal create menu!',
            ], 409);
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil create menu!',
            'menu'    => $menu,
        ], 201);
    }

    public function show($menu_id)
    {
        $menu = Menu::find($menu_id);
        if ($menu) {
            return response()->json([
                'success' => true,
                'message' => 'Detail menu',
                'data'    => $menu,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => "Data Not Found"
        ], 404);
    }

    public function update(Request $request, $menu_id)
    {
        $menu = Menu::find($menu_id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => "Data Not Found"
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'menu' => 'required|max:255|unique:menus,menu,' . $menu_id . ',menu_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $menu->menu = $request->menu;
        $menu->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil update menu!',
            'data'    => $menu,
        ], 200);
    }

    public function destroy($menu_id)
    {
        $menu = Menu::find($menu_id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => "Data Not Found"
            ], 404);
        }
        $menu->accessAction()->delete();
        $menu->actions()->delete();
        $menu->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully!',
            'data'    => $menu,
        ], 200);
    }
}
