<?php

namespace Distributor;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $filliable = ['name', 'lastname','telephone','dni'
        ,'email', 'birthdate', 'sexo', 'slug'];
        
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function commerce(){
        return $this->belongsTo('Distributor\Commerce');
    }
    
}
