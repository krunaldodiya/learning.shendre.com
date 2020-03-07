<?php

namespace App;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasUuid;

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
