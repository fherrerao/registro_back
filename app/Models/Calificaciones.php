<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Anio;
use App\Models\Cadete;

class Calificaciones extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'calificaciones';

    protected $fillable = [
        'bimestre',
        'pruebas',
        'destrezas',
        'nota',
        'supletorio',
        'idcadete',
        'idanio'                   
    ];

    public function anio()
    {
        return $this->belongsTo(Anio::class, 'idanio');
    }

    public function cadete()
    {
        return $this->belongsTo(Cadete::class, 'idcadete');
    }
}
