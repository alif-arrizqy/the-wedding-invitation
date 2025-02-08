<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name'      => 'lif',
            'email'     => 'admin.alif@mail.com',
            'password'  => bcrypt('superalifadmin'),
            'email_verified_at' => now()
        ]);

        $superadmin->assignRole('Super admin');
    }
}
