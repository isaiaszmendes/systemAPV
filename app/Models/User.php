<?php

namespace systemAPV\Models;

use systemAPV\Models\Call;
use systemAPV\Models\Comment;
use systemAPV\Models\Permission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles)
    {
        if (is_array($roles) || is_object($roles)) {
            return !! $roles->intersect($this->roles)->count();            
        }

        return $this->roles->contains('name', $roles);
    }

    public function calls()
    {
        return $this->hasMany(Call::class);
    }

    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }


    public function search(Array $data)
    {
      
         return $this->where(function ($query) use($data)
            {
                if (isset($data['name'])) {
                    $query->where('name', 'LIKE', '%'.$data['name'].'%');
                }

                if (isset($data['email'])) {
                    $query->where('email', $data['email']);
                }
            })->whereHas('roles', function($query) use($data)
            {
                if (isset($data['role'])) {
                    $query->where('name', $data['role']);
                }

        });

    } 
}
