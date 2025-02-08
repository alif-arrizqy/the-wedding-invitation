<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Detail::create([
            'wedding_id'        => 1,
            'type'              => 'Acara Pernihakan',
            'date'              => '2025-07-05 09:00:00',
            'address'           => 'Griya Pratama Mas, Cikarageman, Setu, Bekasi Regency, West Java',
            'maps'              => 'https://maps.app.goo.gl/RqsdRkRFTfjXmeBx6',
            'calendar'          => 'https://calendar.app.google/dCwnjGTepNntYdbi6',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        Detail::create([
            'wedding_id'        => 1,
            'type'              => 'Resepsi',
            'date'              => '2025-07-05 10:00:00',
            'address'           => 'Griya Pratama Mas, Cikarageman, Setu, Bekasi Regency, West Java',
            'maps'              => 'https://maps.app.goo.gl/RqsdRkRFTfjXmeBx6',
            'calendar'          => 'https://calendar.app.google/dCwnjGTepNntYdbi6',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
