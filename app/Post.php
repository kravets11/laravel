<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id',
        'slug',
        'title',
        'body',
        'category_id',
        'author_id',
//        'image',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
    }

    public function getTitleAttribute($title)
    {
        return $title;
    }

    public function getFullNameAttribute()
    {
        $return = [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'body' => $this->body,
            'category_id' => $this->category_id,
            'author_id' => $this->author_id,
//            'image' => $this->image,
            'full_name' => $this->title . '  ' . $this->slug
        ];
        return $return;
    }
}
