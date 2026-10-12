<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** Intenção de envio persistida antes de consultar o integrador. */
class ContactDelivery extends Model
{
    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected function casts(): array
    {
        return ['payload' => 'encrypted:array'];
    }
}
