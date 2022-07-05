<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function posttag()
    {
        return $this->hasMany('App\Models\PostTag', 'id', 'tags_id');
    }
}
