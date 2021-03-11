<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        //
        User::create([
            'name' => 'Apri',
            'email' => 'apriyantotobing8@gmail.com',
            'password' => Hash::make('secret'),
            'status' => 1,
            'role' => 'u', // user
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@baguspurnama.com',
            'password' => Hash::make('P@ssw0rd'),
            'status' => 1,
            'role' => 'a', // admin
        ]);
    }
}
