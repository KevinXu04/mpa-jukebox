<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreatePlaylistController extends Controller
{
    public function createPlaylist(Request $request)
    {
        $request->validate([
            'playlist_name' => 'required|string|max:255',
        ]);

        $userId = session('user_id');

        DB::table('saved_lists')->insert([
            'name' => $request->input('playlist_name'),
            'user_id' => $userId,
        ]);

        return redirect('/home')->with('success', 'Playlist created successfully.');
    }

    public function updatePlaylistName(Request $request, $playlistId)
    {
        $request->validate([
            'playlist_name' => 'required|string|max:255',
        ]);

        $userId = session('user_id');

        DB::table('saved_lists')
            ->where('id', $playlistId)
            ->where('user_id', $userId)
            ->update(['name' => $request->input('playlist_name')]);

        return redirect('/home')->with('success', 'Playlist name updated successfully.');
    }
}

