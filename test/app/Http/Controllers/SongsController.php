<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongsController extends Controller
{
    public function allSongs()
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect()->route('login')->withErrors('Please log in first.');
        }

        $playlists = DB::table('saved_lists')
            ->leftJoin('saved_lists_songs', 'saved_lists.id', '=', 'saved_lists_songs.saved_lists_id')
            ->select('saved_lists.*', DB::raw('COUNT(saved_lists_songs.song_id) as song_count'))
            ->where('saved_lists.user_id', $userId)
            ->groupBy('saved_lists.id', 'saved_lists.name', 'saved_lists.user_id')
            ->get();

        $results = DB::table('songs')->inRandomOrder()->get();
        $genres = DB::table('genres')->get();

        return view('home', [
            'results' => $results,
            'playlists' => $playlists,
            'genres' => $genres
        ]);
    }

    public function addSongToPlaylist(Request $request)
    {
        $request->validate([
            'saved_lists_id' => 'required',
            'song_id' => 'required',
        ]);

        DB::table('saved_lists_songs')->insert([
            'saved_lists_id' => $request->saved_lists_id,
            'song_id' => $request->song_id,
        ]);

        return redirect()->route('home')->with('success', 'Song added to playlist successfully!');
    }

    public function getPlaylistSongs($playlistId)
    {
        $songs = DB::table('saved_lists_songs')
            ->join('songs', 'saved_lists_songs.song_id', '=', 'songs.id')
            ->where('saved_lists_songs.saved_lists_id', $playlistId)
            ->select('songs.id', 'songs.name', 'songs.author')  // Ensure 'songs.id' is selected
            ->get();

        return response()->json(['songs' => $songs]);
    }

    public function removeSongFromPlaylist(Request $request)
    {
        $request->validate([
            'saved_lists_id' => 'required|integer',
            'song_id' => 'required|integer',
        ]);

        DB::table('saved_lists_songs')
            ->where('saved_lists_id', $request->saved_lists_id)
            ->where('song_id', $request->song_id)
            ->delete();

        return redirect()->route('home')->with('success', 'Song removed from playlist successfully!');
    }
}

