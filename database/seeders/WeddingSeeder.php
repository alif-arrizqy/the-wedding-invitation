<?php

namespace Database\Seeders;

use App\Models\Wedding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeddingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wedding::create([
            'title'         => 'A Celebration of Love: Alif & Pika’s Wedding',
            'name'          => 'Alif & Pika',
            'note'          => 'A great marriage is not when the perfect couple comes together. It is when an imperfect couple learns to enjoy their differences.',
            'status'        => 'Active',
            'hero1'         => 'hero-1.jpg',
            'hero2'         => 'hero-2.jpg',
            'hero3'         => 'hero-3.jpg',
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
