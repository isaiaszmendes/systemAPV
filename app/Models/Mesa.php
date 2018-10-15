<?php

namespace systemAPV\Models;

use systemAPV\Models\Mesa;
use systemAPV\Models\Status;
use systemAPV\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{

    protected $table = 'mesas';

    protected $fillable = [
        'user_id', 'atendente_id', 'status_id',
    ];    

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
