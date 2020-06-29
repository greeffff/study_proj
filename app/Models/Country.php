<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function scopeFilter($builder, $filters){
        return $filters->apply($builder);
    }
}
