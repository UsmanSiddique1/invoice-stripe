<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    public function payment(){

    	return $this->hasOne('App\Payment');
    }
}
