<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Access;
use App\Models\Action;
use App\Models\Menu;
use App\Models\Role;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            'role' => "Admin",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $menus = [
            [
                'menu' => "Role Management",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'menu' => "Menu Management",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'menu' => "Actions Management",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'menu' => "Accesses Management",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'menu' => "User Management",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        $actions = [
            [
                'action' => "Read Role",
                'url' => "role.read",
                'menu_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Create Role",
                'url' => "role.create",
                'menu_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Detail Role",
                'url' => "role.detail",
                'menu_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Update Role",
                'url' => "role.update",
                'menu_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Delete Role",
                'url' => "role.delete",
                'menu_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Read Menu",
                'url' => "menu.read",
                'menu_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Create Menu",
                'url' => "menu.create",
                'menu_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Detail Menu",
                'url' => "menu.detail",
                'menu_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Update Menu",
                'url' => "menu.update",
                'menu_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Delete Menu",
                'url' => "menu.delete",
                'menu_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Read Action",
                'url' => "action.read",
                'menu_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Create Action",
                'url' => "action.create",
                'menu_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Detail Action",
                'url' => "action.detail",
                'menu_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Update Action",
                'url' => "action.update",
                'menu_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Delete Action",
                'url' => "action.delete",
                'menu_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Read Access",
                'url' => "access.read",
                'menu_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Create Access",
                'url' => "access.create",
                'menu_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Detail Access",
                'url' => "access.detail",
                'menu_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Update Access",
                'url' => "access.update",
                'menu_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Delete Access",
                'url' => "access.delete",
                'menu_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Read User",
                'url' => "user.read",
                'menu_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Create User",
                'url' => "user.create",
                'menu_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Detail User",
                'url' => "user.detail",
                'menu_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Update User",
                'url' => "user.update",
                'menu_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'action' => "Delete User",
                'url' => "user.delete",
                'menu_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        $accesses = [
            [
                'role_id' => 1,
                'action_id' => 1,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 2,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 3,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 4,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 5,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 6,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 7,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 8,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 9,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 16,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 17,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 18,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 19,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 21,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 22,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 23,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 24,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 1,
                'action_id' => 25,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        Role::create($role);
        Menu::insert($menus);
        Action::insert($actions);
        Access::insert($accesses);
    }
}
