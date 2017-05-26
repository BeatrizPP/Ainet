<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function printRequest()
    {
        return $this->belongsTo(User::class,'request_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Comment::class,'id','parent_id');
    }
}
