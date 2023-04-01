<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Rol;

class Docente extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'docente';

    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'correo',
        'clave',
        'claveTemp',
        'estado',
        'idrol'        
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idrol');
    }
}
