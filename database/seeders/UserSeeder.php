<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'adminsuper',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'jenis_kelamin' => 'laki-laki',
            'role' => 'superadmin',
            'alamat' => 'Bumi',
            'slug'  => 'admin-super'
        ]);
    }
}
