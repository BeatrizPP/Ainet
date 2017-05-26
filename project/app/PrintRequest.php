<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintRequest extends Model
{
    //
    protected $table = 'requests';

    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }

    public function closer()
    {
        return $this->belongsTo(User::class,'closed_user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'id','request_id');
    }

    public function printer()
    {
        return $this->belongsTo(Printer::class,'printer_id');
    }

}
