<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $primaryKey = 'action_id';
    protected $guarded = [
        'action_id'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'menu_id');
    }

    public function accesses()
    {
        return $this->hasMany(Access::class, 'action_id', 'action_id');
    }
}
