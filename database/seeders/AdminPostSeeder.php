<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'photo' => 'Hardik',
            'heading' => 'admin@gmail.com',
            'short_content' => 'sdsdsds',
            'content' => 'sdsdsdsdsd',
            'total_view' => 1,
        ],
        [
            'photo' => 'Hardikssssss',
            'heading' => 'adminssss@gmail.com',
            'short_content' => 'bai2',
            'content' => 'bai2',
            'total_view' => 2,
        ]
    );
    }
}
