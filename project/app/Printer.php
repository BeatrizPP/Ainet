<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    public function printRequests()
    {
        return $this->hasMany(PrintRequest::class,'id','printer_id');
    }
}
