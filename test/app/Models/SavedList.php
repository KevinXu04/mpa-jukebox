<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedList extends Model
{
    protected $table = 'saved_lists';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'saved_lists_songs', 'saved_lists_id', 'song_id');
    }
}
