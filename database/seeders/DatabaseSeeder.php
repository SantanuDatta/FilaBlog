<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory(3)
            ->state(new Sequence(
                ['name' => 'admin', 'description' => 'Admin Privilege'],
                ['name' => 'blogger', 'description' => 'Blogging Privilege'],
                ['name' => 'reader', 'description' => 'Reading Privilege'],
            ))->create();

        $admin = User::factory()->role('admin')->create([
            'first_name' => 'Admin',
            'last_name' => 'Dev',
            'username' => 'admindev',
            'email' => 'admin@gmail.com',
            'password' => 'developer',
        ]);

        $blogger = User::factory()->role('blogger')->create([
            'first_name' => 'Fantasy',
            'last_name' => 'Warrior',
            'username' => 'fantasywarrior',
            'email' => 'fantasy@gmail.com',
            'password' => 'staff001',
        ]);

        $bloggers = User::factory(4)->role('blogger')->create();

        $readers = User::factory(4)->role('reader')->create();

        $tags = Tag::factory(10)->create();

        $posts = Post::factory(10)
            ->recycle($tags)
            ->recycle($bloggers)
            ->create();

        $comments = Comment::factory(10)
            ->recycle($posts)
            ->recycle($readers)
            ->create();
    }
}
