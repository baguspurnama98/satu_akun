<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

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


    /**
     * relasi yang digunakan misal:
     * campaign berelasi (punya id_campaign) pada tabel campaign member
     * berarti yang punya adalah si campaign, dan campaign members belongsTo si campaign
     */
    public function campaigns()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}