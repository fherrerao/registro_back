<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Pruebas;

class Parametros extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'parametros';

    protected $fillable = [
        'valor',
        'edad',
        'sexo',
        'idpruebas'
    ];

    public function pruebas()
    {
        return $this->belongsTo(Pruebas::class, 'idpruebas');
    }
}
