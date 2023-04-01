<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Peloton;

class Cadete extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'cadete';

    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'edad',
        'genero',
        'especialista',
        'fec_nac',
        'idpeloton'            
    ];

    public function peloton()
    {
        return $this->belongsTo(Peloton::class, 'idpeloton');
    }

    // public function calificaciones()
    // {
    //     return $this->hasMany(Calificaciones::class, 'idcadete');
    // }
}
