<?php

namespace Database\Seeders;

use App\Models\Bride;
use Illuminate\Database\Seeder;

class BrideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bride::create([
            'wedding_id'        => 1,
            'name'              => 'Wafiq Azizah',
            'child'             => 'Putri Ketiga dari',
            'name_father'       => 'Bpk Abdullah',
            'name_mother'       => 'Ibu Oom Komariah',
            'instagram'         => 'https://www.instagram.com/wa.fiqaa/',
            'bank_id'           => 2,
            'acc_name'          => 'Wafiq Azizah',
            'acc_number'        => 923123456,
            'gender'            => 'Female',
            'photo'             => 'female.png',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        Bride::create([
            'wedding_id'        => 1,
            'name'              => 'Alif Ayatulloh Ar-Rizqy',
            'child'             => 'Putra Pertama dari',
            'name_father'       => 'Bpk Mustaqim',
            'name_mother'       => 'Ibu Wanikmah',
            'instagram'         => 'https://www.instagram.com/alif_arrizqy/',
            'bank_id'           => 1,
            'acc_name'          => 'Alif Ayatulloh Ar-Rizqy',
            'acc_number'        => 456789234,
            'gender'            => 'Male',
            'photo'             => 'male.png',
            'created_at'        => now(),
            'updated_at'        => now()
        ]);
    }
}
