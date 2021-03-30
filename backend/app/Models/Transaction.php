<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Jenssegers\Optimus\Optimus;

class Transaction extends Model 
{
    // defenisi tabel yg digunakan di database
    protected $table = 'transactions';

    // yang dengan mudah di isi/ di lihat dari kolom kolom tabel
    protected $fillable = [
        'campaign_id',
        'user_id',
        'bank',
        'no_transaction',
        'type',
        'nominal',
        'unique_code',
        'total_nominal',
        'no_rek_origin',
        'no_rek_destination',
        'timeout',
        'status',
        'updated_by',
        'created_by',
        // butuh atas nama
    ];


    // yang gak akan ditampilkan atribut nya diluar dari lingkungan lumen/laravel
    protected $hidden = [
        // 'password',
        'delete'
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

    // Generate No Transaction from ID transaction
    public function setNoTransactionAttribute($value)
    {
        $this->attributes['no_transaction'] = $this->encode($value);
    }

    public function setNoTimeoutAttribute()
    {
        $this->attributes['timeout'] = Carbon::now()->addHours(2);
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