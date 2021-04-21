<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

use App\Observers\UserObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory, UserObserver; // udah pasti bekerja

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'whatsapp', 'otp', 'status', 'role', 'updated_by', 'created_by',
    ];

    // status 0 (belum validasi), 1 (aktif), 2 (banned),

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        // 'id',
    ];
    

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

    public function getNameAttribute() {
        $id_user = $this->attributes['id'];
        $is_host = CampaignMember::where(['user_id' => $id_user, 'is_host' => 1])->limit(1)->exists();
        if ($is_host) return $this->attributes['name'];
        if (Auth::user()) {
            if (Auth::user()->role == 'a' || Auth::user()->id === $id_user) {
                return $this->attributes['name'];
            }
        }
        return sensorName($this->attributes['name']);
    }

    public function setWhatsappAttribute() {
        $this->attributes['whatsapp'] = Crypt::encrypt($this->attributes['whatsapp']);
    }

    public function getWhatsappAttribute() {
        return Crypt::decrypt($this->attributes['whatsapp']);
    }

    public function setOtpAttribute() {
        $this->attributes['otp'] = Crypt::encrypt($this->attributes['otp']);
    }

    public function getOtpAttribute() {
        return Crypt::decrypt($this->attributes['otp']);
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
