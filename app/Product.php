<?php

namespace Distributor;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'amount', 'price', 'description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
