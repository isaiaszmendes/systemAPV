<?php

namespace systemAPV\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'status';
    
    protected $fillable = [
        'user_id', 'role_id',
    ];
}
