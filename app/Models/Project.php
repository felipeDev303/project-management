<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'status',
        'responsible',
        'monto',
    ];

    protected $casts = [
        'start_date' => 'date',
        'monto' => 'decimal:2',
    ];

    // Accessor para compatibilidad con la BD existente
    public function getNombreAttribute()
    {
        return $this->name;
    }

    public function getFechaInicioAttribute()
    {
        return $this->start_date;
    }

    public function getEstadoAttribute()
    {
        return $this->status;
    }

    public function getResponsableAttribute()
    {
        return $this->responsible;
    }

    public function getMontoAttribute()
    {
        return $this->monto;
    }
}
