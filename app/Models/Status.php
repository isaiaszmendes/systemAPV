<?php

namespace systemAPV\Models;

use systemAPV\Models\Mesa;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = [
        'name', 'description',
    ];

    public $timestamps = false;

    public function mesa(){
        return $this->hasOne(Mesa::class);
    }
}
