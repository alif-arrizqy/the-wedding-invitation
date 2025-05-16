<?php

namespace Database\Seeders;

use App\Models\Galery;
use Illuminate\Database\Seeder;

class GalerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Galery::create([
            'wedding_id'        => 1,
            'gallery1'          => 'gallery1.jpg',
            'gallery2'          => 'gallery2.jpg',
            'gallery3'          => 'gallery3.jpg',
            'gallery4'          => 'gallery4.jpg',
            'gallery5'          => 'gallery5.jpg',
            'gallery6'          => 'gallery6.jpg',
            'video'             => '',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
