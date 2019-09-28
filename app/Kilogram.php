<?php

namespace Distributor;

use Illuminate\Database\Eloquent\Model;

class Kilogram extends Model
{
    public function products(){
        return $this->belongsToMany('Distributor\Product');
    }
}
