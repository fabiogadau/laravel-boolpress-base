<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Comment;
use Faker\Generator as Faker;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $comments = 25;
        $posts = Post::all();

        for ($i = 0; $i < $comments; $i++ ) { 
            $newComment = new Comment();

            $newComment->post_id = $posts->random()->id;
            $newComment->title = $faker->words(5, true);
            $newComment->body = $faker->text(200);

            $newComment->save();
        }
    }
}
