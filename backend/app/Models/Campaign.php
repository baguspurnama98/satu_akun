<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model 
{
    // defenisi tabel yg digunakan di database
    protected $table = 'campaigns';

    // yang dengan mudah di isi/ di lihat dari kolom kolom tabel
    protected $fillable = [
        'email_id',
        'categories_id',
        'title',
        'description',
        'expired_date',
        'duration_date',
        'durasi',
        'status',
        'slot_capacity',
        'slot_price',
        'media_url',
        'password_email',
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
    public function campaign_members()
    {
        return $this->hasMany(CampaignMembers::class);
    }


    // https://arianacosta.com/php/laravel/tutorial-full-text-search-laravel-5/

}