<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Idea extends Model
{
    use HasFactory;


    protected $with =
    [
        "user",
        "comments.user",
    ];

    protected $withCount =
    [
        "likes",

    ];

    protected $fillable =
    [
        "comment",
        "user_id",
    ];


    public function comments()
    {

        return $this->hasMany(Comment::class);
    }

    public function user()
    {

        return $this->belongsTo(user::class);
    }



    public function likes()
    {
        return $this->belongsToMany(User::class, "idea_like");
    }

    public function scopeSearch($query, $request = '')
    {
        $query->where("comment","like","%".$request."%");
    }

}
