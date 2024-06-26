function createPlaylistModal(songId, songName, songAuthor) {
    document.getElementById('modalSongId').value = songId;
    document.getElementById('modalSongName').value = songName;
    document.getElementById('modalSongAuthor').value = songAuthor;

    let modal = document.getElementById("playlistModal");
    modal.style.display = "block";
    event.stopPropagation();
}

function showSongModal(songId, songName, songAuthor, songImage) {
    document.getElementById('songInfoId').innerText = `ID: ${songId}`;
    document.getElementById('songInfoName').innerText = `Name: ${songName}`;
    document.getElementById('songInfoAuthor').innerText = `Author: ${songAuthor}`;
    document.getElementById("songInfoImage").src = songImage

    let modal = document.getElementById("songModal");
    modal.style.display = "block";
}

function showPlaylistSongsModal(playlistId) {
    fetch(`/playlist-songs/${playlistId}`)
        .then(response => response.json())
        .then(data => {
            const playlistSongsList = document.getElementById('playlistSongsList');
            playlistSongsList.innerHTML = '';

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            data.songs.forEach(song => {
                const li = document.createElement('li');
                li.innerHTML = `
                    ${song.name} by ${song.author}
                    <form method="POST" action="/playlist/remove-song" style="display:inline;margin:20px 0 20px 0;">
                        <input type="hidden" name="_token" value="${csrfToken}">
                        <input type="hidden" name="saved_lists_id" value="${playlistId}">
                        <input type="hidden" name="song_id" value="${song.id}">
                        <button type="submit">Remove</button>
                    </form>
                `;
                playlistSongsList.appendChild(li);
            });

            let modal = document.getElementById("playlistSongsModal");
            modal.style.display = "block";
        })
        .catch(error => console.error('Error fetching playlist songs:', error));
}


function openUpdatePlaylistModal(playlistId, playlistName) {
    document.getElementById('modalPlaylistName').value = playlistName;
    document.getElementById('updatePlaylistForm').action = `/playlist/update/${playlistId}`;
    document.getElementById('updatePlaylistModal').style.display = 'block';
}

function closeModal(modalId) {
    let modal = document.getElementById(modalId);
    modal.style.display = "none";
}

window.onclick = function(event) {
    const modals = ['playlistModal', 'songModal', 'playlistSongsModal', 'updatePlaylistModal'];
    modals.forEach(modalId => {
        let modal = document.getElementById(modalId);
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
}
