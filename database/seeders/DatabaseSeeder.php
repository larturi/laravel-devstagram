<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Leandro Arturi',
            'email' => 'lea.arturi@correo.com',
            'username' => 'lea.arturi',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'j.doe@correo.com',
            'username' => 'john.doe',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Laura',
            'email' => 'laura@correo.com',
            'username' => 'laura.33',
            'password' => bcrypt('12345678'),
        ]);

        Post::factory(200)->create();
    }
}
