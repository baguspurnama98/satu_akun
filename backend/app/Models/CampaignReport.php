<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignReport extends Model
{
    // defenisi tabel yg digunakan di database
    protected $table = 'campaign_reports';

    // yang dengan mudah di isi/ di lihat dari kolom kolom tabel
    protected $fillable = [
        'user_id',
        'campaign_id',
        'title',
        'report',
        'response',
        'status',
        'updated_by',
        'created_by',
    ];

    // yang gak akan ditampilkan atribut nya diluar dari lingkungan lumen/laravel
    protected $hidden = [
        // 'password',
    ];
}
