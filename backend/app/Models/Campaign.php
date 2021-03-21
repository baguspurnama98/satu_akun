<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Campaign extends Model 
{
    use FullTextSearch;
    
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
        'delete'
    ];

    /**
     * The columns of the full text index
     * https://arianacosta.com/php/laravel/tutorial-full-text-search-laravel-5/
     */
    protected $searchable = [
        'title',
        'description',
    ];

    protected $appends = ['slug', 'host_name'];

    public function getSlugAttribute()
    {
        return Str::slug($this->attributes['title']);
    }

    // dynamically get hostname by default
    public function getHostNameAttribute() 
    {
        $campaign_members = CampaignMember::with('users')->where(['campaign_id' => $this->id, 'is_host' => 1])->first();
        return $campaign_members->users ?? null;
    }

    // public function getTotalMembersAttribute($value)
    // {
    //     return $value - 1;
    // }


    public function scopeActive($query) 
    {
        return $query->where('expired_date', '>=', Carbon::now())->where('status', '0');
    }

    // - filter berdasarkan status, 0 = aktif, 1 = berlangsung, 2 = expired, 3 = refund, 4 = selesai refund, 5 = selesai
    public function scopeStatusCampaign($query, $status) 
    {
        return $query->where('status', $status);
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