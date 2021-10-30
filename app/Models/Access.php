<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $primaryKey = 'access_id';
    protected $guarded = [
        'access_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    public function action()
    {
        return $this->hasMany(Action::class, 'action_id', 'action_id');
    }
}
