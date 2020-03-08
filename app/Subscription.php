<?php

namespace App;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasUuid;

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'expires_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
