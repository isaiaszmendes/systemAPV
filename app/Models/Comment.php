<?php

namespace systemAPV\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'call_id', 'user_id', 'title', 'body',
    ];
    
    public function call()
    {
        return $this->belongsTo(Call::class);
    }

    public function user()
    {
        return $this->belongsTo(Comment::class);
    }
}
