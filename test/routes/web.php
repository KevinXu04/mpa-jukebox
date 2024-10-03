<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CreatePlaylistController;
use App\Http\Controllers\ShowPlaylistController;

// Deze route zorgt ervoor dat wanneer een gebruiker naar de hoofdpagina (/) gaat, 
// de loginform wordt weergegeven. Dit wordt verwerkt door de showLoginForm-methode in de LoginController.
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Wanneer het loginformulier op de hoofdpagina wordt ingediend (met een POST-verzoek), 
// wordt dit verzoek verwerkt door de login-methode in de LoginController. Hier wordt de authenticatie uitgevoerd.
Route::post('/', [LoginController::class, 'login']);

// Deze route toont het registratieformulier, aangestuurd door de showRegistrationForm-methode in de RegisterController.
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Wanneer een gebruiker het registratieformulier indient, 
// wordt dit verzoek verwerkt door de register-methode in de RegisterController om een nieuwe gebruiker aan te maken.
Route::post('/register', [RegisterController::class, 'register']);

// Het is bedoelt om de verbinding met de database te testen
Route::get('/dbconn', function () {
    return view('dbconn');
});

// Wanneer een gebruiker naar /home gaat, toont deze route alle nummers in de database, weergegeven door de allSongs-methode in de SongsController.
Route::get('/home', [SongsController::class, 'allSongs'])->name('home');

// Deze route wordt gebruikt om een nieuwe afspeellijst aan te maken. Het POST-verzoek wordt verwerkt door de createPlaylist-methode in de CreatePlaylistController.
Route::post('/home/create-playlist', [CreatePlaylistController::class, 'createPlaylist'])->name('createPlaylist');

// Wanneer een gebruiker een nummer wil toevoegen aan een afspeellijst, verwerkt deze route het verzoek via de addSongToPlaylist-methode in de SongsController.
Route::post('/home/add-song-to-playlist', [SongsController::class, 'addSongToPlaylist'])->name('addSongToPlaylist');

// Deze route verwerkt een POST-verzoek om gefilterde resultaten te tonen, 
// zoals nummers die voldoen aan specifieke zoekcriteria. Dit wordt gedaan door de showFilterResult-methode in de SearchController.
Route::post('/home/filter', [SeachController::class, 'showFilterResult'])->name('showFilterResult');

// Deze route verwerkt het bijwerken van de naam van een afspeellijst op basis van het playlistId. 
// Dit gebeurt via de updatePlaylistName-methode in de CreatePlaylistController.
Route::post('/playlist/update/{playlistId}', [CreatePlaylistController::class, 'updatePlaylistName'])->name('playlist.update');

// Wanneer een gebruiker een nummer uit een afspeellijst wil verwijderen, wordt dit verzoek verwerkt door de removeSongFromPlaylist-methode in de SongsController.
Route::post('/playlist/remove-song', [SongsController::class, 'removeSongFromPlaylist'])->name('removeSongFromPlaylist');

// Deze route toont alle nummers in een specifieke afspeellijst, gebaseerd op het playlistId. Dit wordt gedaan door de getPlaylistSongs-methode in de SongsController.
Route::get('/playlist-songs/{playlistId}', [SongsController::class, 'getPlaylistSongs']);