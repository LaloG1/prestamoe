<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'telefono', 'notas'];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}

