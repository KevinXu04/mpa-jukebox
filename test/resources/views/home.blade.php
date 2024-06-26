@extends('layouts.master')

@section('home')
    <div class="fakeBody">
        @include('includes.header')

        <div class="container">
            <h1>Popular Songs</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <div class="context">
                <div class="filter-container">
                    <form action="{{ route('showFilterResult') }}" method="POST">
                        @csrf
                        <select name="genre">
                            <option value="">All Genres</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->name }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Filter</button>
                    </form>
                </div>
            </div>

            <br>

            <div class="song-slider">
                @foreach ($results as $result)
                    <div class="song" onclick="showSongModal('{{ $result->id }}', '{{ $result->name }}', '{{ $result->author }}', '{{ $result->image }}')">
                        <div class="song-image">
                            <img src="{{ $result->image }}" alt="">
                        </div>
                        <div class="song-title">
                            {{ $result->name }}
                        </div>
                        <div class="song-author">
                            {{ $result->author }}
                        </div>
                        <div class="playlist-button" onclick="createPlaylistModal('{{ $result->id }}', '{{ $result->name }}', '{{ $result->author }}')">
                            &#43;
                        </div>
                        <div class="play-button">
                            &#9658;
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="hidden">
                
            </div>

            <div id="playlistModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h2>Add to Playlist</h2>
                    <form id="addSongForm" method="POST" action="{{ route('addSongToPlaylist') }}">
                        @csrf
                        <input type="hidden" name="song_id" id="modalSongId">
                        <input type="hidden" name="song_name" id="modalSongName">
                        <input type="hidden" name="song_author" id="modalSongAuthor">

                        <label for="playlist">Select Playlist:</label>
                        <select name="saved_lists_id" id="playlistSelect">
                            @foreach ($playlists as $playlist)
                                <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Add to Playlist</button>
                    </form>
                </div>
            </div>

            <div id="songModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h2>Song Information</h2>

                    <div class="modal-container">
                        <div class="modal-image">
                            <img src="" alt="" id="songInfoImage">
                        </div>
                        <div class="modal-information">
                            <p id="songInfoId"></p>
                            <p id="songInfoName"></p>
                            <p id="songInfoAuthor"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="playlistSongsModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('playlistSongsModal')">&times;</span>
                    <h2>Playlist Songs</h2>
                    <ul id="playlistSongsList"></ul>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/js/script.js') }}"></script>
@endsection
