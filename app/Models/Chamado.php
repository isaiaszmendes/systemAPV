<?php

namespace systemAPV\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
