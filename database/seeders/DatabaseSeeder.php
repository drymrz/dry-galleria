<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


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
            'name' => 'Adry Mirza',
            'username' => 'dryMrz',
            'email' => 'adrymirza@gmail.com',
            'password' => bcrypt('12345'),
            'isRole' => '2',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
    }
}
