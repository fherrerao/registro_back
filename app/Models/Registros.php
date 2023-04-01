<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Parametros;
use App\Models\Destrezas;
use App\Models\Calificaciones;

class Registros extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'registros';

    protected $fillable = [
        'valor',
        'promedio',
        'idparametros',
        'iddestrezas',
        'idcalificaciones'
    ];

    public function parametros()
    {
        return $this->belongsTo(Parametros::class, 'idparametros');
    }

    public function destrezas()
    {
        return $this->belongsTo(Destrezas::class, 'iddestrezas');
    }

    public function calificaciones()
    {
        return $this->belongsTo(Calificaciones::class, 'idcalificaciones');
    }
}
