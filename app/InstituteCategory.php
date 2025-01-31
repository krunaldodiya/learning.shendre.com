<?php

namespace App;

use App\Traits\HasUuid;

use Illuminate\Database\Eloquent\Model;

class InstituteCategory extends Model
{
    use HasUuid;

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at', 'expires_at',
    ];

    public function info()
    {
        return $this->hasOne(User::class, 'id', 'student_id');
    }
}
