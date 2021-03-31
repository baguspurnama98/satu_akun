<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Transaction::create([
            'campaign_id' => '1',
            'user_id' => '1',
            'bank' => 'BCA',
            'no_transaction' => '9120912',
            'type' => 1,
            'nominal' => 20000,
            'unique_code' => 290,
            'total_nominal' => 20298,
            'no_rek_origin' => '1291241239',
            'timeout' => Carbon::now()->addHours(2),
            'no_rek_destination' => '21834131',
            'updated_by' => 'Ananta',
            'created_by' => 'Rispo',
        ]);
    }
}
