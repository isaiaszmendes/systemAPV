<?php

namespace systemAPV\Models;

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

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function search(Array $data)
    {
        return $this->where(function ($query) use($data)
        {

            if (isset($data['name'])) {
                $query->where('name', $data['name']);
            }

            if (isset($data['email'])) {
                $query->where('email', $data['email']);
            }

            // if (isset($data['role'])) {
            //     $query->where('name', $data['role']);
            // }

        });

    } 
}
