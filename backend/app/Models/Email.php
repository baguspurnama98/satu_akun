<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Email extends Model 
{
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
    ];


}