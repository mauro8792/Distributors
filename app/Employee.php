<?php

namespace Distributor;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $filliable = ['name', 'lastname','telephone','dni'
        ,'email', 'birthdate', 'sexo'];
        
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function commercer(){
        return $this->belongsTo('Distributor\Commerce');
    }
}
