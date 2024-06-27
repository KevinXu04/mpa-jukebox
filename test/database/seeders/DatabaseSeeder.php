<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@example.com',
        //     'password' => 123,
        // ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 123,
        ]);

        DB::table('songs')->insert([
            [
                'name' => 'Solo',
                'image' => 'images/song_logo/solo.png',
                'author' => 'Future',
                'genres_id' => '1',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Beef',
                'image' => 'images/song_logo/beef.png',
                'author' => 'Ethereal, Playboi Carti',
                'genres_id' => '1',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Homecoming',
                'image' => 'images/song_logo/homecoming.png',
                'author' => 'Lil Uzi Vert',
                'genres_id' => '1',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Yessirskiii',
                'image' => 'images/song_logo/yessirski.png',
                'author' => 'Lil Uzi Vert, 21 Savage',
                'genres_id' => '1',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Comet',
                'image' => 'images/song_logo/comet.png',
                'author' => 'Comethazine',
                'genres_id' => '1',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => '90210',
                'image' => 'images/song_logo/90210.png',
                'author' => 'Travis Scott, Kacy Hill',
                'genres_id' => '1',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Flex Up',
                'image' => 'images/song_logo/flexup.png',
                'author' => 'Lil Yachty, Future, Playboi Carti',
                'genres_id' => '1',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Camelot',
                'image' => 'images/song_logo/camelot.png',
                'author' => 'NLE Choppa',
                'genres_id' => '1',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'One Call',
                'image' => 'images/song_logo/onecall.png',
                'author' => 'Rich Amiri',
                'genres_id' => '1',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'redrum',
                'image' => 'images/song_logo/redrum.png',
                'author' => '21 Savage',
                'genres_id' => '1',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Psycho Dreams (Sped Up)',
                'image' => 'images/song_logo/psycho.png',
                'author' => 'Kill Eva, ENCASSATOR',
                'genres_id' => '2',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'IN THE CLUB',
                'image' => 'images/song_logo/intheclub.png',
                'author' => 'Mishashi Sensei',
                'genres_id' => '2',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Wanna Play?',
                'image' => 'images/song_logo/wannaplay.png',
                'author' => 'The Prophet',
                'genres_id' => '2',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Hooked',
                'image' => 'images/song_logo/hooked.png',
                'author' => 'NOTION',
                'genres_id' => '2',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'No Chill',
                'image' => 'images/song_logo/nochill.png',
                'author' => 'Josh A, Mr T Lexify',
                'genres_id' => '1',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Confessions Part II',
                'image' => 'images/song_logo/confessions2.png',
                'author' => 'USHER',
                'genres_id' => '3',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Buy U a Drank',
                'image' => 'images/song_logo/buyuadrank.png',
                'author' => 'T-Pain, Yung Joc',
                'genres_id' => '3',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Superstar',
                'image' => 'images/song_logo/superstar.png',
                'author' => 'USHER',
                'genres_id' => '3',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'You',
                'image' => 'images/song_logo/you.png',
                'author' => 'Lloyd, Lil Wayne',
                'genres_id' => '3',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'I Luv Your Girl',
                'image' => 'images/song_logo/iluvyourgirl.png',
                'author' => 'The-Dream',
                'genres_id' => '3',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Tell Me',
                'image' => 'images/song_logo/tellme.png',
                'author' => 'Take/Five',
                'genres_id' => '4',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Take Off',
                'image' => 'images/song_logo/takeoff.png',
                'author' => 'Metric Again, Paul Rey',
                'genres_id' => '4',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'Forever',
                'image' => 'images/song_logo/forever.png',
                'author' => 'Lost Sky',
                'genres_id' => '4',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => 'GDFR',
                'image' => 'images/song_logo/gdfr.png',
                'author' => 'Flo Rida, Sage The Gemini, Lookas, K Theory',
                'genres_id' => '4',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => "Don't Let Me Down - Illenium Remix",
                'image' => 'images/song_logo/dontletmedown.png',
                'author' => 'The Chainsmokers, Daya, ILLENIUM',
                'genres_id' => '4',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => "Stargazing",
                'image' => 'images/song_logo/stargazing.png',
                'author' => 'Myles Smith',
                'genres_id' => '5',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => "Honey Boy",
                'image' => 'images/song_logo/honeyboy.png',
                'author' => 'Purple Disco Machine, Benjamin Ingrosso, Nile Rodgers, Shenseea',
                'genres_id' => '5',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => "I Had Some Help",
                'image' => 'images/song_logo/ihadsomehelp.png',
                'author' => 'Post Malone, Morgan Wallen',
                'genres_id' => '5',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => "Larger Than Life",
                'image' => 'images/song_logo/largerthanlife.png',
                'author' => "Armin van Buuren, Chef'Special",
                'genres_id' => '5',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
            [
                'name' => "Mwaki",
                'image' => 'images/song_logo/mwaki.png',
                'author' => 'Zerb, Sofiya Nzau',
                'genres_id' => '5',
                'duration' => gmdate('H:i:s', rand(120, 600))
            ],
        ]);
        
        

        DB::table('genres')->insert([
            [
                'name' => 'Rap',
            ],
            [
                'name' => 'EDM',
            ],
            [
                'name' => 'R&B',
            ],
            [
                'name' => 'Trap',
            ],
            [
                'name' => 'Pop',
            ],
        ]);
    }
}
