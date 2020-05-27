<?php

namespace App;

use App\User;
use App\Page;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'user_id', 'name',
    ];

    public function pages()
    {
        return $this->belongsToMany('App\Page');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
