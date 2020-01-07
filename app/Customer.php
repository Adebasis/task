<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Customer extends Model
{
    protected $guarded=[];

    public function location(){

    	return $this->belongsTo(Location::class);
    }
}
