<?php

namespace Distributor;

use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    protected $filliable = ['name','address','telephone', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function distributor(){
        return $this->belongsTo('Distributor\Distributor');
    }
    public function employees(){
         return $this->hasMany('Distributor\Employee');
     }
    public function users(){
         return $this->hasMany('Distributor\User');
     }
}
