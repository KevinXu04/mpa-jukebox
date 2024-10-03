<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Song;
use App\Models\SavedList;

class SongsController extends Controller
{
    public function allSongs()
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect()->route('login')->withErrors('Please log in first.');
        }

        $playlists = SavedList::withCount('songs')
            ->where('user_id', $userId)
            ->get();

        $results = Song::inRandomOrder()->get();

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

        $savedList = SavedList::findOrFail($request->saved_lists_id);
        $song = Song::findOrFail($request->song_id);

        $savedList->songs()->attach($song);

        return redirect()->route('home')->with('success', 'Song added to playlist successfully!');
    }

    public function getPlaylistSongs($playlistId)
    {
        $savedList = SavedList::with('songs')->findOrFail($playlistId);

        $totalDuration = $savedList->songs->reduce(function ($carry, $item) {
            $duration = strtotime($item->duration) - strtotime('TODAY');
            return $carry + $duration;
        }, 0);

        $totalDurationFormatted = gmdate('H:i:s', $totalDuration);

        return response()->json(['songs' => $savedList->songs, 'total_duration' => $totalDurationFormatted]);
    }

    public function removeSongFromPlaylist(Request $request)
    {
        $request->validate([
            'saved_lists_id' => 'required|integer',
            'song_id' => 'required|integer',
        ]);

        $savedList = SavedList::findOrFail($request->saved_lists_id);
        $savedList->songs()->detach($request->song_id);

        return redirect()->route('home')->with('success', 'Song removed from playlist successfully!');
    }
}
