<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintRequest extends Model
{
    //
    protected $fillable = ['status', 'due_date', 'description' ,'quantity',
                            'paper_size', 'paper_type', 'file', 'closed_date',
                            'refused_reason', 'satisfaction_grade', 'colored',
                            'stapled', 'front_back', 'owner_id', 'printer_id','close_user_id'];

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
        return $this->hasMany(Comment::class,'request_id');
    }

    public function printer()
    {
        return $this->belongsTo(Printer::class,'printer_id');
    }

}
