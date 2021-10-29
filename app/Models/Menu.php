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
        return $this->hasMany(Action::class);
    }
}
