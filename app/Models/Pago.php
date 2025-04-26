<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
        'monto',
        'fecha_pago',
        'prestamo_id',
        'cliente_id',
    ];

    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
