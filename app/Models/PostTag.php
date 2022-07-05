<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag', 'tags_id', 'id');
    }
}
