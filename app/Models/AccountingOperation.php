<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountingOperation extends Model
{

    /**
     * The corresponding table name.
     *
     * @var string
     */
    protected $table = 'accounting_operations';

    /**
     * Get the operations for the type.
     */
    public function type()
    {
        return $this->belongsTo(AccountingType::class);
    }
}
