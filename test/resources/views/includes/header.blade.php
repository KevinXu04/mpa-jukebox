<header>
    <nav>
        <ul>
            <li><a href="/"><img src="{{ URL('/images/spotify.png') }}" alt="" class="logo">Spotifu</a></li>
            <li><a href="/search"><img src="{{ URL('/images/search.png') }}" alt="" class="icon">Search</a></li>
        </ul>

        @if (Session::has('user_id'))
            @php
                $user = Session::get('user');
            @endphp
            <p>Welcome, {{ $user->name }}</p>
        @else
            <p>No user is logged in.</p>
        @endif

    </nav>

    <nav>
        <div class="createList">
            <h1>Library</h1>
            @if (Session::has('user_id'))
                <form method="post" action="{{ route('createPlaylist') }}">
                    @csrf
                    <label for="playlist_name">Playlist Name:</label>
                    <input type="text" id="playlist_name" name="playlist_name" placeholder="Enter a name" required>
                    <button type="submit">Create Playlist</button>
                </form>
            @else
                <p>You need to <a href="/" class="underline">login</a> to create playlists.</p>
            @endif
        </div>

        <h3>Playlists</h3>

        <div class="playlists">
            @foreach ($playlists as $playlist)
                <div class="list" onclick="showPlaylistSongsModal('{{ $playlist->id }}')">
                    <img src="{{ url('/images/liked.png') }}" alt="">
                    <div class="information">
                        <div class="playlistName">
                            {{ $playlist->name }}
                        </div>
                        
                        <div class="playlistInfo">
                            @php
                                $user = Session::get('user');
                            @endphp
                            Playlist • {{ $user->name }}
                        </div>
                        <div class="songsAmount">
                            {{ $playlist->song_count }} Songs
                        </div>
                    </div>
                </div>

                <!-- Playlist name update form -->
                <div>
                    <form action="{{ route('playlist.update', ['playlistId' => $playlist->id]) }}" method="POST">
                        @csrf
                        <input type="text" name="playlist_name" value="{{ $playlist->name }}" required>
                        <button type="submit">Update Name</button>
                    </form>
                </div>
            @endforeach
        </div>
    </nav>
</header>
