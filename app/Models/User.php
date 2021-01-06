<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'chickname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // RELATIONS
    public function chicks()
    {
        return $this->hasMany('App\Models\Chick')->latest();
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }


    // admin
    public function isAdmin()
    {
        return $this->roles_id === 0;
    }


    // change the user key (Laravel function)
    public function getRouteKeyName()
    {
        return 'chickname';
    }


    // users avatar (laravel function for user()->avatar)
    public function getAvatarAttribute()
    {
        return "https://i.pravatar.cc/150?u=" . $this->chickname;
    }



    // FOLLOWS RELATIONS
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }


    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }


    // FOLLOWS CONTROLLER
    public function isFollowing(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    
    public function toggleFollow(User $user)
    {
        if ($this->isFollowing($user)) {
            return $this->unfollow($user);
        }

        return $this->follow($user);
    }




    // password protection
    public function setPasswordAttributes($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
