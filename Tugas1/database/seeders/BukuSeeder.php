<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bukus')->insert([
            'title' => "Harry Potter 1",
            'author' => "J.K. Rowling",
            'publicationYear' => now(),
            'totalPage' => 200,
            'image' => "https://upload.wikimedia.org/wikipedia/id/b/bf/Harry_Potter_and_the_Sorcerer%27s_Stone.jpg",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \App\Models\Buku::factory(5)->create();
    }
}
