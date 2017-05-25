<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintRequest extends Model
{
    //
    protected $table = 'requests';

    public function user() //$printRequest->user
    {
        return $this->belongsTo(User::class);
    }

}
