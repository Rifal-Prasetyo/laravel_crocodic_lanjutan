<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Post::create([
            'title' => 'Mencoba dengan sekuat tenaga',
            'excerpt' => 'lorem ipsum dolor sit amet adcjjis elit oy oy',
            'image' => 'http://upload.bogeng.skom.id/mus/Z7wjcxsYKTwRk6y.png',
            'content' => 'Kopi adalah tanaman hasil pertanian yang dijadikan minuman hasil seduhan biji kopi yang telah disangrai dan dihaluskan menjadi bubuk. Kopi merupakan salah satu komoditas di dunia yang dibudidayakan lebih dari 50 negara. Dua spesies pohon kopi yang dikenal secara umum yaitu Kopi Robusta dan Kopi Arabika.'
        ]);
    }
}
