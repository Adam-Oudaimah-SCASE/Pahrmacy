<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrugOrderReceive extends Model
{

    /**
     * The corresponding table name.
     *
     * @var string
     */
    protected $table = 'drug_order_recieve';

    /**
    * Get the order.
    *
    */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
