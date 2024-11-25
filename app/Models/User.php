<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        "image",
        "bio",
        'password',
        "is_admin",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

     // Define the mutator for the 'email' attribute
    /* public function setnameAttribute($value)
     {
         $this->attributes['name'] = strtolower($value);
    }
    */
    public function ideas(){
        return $this->hasMany(idea::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }


    public function followings(){

        return $this->belongsToMany(User::class,"follower_user","follower_id","followee_id")->withTimestamps();

    }
    public function followers(){

        return $this->belongsToMany(User::class,"follower_user","followee_id","follower_id")->withTimestamps();
    }

    public function follows(User $user){

     $this->followings()->where("followee_id",$user->id)->exists();
    }

    public function tests(){
        return $this->hasMany(Test::class);
    }

    //mutator gets invoked when storing in the database
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }


    //accessor gets invoked when retrieving from database
    public function getEmailAttribute($value)
    {
        return strtoupper($value);
    }


    public function getImageURL(){

        if($this->image){

            return url("/storage/".$this->image);

        }

        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";

    }



    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',

        ];
    }
}
