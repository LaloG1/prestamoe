<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'monto', 'interes', 'estado', 'notas'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function pagos()
{
    return $this->hasMany(Pago::class);
}

}

