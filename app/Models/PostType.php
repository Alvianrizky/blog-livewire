<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function postdetail()
    {
        return $this->hasMany('App\Models\PostDetail', 'id', 'types_id');
    }
}
