<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'role_id';
    protected $guarded = [
        'role_id'
    ];

    public function accesses()
    {
        return $this->hasMany(Access::class);
    }
}
