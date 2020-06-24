<?php

use Illuminate\Database\Seeder;
use App\User;
use\App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = 10;
        $users = User::all();

        for ( $i = 0; $i < $posts; $i++ ) { 
            $title = $faker->text(50);
            
            $newPost = new Post();

            $newPost->user_id = $users->random()->id;
            $newPost->title = $title;
            $newPost->body = $faker->text(3000);
            $newPost->slug = Str::slug($title, '-');

            $newPost->save();
        }
    }
}
