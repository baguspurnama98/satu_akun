<?php

namespace Database\Seeders;

use App\Models\Email;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Email::create([
            'email' => 'apriyantotobing8@gmail.com',
            'info' => 'Ini Dummy',
            'status' => 1,
            'updated_by' => 'Rizky',
            'created_by' => 'Billar',
        ]);
    }
}
