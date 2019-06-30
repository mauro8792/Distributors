<?php

namespace Distributor;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['employee_id', 'product_id', 'amount', 'date'];
}
