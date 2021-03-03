<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// import Optimus for hashid
use Jenssegers\Optimus\Optimus;

class CampaignMember extends Model 
{
    // defenisi tabel yg digunakan di database
    protected $table = 'campaign_members';

    // yang dengan mudah di isi/ di lihat dari kolom kolom tabel
    protected $fillable = [
        'user_id',
        'campaign_id',
        'is_host',
        'is_pay',
        'info',
        'updated_by',
        'created_by',
    ];

    // yang gak akan ditampilkan atribut nya diluar dari lingkungan lumen/laravel
    protected $hidden = [
        // 'password',
    ];

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
     * Kegunaan ini mengoveride value yang keluar dari model
     * camelCase -> di transform jadi camel_case
     */
    public function getUserIdAttribute($value)
    {
        return $this->encode($value);
    }

    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = $this->decode($value);
    }

    /**
     * relasi yang digunakan misal:
     * campaign berelasi (punya id_campaign) pada tabel campaign member
     * berarti yang punya adalah si campaign, dan campaign members belongsTo si campaign
     */
    public function campaigns()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}