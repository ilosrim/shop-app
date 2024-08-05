<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name" => "Web Design",
        ]);

        Category::create([
            "name" => "Web Development",
        ]);
        Category::create([
            "name" => "Backend",
        ]);
        Category::create([
            "name" => "Frontend",
        ]);
        Category::create([
            "name" => "Mobile apps",
        ]);
    }
}
