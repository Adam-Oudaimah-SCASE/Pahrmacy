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
    public function orderable()
    {
        return $this->morphTo();
    }
}
