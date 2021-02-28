<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model 
{
    // defenisi tabel yg digunakan di database
    protected $table = 'campaigns';

    // yang dengan mudah di isi/ di lihat dari kolom kolom tabel
    protected $fillable = [
        'kolom1',
        'kolom2',
        'kolom3',
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
    public function campaign_members()
    {
        return $this->hasMany(CampaignMembers::class);
    }

}