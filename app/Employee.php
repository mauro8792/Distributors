<?php

namespace Distributor;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $filliable = ['name', 'lastname','telephone','dni'
        ,'email','slug'];
        
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function commerce(){
        return $this->belongsTo('Distributor\Commerce');
    }
   
    public function sales(){
        return $this->hasMany('Distributor\Sale');
    }
}
