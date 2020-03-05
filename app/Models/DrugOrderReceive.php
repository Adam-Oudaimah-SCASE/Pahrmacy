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

  /**
    * Get the send order related to this recieve order.
    *
   */
   
  /*public function drug_send()
    {
        return $this->belongsTo(DrugOrderSend::class, 'send_id');
    }
    */ 

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
