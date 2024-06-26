<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CreatePlaylistController;
use App\Http\Controllers\ShowPlaylistController;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dbconn', function () {
    return view('dbconn');
});

Route::get('/home', [SongsController::class, 'allSongs'])->name('home');
Route::post('/home/create-playlist', [CreatePlaylistController::class, 'createPlaylist'])->name('createPlaylist');
Route::post('/home/add-song-to-playlist', [SongsController::class, 'addSongToPlaylist'])->name('addSongToPlaylist');
Route::post('/home/filter', [SeachController::class, 'showFilterResult'])->name('showFilterResult');
Route::post('/playlist/update/{playlistId}', [CreatePlaylistController::class, 'updatePlaylistName'])->name('playlist.update');
Route::post('/playlist/remove-song', [SongsController::class, 'removeSongFromPlaylist'])->name('removeSongFromPlaylist');
Route::get('/playlist-songs/{playlistId}', [SongsController::class, 'getPlaylistSongs']);


