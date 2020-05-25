<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function buddy(){
        return $this->belongsTo('\App\Buddy');
    }
}
