<?php

namespace Distributor;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = ['name', 'telephone', 'address', 'slug'];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

     public function commerces(){
         return $this->hasMany('Distributor\Commerce');
     }
     public function products(){
         return $this->hasMany('Distributor\Product');
     }
    
}
