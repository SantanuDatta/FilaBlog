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
        Role::factory(2)
            ->state(new Sequence(
                ['name' => 'admin', 'description' => 'Admin Privilege'],
                ['name' => 'staff', 'description' => 'Staff Privilege'],
            ))->create();

        $admin = User::factory()->role('admin')->create([
            'first_name' => 'Admin',
            'last_name' => 'Dev',
            'email' => 'admin@gmail.com',
            'password' => 'developer',
        ]);

        $staff = User::factory(1)->role('staff')
            ->state(new Sequence(
                [
                    'first_name' => 'Catharine',
                    'last_name' => 'McCall',
                    'email' => 'catherine@gmail.com',
                    'password' => 'staff001',
                ],
            ))->create();

        $staffs = User::factory(8)->role('staff')->create();

        $tags = Tag::factory(10)->create();

        $posts = Post::factory(10)
            ->recycle($tags)
            ->recycle($staffs)
            ->create();

        $comments = Comment::factory(10)
            ->recycle($posts)
            ->recycle($staffs)
            ->create();
    }
}
