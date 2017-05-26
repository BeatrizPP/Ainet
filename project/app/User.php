<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','department_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function printRequests()
    {
        return $this->hasMany(PrintRequest::class,'id','owner_id');
    }

    public function closedRequests()
    {
        return $this->hasMany(PrintRequest::class,'id','closed_user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'id','user_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

}
