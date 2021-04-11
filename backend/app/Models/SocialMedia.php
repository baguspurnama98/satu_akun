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
        'username', 'user_id', 'type', 'updated_by', 'created_by',
    ];

    /**
     * relation
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}