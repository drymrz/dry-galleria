<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Member;
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
        User::factory(3)->create();
        Post::factory(25)->create();

        User::create([
            'name' => 'Adry Mirza',
            'username' => 'dryMrz',
            'email' => 'adrymirza@gmail.com',
            'password' => bcrypt('12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Eh Ecaa',
            'username' => 'bbyCha',
            'email' => 'nadsha@gmail.com',
            'password' => bcrypt('54321'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Member::create([
            'nis' => '13419005',
            'fullName' => 'Adry Mirza',
            'words' => 'Nolep Multitalent',
            'ig_link' => 'adry_mirza',
            'web_link' => 'adrymirza.xyz',
            'createdBy' => '4',
            'lastEdit' => '4',
        ]);

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni voluptatibus cupiditate adipisci dicta ipsum fugiat, rem dolor sint tenetur excepturi!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quod beatae nostrum doloremque quidem voluptas magni qui quibusdam dicta, maxime numquam consequatur libero accusamus, totam nam eius magnam consequuntur consectetur non ad aliquid? Sed pariatur ea id explicabo natus suscipit sunt totam, odit molestiae voluptatum, quo nostrum voluptas unde minima nihil possimus rem accusantium officiis enim modi mollitia voluptates, illum at? Consectetur veritatis voluptate aperiam suscipit nemo totam soluta tempore asperiores, labore dolorem distinctio minima doloribus. Inventore voluptatem minus doloribus velit. Laborum neque odio, laudantium enim alias deserunt, ipsum non ut quod debitis quia, repellat cum expedita modi nihil aut.',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni voluptatibus cupiditate adipisci dicta ipsum fugiat, rem dolor sint tenetur excepturi!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quod beatae nostrum doloremque quidem voluptas magni qui quibusdam dicta, maxime numquam consequatur libero accusamus, totam nam eius magnam consequuntur consectetur non ad aliquid? Sed pariatur ea id explicabo natus suscipit sunt totam, odit molestiae voluptatum, quo nostrum voluptas unde minima nihil possimus rem accusantium officiis enim modi mollitia voluptates, illum at? Consectetur veritatis voluptate aperiam suscipit nemo totam soluta tempore asperiores, labore dolorem distinctio minima doloribus. Inventore voluptatem minus doloribus velit. Laborum neque odio, laudantium enim alias deserunt, ipsum non ut quod debitis quia, repellat cum expedita modi nihil aut.',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni voluptatibus cupiditate adipisci dicta ipsum fugiat, rem dolor sint tenetur excepturi!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quod beatae nostrum doloremque quidem voluptas magni qui quibusdam dicta, maxime numquam consequatur libero accusamus, totam nam eius magnam consequuntur consectetur non ad aliquid? Sed pariatur ea id explicabo natus suscipit sunt totam, odit molestiae voluptatum, quo nostrum voluptas unde minima nihil possimus rem accusantium officiis enim modi mollitia voluptates, illum at? Consectetur veritatis voluptate aperiam suscipit nemo totam soluta tempore asperiores, labore dolorem distinctio minima doloribus. Inventore voluptatem minus doloribus velit. Laborum neque odio, laudantium enim alias deserunt, ipsum non ut quod debitis quia, repellat cum expedita modi nihil aut.',
        //     'category_id' => 3,
        //     'user_id' => 1,
        // ]);
    }
}
