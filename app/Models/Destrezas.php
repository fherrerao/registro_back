<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Anio;

class Destrezas extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'destrezas';

    protected $fillable = [
        'descripcion',
        'valor',
        'promedio',
        'maximo',
        'minimo',
        'sexo',
        'idanio'
    ];

    public function anio()
    {
        return $this->belongsTo(Anio::class, 'idanio');
    }
}
