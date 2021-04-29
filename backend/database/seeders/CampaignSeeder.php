<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\CampaignCategories;
use App\Models\CampaignMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


// import Optimus for hashid
use Jenssegers\Optimus\Optimus;

class CampaignSeeder extends Seeder
{

    protected function decode($id)
    {
        $optimus = new Optimus(1580030173, 59260789, 1163945558);
        return $optimus->decode($id);
    }

    protected function encode($id)
    {
        $optimus = new Optimus(1580030173, 59260789, 1163945558);
        return $optimus->encode($id);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        CampaignCategories::create([
            'categories' => 'Dummy',
            'updated_by' => 'Dimas',
            'created_by' => 'Kanjeng',
        ]);

        Campaign::create([
            'email_id' => 1,
            'categories_id' => 1,
            'title' => 'Ani Campaign Dummy',
            'description' => 'Ini Campaign Dummy',
            'expired_date' => '2021-04-30 07:16:19',
            'duration_date' => '2021-05-01 00:00:00',
            'durasi' => '1 Bulan',
            'status' => 0,
            'slot_capacity' => '5',
            'slot_price' => 23000,
            'media_url' => '',
            'password_email' => 'asaksak',
            'updated_by' => 'Anji',
            'created_by' => 'Pragiwaksono',
        ]);

        Campaign::create([
            'email_id' => 1,
            'categories_id' => 1,
            'title' => 'Bni Campaign Dummy',
            'description' => 'Ini Campaign Dummy',
            'expired_date' => '2021-04-30 07:16:19',
            'duration_date' => '2021-05-01 00:00:00',
            'durasi' => '1 Bulan',
            'status' => 0,
            'slot_capacity' => '5',
            'slot_price' => 23000,
            'media_url' => '',
            'password_email' => 'asaksak',
            'updated_by' => 'Anji',
            'created_by' => 'Pragiwaksono',
        ]);


        Campaign::create([
            'email_id' => 1,
            'categories_id' => 1,
            'title' => 'Cni Campaign Dummy',
            'description' => 'Ini Campaign Dummy',
            'expired_date' => '2021-04-30 07:16:19',
            'duration_date' => '2021-05-01 00:00:00',
            'durasi' => '1 Bulan',
            'status' => 0,
            'slot_capacity' => '5',
            'slot_price' => 23000,
            'media_url' => '',
            'password_email' => 'asaksak',
            'updated_by' => 'Anji',
            'created_by' => 'Pragiwaksono',
        ]);


        Campaign::create([
            'email_id' => 1,
            'categories_id' => 1,
            'title' => 'Dni Campaign Dummy',
            'description' => 'Ini Campaign Dummy',
            'expired_date' => '2021-04-30 07:16:19',
            'duration_date' => '2021-05-01 00:00:00',
            'durasi' => '1 Bulan',
            'status' => 0,
            'slot_capacity' => '5',
            'slot_price' => 23000,
            'media_url' => '',
            'password_email' => 'asaksak',
            'updated_by' => 'Anji',
            'created_by' => 'Pragiwaksono',
        ]);

        Campaign::create([
            'email_id' => 1,
            'categories_id' => 1,
            'title' => 'Ani Campaign Dummy',
            'description' => 'Ini Campaign Dummy',
            'expired_date' => '2021-04-30 07:16:19',
            'duration_date' => '2021-05-01 00:00:00',
            'durasi' => '1 Bulan',
            'status' => 0,
            'slot_capacity' => '5',
            'slot_price' => 23000,
            'media_url' => '',
            'password_email' => 'asaksak',
            'updated_by' => 'Anji',
            'created_by' => 'Pragiwaksono',
        ]);

        Campaign::create([
            'email_id' => 1,
            'categories_id' => 1,
            'title' => 'Vni Campaign Dummy',
            'description' => 'Ini Campaign Dummy',
            'expired_date' => '2021-04-30 07:16:19',
            'duration_date' => '2021-05-01 00:00:00',
            'durasi' => '1 Bulan',
            'status' => 0,
            'slot_capacity' => '5',
            'slot_price' => 23000,
            'media_url' => '',
            'password_email' => 'asaksak',
            'updated_by' => 'Anji',
            'created_by' => 'Pragiwaksono',
        ]);


        Campaign::create([
            'email_id' => 1,
            'categories_id' => 1,
            'title' => 'Cni Campaign Dummy',
            'description' => 'Ini Campaign Dummy',
            'expired_date' => '2021-04-30 07:16:19',
            'duration_date' => '2021-05-01 00:00:00',
            'durasi' => '1 Bulan',
            'status' => 0,
            'slot_capacity' => '5',
            'slot_price' => 23000,
            'media_url' => '',
            'password_email' => 'asaksak',
            'updated_by' => 'Anji',
            'created_by' => 'Pragiwaksono',
        ]);


        Campaign::create([
            'email_id' => 1,
            'categories_id' => 1,
            'title' => 'Eni Campaign Dummy',
            'description' => 'Ini Campaign Dummy',
            'expired_date' => '2021-04-30 07:16:19',
            'duration_date' => '2021-05-01 00:00:00',
            'durasi' => '1 Bulan',
            'status' => 0,
            'slot_capacity' => '5',
            'slot_price' => 23000,
            'media_url' => '',
            'password_email' => 'asaksak',
            'updated_by' => 'Anji',
            'created_by' => 'Pragiwaksono',
        ]);


        Campaign::create([
            'email_id' => 1,
            'categories_id' => 1,
            'title' => 'Bni Campaign Dummy',
            'description' => 'Ini Campaign Dummy',
            'expired_date' => '2021-04-30 07:16:19',
            'duration_date' => '2021-05-01 00:00:00',
            'durasi' => '1 Bulan',
            'status' => 0,
            'slot_capacity' => '5',
            'slot_price' => 23000,
            'media_url' => '',
            'password_email' => 'asaksak',
            'updated_by' => 'Anji',
            'created_by' => 'Pragiwaksono',
        ]);


        Campaign::create([
            'email_id' => 1,
            'categories_id' => 1,
            'title' => 'Ini Campaign Dummy',
            'description' => 'Ini Campaign Dummy',
            'expired_date' => '2021-04-30 07:16:19',
            'duration_date' => '2021-05-01 00:00:00',
            'durasi' => '1 Bulan',
            'status' => 0,
            'slot_capacity' => '5',
            'slot_price' => 23000,
            'media_url' => '',
            'password_email' => 'asaksak',
            'updated_by' => 'Anji',
            'created_by' => 'Pragiwaksono',
        ]);


        Campaign::create([
            'email_id' => 1,
            'categories_id' => 1,
            'title' => 'Ini Campaign Dummy',
            'description' => 'Ini Campaign Dummy',
            'expired_date' => '2021-04-30 07:16:19',
            'duration_date' => '2021-05-01 00:00:00',
            'durasi' => '1 Bulan',
            'status' => 0,
            'slot_capacity' => '5',
            'slot_price' => 23000,
            'media_url' => '',
            'password_email' => 'asaksak',
            'updated_by' => 'Anji',
            'created_by' => 'Pragiwaksono',
        ]);

        CampaignMember::create([
            'user_id' => 1,
            'campaign_id' => 1,
            'is_host' => '1',
            'is_pay' => '1',
            'info' => 'Ini Dummy',
            'updated_by' => 'Mas',
            'created_by' => 'Pur',
        ]);
    }
}
