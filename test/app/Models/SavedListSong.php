<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SavedListSong extends Pivot
{
    protected $table = 'saved_lists_songs';

    public $timestamps = false;

    protected $fillable = [
        'saved_lists_id',
        'song_id'
    ];
}
