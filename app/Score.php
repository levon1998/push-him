<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = "score";
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
