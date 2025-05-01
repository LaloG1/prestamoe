<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'monto', 'interes', 'estado', 'notas', 'monto_original'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function pagos()
{
    return $this->hasMany(Pago::class);
}

protected static function booted()
{
    static::creating(function ($prestamo) {
        $prestamo->monto_original = $prestamo->monto;
    });
}

}

