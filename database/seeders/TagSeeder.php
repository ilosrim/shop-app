<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'Web'],
            ['name' => 'Mobile'],
            ['name' => 'Desktop'],
            ['name' => 'Tablet'],
        ];

        Tag::insert($tags);
    }
}
