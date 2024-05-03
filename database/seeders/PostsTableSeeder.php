<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = 'user';

        $userCount = User::where('role', $role)->count();
        
        if ($userCount > 0) {
            $userIds = User::where('role', $role)->take(5)->pluck('id');
        
            $posts = [];
        
            foreach ($userIds as $userId) {
                for ($i = 1; $i <= 5; $i++) {
                    $posts[] = [
                        'user_id' => $userId,
                        'title' => 'Post ' . $i . ' for User ' . $userId,
                        'image' => '',
                        'status' => 'active',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        
            foreach ($posts as $post) {
                Post::create($post);
            }
        }
    }
}
