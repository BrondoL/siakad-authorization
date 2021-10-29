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
        return $this->belongsTo(Menu::class);
    }

    public function accesses()
    {
        return $this->hasMany(Access::class);
    }
}
