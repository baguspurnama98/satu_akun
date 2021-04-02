<?php

namespace App\Models;

use App\Observers\EmailObserver;
use Illuminate\Database\Eloquent\Model;

class Email extends Model 
{
    use EmailObserver; // udah pasti bekerja
    // defenisi tabel yg digunakan di database
    protected $table = 'emails';

    // yang dengan mudah di isi/ di lihat dari kolom kolom tabel
    protected $fillable = [
        'email',
        'info',
        'status',
        'updated_by',
        'created_by',
    ];

    // yang gak akan ditampilkan atribut nya diluar dari lingkungan lumen/laravel
    protected $hidden = [
        // 'password',
        'delete'
    ];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}