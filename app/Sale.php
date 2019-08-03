<?php

namespace Distributor;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['employee_id', 'product_id','kilograms', 'amount'];

   

    public function employee(){
        return $this->belongsTo('Distributor\Employee');
    }
    public function product(){
        return $this->belongsTo('Distributor\Product');
    }
}
