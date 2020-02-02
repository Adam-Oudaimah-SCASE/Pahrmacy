<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The corresponding table name.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
    * Get the warehouses related to this order.
    *
    */
    public function warehouses()
    {
        return $this->morphedByMany(WareHouse::class, 'orderable');
    }

    /**
    * Get the companies related to this order.
    *
    */
    public function companies()
    {
        return $this->morphedByMany(Company::class, 'orderable');
    }
}
