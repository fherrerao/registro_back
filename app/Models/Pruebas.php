<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pruebas extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'pruebas';

    protected $fillable = [
        'descripcion',
        'valor',
        'promedio'        
    ];
}
