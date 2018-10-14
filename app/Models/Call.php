<?php

namespace systemAPV\Models;

use systemAPV\Models\Call;
use systemAPV\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = [
        'user_id', 'title', 'body',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(Call::class);
    }

}
