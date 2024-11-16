<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class idea extends Model
{

    protected $fillable =
     [
        "comment","likes","user_id"
    ];

    public function comments(){

        return $this->hasMany(Comment::class);

    }

}
