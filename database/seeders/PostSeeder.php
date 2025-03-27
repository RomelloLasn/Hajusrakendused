<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{

    
public function run(): void
{
    \App\Models\Post::create([
        'title' => 'Sample Post',
        'content' => 'This is a sample post.'
    ]);
}
}
