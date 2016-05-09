<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function movies()
    {
        return $this->belongsToMany('App\Models\Movie', 'movies_lists');
    }
}
