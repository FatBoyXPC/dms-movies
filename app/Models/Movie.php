<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mdb_id', 'title', 'rating', 'overview', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public $timestamps = false;

    public function movieLists()
    {
        return $this->belongsToMany('App\Models\MovieList', 'movies_lists');
    }

    public function getImageSrcAttribute()
    {
        $basePath = 'http://image.tmdb.org/t/p/w154';
        return sprintf('%s%s', $basePath, $this->image);
    }
}
