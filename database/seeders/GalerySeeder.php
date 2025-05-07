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
            'gallery1'          => 'gallery1.png',
            'gallery2'          => 'gallery2.png',
            'gallery3'          => 'gallery3.png',
            'gallery4'          => 'gallery4.png',
            'gallery5'          => 'gallery5.png',
            'gallery6'          => 'gallery6.png',
            'video'             => '',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
