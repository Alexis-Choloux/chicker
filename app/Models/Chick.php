<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

class Chick extends Model
{
    use HasFactory;

    // opposite of fillable
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

}
