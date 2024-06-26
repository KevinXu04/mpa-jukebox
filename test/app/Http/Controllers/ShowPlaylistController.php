<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowPlaylistController extends Controller
{
    public function showPlaylist()
    {
        $userId = session('user_id');

        $playlists = DB::table('saved_lists')->where('user_id', $userId)->get();

        return view('home', ['playlists' => $playlists]);
    }
}
