<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

// import Optimus for hashid
use Jenssegers\Optimus\Optimus;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'whatsapp', 'otp', 'status', 'role', 'updated_by', 'created_by',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'id',
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

    protected $appends = ['hashid'];

    /**
     * Kegunaan ini mengoveride value yang keluar dari model
     * camelCase -> di transform jadi camel_case
     */
    public function getHashIdAttribute()
    {
        return $this->encode($this->attributes['id']);
    }
    

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    /**
     * relation
     */
    public function social_media() 
    {
        return $this->hasMany(SocialMedia::class);
    }

    public function transactions() 
    {
        return $this->hasMany(Transaction::class);
    }

    public function campaign_members()
    {
        return $this->hasMany(CampaignMember::class);
    }

    public function campaign_reports()
    {
        return $this->hasMany(CampaignReport::class);
    }
}
