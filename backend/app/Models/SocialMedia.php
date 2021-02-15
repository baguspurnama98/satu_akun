<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model 
{
    protected $table = 'socialmedias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'id_user', 'type'
    ];

    /**
     * relation
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}