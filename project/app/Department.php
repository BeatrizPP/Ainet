<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function users()
    {
        return $this->hasMany(User::class,'id','department_id');
    }

    public function printRequests()
    {
        return $this->hasManyThrough(
            PrintRequest::class, User::class,
            'department_id', 'owner_id', 'id'
        );
    }

}
