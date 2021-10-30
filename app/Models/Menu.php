<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = 'menu_id';
    protected $guarded = [
        'menu_id'
    ];

    public function actions()
    {
        return $this->hasMany(Action::class, 'menu_id', 'menu_id')->select("action_id", "action", "url", "is_active", "menu_id");
    }

    public function accessAction()
    {
        return $this->hasManyThrough(Access::class, Action::class, 'menu_id', 'action_id', 'menu_id', 'action_id')->select("accesses.access_id", "accesses.role_id", "accesses.action_id");
    }
}
