<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dyaka Faiz',
            'username' => 'faiz',
            'email' => 'faiz@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(3)->create();



        Category::create([
            "name" => "Programming",
            "slug" => "programming",
        ]);

        Category::create([
            "name" => "Web Design",
            "slug" => "web-design",
        ]);

        Category::create([
            "name" => "Personal",
            "slug" => "personal",
        ]);

        Blog::factory(20)->create();
    }
}
