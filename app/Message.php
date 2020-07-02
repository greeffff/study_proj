<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];
    public function fromUser(){
        return $this->hasOne('App\Message','id','from');
    }
}
