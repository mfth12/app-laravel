<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Miftahul Haq',
            'username' => 'mfth12',
            'email' => 'ciftah12@gmail.com',
            'password' => bcrypt('123123'),

        ]);
        
        User::factory(3)->create();

        Kategori::create([
            'nama' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Kategori::create([
            'nama' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Kategori::create([
            'nama' => 'Culture',
            'slug' => 'culture'
        ]);


        Post::factory(17)->create();
    }
}
