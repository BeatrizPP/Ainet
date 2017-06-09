<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = ['comment', 'blocked', 'request_id' ,'parent_id','user_id', 'created_at'];

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

    public function hasBlockedParent(){
        $comment = $this;  //actual comment
        while(true){
            //dd($comment->parent);
            if ($comment->parent != null) {
                if($comment->parent->blocked == 1){ //verify if the parent is blocked
                    return true;
                }else{
                    $comment = $comment->parent;  //to continue to verify next parent in the tree
                }
            }else{
                break;
            }
        }
        return false;
    }
}
