<?php

namespace systemAPV\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'status';
    
    protected $fillable = [
        'role_id', 'permission_id',
    ];
}
