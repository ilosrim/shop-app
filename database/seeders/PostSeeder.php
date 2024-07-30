<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post::create([
        //     'title' => 'Birinchi post',
        //     'description' => 'Post haqida qisqacha',
        //     'content' => 'Post kontenti',
        //     'user_id' => 1
        // ]);

        Post::factory(10)->create();
    }
}
