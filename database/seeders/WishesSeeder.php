<?php

namespace Database\Seeders;

use App\Models\Wishes;
use Illuminate\Database\Seeder;

class WishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wishes::create([
            'wedding_id'            => 1,
            'name'                  => 'DEANKT',
            'comment'               => 'Semoga menjadi keluarga bahagia',
            'created_at'            => now(),
            'updated_at'            => now()
        ]);
        Wishes::create([
            'wedding_id'            => 1,
            'name'                  => 'Nastasia Adeline',
            'comment'               => 'Selamat menempuh hidup baru',
            'created_at'            => now(),
            'updated_at'            => now()
        ]);
    }
}
