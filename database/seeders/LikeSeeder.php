<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Post::factory(20)->create();
        for ($i = 0; $i < 30; $i++) {
            $like = new Like();
            $like->user_id = User::all()->random(1)->first()->id;
            $like->post_id = Post::all()->random(1)->first()->id;
            $like->save();
        }
    }
}
