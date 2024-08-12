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
        $categories = [
            ["name" => "Web Design"],
            ["name" => "Web Development"],
            ["name" => "Backend"],
            ["name" => "Frontend"],
            ["name" => "Mobile apps"]
        ];

        Category::insert($categories);
    }
}
