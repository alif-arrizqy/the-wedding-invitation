<?php

namespace Database\Seeders;

use App\Models\Gift;
use Illuminate\Database\Seeder;

class GiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gift::create([
            'wedding_id'        => 1,
            'name'              => 'Rumah Pika',
            'address'           => 'Griya Pratama Mas Blok A No. 3 RT 02 RW 05 Kec. Setu Kab. Bekasi',
            'maps'              => 'https://maps.app.goo.gl/RqsdRkRFTfjXmeBx6',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
