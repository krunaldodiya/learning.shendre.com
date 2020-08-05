<?php

namespace App;

use App\Traits\HasUuid;

use Illuminate\Database\Eloquent\Model;

class InstituteStudent extends Model
{
    use HasUuid;

    protected $guarded = [];

    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function info()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
