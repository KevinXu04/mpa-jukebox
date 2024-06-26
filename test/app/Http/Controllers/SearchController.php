<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function getGenres()
    {
        $searchResults = DB::table('genres')->get();
        return view('app', ['searchResults' => $searchResults]);
    }

    public function showFilterResult(Request $request)
    {
        $filteredSongs = DB::table('songs')->where('genre_id', $request->id)->get();
        return redirect('/home', ['filteredSongs' => $filteredSongs])->with('success', 'Playlist created successfully.');
    }
}