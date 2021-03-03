<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


// import Optimus for hashid
use Jenssegers\Optimus\Optimus;

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
        // 'password_email',
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
    public function getIdAttribute($value)
    {
        return $this->encode($value);
    }

    public function setIdAttribute($value)
    {
        $this->attributes['id'] = $this->decode($value);
    }

    /**
     * relasi yang digunakan misal:
     * campaign berelasi (punya id_campaign) pada tabel campaign member
     * berarti yang punya adalah si campaign, dan campaign members belongsTo si campaign
     */
    public function campaign_members()
    {
        return $this->hasMany(CampaignMember::class);
    }

    public function campaign_reports()
    {
        return $this->hasMany(CampaignReport::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * with default
     * https://laravel.com/docs/8.x/eloquent-relationships#default-models
     */
    public function emails()
    {
        return $this->belongsTo(Email::class);
    }

    public function categories()
    {
        // return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
        return $this->belongsTo(CampaignCategories::class, 'categories_id');
    }
    
    // https://arianacosta.com/php/laravel/tutorial-full-text-search-laravel-5/

}