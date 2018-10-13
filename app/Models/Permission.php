<?php

namespace systemAPV\Models;

use Illuminate\Database\Eloquent\Model;
use systemAPV\Models\Role;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'name','description'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
