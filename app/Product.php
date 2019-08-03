<?php

namespace Distributor;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function distributor(){
        return $this->belongsTo('Distributor\Distributor');
    }
    /*public function employees(){
        return $this->belongsToMany('Distributor\Employee');
    }*/
    public function sales(){
        return $this->hasMany('Distributor\Sale');
    }
   
}
