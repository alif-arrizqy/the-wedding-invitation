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
            'type'              => 'Akad',
            'date'              => '2025-06-01 09:00:00',
            'address'           => 'Griya Pratama Mas Blok B4 No. 2, Desa Cikarageman, Kec. Setu, Kab. Bekasi, Jawa Barat',
            'maps'              => 'https://maps.app.goo.gl/z3NdZL67aJ4wGh7s9',
            'calendar'          => 'https://calendar.app.google/YKrbCXjNq2Ybhn8v8',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        Detail::create([
            'wedding_id'        => 1,
            'type'              => 'Resepsi',
            'date'              => '2025-06-01 10:00:00',
            'address'           => 'Griya Pratama Mas Blok B4 No. 2, Desa Cikarageman, Kec. Setu, Kab. Bekasi, Jawa Barat',
            'maps'              => 'https://maps.app.goo.gl/z3NdZL67aJ4wGh7s9',
            'calendar'          => 'https://calendar.app.google/YKrbCXjNq2Ybhn8v8',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
