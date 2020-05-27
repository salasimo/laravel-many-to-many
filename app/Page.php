<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'title',
        'summary', 'slug', 'body',
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function photos()
    {
        return $this->belongsToMany('App\Photo');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
