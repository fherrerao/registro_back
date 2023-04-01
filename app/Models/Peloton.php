<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Seccion;
use App\Models\Docente;

class Peloton extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'peloton';

    protected $fillable = [
        'descripcion',
        'idseccion'                
    ];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'idseccion');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'iddocente');
    }
}
