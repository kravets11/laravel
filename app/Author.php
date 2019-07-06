<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'slug',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
