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
        'name', 'email', 'password','department_id','remember_token','blocked','admin'
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

    public function verified()
    {
        $this->activated = 1;
        $this->save();
    }

    public function isAdmin()
    {
        if($this->admin==1){
            return true;
        }else{
            return false;
        }// this looks for an admin column in your users table
    }

    public function isBlocked()
    {
        if($this->blocked==1){
            return true;
        }else{
            return false;
        }
    }

}
