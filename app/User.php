<?php

namespace App;

use App\Events\UserWasCreated;
use App\Traits\HasUuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Airlock\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasUuid, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'imei' => 'json',
    ];

    protected $dispatchesEvents = [
        'created' => UserWasCreated::class
    ];

    protected $appends = ['setting'];

    public function getSettingAttribute()
    {
        $settings = Setting::all();

        return $settings->reduce(function ($carry, $item) {
            return array_merge($carry, [$item->key => $item->value]);
        }, []);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function device_tokens()
    {
        return $this->hasMany(DeviceToken::class);
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
}
