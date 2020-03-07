<?php

namespace App;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    use HasUuid;

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'expires_at'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'institute_users');
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'institute_plans');
    }
}
