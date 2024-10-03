<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'image',
        'author',
        'duration',
        'genres_id',
        'duration'
    ];

    public function savedLists()
    {
        return $this->belongsToMany(SavedList::class, 'saved_lists_songs', 'song_id', 'saved_lists_id');
    }
}
