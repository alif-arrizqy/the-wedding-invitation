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
            'address'           => 'Pesona Kahuripan 6, Jl. Cakrabuana Blok A6/ no.27 RT 02 RW 17 Desa Dayeuh, Kec. Cileungsi, Kab. Bogor',
            'maps'              => 'https://maps.app.goo.gl/sXtCwBiqJVtPiWjk9',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
